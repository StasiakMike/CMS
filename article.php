<?php
    include_once('includes/connection.php');
    include_once('includes/article.php');

    $article = new Article;

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $data = $article->fetch_data($id);
        
?>

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
        <a href="index.php" id="logo">CMS by Mike</a>

        <h4> <?php echo $data['article_title'];?> </h4>
        <small> posted <?php echo date('l jS', $data['article_timestamp']); ?> </small>
        <p> <?php echo $data['article_content']; ?> </p>
        <a href="index.php">&larr; BACK</a>
        

        
    </div>

    <div class="copyrights">
    <span>2019 &copy; Mike Stasiak & MvdB Software Solutions</span>
    </div>
</body>
</html>

<?php
    } else {
        header('Location: index.php');
        exit();
    }

?>