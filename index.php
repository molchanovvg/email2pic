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
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">



</head>
<body>
<div class="jumbotron vertical-center">
    <div class="col-lg-4  container text-center">
        <?php
        if ((empty($_POST['email'])))
        {
            if (!empty($_SESSION['ErrorMessage']))
            {
                ?>
                <div class="bg-danger"><?php echo $_SESSION['ErrorMessage'];?></div>
                <?php
                $_SESSION['ErrorMessage']='';
            }
            ?>
            <h1>Защита от спама</h1>
            <p>Указанный имейл никому не передаётся и не сохраняется на сервере</p>
            <a href="https://github.com/molchanovvg/email2pic">Убедитесь в этом на Github</a>
            <br>  <br>
            <form class="form-horizontal" method="post" action="result.php" role="form" >
                <div class="form-group">
                    <label for="mail" class="col-lg-2 control-label">Email:</label>
                    <div class="col-lg-10">
                        <input type="email" class="form-control" name="email" placeholder="Email">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-10  col-sm-offset-2">
                        <button type="submit" class="btn btn-success">Сгенерировать картинку</button>
                    </div>
                </div>
            </form>
            <?php
        }
        ?>
    </div>
</div>
</body>
</html>

