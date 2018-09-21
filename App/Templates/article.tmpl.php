<html>
<head>
  <title>
      Новость № <?= $article->id; ?>
  </title>
</head>
<body>

<div><h1>Новость № <?php echo $article->id; ?></h1></div>
<div><h3> <?= $article->title; ?></h3></div>
<ul>

    <li><div><?= $article->content;  ?></div>
        <div></div>

    </li>
</ul>

</body>

</html>