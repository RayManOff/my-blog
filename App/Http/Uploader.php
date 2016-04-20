<?php

namespace App\Http;

use App\Exceptions\UploaderException;

class Uploader{

    protected $uploads_dir;
    public $format = [];

    public function __construct($config = '')
    {
        if($config == ''){
            $conf = $this->getConfig();
        } else {
            $conf = $config;
        }

        $this->uploads_dir = $conf['uploads_dir'];

    }

    protected function getConfig()
    {
        $conf = include __DIR__ . '/../config.php';
        return $conf['file'];
    }
    
    public function getUploadsDir()
    {
        return $this->uploads_dir;
    }

    public function setUploadsDir($uploads_dir)
    {
        $this->uploads_dir = $uploads_dir;
    }
    
    protected function isUploadedFile()
    {
        return is_uploaded_file($_FILES['file']['tmp_name']);   
    }

    protected function checkUploadedFile()
    {
        switch ($_FILES['file']['error']) {
            case UPLOAD_ERR_OK:
                break;
            case UPLOAD_ERR_NO_FILE:
                throw new UploaderException('Файл не отправлен');
            case UPLOAD_ERR_INI_SIZE:
            case UPLOAD_ERR_FORM_SIZE:
                throw new UploaderException('Превышен допустимый размер');
            default:
                throw new UploaderException('Неизвестная ошибка');
        }
    }

    protected function checkFormat()
    {
        $finfo = new \finfo(FILEINFO_MIME_TYPE);
        $mime = $finfo->file($_FILES['file']['tmp_name']);
        $res = array_search($mime, $this->format, true);

        if (false == $res) {
            throw new UploaderException('Неправильный формат данных');
        }
    }

    public function UploadFile()
    {
        if ($this->uploads_dir == null) {
            throw new UploaderException('Не указаны пути');
        }

        if($this->isUploadedFile()){
            try {
                $this->checkUploadedFile();
                $this->checkFormat();
                $tmp_name = $_FILES['file']['tmp_name'];
                $name = $_FILES['file']['name'];
                $file_path = $this->uploads_dir . '/' . $name;
                if(!move_uploaded_file($tmp_name, $file_path )){
                    
                    return false;
                }
                
                return$file_path;
                
            } catch (UploaderException$e){
                
                throw  new UploaderException($e->getMessage());
            }
        } else {
            
            throw new UploaderException('Неудалось загрузить файл');
        }
    }
}