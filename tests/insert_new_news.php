<?php
/**
 * Created by PhpStorm.
 * User: smolin
 * Date: 29.03.2018
 * Time: 11:03
 */


use App\Db;

require __DIR__ . '/../autoload.php';

//$sql ='INSERT INTO news ' .'(title,content)' . ' VALUES' . '(:title,:content)';
//$params = ['title' => 'Important Statement','content' => 'Carnival Cruise traveled to Virginia Tuesday to make a deal that a teenager could not refuse. '];
//echo $sql;
//$db = new Db();
//$res = $db->execute($sql,$params);
$article = new \App\Models\Article();
$article->title = 'Свежая новость';
$article->content = 'ММММММ ИИИИИИИ ттттттт ввввввввв';
$article->insert();
