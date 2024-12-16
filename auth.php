<?php
$dsn = 'mysql:host=localhost;dbname=ACT;charset=utf8';
$username = 'root';
$password = 'root';

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $login = 'admin';
    $stmt = $pdo->prepare('SELECT * FROM utilisateurs WHERE login = :login');
    $stmt->bindParam(':login', $login);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    print_r($user);
} catch (PDOException $e) {
    echo 'Erreur : ' . $e->getMessage();
}
