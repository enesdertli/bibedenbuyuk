<?php

session_start();
// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

include 'config/db_connect.php';

if (isset($_POST["btn-submit"])) {
    $delete = "DELETE FROM basket";
    $result = mysqli_query($connect, $delete);

    mysqli_close($connect);

    header("location: index.php");
}



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    .address-div1 {
        text-align: center;
    }

    .address-div2 {
        width: 400px;
        margin-left: auto;
        margin-right: auto;
    }

    .btn-address {
        height: 40px;
        font-size: 16px;
        font-weight: bold;
        color: #fff;
        resize: none;
        background-color: green;
        cursor: pointer;
    }

    .btn-address:hover {
        background: #99e2b4;
        color: #036666;
        transform: scale(1.04);
        transition: 0.04s ease-in all;
    }
</style>

<body>
    <div class="address-div1">
        <div class="address-div2">
            <form action="" method="POST">
                <h2>Adres ve ödeme şekli</h2>
                <textarea placeholder="Lütfen adresinizi giriniz" name="Address" id="" cols="30" rows="10" required></textarea>
                <br>
                <div>
                    <div>
                        <input type="radio" name="transaction-type" value="Kredi kartı" required>
                        <label for="Kredi kartı">Kredi kartı</label>
                    </div>
                    <div>
                        <input type="radio" name="transaction-type" value="Nakit" required>
                        <label for="Nakit">Nakit</label>
                    </div>
                </div>
                <input class="btn-address" type="submit" value="Sepeti onayla" name="btn-submit">
            </form>
        </div>
    </div>
</body>

</html>