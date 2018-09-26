<html>
<head>
    <title> Новость № <?php echo $this->article->id; ?></title>
</head>
<body>

<div><h1>Новость № <?php echo $this->article->id; ?></h1></div>
<div><h3> <?= $this->article->title; ?></h3></div>
<div><h3> <?= 'Автор: ' . $this->article->author->first_name . ' '
                        . $this->article->author->last_name ; ?></h3></div>
     <article><?php echo $this->article->content;  ?></article>

</body>

</html>