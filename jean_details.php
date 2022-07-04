<?php

session_start();
// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

include 'config/db_connect.php';

if (isset($_POST['btn-add-basket'])) {

    echo htmlspecialchars($_POST['price']);

    echo htmlspecialchars($_POST['name']);

    echo htmlspecialchars($_POST['img']);

    $price = mysqli_real_escape_string($connect, $_POST['item-price']);
    $name = mysqli_real_escape_string($connect, $_POST['item-name']);
    $img = mysqli_real_escape_string($connect, $_POST['item-img']);
    //create sql

    $sql = "INSERT INTO basket( price,name,img) VALUES('$price','$name','$img')";

    //save and check

    if (mysqli_query($connect, $sql)) {
        // 1
        header('Location: basket.php');
    } else {
        // 0
        echo 'error' . mysqli_error($conn);
    }
}

//  if(isset($_POST['delete'])){
//      $id_to_delete = mysqli_real_escape_string($connect,$_POST['id_to_delete']);
//      $sql = "DELETE FROM products WHERE id = $id_to_delete"
//         if(mysqli_query($connect,$sql)){
//          header('Location: index.php');
//      }{
//          echo 'query error:' . mysqli_error($connect);
//      }
//  }

if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($connect, $_GET['id']);
    $sql = "SELECT * FROM products WHERE id=$id";
    $result = mysqli_query($connect, $sql);
    $product = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    mysqli_close($connect);
}
$sql = 'SELECT id,description,title,name,img, price FROM products where title="jean"';
$result = mysqli_query($connect, $sql);
$datas = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_free_result($result);
//print_r($datas);
mysqli_close($connect)
?>

<!DOCTYPE html>
<html lang="en">

<?php include 'templates/header.php'; ?>

<div class="container">
    <div class="row z-depth-0">
        <?php foreach ($datas as $data) { ?>
            <div class="col s6 md3">
                <div class="card z-depth-3">
                    <form class="white" action="jean_details.php" method="POST">
                        <div class="card-content center">
                            <h6><?php echo htmlspecialchars($data['name']); ?></h6>
                            <input type="hidden" name="item-name" value="<?php echo htmlspecialchars($data['name']); ?>">
                            <div style="height: 50px;"><?php echo htmlspecialchars($data['description']); ?></div>
                            <div><?php echo htmlspecialchars($data['price']); ?>₺</div>
                            <input type="hidden" name="item-description" value="<?php echo htmlspecialchars($data['description']); ?>">
                            <input type="hidden" name="item-price" value="<?php echo htmlspecialchars($data['price']); ?>">
                            <input type="hidden" name="item-img" value="<?php echo htmlspecialchars($data['img']); ?>">
                            <div><img style="width: 250px;" height="300px" src="<?php echo htmlspecialchars($data['img']); ?>" alt=""></div>

                        </div>
                        <div class="card-action right-align">
                            <div class="center">
                                <input class="btn waves-effect waves-light" type="submit" value="Sepete ekle" name="btn-add-basket">
                            </div>
                    </form>
                </div>
            </div>
    </div>
<?php } ?>
</div>



<?php include 'templates/footer.php'; ?>

</html>