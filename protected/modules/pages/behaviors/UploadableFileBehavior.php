<?php

class UploadableFileBehavior extends CActiveRecordBehavior{
    /**
     * @var string название атрибута, хранящего в себе имя файла и файл
     */
    public $attributeName='document';
     /**
     * @var int максимальный размер файла в байтах
     */
	public $maxSize;
    /**
     * @var string имя модели откуда приходит форма
     */
	public $upload_model='';
     /**
     * @var int максимальный размер файла в байтах
     */
    public $savePathAlias='webroot.media';
    /**
     * @var array сценарии валидации к которым будут добавлены правила валидации
     * загрузки файлов
     */
    public $scenarios=array('insert','update');
    /**
     * @var string типы файлов, которые можно загружать (нужно для валидации)
     */
    public $fileTypes='doc,docx,xls,xlsx,odt,pdf';
 
    /**
     * Шорткат для Yii::getPathOfAlias($this->savePathAlias).DIRECTORY_SEPARATOR.
     * Возвращает путь к директории, в которой будут сохраняться файлы.
     * @return string путь к директории, в которой сохраняем файлы
     */
    public function getSavePath(){
        return Yii::getPathOfAlias($this->savePathAlias).DIRECTORY_SEPARATOR;
    }
 
    public function attach($owner){
        parent::attach($owner);
 
        if(in_array($owner->scenario,$this->scenarios)){
            // добавляем валидатор файла
            $fileValidator=CValidator::createValidator('file', $owner, $this->attributeName, array('types'=>$this->fileTypes, 'allowEmpty'=>false, 'maxSize'=>$this->maxSize));
			$owner->validatorList->add($fileValidator);
			           // print_R($owner->validatorList); die;
        }
    }
 
    // имейте ввиду, что методы-обработчики событий в поведениях должны иметь
    // public-доступ начиная с 1.1.13RC
    public function beforeSave($event){

		//if(in_array($this->owner->scenario,$this->scenarios) && ($file=CUploadedFile::getInstance($this->upload_model!=''?new $this->upload_model:$this->owner,$this->attributeName)))
		if(in_array($this->owner->scenario,$this->scenarios) && ($file=CUploadedFile::getInstance($this->owner,$this->attributeName)))
		{
            $this->deleteFile(); // старый файл удалим, потому что загружаем новый
			$new_name = strtolower(time()."cd".md5(time().$file->name).".".self::getExtension($file->name));
            $this->owner->setAttribute($this->attributeName, $file->name);
            $this->owner->setAttribute('new_name', $new_name);
            
			if(!$file->saveAs($this->getSavePath().$new_name)) $this->addError('Произошла ошибка при сохранении файла!');
        } 
		else
		{
			if(!in_array($this->owner->scenario, $this->scenarios)) 
			{
				Yii::app()->user->setFlash('error', "Не найден сценарий при сохранении файла!");
				$this->owner->addError($this->attributeName, "Не найден сценарий при сохранении файла!");
			}
			else 
			{
				Yii::app()->user->setFlash('error', "Файл не загружен!");
				$this->owner->addError($this->attributeName, "Файл не загружен!");
				return false;
			}
		}

        return true;
    }
 
    // имейте ввиду, что методы-обработчики событий в поведениях должны иметь
    // public-доступ начиная с 1.1.13RC
    public function beforeDelete($event){
        $this->deleteFile(); // удалили модель? удаляем и файл, связанный с ней
    }
 
    public function deleteFile(){
        $filePath=$this->savePath.$this->owner->getAttribute($this->attributeName);
        if(@is_file($filePath))
            @unlink($filePath);
    }
	
	public function getExtension($filename) {
        $path_info = pathinfo($filename);
        return $path_info['extension'];
    }
}