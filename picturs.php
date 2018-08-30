<?php
header('Content-type: image/png');
$testname = $_POST['testname'];
$username = $_POST['username'];
$date = $_POST['date'];
$correctAnswers = $_POST['correctAnswers'];
$totalAnswers = $_POST['totalAnswers'];
$correct = $correctAnswers . ' из ' . $totalAnswers;
// Создаем картинку и цвет шрифта
$img = imagecreatefromjpeg('img/sert.png');
$fontColor = imagecolorallocate($img, 035, 035, 035);
// Определяем положение имени пользователя (по центру)
$imageWidth = getimagesize('img/sert.png');
$imageWidth = $imageWidth[0];
$textPoints = imagettfbbox(300, 0, 'fonts/arial.ttf', $username);
$textWidth = $textPoints[2] - $textPoints[0];
$x = ($imageWidth - $textWidth) / 2;
// Распологаем все данные на картинке
imagettftext($img, 300, 0, $x, 800, $fontColor, 'fonts/arial.ttf', $username . ',');
imagettftext($img, 200, 0, 1600, 1625, $fontColor, 'fonts/arial.ttf', $testname);
imagettftext($img, 180, 0, 1600, 1976   , $fontColor, 'fonts/arial.ttf', $correct);
imagettftext($img, 180, 0, 1600, 2325, $fontColor, 'fonts/arial.ttf', $date);
imagepng($img);
imagedestroy($img);