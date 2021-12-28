<?php

session_start();

require_once "../functions.php";

require_once "../../needs/dbconnect.php";


$paper_name = $_POST['paper_name'];

$group = $_POST['group'];

$id = $_POST['paper_id'];

if ($group === 'gce_al') {
    $paper = SelectSingleRecord('gce_al', $paper_name, $pdo);
}
else if ($group === 'graphic') {
    $paper = SelectSingleRecord('graphic_design', $paper_name, $pdo);
}



if (!in_array($paper, $_SESSION['shopping_cart'])) {

    $_SESSION['shopping_cart'][] = $paper;

}
else {

    foreach ($_SESSION['shopping_cart'] as $item) {
        if ($item['id'] === $id) {
            $array_id = array_search($item, $_SESSION['shopping_cart']);
            unset($_SESSION['shopping_cart'][$array_id]);
            break;
        }
    }

}

if ($group === 'gce_al') {
    header('Location: ../past_papers.php?type=gce_al&page=1');
}
else if ($group === 'graphic') {
    header('Location: ../graphic_template.php?page=1');
}

//$_SESSION['shopping_cart'] = [];


// echo '<pre>';
// print_r($_SESSION['shopping_cart']);
// echo '</pre>';exit;





?>