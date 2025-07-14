<?php
session_start();
header("Cache-Control: no-cache");

if (!empty($_POST['name'])) {
    $_SESSION['name'] = $_POST['name'];
}
if (!empty($_POST['phone'])) {
    $_SESSION['phone'] = $_POST['phone'];
}
if (!empty($_POST['email'])) {
    $_SESSION['email'] = $_POST['email'];
}
if (!empty($_POST['address'])) {
    $_SESSION['address'] = $_POST['address'];
}
if (!empty($_POST['pet_name'])) {
    $_SESSION['pet_name'] = $_POST['pet_name'];
}
if (!empty($_POST['species'])) {
    $_SESSION['species'] = $_POST['species'];
}
if (!empty($_POST['breed'])) {
    $_SESSION['breed'] = $_POST['breed'];
}
if (!empty($_POST['gender'])) {
    $_SESSION['gender'] = $_POST['gender'];
}
if (!empty($_POST['age'])) {
    $_SESSION['age'] = $_POST['age'];
}
if (!empty($_POST['weight'])) {
    $_SESSION['weight'] = $_POST['weight'];
}
if (!empty($_POST['vaccine'])) {
    $_SESSION['vaccine'] = $_POST['vaccine'];
}
if (!empty($_POST['neutered'])) {
    $_SESSION['neutered'] = $_POST['neutered'];
}
if (!empty($_POST['comments'])) {
    $_SESSION['comments'] = $_POST['comments'];
}

if ((empty($_POST['name']))      || (empty($_POST['phone']))    || 
    (empty($_POST['email']))     || (empty($_POST['address']))  ||
    (empty($_POST['pet_name']))  || (empty($_POST['species']))  || 
    (empty($_POST['breed']))     || (empty($_POST['gender']))   ||
    (empty($_POST['age']))       || (empty($_POST['weight']))   ||
    (empty($_POST['vaccine']))   || (empty($_POST['neutered'])) ||
    (empty($_POST['comments']))
) {
    $_SESSION['errorMessage'] = "* Please fill out all required fields.";
    header("Location: index2.php");
    exit;
}

if (empty($_POST['Oname'])) {
    $_SESSION['Oname'] = $_SESSION['name'];
    $_SESSION['Ophone'] = $_SESSION['phone'];
    $_SESSION['Oemail'] = $_SESSION['email'];
    $_SESSION['Oaddress'] = $_SESSION['address'];
} else {
    $_SESSION['Oname'] = $_POST['Oname'];
    $_SESSION['Ophone'] = $_POST['Ophone'];
    $_SESSION['Oemail'] = $_POST['Oemail'];
    $_SESSION['Oaddress'] = $_POST['Oaddress'];
}

header("Location: displayInfo2.php");

?>