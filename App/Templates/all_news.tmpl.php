<?php
/** @var \App\View $this */
?>
<html>
<head>
<body>

<div><h1>Все новости</h1></div>
<div><h3>Всего новостей <?php echo count($this->articles) ;?></h3></div>
<ul>
    <?php  foreach($this->articles as $article){ ?>

    <li><div><h3><a href="/App/article.php?id=<?= $article->id; ?>"><?= 'Новость №' . $article->id  . ' ' . 'Автор: ' . $article->author->first_name . ' '
                    . $article->author->last_name ?></a></h3>
                   <h3> <?= 'Заголовок: ' . $article->title ; ?></h3>
        <div><?php echo $article->content; ?></div>
        <hr>
        <?php } ?>
    </li>
</ul>

</body>
</head>
</html>
