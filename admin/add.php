<?php 

session_start();

include_once('../includes/connection.php');

if(isset($_SESSION['logged_in'])) {
    if(isset($_POST['title'], $_POST['content'])) {
        $title = $_POST['title'];
        $content = nl2br($_POST['content']);

        if(empty($title) or empty($content)){
            $error = 'All fields are reqiured!';
        } else {
            $query = $pdo->prepare("INSERT INTO articles (article_title, article_content, article_timestamp) VALUES ( ?, ?, ? )");

            $query->bindValue(1, $title);
            $query->bindValue(2, $content);
            $query->bindValue(3, time());

            $query->execute();

            header('Location: index.php');
        }
    }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../assets/style.css">
    <title>Basic CMS by Mike</title>
</head>
<body>
    <div class="container">
        <a href="index.php" id="logo">CMS:</a>
        <br><br>
        <h4>Add article</h4>

        <?php if(isset($error)) { ?>

        <span style="color:red;"><b><?php echo $error; ?></b></span>
        <br><br>

        <?php } ?>

        <form action="add.php" method="post" autocomplete="off">
            <input type="text" name="title" placeholder="Title" ><br><br>
            <textarea name="content" placeholder="Content" id="" cols="50" rows="15"></textarea><br><br>
            <input type="submit" value="Add Article">

        </form>
        
    </div>

    <div class="copyrights">
    <span>2019 &copy; Mike Stasiak & MvdB Software Solutions</span>
    </div>
</body>
</html>
    <?php
} else {
    header('Location: index.php');
}


?>