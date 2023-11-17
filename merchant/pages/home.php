<?php
// here require menu or navbar right
$pageName = "لوحة تحكم لوم";
require "inc/menu.php";


// require database
require "../../inc/config/db.php";
?>
<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>



    <!-- Page CSS -->



    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->

    <title>لوحة تحكم لوم</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style type="text/css">
        body{
            margin-top:20px;
            background:#FAFAFA;
        }

        .order-card {
            color: #697a8d;
        }
        a:hover {
            text-decoration: none;
        }
        @media (min-width: 1200px)
            .layout-menu-fixed:not(.layout-menu-collapsed) .layout-page, .layout-menu-fixed-offcanvas:not(.layout-menu-collapsed) .layout-page {
                padding-right: 0px;
            }
        }
         .f {
            font-size: 1.5rem !important;
        }
        /*.layout-navbar{*/
        /*    display: none;*/
        /*}*/
        .layout-menu{
            display: none;
        }
        .bg-c-blue {
            background: linear-gradient(45deg,#4099ff,#73b4ff);
        }

        .bg-c-green {
            background: linear-gradient(45deg,#2ed8b6,#59e0c5);
        }

        .bg-c-yellow {
            background: linear-gradient(45deg,#FFB64D,#ffcb80);
        }

        .bg-c-bluee {
            background: #fff;
        }


        .card {
            border-radius: 5px;
            -webkit-box-shadow: 0 1px 2.94px 0.06px rgba(4,26,55,0.16);
            box-shadow: 0 1px 2.94px 0.06px rgba(4,26,55,0.16);
            border: none;
            -webkit-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out;
        }

        .card .card-block {
            padding: 25px;
        }

        .order-card i {
            font-size: 38px;
        }

        .f-left {
            float: left;
        }

        .f-right {
            float: right;
        }
        .area{
            background: #4e54c8;
            background: -webkit-linear-gradient(to left, #8f94fb, #4e54c8);
            width: 100%;
            height:100%;

        }
        .circles{
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
        }
        .circles li{
            position: absolute;
            display: block;
            list-style: none;
            width: 20px;
            height: 20px;
            background: rgba(105,122,141, 0.2);
            animation: animate 25s linear infinite;
            bottom: -150px;

        }

        .circles li:nth-child(1){
            left: 25%;
            width: 80px;
            height: 80px;
            animation-delay: 0s;
        }


        .circles li:nth-child(2){
            left: 10%;
            width: 20px;
            height: 20px;
            animation-delay: 2s;
            animation-duration: 12s;
        }

        .circles li:nth-child(3){
            left: 70%;
            width: 20px;
            height: 20px;
            animation-delay: 4s;
        }

        .circles li:nth-child(4){
            left: 40%;
            width: 60px;
            height: 60px;
            animation-delay: 0s;
            animation-duration: 18s;
        }

        .circles li:nth-child(5){
            left: 65%;
            width: 20px;
            height: 20px;
            animation-delay: 0s;
        }

        .circles li:nth-child(6){
            left: 75%;
            width: 110px;
            height: 110px;
            animation-delay: 3s;
        }

        .circles li:nth-child(7){
            left: 35%;
            width: 150px;
            height: 150px;
            animation-delay: 7s;
        }

        .circles li:nth-child(8){
            left: 50%;
            width: 25px;
            height: 25px;
            animation-delay: 15s;
            animation-duration: 45s;
        }

        .circles li:nth-child(9){
            left: 20%;
            width: 15px;
            height: 15px;
            animation-delay: 2s;
            animation-duration: 35s;
        }

        .circles li:nth-child(10){
            left: 85%;
            width: 150px;
            height: 150px;
            animation-delay: 0s;
            animation-duration: 11s;
        }



        @keyframes animate {

            0%{
                transform: translateY(0) rotate(0deg);
                opacity: 1;
                border-radius: 0;
            }

            100%{
                transform: translateY(-1000px) rotate(720deg);
                opacity: 0;
                border-radius: 50%;
            }

        }
    </style>
</head>
<body>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row justify-content-center">
        <div class=" col-md-4  col-xl-3 pb-5">
            <a href="javascript:void(0);">
                <div class="card bg-c-bluee order-card ">
                    <div class="card-block">
                        <ul class="circles">
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                        </ul>
                        <!--                    <i class="fa fa-shirt f-left"></i>-->
                        <i class="menu-icon tf-icons bx bxs-package f-left"></i>

                        <h3 class="text-right">متجرك</h3>
                        <p class="m-b-0"> اعدادات عامة <span> 351 </span></p>
                    </div>
                </div>
            </a>
        </div>
        <div class=" col-md-4  col-xl-3 pb-5">
            <a href="product.php">
            <div class="card bg-c-bluee order-card ">
                <div class="card-block">
                    <ul class="circles">
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                    </ul>
<!--                    <i class="fa fa-shirt f-left"></i>-->
                    <i class="menu-icon tf-icons bx bxs-t-shirt f-left"></i>

                    <h3 class="text-right">المنتجات</h3>
                    <p class="m-b-0"> عدد المنتجات  <span> 351 </span></p>
                </div>
            </div>
            </a>
        </div>

        <div class=" col-md-4  col-xl-3 pb-5">
            <a href="order.php" >
            <div class="card bg-c-bluee order-card ">
                <div class="card-block">
                    <ul class="circles">
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                    </ul>
                    <i class="menu-icon tf-icons bx bxs-package f-left"></i>
                    <h3 class="text-right">الطلبات</h3>
                    <p class="m-b-0">عدد الطلبات <span class="">351</span></p>
                </div>
            </div>
            </a>
        </div>
        <div class=" col-md-4  col-xl-3 pb-5">
            <a href="index.php">
                <div class="card bg-c-bluee order-card ">
                    <div class="card-block">
                        <ul class="circles">
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                        </ul>
                        <i class="menu-icon tf-icons bx bxs-package f-left"></i>
                        <h3 class="text-right">المبيعات</h3>
                        <p class="m-b-0"> معلومات عن المبيعات </p>
                    </div>
                </div>
            </a>
        </div>
        <div class=" col-md-4  col-xl-3 pb-5">
            <a href="javascript:void(0);">
                <div class="card bg-c-bluee order-card ">
                    <div class="card-block">
                        <ul class="circles">
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                        </ul>
                        <i class="menu-icon tf-icons bx bxs-offer f-left"></i>
                        <h3 class="text-right">العروض الخاصة</h3>
                        <p class="m-b-0"> العروض الخاصة </p>
                    </div>
                </div>
            </a>
        </div>
        <div class=" col-md-4  col-xl-3 pb-5">
            <a href="report.php">
                <div class="card bg-c-bluee order-card ">
                    <div class="card-block">
                        <ul class="circles">
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                        </ul>
                        <i class="menu-icon tf-icons bx bxs-pie-chart-alt-2 f-left"></i>
                        <h3 class="text-right">التقارير</h3>
                        <p class="m-b-0">التقارير</p>
                    </div>
                </div>
            </a>
        </div>
        <div class=" col-md-4  col-xl-3 pb-5">
            <a href="javascript:void(0);">
                <div class="card bg-c-bluee order-card ">
                    <div class="card-block">
                        <ul class="circles">
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                        </ul>
                        <i class="menu-icon tf-icons bx bxs-package f-left"></i>
                        <h3 class="text-right">دروب شوبينج</h3>
                        <p class="m-b-0">دروب شوبينج <span class="">351</span></p>
                    </div>
                </div>
            </a>
        </div>
        <div class=" col-md-4  col-xl-3 pb-5">
            <a href="javascript:void(0);">
                <div class="card bg-c-bluee order-card ">
                    <div class="card-block">
                        <ul class="circles">
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                        </ul>
                        <i class="menu-icon tf-icons bx bxs-comment-detail f-left"></i>
                        <h5 class="text-right">تقييم المنتجات والبائعين</h5>
                        <p class="m-b-0">تقييم المنتجات والبائعين<span class="">351</span></p>
                    </div>
                </div>
            </a>
        </div>
        <div class=" col-md-4  col-xl-3 pb-5">
            <a href="javascript:void(0);">
                <div class="card bg-c-bluee order-card ">
                    <div class="card-block">
                        <ul class="circles">
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                        </ul>
                        <i class="menu-icon tf-icons bx bxs-comment-detail f-left"></i>
                        <h4 class="text-right">الشحن</h4>
                        <p class="m-b-0">الشحن<span class="">351</span></p>
                    </div>
                </div>
            </a>
        </div>
        <div class=" col-md-4  col-xl-3 pb-5">
            <a href="javascript:void(0);">
                <div class="card bg-c-bluee order-card ">
                    <div class="card-block">
                        <ul class="circles">
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                        </ul>
                        <i class="menu-icon tf-icons bx bxs-offer f-left"></i>
                        <h3 class="text-right">لوم كارت</h3>
                        <p class="m-b-0"> السحب والنقد  </p>

                    </div>
                </div>
            </a>
        </div>
        <div class=" col-md-4  col-xl-3 pb-5">
            <a href="wallet.php">
                <div class="card bg-c-bluee order-card ">
                    <div class="card-block">
                        <ul class="circles">
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                        </ul>
                        <i class="menu-icon tf-icons bx bxs-wallet f-left"></i>
                        <h3 class="text-right">لوم باي</h3>
                        <p class="m-b-0">النقد والسحب</p>
                    </div>
                </div>
            </a>
        </div>
 <div class=" col-md-4  col-xl-3 pb-5">
            <a href="#">
                <div class="card bg-c-bluee order-card ">
                    <div class="card-block">
                        <ul class="circles">
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                        </ul>
                        <i class="menu-icon tf-icons bx bxs-wallet f-left"></i>
                        <h3 class="text-right">الدعم والمساعدة</h3>
                        <p class="m-b-0">الدعم والمساعدة</p>
                    </div>
                </div>
            </a>
        </div>

    </div>
</div>
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="https://netdna.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
<script type="text/javascript">

</script>
</body>
</html>
<?php require "inc/footer.php"; ?>