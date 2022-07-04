<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bi Beden Büyük</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="style.css" />
    <script
      src="https://code.jquery.com/jquery-3.6.0.min.js"
      integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
      crossorigin="anonymous"
    ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />
    
  </head>
  
  <body class="#f5f5f5 grey lighten-4">
    
    <header>
      <div class="header">
        <div class="header-vol-1">
        <h1 class="welcome">Selam, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Hoş geldin !</h1>
        <a href="change_password.php" class="link">Parola değiştir</a>
        <a href="logout.php" class="link">Çıkış yap</a>
        </div>
        <div class="header-vol-2">
          <a class="link" href="basket.php">Alışveriş Sepeti</a>
          
        </div>
      </div>
    </header>
    <hr class="line" />
    
    <nav class="#bdbdbd grey lighten-1" >
      <div class="container">
        <a href="index.php" class="nav-bar-write">Ana sayfa</a>
        <ul id="nav-mobile" class="right hide-on-small-and-down">
          <li><a href="add.php" class="nav-bar-write">Ürün ekle</a></li>
        </ul>
        
      </div>
      <div>
      
      </div>
    </nav>
    <script src="shopping.js"></script>
