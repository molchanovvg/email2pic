<!DOCTYPE HTML>
<html>
<head>
    <title>Конвертирование email в картинку</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/clipboard.min.js"></script>


</head>
<body>
<?php
session_start();
$pattern='/^(?:[a-z0-9]+(?:[-_.]?[a-z0-9]+)?@[a-z0-9_.-]+(?:\.?[a-z0-9]+)?\.[a-z]{2,5})$/i';
$subject=$_POST['email'];
if (preg_match($pattern, $subject))
{
    $_SESSION['email']=$_POST['email'];
    $FullPathToPicture='http://'.$_SERVER['HTTP_HOST'] . $_SESSION['path_png'];
    ?>
    <img src="captcha.php" alt=""><br>
    <a href="<?php echo $FullPathToPicture?>" download>Скачать</a><br>
    <input id="link_png" value="<?php echo $FullPathToPicture?>">
    <button class="btn btn-success button" id="copy-button" data-clipboard-target="#link_png">Copy</button>
    <script>
        (function(){new Clipboard('#copy-button');})();
    </script>
<?php
}else{
    $_SESSION['ErrorMessage']='Проверьте, правильность ввода email';
    $home_url = 'http://'.$_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']).'index.php';
    header('Location: '.$home_url);
}
    ?>
</body>
</html>