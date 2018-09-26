<html>
<head>
    <title> Новость № <?php echo $article->id; ?></title>
</head>
<body>

<div><h1>Новость № <?php echo $article->id; ?></h1></div>
<div><h3> <?= $article->title; ?></h3></div>
<div><h3> <?= 'Автор: ' . $article->author->first_name . ' '
                        . $article->author->last_name ; ?></h3></div>
     <article><?php echo $article->content;  ?></article>

</body>

</html>