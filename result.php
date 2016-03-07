<?php
session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Конвертирование email в картинку</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.css" rel="stylesheet">
    <script src="js/clipboard.min.js"></script>
</head>
<body>
<div class="jumbotron vertical-center">
    <div class="col-lg-3  container text-center">
    <?php
    $pattern='/^(?:[a-z0-9]+(?:[-_.]?[a-z0-9]+)?@[a-z0-9_.-]+(?:\.?[a-z0-9]+)?\.[a-z]{2,5})$/i';
    $email=$_POST['email'];
    if (preg_match($pattern, $email))
    {
        $path_png='/p/'.sha1($email.sha1($email)).'.png';
        $FullPathToPicture='http://'.$_SERVER['HTTP_HOST'] . $path_png;
        $LocatePathToPicture=$_SERVER['DOCUMENT_ROOT'].$path_png;
        include('generateImage.php');
        generateImg($email, $LocatePathToPicture);

        ?>
        <img src="<?php echo $path_png?>" alt="Email">
        <a href="<?php echo $FullPathToPicture?>" download>
            <button class="btn btn-info button">Скачать</button>
        </a>
        <br>
        <br>
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
    </div>
</div>
</body>
</html>