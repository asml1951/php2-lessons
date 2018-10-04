<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="/App/fonts/open-iconic/font/css/open-iconic-bootstrap.css" rel="stylesheet">
    <title>Добавить новость</title>
</head>
<body>
<div class="container">
    <h2>Добавьте свежую новость</h2>

    <form action="/add_new_article/" >

        <div class="form-group">
            <label for="exampleFormControlInput1">Заголовок новости</label>
            <input type="text" name="title" class="form-control" id="exampleFormControlInput1" placeholder="Введите заголовок новости" value=" <?= $_GET['title'] ?>"></input>
            <?php
            if(!is_null($this->errors['title'])){
            echo $this->errors['title']->getMessage();}
            ?>
        </div>


        <div class="form-group">
            <label for="exampleFormControlTextarea1">Содержание новости</label>
            <textarea class="form-control" name="content" id="exampleFormControlTextarea1" rows="5" placeholder="Введите текст новости" ><?= $_GET['content'] ?></textarea>
            <?php
            if(!is_null($this->errors['content'])){
            echo $this->errors['content']->getMessage();}?>
        </div>

        <div class="form-group">
            <label for="exampleFormControlTextarea1">ID автора</label>
            <input type="text" class="form-control" name="author_id" id="exampleFormControlTextarea1"  placeholder="Введите ID автора"
             value="<?= $_GET['author_id'] ?>"></input>
        </div>
        <div><?php
            if(!is_null($this->errors['author_id'])){
            echo $this->errors['author_id']->getMessage();}?></div>

        <button type="submit" class="btn btn-primary mb-2">Добавить новость</button>

    </form>

    <div  style="width: 18rem; margin-top:5rem; margin-bottom:5rem;">
		    <a href="/admin" ><button type="button" class="btn btn-primary">Вернуться на админ панель</button></a>
    </div>
</div>




<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>