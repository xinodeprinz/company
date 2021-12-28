<?php

session_start();

require_once "../functions.php";

require_once "../../needs/dbconnect.php";

$students = SelectMultipleRecords('concour_register', $pdo);

// echo '<pre>';
//    var_dump($products);
// echo '</pre>'; exit;



$date = dateTime();

$_SESSION['error'] = '';

$_SESSION['feesType'] = '';

$name = '';
$school = '';
$dob = '';
$contact = '';
$sex = '';
$concour = '';
$address = '';
$payment = '';
$feesType = '';
$_SESSION['hasRegistered'] = '';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_SESSION['name'] = $_POST['name'];
    $school = $_SESSION['school'] = $_POST['school'];
    $dob = $_SESSION['dob'] = DateOfBirth($_POST['dob']);
    $contact = $_SESSION['contact'] = $_POST['contact'];
    $sex = $_SESSION['sex'] = $_POST['sex'];
    $concour = $_SESSION['concour'] = $_POST['concour'];
    $address = $_SESSION['address'] = $_POST['address'];
    $feesType = $_SESSION['feesType'] = $_POST['feesType'];


    if (!$name || !$school || !$dob || !$contact || !$sex || !$concour || !$address) {
        $_SESSION['error'] = '<strong>Error!</strong> Fill in all the fields below';
    }

    foreach ($students as $student) {
        if (strtolower($student['Name']) === strtolower($name) && $student['Date_of_Birth'] === $dob) {
            $_SESSION['hasRegistered'] = 'True';
            $_SESSION['error'] = '';
            break;
        }
    }

    if (!$_SESSION['error'] && !$_SESSION['hasRegistered']) {

        header('location: ../payFees.php');

    }
    else {
        header('location: ../registration.php');
    }



}

?>