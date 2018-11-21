<html>
<head>
    <title>Последние новости</title>
</head>
<body>

<div><h1>Последние новости</h1></div>
<ul>
    <?php foreach($data as  $row){ ?>
    <li><div><h3><a href="/App/article.php?id=<?= $row->id; ?>"><?php echo 'Новость №' . $row->id . ': ' . $row->title; ?></a></h3></div>
        <div><?= $row->content; ?></div>
        <?php } ?>
    </li>
</ul>

</body>

</html>