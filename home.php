<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link href="bootstrap-5/css/bootstrap"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="style/home.css">
    <title>HOME</title>
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <nav class="navbar navbar-expand-lg navbar-secondary ">
        <div class="container">
            <a href="home.php" class="navbar-brand"><h3>หจก. เจริญรับเบอร์</h3></a>
                <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
                        <li class="nav-item-login">
                            <button type="button" class="btn btn-login">
                                <a class="nav-link-login" href="login.php">Login</a>
                            </button>
                        </li>
                        <li class="nav-item-register">
                            <button type="button" class="btn btn-outline-register">
                                <a class="nav-link-register" href="registration.php">Sing Up</a>
                            </button>
                        </li>
                        <!-- <li class="nav-item-login">
                            <button type="button" class="btn btn-login">
                                <a class="nav-link-login" href="employee_login.php">Employee Login</a>
                            </button>
                        </li> -->
                        <li class="nav-item-login employee">
                            <button type="button" class="btn btn-login employee">
                                <a class="nav-link-login employee" href="employee_login.php">Employee Login</a>
                            </button>
                        </li>
                    </ul>    
            </div>         
    </nav>

      <!-- Header -->
    <header class="text-white text-center">
      <div class="container">
        <div class="row">
          <div class="col-xl-9 mx-auto"></div>
          <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
            <form action="">
              <div class="row d-flex">
                <div class="col-12 col-md-9 mb-2 mb-md-0"></div>          
                <div class="col-12 col-md-3"></div>    
              </div>
            </form>
          </div>
        </div>
      </div>
    </header>
    
    <!-- Image Showcase -->
    <section class="showcase"> 
      <div class="container-fluid p-0">
        <div class="row g-0">
          <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url('img/img3.jpg');"></div>
          <div class="col-lg-6 order-lg-1 my-auto showcase-text">
            <h2>รับซื้อยางก้อนในราคาที่เหมาะสม</h2>
            <p class="lead mb-0">รับซื้อยางก้อนตั้งแต่ 7-8 มีดขึ้นไป </p>
          </div>
        </div>

        <div class="row g-0">
          <div class="col-lg-6 text-white showcase-img" style="background-image: url('img/img2.jpg');"></div>
          <div class="col-lg-6 my-auto showcase-text">
            <h2>ประมูลยาง</h2>
            <p class="lead mb-0">ประมูลยางจากกลุ่มสมาชิก</p>
          </div>
        </div>

        <div class="row g-0">
          <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url('img/img4.jpg');"></div>
          <div class="col-lg-6 order-lg-1 my-auto showcase-text">
            <h2>รับเคปยางก้อนในราคาที่เป็นมิตร</h2>
            <p class="lead mb-0">เรารับจ้างเคปยางก้อนในราคาที่เป็นมิตร คุยกันได้ พร้อมให้บริการ</p>
          </div>
        </div>
      </div>
    </section>

    <footer class="bg-light">
      <div class="container">
        <div class="row">
          <div class="col-12 text-center">
            <p class="text-muted">&copy; JAREANRUBBER </p>
          </div>
        </div>
      </div>
    </footer>
</body>

</html>