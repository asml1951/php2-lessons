<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DB Error</title>
</head>
<body>
<h1> <?=  'Ошибка при выполнении запроса "' . $this->error->getQuery() .
    '" '. '<br>' . $this->error->getMessage() .
    '<br>' . ' Файл: ' . $this->error->getFile()  .
    '<br>' . ' Cтрока: '. $this->error->getLine() ; ?>
</h1>
</body>
</html>
