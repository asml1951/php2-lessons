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

    <form action="../admin/update_article.php">
        <div class="form-group">
            <label for="formGroupExampleInput">Заголовок новости</label>
            <input type="text" name="title" class="form-control" id="formGroupExampleInput" value="<?= $article->title ?>" >
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Содержание новости</label>
            <textarea name="content" type="text" rows="6" class="form-control" id="formGroupExampleInput2"  ><?= $article->content ?> </textarea>
            <button type="submit" class="btn btn-primary">Обновить</button>

        </div>
        <input type="hidden"  name="update" value="1">
        <input type="hidden"  name="id" value="<?= $article->id ?>">
    </form>



</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
