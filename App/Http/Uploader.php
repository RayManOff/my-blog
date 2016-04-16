<?php

namespace App\Http;

class Uploader{

    protected $uploads_dir;
    
    public $format = [];

    public function __construct(array $config = '')
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
                throw new \Exception('Файл не отправлен');
            case UPLOAD_ERR_INI_SIZE:
            case UPLOAD_ERR_FORM_SIZE:
                throw new \Exception('Превышен допустимый размер');
            default:
                throw new \Exception('Неизвестная ошибка');
        }
    }

    protected function checkFormat()
    {
        $finfo = new \finfo(FILEINFO_MIME_TYPE);
        $mime = $finfo->file($_FILES['file']['tmp_name']);
        $res = array_search($mime, $this->format, true);

        if (false == $res) {
            throw new \Exception('Неправильный формат данных');
        }
    }

    public function UploadFile()
    {
        if ($this->uploads_dir == null) {
            throw new \Exception('Не указаны пути');
        }

        if($this->isUploadedFile()){
            try {
                $this->checkUploadedFile();
                $this->checkFormat();
                $tmp_name = $_FILES['file']['tmp_name'];
                $name = $_FILES['file']['name'];
                if(!move_uploaded_file($tmp_name, $this->uploads_dir . '/' . $name)){
                    throw new \Exception('Неудалось загрузить файл');
                }
            } catch (\Exception $e){
                throw  new \Exception($e->getMessage());
            }
        } else {
            throw new \Exception('Неудалось загрузить файл');
        }
    }
}