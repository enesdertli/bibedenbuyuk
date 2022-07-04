<?php
session_start();
// Check if the user is logged in, if not then redirect him to login page
// if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
//     header("location: login.php");
//     exit;
// }

include 'config/db_connect.php';
include 'templates/header.php';
$sql = 'SELECT id,description,title,img FROM products';
$result = mysqli_query($connect, $sql);
$datas = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_free_result($result);
//print_r($datas);
mysqli_close($connect)

?>

<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- include burdaydı -->
    <section class="section-1">
      <div class="main-img">
        <img
          id="img-main"
          width="900px"
          height="600px"
          src="https://img.freepik.com/free-vector/banner-with-handrawn-elements-sale_125540-187.jpg?t=st=1651585547~exp=1651586147~hmac=d8669d876ef292e49dae2c60b2f5ea1dbb9851c1afaac527da307c1bd99a7373&w=1380"
          alt=""
        />
      </div>
      <h3>Kategoriler</h3>
    </section>
    <!-- <div class="container">
        <div class="row z-depth-0">
            <?php foreach ($datas as $data) {?>
                <div class="col s6 md3">
                    <div class="card z-depth-3">
                        <div class="card-content center">
                            <h6><?php echo htmlspecialchars($data['title']); ?></h6>
                            <div><?php echo htmlspecialchars($data['description']); ?></div>
                            <div><img style="width: 250px;" height="auto" src="<?php echo htmlspecialchars($data['img']); ?>" alt=""></div>

                        </div>
                        <div class="card-action right-align">
                            <a href="details.php?id=<?php echo $data['id'] ?>" class="brand-text">Göz at</a>
                        </div>
                    </div>
             </div>
    <?php }?>
        </div>
    </div> -->
    <section class="section-2">
        <!-- ! Sweat -->

        <div class="card" style="width: 18rem">
          <img
            src="https://img.freepik.com/free-psd/beautiful-woman-wearing-hoodie-mockup_23-2149302787.jpg?w=1380"
            class="card-img-top"
            alt="..."
          />
          <div class="card-body">
            <h5 class="card-title">Sweat</h5>
            <p class="card-text">
              Kapüşonlu ve sweatshirt seçkimizle günlük gardırobunuza biraz
              sıcaklık katın. Dilediğiniz kadar renk seçenekleriyle !
            </p>
            <a href="sweat_details.php" class="btn btn-primary">İncele</a>
          </div>
        </div>

        <!-- ! Jean -->

        <div class="card" style="width: 18rem">
          <img
            src="https://img.freepik.com/free-photo/jumping-young-woman-jeans-white-wall_231208-1440.jpg?w=1380&t=st=1651687450~exp=1651688050~hmac=bb63a4cff1e110d50b5593f470b0ad50998ca453fcb9a8d6fc47173d40419cc3"
            alt="..."
          />
          <div class="card-body">
            <h5 class="card-title">Jean</h5>
            <p class="card-text">
              Jean’ler her gardırobun en temel parçası. Jean koleksiyonumuzdan
              vücut tipiniz fark etmeksizin size en uygun kesimi ve stili bulun.
            </p>
            <a href="jean_details.php" class="btn btn-primary">İncele</a>
          </div>
        </div>

        <!-- ! Mont -->

        <div class="card" style="width: 18rem">
          <img
            src="images/mont.jpg"
            alt="..."
          />
          <div class="card-body">
            <h5 class="card-title">Mont</h5>
            <p class="card-text">
              Dış giyim ürünleri erkek ceket ve kabanlarımız sayesinde harika
              hissettiriyor. Serin günler için trend biker, bomber ve denim
              ceket seçkimize göz atın.
            </p>
            <a href="mont_details.php" class="btn btn-primary">İncele</a>
          </div>
        </div>
        <!-- ! T-Shirt -->

        <div class="card" style="width: 18rem">
          <img
            src="images/tshirt.jpg"
            alt="..."
          />
          <div class="card-body">
            <h5 class="card-title">T-shirt</h5>
            <p class="card-text">
              Baskılı tişörtlerle günlük gardırobunuzu yükseltin, kişiliğinizi
              yansıtmak için trend motifleri ve desenleri tercih edin. Ya da
              basic’lere yönelin.
            </p>
            <a href="tshirt_details.php" class="btn btn-primary">İncele</a>
          </div>
        </div>
      </section>
      
      <script src="shopping.js"></script>

    <?php include 'templates/footer.php';?>

</html>