<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Форма</title>

    <!-- Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<div class="container">
    <h1 class="text-center"><?php echo $title?></h1>
    <?php foreach($news as $article):?>
    <form class="form-horizontal" role="form" action="/Admin/Update?id=<?php echo $article['id']; ?>" method="post">
        <div class="form-group">
            <label for="title" class="col-sm-2 control-label">Заголовок</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="title" name="title" value="<?php echo $article['title']; ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="text" class="col-sm-2 control-label">Текст новости</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="text" name="text" value="<?php echo $article['text']; ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="author" class="col-sm-2 control-label">Автор</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="author" name="author" value="<?php echo $article->author['author_name']; ?>">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">Обновить</button>
                <a href="/Admin/Delete?id=<?php echo $article['id'];?>" class="btn btn-default" >Удалить новость</a>
            </div>
        </div>
    </form>
    <?php endforeach; ?>
    <a href="/Admin/Add" class="btn btn-default">Добавить новость</a>

</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>
