<?php

include __DIR__ . '/../App/autoload.php';


$uri = $_SERVER['REQUEST_URI'];
$parts = explode('/',$uri);

$ctrl = $parts[1] ? ucfirst($parts[1]) : 'Index';

try {
    $class = '\App\Controllers\\' . $ctrl;
    $ctrl = new $class();
    $ctrl();


} catch (\App\DbException  $error) {
    echo '<h3>Проблема с подключением к базе данных : ' .$error->getMessage() . '</h3>';
    \App\Logger::getInstance()->addMessage($error->getMessage(),$error->getFile(), $error->getLine());
}  catch (\PDOException $error) {
    echo 'Ошибка выполнения запроса : ' . $error->getMessage();
    \App\Logger::getInstance()->addMessage($error->getMessage(),$error->getFile(), $error->getLine());

}  catch(\App\NotFoundException $error) {
    echo 'Попытка найти несуществующий объект. ' . $error->getMessage();
    \App\Logger::getInstance()->addMessage($error->getMessage(),$error->getFile(), $error->getLine());
}

/*
try {
$article = new \App\Models\Article();
$data = ['','2','фы'];

$article->fill($data);

} catch (\App\Errors $errors){

    foreach($errors->all() as $error ) {
        echo '<h1>' . $error->getMessage() . '</h1>' . '<br>' ;
    }

}  */






