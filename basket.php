<?php
session_start();
// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

include 'config/db_connect.php';

if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($connect, $_GET['id']);
    $sql = "SELECT * FROM basket WHERE id=$id";
    $result = mysqli_query($connect, $sql);
    $product = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    mysqli_close($connect);

}

$sql = 'SELECT name,img, price FROM basket';
$result = mysqli_query($connect, $sql);
$datas = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_free_result($result);
//print_r($datas);


$sql2 = 'SELECT sum(price) as total_price FROM basket';
$result2 = mysqli_query($connect, $sql2);
$datas2 = mysqli_fetch_all($result2, MYSQLI_ASSOC);
mysqli_free_result($result2);
//print_r($datas);
mysqli_close($connect)





?>



<!DOCTYPE html>
<html lang="en">
<?php include 'templates/header.php'; ?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
.total-div{
    text-align: right;
    display: flex;
    
}
.total-value{
    margin-left: 250px;
}
.btn-basket{
    background-color: green;
    font-size: 16px;
}


</style>

<body>
    <div class="container">
        <div class="row z-depth-0">
            <?php foreach ($datas as $data) { ?>
                <div class="col s6 md3">
                    <div class="card z-depth-3">
                        <div class="card-content center">
                            <h6><?php echo htmlspecialchars($data['name']); ?></h6>
                            <div><?php echo htmlspecialchars($data['price']); ?>₺</div>
                            <div><img style="width: 250px;" height="300px" src="<?php echo htmlspecialchars($data['img']); ?>" alt=""></div>
                        </div>

                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <div class="total-div"> 
                <h3 class="total-value">Total :<?php echo htmlspecialchars($datas2[0]['total_price']); ?>₺ </h3>
                <a class="btn btn-basket" href="address.php" >Satın al</a>
    </div>
</body>

</html>