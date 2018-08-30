<?php

if (isset($_POST['upload'])) {    
    if (!empty($_FILES)){
        $allFiles = $_FILES["userfile"];
    } else {
        $allFiles = [0];
    }
    if (pathinfo($_FILES['userfile']['name'], PATHINFO_EXTENSION) !== 'json') {
        echo"<p class='error'>Можно загружать файлы с расширением json</p>";
    } else if ($_FILES["userfile"]["size"] > 1024 * 1024 * 1024) {
        echo"<p class='error'>Размер файла больше трех мегабайта</p>";                
    } else if(array_key_exists('userfile', $_FILES)){
                if (move_uploaded_file($_FILES['userfile']['tmp_name'], $_FILES['userfile']['name'])) {
                    header(' Location: /list.php ');//Перенаправление на страницу тестов
                    echo "<p class='success'>Файл успешно загружен на сервер</p>";
    } else {
        echo"<p class='error'>Произошла ошибка</p>";
    } 
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>Document</title>
    <link rel="stylesheet" href="main.css"/>
</head>
<body>
<div class="menu">
<ul class="menu_list">
<li><a href="admin.php" active>Отправить файл</a></li>
<li><a href="list.php">Список тестов</a></li>
</ul>
</div> 
<form class="form" enctype="multipart/form-data" action="admin.php" method="POST">
<p>Загрузть файл теста</p>
<!-- Название элемента input определяет имя в массиве $_FILES -->
<div>
<input name="userfile" type="file" id="uploadfile" required />
</div>
<div>
<input type="submit" value="Отправить" name="upload"/>
</div>
</form>
</body>
</html>
