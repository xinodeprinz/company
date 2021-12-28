<?php

    session_start();

    $feesType = $_SESSION['feesType'];

    $name = $_SESSION['name'];

    $dob = $_SESSION['dob'];

    require_once "functions.php"; 

    require_once "../needs/dbconnect.php";

    $date = dateTime();

    if($feesType === 'concourRegistration'){
    
        $statement = $pdo->prepare("INSERT INTO concour_register (Name, School, Date_of_Birth, Contact, Gender, Concour, Address, Registration_date)
        VALUES(:name, :school, :dob, :contact, :sex, :concour, :address, :date)");
        $statement->bindValue(':name', strtoupper($_SESSION['name']));
        $statement->bindValue(':school', $_SESSION['school']);
        $statement->bindValue(':dob', $_SESSION['dob']);
        $statement->bindValue(':contact', $_SESSION['contact']);
        $statement->bindValue(':sex', $_SESSION['sex']);
        $statement->bindValue(':concour', $_SESSION['concour']);
        $statement->bindValue(':address', $_SESSION['address']);
        $statement->bindValue(':date', $date);
        $statement->execute();

        $_SESSION['name'] = '';
        $_SESSION['school'] = '';
        $_SESSION['dob'] = '';
        $_SESSION['contact'] = '';
        $_SESSION['sex'] = '';
        $_SESSION['concour'] = '';
        $_SESSION['address'] = '';

        $_SESSION['name'] = $name;

        $_SESSION['dob'] = $dob;

        header('Location: dashboard/home.php');

    } else if($feesType === 'webRegistration'){

        $statement = $pdo->prepare("INSERT INTO web_register (Name, Date_of_Birth, Phone, Gender, Address, Registration_date)
        VALUES(:name, :dob, :contact, :sex, :address, :date)");
        $statement->bindValue(':name', strtoupper($_SESSION['name']));
        $statement->bindValue(':dob', $_SESSION['dob']);
        $statement->bindValue(':contact', $_SESSION['contact']);
        $statement->bindValue(':sex', $_SESSION['sex']);
        $statement->bindValue(':address', $_SESSION['address']);
        $statement->bindValue(':date', $date);
        $statement->execute();

        $_SESSION['name'] = '';
        $_SESSION['dob'] = '';
        $_SESSION['contact'] = '';
        $_SESSION['sex'] = '';
        $_SESSION['address'] = '';

        $_SESSION['name'] = $name;

        $_SESSION['dob'] = $dob;

        header('Location: dashboard/web_home.php');

    }

    

?>