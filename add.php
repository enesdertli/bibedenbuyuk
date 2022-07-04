
<?php
session_start();
// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

include 'config/db_connect.php';

if (isset($_POST['submit'])) {

    if (empty($_POST['title'])) {
        echo 'title is required <br />';
    } else {
        echo htmlspecialchars($_POST['title']);
    }
    if (empty($_POST['description'])) {
        echo 'description is required <br />';
    } else {
        echo htmlspecialchars($_POST['description']);
    }
    if (empty($_POST['price'])) {
        echo 'price is required <br />';
    } else {
        echo htmlspecialchars($_POST['price']);
    }
    if (empty($_POST['name'])) {
        echo 'name is required <br />';
    } else {
        echo htmlspecialchars($_POST['name']);
    }
    if (empty($_POST['img'])) {
        echo 'img is required <br />';
    } else {
        echo htmlspecialchars($_POST['img']);
    }

    $do = 1;
    if ($do == 1) {

        $title = mysqli_real_escape_string($connect, $_POST['title']);
        $description = mysqli_real_escape_string($connect, $_POST['description']);
        $price = mysqli_real_escape_string($connect, $_POST['price']);
        $name = mysqli_real_escape_string($connect, $_POST['name']);
        $img = mysqli_real_escape_string($connect, $_POST['img']);
        //create sql

        $sql = "INSERT INTO products( title, description,price,name,img) VALUES('$title','$description','$price','$name','$img')";

        //save and check

        if (mysqli_query($connect, $sql)) {
            // 1
            header('Location: index.php');
        } else {
            // 0
            echo 'error' . mysqli_error($conn);
        }

    }
}

?>

<!DOCTYPE html>
<html lang="en">

    <?php include 'templates/header.php';?>
    <div class="space"></div>
    <section class="container grey-text">
        <h4 class= "center">Add a new product</h4>
        <form class="white" action="add.php" method="POST">
            <label>Title : </label>
            <input type="text"  name="title">
            <label>Description : </label>
            <input type="text"  name="description">
            <label>Name : </label>
            <input type="text"  name="name">
            <label>Price : </label>
            <input type="text"  name="price">
            <label>img : </label>
            <input type="text"  name="img">
            <div class="center">
                <button class="btn waves-effect waves-light" type="submit" value="submit" name="submit">Ekle
                </button>
            </div>
        </form>

    </section>




    <?php include 'templates/footer.php';?>

</html>