<?php require('header.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
$sql = "DELETE FROM `blog` WHERE blogID = ".$id;
$query = mysqli_query($conn,$sql);
header('Location: ./user.php');
?>

