<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="../App/fonts/open-iconic/font/css/open-iconic-bootstrap.css" rel="stylesheet">
    <title>Админ панель</title>
</head>
<body>
<div class="container">
    <div style="margin:30px;">
        <h3>Административная панель</h3>
    </div>
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Новости</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" id="author-tab" data-toggle="tab" href="#author" role="tab" aria-controls="author" aria-selected="false">Авторы</a>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

            <div  style="width: 18rem; margin-top:5rem; margin-bottom:5rem;">
		    <a href="./add_new_article.php" ><button type="button" class="btn btn-primary">Добавить свежую новость</button>
            </a>
        </div>

            <table class="table table-bordered">
                <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Заголовок</th>
                    <th scope="col">Содержание</th>
                    <th scope="col">Автор</th>
                    <th scope="col">Редактировать</th>
                    <th scope="col">Удалить</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($this->articles as $article)
		  { ?>
                <tr>
                    <th scope="row"> <?php echo $article->id; ?></th>
                    <td><?= $article->title; ?></td>
                    <td><?= $article->content; ?></td>
                    <td><?= $article->author->first_name . ' '
                            . $article->author->last_name; ?></td>
                    <?php $href_update = '"' . 'update_article.php?id=' . $article->id . '"' ?>
                    <?php $href_delete = '"' . 'delete_article.php?id=' . $article->id . '"' ?>
                    <td><a href = <?= $href_update ?><span class="oi oi-pencil"></span></a></td>
                    <td><a href = <?= $href_delete ?><span class="oi oi-trash" title="icon trash" aria-hidden="true"></a></td>
                </tr>
                <?php } ?>

                </tbody>
            </table>

        </div>





        <div class="tab-pane fade" id="author" role="tabpanel" aria-labelledby="author-tab">
            <div  style="width: 18rem; margin-top:5rem; margin-bottom:5rem;">
		    <a href = "add_new_author.php">
                 <button type="button" class="btn btn-primary">
                     Добавить нового автора</button>
            </a>
        </div>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Имя</th>
                    <th scope="col">Фамилия</th>

                </tr>
                </thead>
                <tbody>
                <?php foreach ($this->authors as $author)
                { ?>
                    <tr>
                        <th scope="row"> <?php echo $author->id; ?></th>
                        <td><?= $author->first_name; ?></td>
                        <td><?= $author->last_name; ?></td>

                        <?php $href_update = '"' . 'update_author.php?id=' . $author->id . '"' ?>
                        <?php $href_delete = '"' . 'delete_author.php?id=' . $author->id . '"' ?>
                        <td><a href = <?= $href_update ?><span class="oi oi-pencil"></span></a></td>
                        <td><a href = <?= $href_delete ?><span class="oi oi-trash" title="icon trash" aria-hidden="true"></a></td>
                    </tr>
                <?php } ?>

                </tbody>
            </table>
        </div>
    </div>




</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>




