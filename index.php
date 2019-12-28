<?php
    include_once('includes/connection.php');
    include_once('includes/article.php');

    $article = new Article;
    $articles = $article->fetch_all();

    //print_r($articles);
  
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/style.css">
    <title>Basic CMS by Mike</title>
</head>
<body>
    <div class="container">
        <a href="index.php" id="logo">CMS:</a>

        <ol>
            <?php foreach ($articles as $article) { ?>
            <li>
                <a href="article.php?id=<?php echo $article['article_id'];?>">
                <?php echo $article['article_title'];?></a> 
                - <small id="small">posted <?php echo date('l jS', $article['article_timestamp']);?></small>
            </li>
            <?php } ?>
        </ol>

        <div class="about">
            <h3>About the project:</h3>
            <ul>
                <li>Project was created for learning purpose.</li>
                <li>This is a CMS for blog app</li>
                <li>Pure PHP and PDO lib used.</li>
                <li>Allows create,read and delete articles for the blog</li>
                <li>To check all funcions login to admin panel using ADMIN and PASS</li>
            </ul>
            <br>
            <small><a href="admin">Admin panel</a></small>
        </div>
    </div>

    <div class="copyrights">
    <span>2019 &copy; Mike Stasiak & MvdB Software Solutions</span>
    </div>
</body>
</html>

