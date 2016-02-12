<pre>
<?php
function __autoload ($class_name){
    include 'classes/'.$class_name.'.php';
};

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    print_r($_FILES);
}

?>
</pre>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Загрузка файлов на сервер</title>
</head>
<body>
<h2><p><b>Файл не должен превышать раземра в 150 кБайт, 150x150 px и быть формата  .jpg, .png</b></p></h2>
<form action="upload.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="MAX_FILE_SIZE" value="153600" />
    <input type="file" name="userfile"><br>
    <input type="submit" value="Загрузить">
</form>
<?php
$picture = new UFile();
$picture ->ErrorFile();
?>
</body>
</html>