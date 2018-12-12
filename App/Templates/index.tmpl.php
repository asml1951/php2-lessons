<?php

/** @var \App\View $this */


?>
<html>
<head>
    <body>

     <div><h1>Последние новости</h1></div>
     <div><h3>Всего последних новостей <?php echo count($this) ;?></h3></div>
      <ul>
          <?php  foreach($this->articles as  $article){ ?>
          <li><div><h3><a href="/App/article.php?id=<?php echo $article->id; ?>"><?php echo 'Новость №' . $article->id
              . ' ' . 'Автор: ' . $article->author->first_name . ' '
                                . $article->author->last_name . '<br>'
              . 'Заголовок: ' . $article->title; ?></a></h3></div>
              <div><?php echo $article->content; ?></div>
              <hr>
              <?php } ?>
          </li>
      </ul>

    </body>
</head>
</html>