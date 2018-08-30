<?php
    $arrayDir = scandir(__DIR__);
    $i=0;
    $strTest = '/\.json$/';
    $allFiles = array();
    foreach($arrayDir as $fileName){
        if (preg_match($strTest, $fileName)){
            $i++;
            $allFiles += [$i => $fileName]; 
        }
    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>Document</title>
    <link rel="stylesheet" href="main.css"/>
</head>
<body>
<div class="menu">
<ul class="menu_list">
<li><a href="admin.php">Отправить файл</a></li>
<li><a href="list.php"active>Список тестов</a></li>
</ul>
</div> 

    <!-- Цикл, который выводит список всех загруженных файлов -->
    <?php if (!empty($allFiles)): ?>
        <?php foreach ($allFiles as $file): ?>        
            <div class="file-block">
                <h2><?php echo str_replace('test/', '', $file); ?></h2><br/>
                <em>Загружен: <?php echo date("d-m-Y H:i", filemtime($file)) ?></em><br/>
                <a href="test.php?number=<?php echo array_search($file, $allFiles); ?>">Перейти на страницу с тестом =></a>                
            </div>
            <hr/>         
        <?php endforeach; ?>
    <?php endif; ?>
    <?php if (empty($allFiles)) echo 'Пока не загружено ни одного теста';?>    
</body>
</html>