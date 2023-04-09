<?php

namespace Src;

use Illuminate\Database\Capsule\Manager as DB;

class FileUploader
{
    private $fileName;
    private $fileType;
    private $fileSize;
    private $fileTempName;

    public function __construct($file)
    {
        $this->fileName = $file['name'];
        $this->fileType = $file['type'];
        $this->fileSize = $file['size'];
        $this->fileTempName = $file['tmp_name'];
    }

    public function upload($destination)
    {
        $extension = pathinfo($this->fileName, PATHINFO_EXTENSION);

        $message = array();

        if (!empty($message)) {
            return $message;
        } else {
            $newFileName = uniqid() . '.' . $extension;
            $destination .= '/' . $newFileName;

            //Перемещение файла
            if (!move_uploaded_file($this->fileTempName, $destination)) {
                $message[] = 'Ошибка - файл не может быть загружен';
            }

            if (!empty($message)) {
                return $message;
            } else {
                return $newFileName;
            }
        }
    }
}