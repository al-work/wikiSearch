<?php
include ('Search.php');

if (isset($_POST['text'])){
    $text = $_POST['text'];
    $wikiSearch = new Search;
    $wikiSearch->getSearchResult($text);
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<!--    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <a class="white-text" href="https://en.wikipedia.org/wiki/Special:Random" target="_blank">Click here for a random article</a>
        </div>
        <div class="row">
        <form method="post" id="serchForm">
            <div class="form-group">
                <label for="exampleInputEmail1">Enter text</label>
                <input type="text" class="form-control" id="exampleInput" name="text" placeholder="">
            </div>
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
        </div>
        <div class="row">
            <p class="white-text" id="help">Click icon to search</p>
        </div>
        <div class="row" id="searchResult">
        </div>
    </div>
    <script>
        $('#serchForm').submit(function (e) {
            e.preventDefault();
            var data = $(this).serialize();
            $.ajax({
                type: 'post',
                data: data,
                success: function (data) {
                    $('#searchResult').html(data)
                    console.log(data);
                }
            });
        });
    </script>
</body>
</html>