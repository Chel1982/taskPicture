<?php
class UFile{

    function ErrorFile(){
        if($_FILES["userfile"]["error"] != UPLOAD_ERR_OK){
            switch($_FILES["userfile"]["error"]) {
                case UPLOAD_ERR_FORM_SIZE:
                    echo "Превышен максимально допустимый размер";
                    break;
                case UPLOAD_ERR_FORM_SIZE:
                    echo "Превышено максимальное значение MAX_FILE_SIZE";
                    break;
                case UPLOAD_ERR_PARTIAL:
                    echo "Файл частично загружен";
                    break;
                case UPLOAD_ERR_NO_FILE:
                    echo "Файл не был загружен";
                    break;
                case UPLOAD_ERR_NO_TMP_DIR:
                    echo "Отсутствует временная папка";
                    break;
                case UPLOAD_ERR_CANT_WRITE:
                    echo "Не удалось записать файл на диск";
                    break;
                }
        }elseif($_FILES["userfile"]["size"] > 153600){
                echo "Загружаемый файл больше 150кБайт";

        }elseif (($_FILES["userfile"]["type"] !== "image/png") and ($_FILES["userfile"]["type"] !== "image/jpeg")) {
                echo "Не верный формат загружаемого рисунка";

        }elseif ( $size = (list($width, $height, $type, $attr) = getimagesize($_FILES["userfile"]["tmp_name"]))){
                switch ($size){
                        case $width > 150:
                            echo "Ширина больше 150";break;
                        case $height > 150:
                            echo "Высота больше 150";break;
                    }


        }else{
            echo "Размер загруженного файла: ".$_FILES["userfile"]["size"]." байт <br>";
            echo "Тип загруженного файла: ".$_FILES["userfile"]["type"];
            move_uploaded_file($_FILES["userfile"]["tmp_name"],"C:/img/".$_FILES["userfile"]["name"]);
        }

    }




}
