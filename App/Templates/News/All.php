<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Новости</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="container">
    <h1 class="text-center">Новости</h1>
    <?php foreach ($news as $article): ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <a href="/News/One?id=<?php echo $article->id; ?>"><?php echo $article->title ?></a>
            </div>
            <div class="panel-body"><?php echo $article->text ?></div>
            <div class="panel-footer">
                <b>Автор статьи:</b>
                <i><?php if (!empty($article->author)) {
                        echo $article->author->author_name;
                    } else {
                        echo 'Нет автора';
                    }; ?></i>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>