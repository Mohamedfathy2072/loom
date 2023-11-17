<?php 
    require "../inc/config/db.php";
    // here url page
    $url_automatics = "https://".$_SERVER['HTTP_HOST'];


    $pageName = "طريقة الدفع";

    if(isset($_POST['payments']) && $_POST['payments'] == 'visa'){
        echo "<script>document.location = 'https://loomshope.com/pay/request.php';</script>";
    }
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <title><?php echo $pageName; ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- meta tag help seo -->
    <meta name="description" content="الوصف هنا">
    <meta name="keywords" content="كلمات,المفتاحية">
    <!-- here icon -->
    <link rel="icon" type="image/x-icon" href="<?= $url_automatics ?>/assets/img/icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="<?= $url_automatics ?>/assets/img/icon.png">
    <link rel="apple-touch-icon" href="<?= $url_automatics ?>/looom/assets/img/apple-icon.png">
    <!-- here css file and bootstrap -->
    <link rel="stylesheet" href="<?= $url_automatics ?>/looom/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= $url_automatics ?>/looom/assets/css/templatemo.css">
    <link rel="stylesheet" href="<?= $url_automatics ?>/looom/assets/css/custom.css">

    <link href='<?= $url_automatics ?>/looom/assets/styleLibary/boxicons/css/boxicons.css' rel='stylesheet'>
    <link rel="stylesheet" href="<?= $url_automatics ?>/looom/assets/css/order.css">

    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet" href="<?= $url_automatics ?>/looom/assets/css/fontawesome.min.css">
    <link rel="stylesheet" href="<?= $url_automatics ?>/looom/assets/styleLibary/boxicons/css/boxicons.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
      <!-- here style loader -->
      <link rel="stylesheet" href="<?= $url_automatics ?>/looom/assets/css/loader.css" id="styleloader">

  </head>
<body style="border-top: 4px solid black;">


 <!-- here loader -->
    <div class="center" id="loader-load">
        <div class="ring"></div>
        <img src="../assets/img/loader/loom-pay.jpg" class="loader">
    </div>
    <!-- end loader -->

<section class="py-5">

<div class="container">
  <form method="POST">
    <div class="row">

    <div class="col-8 mb-5 text-end">
        <img src="../assets/img/icons/loompay.png" class="img-fluid loom-pay-logo">
    </div>
<!-- 
      <div class="col-4">
        <a href="cart.php" class="btn btn-dark ms-auto fs-mobile-06 px-5">رجوع الي لوم كارت</a>
      </div> -->

        <h2 class="text-end cairo fw-bold my-3">طريقة الدفع</h2>

      <div class="col-md-12 payment-option">
        
        <label class="d-flex align-items-center">
          <div class="d-flex">
            <input type="radio" name="payments" value="visa">
            <p class="me-3 fw-bold">الدفع باستخدام البطاقة</p>
          </div>

          <div class="me-auto">
            <img src="../assets/img/footer/payicons.png" alt="Visa" class="cards-payment">
          </div>

        </label>

      </div>

      <div class="col-md-12 payment-option">
        
        <label class="d-flex align-items-center">
          <div class="d-flex">
            <input type="radio" name="payments" value="applepay">
            <p class="me-3 fw-bold">Apple Pay</p>
          </div>

          <div class="me-auto">
            <img src="../assets/img/footer/apple-pay.png" alt="apple-pay">
          </div>

        </label>

      </div>

      <div class="col-md-12 payment-option">
        
        <label class="d-flex align-items-center">
          <div class="d-flex">
            <input type="radio" name="payments" value="tabby">
            <p class="me-3 fw-bold">تابي</p>
          </div>

          <div class="me-auto">
            <img src="../assets/img/footer/tabby.png" alt="tabby">
          </div>

        </label>

      </div>

      <div class="col-md-12 payment-option">
        
        <label class="d-flex align-items-center">
          <div class="d-flex">
            <input type="radio" name="payments" value="tamara">
            <p class="me-3 fw-bold">تمارا</p>
          </div>

          <div class="me-auto">
            <img src="../assets/img/footer/tamara.png" alt="tamara">
          </div>

        </label>

      </div>

      <div class="col-md-12 payment-option">
        
        <label class="d-flex align-items-center">
          <div class="d-flex">
            <input type="radio" name="payments" value="cash">
            <p class="me-3 fw-bold"><span class="cairo" style="color:#4e008d;">Stc</span> <span class="cairo" style="color:#00bc87;">Pay</span></p>
          </div>

          <div class="me-auto">
            <img src="../assets/img/footer/stc.png" alt="Stc Pay">
          </div>

        </label>

      </div>

      <div class="col-lg-12 text-center justify-content-center">
          <a href="cart.php" class="d-flex text-decoration-none text-dark justify-content-center">
              <div class="cairo mt-2">رجوع الي لوم كارت</div>
              <img src="../assets/img/icons/loomcart.svg" class="img-fluid" width="50px">
          </a>
      </div>

      <div class="col-lg-12 my-5 text-center mx-auto">

        <button class="btn btn-dark w-100 mx-auto py-2" id="applepay" style="display: none;background-color: #222222 !important;" type="submit">
            <img src="../assets/img/footer/apple.svg" style="height: 35px;" class="w-100">
        </button>

        <button class="btn btn-dark w-100 mx-auto py-2 border border-0" id="tabby" style="display: none;background: linear-gradient(45deg, #3bff9d, #3bffc3) !important;" type="submit">
            <img src="../assets/img/footer/tabby.png" style="height: 35px;" >
        </button>

        <button class="btn btn-dark w-100 mx-auto py-2 border border-0" id="tamara" style="display: none;background: linear-gradient(45deg,#b6e5fc,#f7b986, #a97cb5, #febd51) !important;" type="submit">
            <img src="../assets/img/footer/tamara.png" style="height: 35px;" >
        </button>

        <button class="btn btn-dark w-100 mx-auto py-2 border border-0" id="stc" style="display: none;background: white;" type="submit">
            <img src="../assets/img/footer/stc.png" style="height: 35px;" >
        </button>

        <button class="btn btn-dark w-100 mx-auto py-2" id="btnpay" type="submit">تأكيد الدفع</button>

      </div>

      <!-- Repeat for more payment options -->
    </div>
  </form>
</div>


</section>


<?php require "../inc/asset/footer.php"; ?>



<!-- Start Script -->
<script src="../assets/js/jquery-1.11.0.min.js"></script>
<script src="../assets/js/jquery-migrate-1.2.1.min.js"></script>
<script src="../assets/js/bootstrap.bundle.min.js"></script>
<script src="../assets/js/templatemo.js"></script>
<script src="../assets/js/fontawesome.js"></script>
<script src="../assets/js/custom.js"></script>
<script src="../assets/js/loader.js"></script>
<script src="../assets/js/payments.js"></script>
<!-- End Script -->
</body>

</html>