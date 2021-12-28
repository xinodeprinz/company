<?php

    session_start();

    if(!$_SESSION['name']){
        header('../../index.php');
    }

    require_once '../functions.php';

    $date = dateTime();

    require_once "../../needs/dbconnect.php";

    $name = $_SESSION['name'];
    $dob = $_SESSION['dob'];

    $statement = $pdo->prepare('INSERT INTO web_second_installment (Name, Date_of_Birth, Payment_date)
                VALUES(:name, :dob, :date)');
    $statement->bindValue(':name', strtoupper($name));
    $statement->bindValue(':dob', $dob);
    $statement->bindValue(':date', $date);
    $statement->execute();

    header('Location: ../dashboard/web_home.php');



?>