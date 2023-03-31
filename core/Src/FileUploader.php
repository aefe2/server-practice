<?php

namespace Src;

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

    public function upload($destination, $allowedTypes, $maxSize)
    {
        $extension = pathinfo($this->fileName, PATHINFO_EXTENSION);
        $error = '';

        //Проверка на тип файла
        if (!in_array($this->fileType, $allowedTypes)) {
            $error .= 'Не поддерживаемый тип файла';
        }

        //Проверка на макс размер фалйа
        if ($this->fileSize > $maxSize) {
            $error .= 'Файл слишком большой';
        }

        //Проверка есть ли ошибки при загрузке
        if ($error) return $error;

        //Новое имя для файла
        $newFileName = uniqid() . '.' . $extension;
        $destination .= '/' . $newFileName;

        //Перемещение файла
        if (!move_uploaded_file($this->fileTempName, $destination)) return 'Ошибка - файл не может быть загружен';

        //Возврат нового имени файла для бд
        return $newFileName;
    }
//    public function uploadFile(): string
//    {
//        if (isset($_FILES['medcard_photo'])) {
//            $fileTmpName = $_FILES['medcard_photo']['tmp_name'];
//            $pathWeb = '/server-practice/public/uploads/' . $_FILES['medcard_photo']['name'];
//            $path = $_SERVER['DOCUMENT_ROOT'] . $pathWeb;
//            return move_uploaded_file($fileTmpName, $path);
//        }
//        return false;
//    }
}
