<?php
  
    session_start();
    
    require_once "../functions.php"; 

    require_once "../../needs/dbconnect.php";
    
    
    $members = SelectMultipleRecords('members', $pdo);

    // echo '<pre>';
    //    var_dump($products);
    // echo '</pre>'; exit;

     

    $date = dateTime();

    $_SESSION['error'] = '';

    $name = '';
    $dob =    '';
    $contact =''; 
    $sex =    '';
    $address =''; 
    $email = '';

    $_SESSION['success'] = '';

    $_SESSION['has_joined_us'] = false;
   
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $name = $_SESSION['name'] = $_POST['name'];
        $dob = $_SESSION['dob'] = DateOfBirth($_POST['dob']);
        $email = $_SESSION['email'] = $_POST['email'];
        $contact = $_SESSION['contact'] = $_POST['contact'];
        $sex = $_SESSION['sex'] = $_POST['sex'];
        $address = $_SESSION['address'] = $_POST['address'];


        if(!$name || !$dob || !$contact || !$sex || !$address){
            $_SESSION['error'] = '<strong>Error!</strong> Fill in all the fields below. Email is optional.';
        }

        foreach($members as $member){
            if(strtolower($member['Name']) === strtolower($name) && $member['Date_of_Birth'] === $dob){
                $_SESSION['has_joined_us'] = true;
                $_SESSION['error'] = '';
                break;
            }
        }

        if(!$email){
            $email = null;
        }

        if(!$_SESSION['error'] && !$_SESSION['has_joined_us']){

            $statement = $pdo->prepare("INSERT INTO members (Name, Email, Date_of_Birth, Contact, Gender, Address, Membership_date)
            VALUES(:name, :email, :dob, :contact, :sex, :address, :date)");
            $statement->bindValue(':name', strtoupper($_SESSION['name']));
            $statement->bindValue(':email', $_SESSION['email']);
            $statement->bindValue(':dob', $_SESSION['dob']);
            $statement->bindValue(':contact', $_SESSION['contact']);
            $statement->bindValue(':sex', $_SESSION['sex']);
            $statement->bindValue(':address', $_SESSION['address']);
            $statement->bindValue(':date', $date);
            $statement->execute();
    
            $_SESSION['name'] = '';
            $_SESSION['email'] = '';
            $_SESSION['dob'] = '';
            $_SESSION['contact'] = '';
            $_SESSION['sex'] = '';
            $_SESSION['address'] = '';  
            
            if($email){
    
                $_SESSION['success'] = 'Thank you for joining us! We have sent you an email.';

                //Sending an email to the user
                $subject = "NdeTek";
                $body = "Hi " . $name . "!" . "
                         Thank you for joining the NdeTek community.
                         You are highly welcome as one of our new members.
                         Thanks!
                ";
                $headers = "From: NdeTek";

                mail($email, $subject, $body, $headers);

            } else {
                $_SESSION['success'] = 'Thank you for joining us!';
            }
        } 

        header('location: ../contact.php');


    }

?>