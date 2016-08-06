<?php require_once('../includes/database.php');
session_start();

$connection = new Database();

if (!empty($_POST['username']) && !empty($_POST['password'])) {
    try{
        $statement = $connection->pdo->prepare('SELECT * FROM users WHERE username = :username and password = :password');
        $statement->bindValue(':username', $_POST['username']);
        $statement->bindValue(':password', $_POST['password']);
        $statement->execute();
        $user = $statement->fetch(PDO::FETCH_ASSOC);
        if($user != null){
            $_SESSION['user'] = $user;
            header('Location: ..');
            exit();
        }else {
            header('Location: /index.php');
            exit();
        }
    }catch (PDOException $e) {
        echo $e->getMessage();
    }
}
