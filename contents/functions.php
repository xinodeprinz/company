<?php
#PHP function to check for the existence of a table in a database

function tableExist($dbconnection, $tableName)
{
  $data = $dbconnection->query('show tables')->fetchAll();
  $i = 0;
  $n;
  $dbname = [];
  $existence = '';
  for ($n = 0; $n < count($data); $n++) {
    $dbname[$n] = $data[$n][0];
  }
  foreach ($dbname as $val) {
    if ($val === $tableName) {
      $existence = 'exist';
      break;
    }
    else {
      $existence = 'not exist';
    }
  }
  return $existence;
}

#end of function 


#date and time functions

function dateTime()
{
  return date('jS \ F Y, h:i:s A', time() - 3600);
}

function DateOfBirth($dob)
{
  return date('jS \ F Y', strtotime($dob));
}

function toDOB($dob)
{
  return date('Y-m-d', strtotime($dob));
}

#end of function


#function to select a record from any database table
function SelectSingleRecord($tableName, $username, $dbconnect)
{
  $statement = $dbconnect->prepare("SELECT * FROM `$tableName` WHERE Name = :name");
  $statement->bindValue(':name', $username);
  $statement->execute();
  return $statement->fetch(PDO::FETCH_ASSOC);
}

#function to select a record from any database table
function SelectSingleRecord2($tableName, $username, $dbconnect, $dob)
{
  $statement = $dbconnect->prepare("SELECT * FROM `$tableName` WHERE Name = :name AND Date_of_Birth = :dob");
  $statement->bindValue(':name', $username);
  $statement->bindValue(':dob', $dob);
  $statement->execute();
  return $statement->fetch(PDO::FETCH_ASSOC);
}

#function to select a record from any login table
function SelectFromLogin($tableName, $matricule, $dbconnect)
{
  $statement = $dbconnect->prepare("SELECT * FROM `$tableName` WHERE `Matricule` = :matricule");
  $statement->bindValue(':matricule', $matricule);
  $statement->execute();
  return $statement->fetch(PDO::FETCH_ASSOC);
}

#search

function searchItems($tableName, $dbconnect, $name)
{
  $statement = $dbconnect->prepare("SELECT * FROM `$tableName` WHERE `Name` LIKE :name");
  $statement->bindValue(':name', "%$name%");
  $statement->execute();
  return $statement->fetchAll(PDO::FETCH_ASSOC);
}

#end search



#Function to select multiple records from a table
function SelectMultipleRecords($tableName, $dbconnect)
{
  $statement = $dbconnect->prepare("SELECT * FROM `$tableName` ORDER BY id ASC");
  $statement->execute();
  return $statement->fetchAll(PDO::FETCH_ASSOC);
} #End of function

#Function to select multiple records from a table
function SelectMultipleRecordsForPagination($tableName, $dbconnect)
{
  $statement = $dbconnect->prepare("SELECT * FROM `$tableName` LIMIT 0, 8");
  $statement->execute();
  return $statement->fetchAll(PDO::FETCH_ASSOC);
} #End of functio



