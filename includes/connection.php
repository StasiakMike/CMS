<?php 
// localhost
try {
$pdo = new PDO('mysql:host=localhost;dbname=cms', 'root', '');
} catch (PDOException $e) {
    exit('Oops! Database connection error!');
}

//production
/*
try {
    $pdo = new PDO('mysql:host=localhost;dbname=cms', 'root', '');
    } catch (PDOException $e) {
        exit('Oops! Database connection error!');
    }

*/
?>

