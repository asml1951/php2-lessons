<?php
use App\Db;
use App\Models\Author;
use App\View;

require __DIR__ . '/../../autoload.php';

if(!empty($_REQUEST)) {

    $author = new Author();

    $author->first_name = $_GET['first_name'];
    $author->last_name = $_GET['last_name'];
    $author->id = $_GET['author_id'];
    $author->save();

    var_dump($author);
    $view = new View();
    $view->author = $author;

    $view->display(__DIR__ . '/../Templates/new_author_created.tmpl.php');

} else {

    $view = new \App\View();
    $view->display(__DIR__ . '/../Templates/add_new_author.tmpl.php');

}