#Function to store data into database table which is not a CA nor Exam table
function InsertIntoNormalTables($product, $tableName, $dbconnect)
{
  foreach ($product as $prod) {

    $statement = $dbconnect->prepare("INSERT IGNORE INTO `$tableName`(`id`, `Course Code`, `Course Title`, `Credit Value`, `Course Master`)
                                    VALUES(:id, :code, :title, :value, :master)");

    $statement->bindvalue(':id', $prod['id']);
    $statement->bindvalue(':code', $prod['Course Code']);
    $statement->bindvalue(':title', $prod['Course Title']);
    $statement->bindvalue(':value', $prod['Credit Value']);
    $statement->bindvalue(':master', $prod['Course Master']);

    $statement->execute();

  }
}


#Function to store data into cart table
function InsertIntoCart($prod, $tableName, $dbconnect)
{
  $statement = $dbconnect->prepare("INSERT IGNORE INTO `$tableName`(`id`, `Name`, `url`)
                                  VALUES(:id, :name, :url)");

  $statement->bindvalue(':id', $prod['id']);
  $statement->bindvalue(':name', $prod['Name']);
  $statement->bindvalue(':url', $prod['url']);

  $statement->execute();

}




#Function to create table which is not CA nor Exam
function CreateNormalTable($tableName, $dbconnect)
{
  $statement = $dbconnect->prepare("CREATE TABLE `$tableName`(
    `id` int(10) PRIMARY KEY, `Course Code` varchar(50), `Course Title` varchar(512),
    `Credit Value` int(10), `Course Master` varchar(512)
  ) ");

  $statement->execute();
}


#function to delete from a database table based on id
function DeleteFromTable($tableName, $dbconnect, $id)
{
  $statement = $dbconnect->prepare("DELETE FROM `$tableName` WHERE id = :id");
  $statement->bindvalue(':id', $id);
  $statement->execute();
}


#function to insert into CA table
function InsertINtoCA($product, $tableName, $dbconnect)
{
  foreach ($product as $prod) {

    $statement = $dbconnect->prepare("INSERT IGNORE INTO `$tableName`(`id`, `Course Code`, `Course Title`, `Credit Value`, `CA Mark/30`)
    VALUES(:id, :code, :title, :value, :ca)");

    $statement->bindvalue(':id', $prod['id']);
    $statement->bindvalue(':code', $prod['Course Code']);
    $statement->bindvalue(':title', $prod['Course Title']); #IGNORE helps to avoid duplicate records in the database table
    $statement->bindvalue(':value', $prod['Credit Value']);
    $statement->bindvalue(':ca', null);

    $statement->execute();
  }
}



#creating students database table for CA
function CreateCA($tableName, $dbconnect)
{
  $statement = $dbconnect->prepare("CREATE TABLE `$tableName`(
      `id` int(10) PRIMARY KEY, `Course Code` varchar(50), `Course Title` varchar(512),
      `Credit Value` int(10), `CA Mark/30` int(10)
    ) ");

  $statement->execute();

}


#function used to check for the availability of non null values in CA database.
function GetNotNullValues($product)
{
  $p = [];
  foreach ($product as $prod) {
    if ($prod['CA Mark/30'] !== null) { #$product is an array
      $p[] = $prod['CA Mark/30'];
    }
  }
  return $p;
}


#creating students database table for final results
function CreateResult($tableName, $dbconnect)
{
  $statement = $dbconnect->prepare("CREATE TABLE `$tableName`(
    `id` int(10) PRIMARY KEY, `Course Code` varchar(50), `Course Title` varchar(512),
    `Credit Value` int(10), `CA Mark/30` int(10), `Exam Mark/70` int(10), `Total Mark/100` int(10), `GP/4` float(10, 1), `Grade` text(5)
  ) ");

  $statement->execute();

}

#creating table to store papers bought by a particular student
function CreatePaperTable($tableName, $dbconnect)
{
  $statement = $dbconnect->prepare("CREATE TABLE `$tableName`(
    `id` int(10) PRIMARY KEY, `Paper Name` varchar(50), `url` varchar(512),
    `Price (FCFA)` int(10)
    ) ");

  $statement->execute();

}

#function to insert created papers table
function InsertIntoPapersTable($product, $tableName, $dbconnect)
{
  foreach ($product as $prod) {

    $statement = $dbconnect->prepare("INSERT IGNORE INTO `$tableName`(`id`, `Paper Name`, `url`, `Price (FCFA)`)
    VALUES(:id, :paper_name, :url, :price)");

    $statement->bindvalue(':id', $prod['id']);
    $statement->bindvalue(':paper_name', $prod['Name']);
    $statement->bindvalue(':url', $prod['url']); #IGNORE helps to avoid duplicate records in the database table
    $statement->bindvalue(':price', $prod['Price (FCFA)']);

    $statement->execute();
  }
}



#function to insert into final results table
function InsertIntoResult($product, $tableName, $dbconnect)
{
  foreach ($product as $prod) {

    $statement = $dbconnect->prepare("INSERT IGNORE INTO `$tableName`(`id`, `Course Code`, `Course Title`, `Credit Value`, `CA Mark/30`, `Exam Mark/70`, `Total Mark/100`, `GP/4`, `Grade`)
    VALUES(:id, :code, :title, :value, :ca, :exam, :total, :gp, :grade)");

    $statement->bindvalue(':id', $prod['id']);
    $statement->bindvalue(':code', $prod['Course Code']);
    $statement->bindvalue(':title', $prod['Course Title']); #IGNORE helps to avoid duplicate records in the database table
    $statement->bindvalue(':value', $prod['Credit Value']);
    $statement->bindvalue(':ca', null);
    $statement->bindvalue(':exam', null);
    $statement->bindvalue(':total', null);
    $statement->bindvalue(':gp', null);
    $statement->bindvalue(':grade', '');

    $statement->execute();
  }
}



#function used in updating exam table
function UpdateResult($product, $tableName, $dbconnect)
{
  foreach ($product as $prod) {
    $statement = $dbconnect->prepare("UPDATE `$tableName` SET `CA Mark/30` = :ca WHERE `$tableName`.`id` = :id");
    $statement->bindValue(':id', $prod['id']);
    $statement->bindValue(':ca', $prod['CA Mark/30']);
    $statement->execute();
  }

}



#function to calculate GP
function GP($gp, $g, $tm)
{
  if ($tm < 40) {
    $gp = 0;
    $g = 'F';
  }
  else if ($tm < 45) {
    $gp = 1;
    $g = 'D';
  }
  else if ($tm < 50) {
    $gp = 1.5;
    $g = 'D+';
  }
  else if ($tm < 55) {
    $gp = 2;
    $g = 'C';
  }
  else if ($tm < 60) {
    $gp = 2.5;
    $g = 'C+';
  }
  else if ($tm < 70) {
    $gp = 3;
    $g = 'B';
  }
  else if ($tm < 80) {
    $gp = 3.5;
    $g = 'B+';
  }
  else if ($tm > 79) {
    $gp = 4;
    $g = 'A';
  }
  return $gp;
}


#function to calculate Grade
function Grade($gp, $g, $tm)
{
  if ($tm < 40) {
    $gp = 0;
    $g = 'F';
  }
  else if ($tm < 45) {
    $gp = 1;
    $g = 'D';
  }
  else if ($tm < 50) {
    $gp = 1.5;
    $g = 'D+';
  }
  else if ($tm < 55) {
    $gp = 2;
    $g = 'C';
  }
  else if ($tm < 60) {
    $gp = 2.5;
    $g = 'C+';
  }
  else if ($tm < 70) {
    $gp = 3;
    $g = 'B';
  }
  else if ($tm < 80) {
    $gp = 3.5;
    $g = 'B+';
  }
  else if ($tm > 79) {
    $gp = 4;
    $g = 'A';
  }
  return $g;
}


#function to calculate total credit value
function totalCredit($product, $credit_string)
{
  $totalCredit = 0;
  foreach ($product as $prod) {
    $totalCredit += $prod[$credit_string];
  }
  return $totalCredit;
}


#function to calculate total credit earned
function creditEarned($product, $credit_string, $gp)
{
  $creditEarned = 0;
  foreach ($product as $prod) {

    if ($gp > 1.5) { #This function should be called inside a loop
      $creditEarned += $prod[$credit_string];
    }
  }
  return $creditEarned;
}


#function to calculate the GPA
function GPA($product, $gp, $credit)
{
  $totalGP = 0;
  $gpa = 0;
  $total = 0;
  $totalCredit = 0;
  foreach ($product as $prod) {
    $totalCredit += $credit; #This function should be called inside a loop
    $total = $credit * $gp;
  }
  $gpa = number_format($total / $totalCredit, 2);
  return $gpa;
}


//For CA Calculations
function totalCA($product)
{
  $total = 0;
  foreach ($product as $prod) {
    $total += $prod['CA Mark/30'];
  }
  return $total;
}

//For CA calculations
function CAdenominator($product)
{
  $denominator = 0;
  foreach ($product as $prod) {
    $denominator += 30;
  }
  return $denominator;
}


//For Exam Calcutions
function totalExam($product)
{
  $total = 0;
  foreach ($product as $prod) {
    $total += $prod['Total Mark/100'];
  }
  return $total;
}

//For Exam Calcutions
function Examdenominator($product)
{
  $denominator = 0;
  foreach ($product as $prod) {
    $denominator += 100;
  }
  return $denominator;
}

//Sum all elements in an array
function SumArray($product)
{
  $sum = 0;
  foreach ($product as $prod) {
    $sum += $prod;
  }
  return $sum;
}


function download($file_name, $url)
{
  if ($file_name && file_exists($url)) {
    header("Cache-Control: public");
    header("Content-Description: File Transfer");
    header("Content-Disposition: attachment; filename=$file_name");
    header("Content-Type: application/zip");
    header("Content-Transfer-Encoding: binary");

    readfile($url);
  }
  else {
    echo "File doesn't exist";
  }
}


function deleteAllData($tableName, $dbconnect)
{
  $statement = $dbconnect->prepare("DELETE FROM `$tableName`");
  $statement->execute();
}

?>
  