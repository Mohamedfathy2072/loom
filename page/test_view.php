<?php 
    
    $pageName = "تجربة";
    require "../inc/asset/header.php";
    
    // check session isset or no
    if(!isset($_SESSION['email_member']) && !isset($_SESSION['password_member']) || !isset($_SESSION['username']) && !isset($_SESSION['email']) && !isset($_SESSION['password'])):
        echo "<script>document.location = '../';</script>";
      exit;
    endif;


    if(!isset($_GET['id']) || empty($_GET['id'])){
        header("location: ../",true);
        exit;
    }else{
        $id = filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT);
    }

    $info = $conn->prepare("SELECT * FROM product_merchant WHERE ID = :id");
    $info->bindParam("id",$id);
    $info->execute();
    if($info->rowCount() != 1){
        echo "<script>document.location = '../';</script>";
        exit;
    }else{
        $info_show = $info->fetch(PDO::FETCH_ASSOC);

        $size = explode(",",$info_show['size']);

        $first_img = '../'.$info_show['img_file'];
        
        $images = $conn->prepare("SELECT * FROM img_product_merchant WHERE product_id = :id");
        $images->bindParam("id",$id);
        $images->execute();

        $category = $conn->prepare("SELECT * FROM category WHERE id = :id");
        $category->bindParam("id",$info_show['category']);
        $category->execute();

        $deperment = $category->fetchObject();

        if(!empty($info_show['price_coupon'])){
            $price_coupun = $info_show['price_coupon'];
        }
    }
    
?>

  <!-- Open Content -->
  <section class="bg-light">
        <div class="container pb-5">
            <div class="row">
                <div class="col-lg-5 mt-5">
                    <div class="card mb-3">
                        <img class="card-img img-fluid" src="<?php echo $first_img; ?>" alt="product" id="product-detail">
                    </div>
                    <div class="row">

                        <!--Start Controls-->
                        
                        <div class="col-1 align-self-center">
                            <a href="#multi-item-example" role="button" data-bs-slide="next">
                                <i class="text-dark fas fa-chevron-right"></i>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>

                        <!--End Controls-->

                        <!--Start Carousel Wrapper-->
                        <div id="multi-item-example" class="col-10 carousel slide carousel-multi-item" data-bs-ride="carousel">
                            <!--Start Slides-->
                            <div class="carousel-inner product-links-wap" role="listbox">

                                <!--Second slide-->
                                <div class="carousel-item active">
                                    <div class="row">

                                        <div class="col-4">
                                            <a href="#">
                                                <img class="card-img img-fluid" src="<?php echo $first_img; ?>" style="height: 110px;margin: 2rem 0;" alt="Product">
                                            </a>
                                        </div>
                                        
                                    <?php 
                                        foreach($images AS $show): 
                                            $file = explode("../",$show['file_src']);
                                    ?>
                                        <div class="col-4">
                                            <a href="#">
                                                <img class="card-img img-fluid" src="../<?php echo $file[2]; ?>" style="height: 110px;margin: 2rem 0;" alt="Product">
                                            </a>
                                        </div>
                                    <?php endforeach; ?>

                                    </div>
                                </div>
                                <!--/.Second slide-->

                            </div>
                            <!--End Slides-->
                        </div>
                        <!--End Carousel Wrapper-->

                        <!--Start Controls-->
                        
                        <div class="col-1 align-self-center">
                            <a href="#multi-item-example" role="button" data-bs-slide="prev">
                                <i class="text-dark fas fa-chevron-left"></i>
                                <span class="sr-only">Previous</span>
                            </a>
                        </div>
 
                        <div class="col-12">
                            <svg fill="#0a0052" width="50px" height="50px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" stroke="#0a0052" transform="matrix(1, 0, 0, 1, 0, 0)"><g id="SVGRepo_bgCarrier" stroke-width="0"/><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/><g id="SVGRepo_iconCarrier"><path d="M19.965 8.521C19.988 8.347 20 8.173 20 8c0-2.379-2.143-4.288-4.521-3.965C14.786 2.802 13.466 2 12 2s-2.786.802-3.479 2.035C6.138 3.712 4 5.621 4 8c0 .173.012.347.035.521C2.802 9.215 2 10.535 2 12s.802 2.785 2.035 3.479A3.976 3.976 0 0 0 4 16c0 2.379 2.138 4.283 4.521 3.965C9.214 21.198 10.534 22 12 22s2.786-.802 3.479-2.035C17.857 20.283 20 18.379 20 16c0-.173-.012-.347-.035-.521C21.198 14.785 22 13.465 22 12s-.802-2.785-2.035-3.479zm-9.01 7.895-3.667-3.714 1.424-1.404 2.257 2.286 4.327-4.294 1.408 1.42-5.749 5.706z"/></g></svg>
                            <span class="cairo"><?php echo $info_show['grenti']; ?></span>
                            <br>
                            <svg height="70px" width="50px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 511.984 511.984" xml:space="preserve" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path style="fill:#8CC153;" d="M405.315,363.566c0,5.875-4.797,10.672-10.656,10.672H117.324c-5.859,0-10.656-4.797-10.656-10.672 v-60.67c0-5.858,4.797-10.655,10.656-10.655h277.335c5.859,0,10.656,4.797,10.656,10.655V363.566z"></path> <path style="fill:#434A54;" d="M501.313,245.32c-5.891,0-10.656,4.781-10.656,10.672c0,31.687-6.203,62.42-18.438,91.341 c-11.812,27.937-28.733,53.03-50.295,74.592s-46.655,38.483-74.592,50.296c-28.921,12.233-59.654,18.437-91.341,18.437 s-62.42-6.203-91.341-18.437c-27.938-11.812-53.03-28.734-74.592-50.296c-21.562-21.562-38.483-46.655-50.296-74.592 c-12.232-28.921-18.435-59.654-18.435-91.341s6.203-62.42,18.437-91.341c11.812-27.937,28.733-53.03,50.296-74.592 c21.562-21.562,46.654-38.483,74.592-50.296c28.92-12.233,59.653-18.436,91.34-18.436s62.42,6.203,91.341,18.437 c25.858,10.938,49.264,26.25,69.701,45.562H377.91c-5.891,0-10.671,4.781-10.671,10.672s4.78,10.671,10.671,10.671h63.998 c5.891,0,10.656-4.78,10.656-10.671V31.999c0-5.891-4.766-10.672-10.656-10.672s-10.671,4.781-10.671,10.672v37.39 C385.441,26.358,323.802,0,255.992,0C114.605,0,0,114.605,0,255.992s114.605,255.992,255.992,255.992 c141.386,0,255.992-114.605,255.992-255.992C511.984,250.101,507.203,245.32,501.313,245.32z"></path> <path style="fill:#A0D468;" d="M117.324,149.323c-5.859,0-10.656,4.812-10.656,10.672v63.998c0,5.859,0,15.468,0,21.327v63.998 c0,5.875,4.797,10.672,10.656,10.672h277.335c5.859,0,10.656-4.797,10.656-10.672V245.32c0-5.859,0-15.468,0-21.327v-63.998 c0-5.859-4.797-10.672-10.656-10.672H117.324z"></path> <path style="fill:#8CC153;" d="M298.46,233.993c0,23.562-19.094,42.67-42.655,42.67s-42.671-19.108-42.671-42.67 s19.109-42.671,42.671-42.671S298.46,210.43,298.46,233.993z"></path> <path style="fill:#A0D468;" d="M106.668,336.443v10.671l0,0c0,5.891,4.766,10.672,10.656,10.672h277.335 c5.891,0,10.656-4.781,10.656-10.672v-10.671H106.668z"></path> </g></svg>
                            <span class="cairo"><?php echo $info_show['rt_product']; ?></span>
                            <br>
                            <svg width="50px" height="50px" viewBox="0 0 64 64" id="svg5" version="1.1" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:svg="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <defs id="defs2"></defs> <g id="layer1" transform="translate(-96,-288)"> <path d="m 106,297 h 49 v 6 h -49 z" id="path26939" style="fill:#3e4f59;fill-opacity:1;fill-rule:evenodd;stroke-width:2;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4.1"></path> <path d="m 106,303 h 49 v 40 h -49 z" id="path26941" style="fill:#acbec2;fill-opacity:1;fill-rule:evenodd;stroke-width:2.00001;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4.1"></path> <path d="m 106,303 v 40 h 29.76953 a 28.484051,41.392605 35.599482 0 0 18.625,-40 z" id="path26943" style="fill:#e8edee;fill-opacity:1;fill-rule:evenodd;stroke:none;stroke-width:2.00002;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4.1"></path> <path d="m 108,296 c -1.64501,0 -3,1.355 -3,3 v 40 c 0,0.55229 0.44772,1 1,1 0.55229,0 1,-0.44771 1,-1 v -40 c 0,-0.56413 0.43587,-1 1,-1 h 45 c 0.56413,0 1,0.43587 1,1 v 3 h -42 c -0.55228,0 -1,0.44772 -1,1 0,0.55229 0.44772,1 1,1 h 42 v 37 c 0,0.56413 -0.43587,1 -1,1 h -49 c -0.55228,0 -1,0.44772 -1,1 0,0.55229 0.44772,1 1,1 h 49 c 1.64501,0 3,-1.35499 3,-3 0,-14 0,-28 0,-42 0,-1.645 -1.35499,-3 -3,-3 z" id="path26945" style="color:#000000;fill:#000000;fill-rule:evenodd;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4.1"></path> <path d="m 151,299 c -0.55228,0 -1,0.44772 -1,1 0,0.55229 0.44772,1 1,1 0.55229,0 1,-0.44771 1,-1 0,-0.55228 -0.44771,-1 -1,-1 z" id="path26947" style="color:#000000;fill:#ed7161;fill-opacity:1;fill-rule:evenodd;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4.1;-inkscape-stroke:none"></path> <path d="m 147,299 c -0.55228,0 -1,0.44772 -1,1 0,0.55229 0.44772,1 1,1 0.55229,0 1,-0.44771 1,-1 0,-0.55228 -0.44771,-1 -1,-1 z" id="path26949" style="color:#000000;fill:#ecba16;fill-opacity:1;fill-rule:evenodd;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4.1;-inkscape-stroke:none"></path> <path d="m 143,299 c -0.55228,0 -1,0.44772 -1,1 0,0.55229 0.44772,1 1,1 0.55229,0 1,-0.44771 1,-1 0,-0.55228 -0.44771,-1 -1,-1 z" id="path26951" style="color:#000000;fill:#42b05c;fill-opacity:1;fill-rule:evenodd;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4.1;-inkscape-stroke:none"></path> <path d="m 101,342 a 1,1 0 0 0 -1,1 1,1 0 0 0 1,1 1,1 0 0 0 1,-1 1,1 0 0 0 -1,-1 z" id="path26953" style="color:#000000;fill:#000000;fill-rule:evenodd;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4.1;-inkscape-stroke:none"></path> <path d="m 109,302 c -0.55228,0 -1,0.44772 -1,1 0,0.55229 0.44772,1 1,1 0.55229,0 1,-0.44771 1,-1 0,-0.55228 -0.44771,-1 -1,-1 z" id="path26955" style="color:#000000;fill:#000000;fill-rule:evenodd;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4.1;-inkscape-stroke:none"></path> <path d="m 121.99998,313.00001 c 4.14207,0.0516 6.81286,-1.68094 9,-4.00001 2.38683,2.76379 5.44015,3.97273 8.99999,4.00001 V 320 c 0,4.97056 -4.02944,9 -9,9 -4.97056,0 -8.99999,-4.02944 -8.99999,-9 z" id="rect2124" style="fill:#0075d3;fill-opacity:1;fill-rule:evenodd;stroke:none;stroke-width:2.00001;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4.1"></path> <path d="M 126.58984,312.17578 C 125.27763,312.71454 123.77472,313.02211 122,313 v 7 c 0,4.97056 4.02944,9 9,9 2.11021,0 4.04933,-0.72717 5.58398,-1.94336 A 11.924097,11.924097 0 0 0 137,324 11.924097,11.924097 0 0 0 126.58984,312.17578 Z" id="path13285" style="fill:#0588e2;fill-opacity:1;fill-rule:evenodd;stroke-width:2;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4.1"></path> <path d="m 135.36523,316.47656 -6.00781,4.93555 -1.45312,-3.08789 a 1,1 0 0 0 -1.33008,-0.47852 1,1 0 0 0 -0.47852,1.33008 l 2,4.25 a 1.0001,1.0001 0 0 0 1.53907,0.34766 l 7,-5.75 a 1,1 0 0 0 0.13867,-1.40821 1,1 0 0 0 -1.40821,-0.13867 z" id="path32473" style="color:#000000;fill:#000000;fill-rule:evenodd;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4.1;-inkscape-stroke:none"></path> <path d="m 117.99998,333 h 25 c 1.108,0 2,0.892 2,2 0,1.108 -0.892,2 -2,2 h -25 c -1.108,0 -2,-0.892 -2,-2 0,-1.108 0.892,-2 2,-2 z" id="rect2092" style="fill:#ffa221;fill-opacity:1;fill-rule:evenodd;stroke:none;stroke-width:2;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4.1"></path> <path d="m 118,333 c -1.108,0 -2,0.892 -2,2 h 23 c 1.108,0 2,-0.892 2,-2 z" id="path13457" style="fill:#ffc343;fill-opacity:1;fill-rule:evenodd;stroke:none;stroke-width:2;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4.1"></path> <path d="m 138.95899,337 h -20.95901 c -1.108,0 -2,-0.892 -2,-2 0,-1.108 0.892,-2 2,-2 M 122,333 h 20.99998 c 1.108,0 2,0.892 2,2 0,1.108 -0.892,2 -2,2" id="path17681" style="fill:none;fill-rule:evenodd;stroke:#000000;stroke-width:2;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4.1;stroke-opacity:1"></path> <path d="m 130.3457,308.24219 a 1.000005,1.000005 0 0 0 -0.10351,1.41211 c 2.33729,2.70643 5.38206,4.00416 8.75781,4.24804 V 320 c 0,1.28933 -0.30296,2.50019 -0.8418,3.57617 a 1.000005,1.000005 0 0 0 0.44532,1.3418 1.000005,1.000005 0 0 0 1.34375,-0.44531 C 140.62139,323.12654 141,321.60391 141,320 v -7 a 1.000105,1.000105 0 0 0 -0.99219,-1 c -3.33783,-0.0256 -6.04658,-1.10062 -8.25195,-3.6543 a 1.000005,1.000005 0 0 0 -1.41016,-0.10351 z m -2.8164,2.34765 c -1.48586,0.89428 -3.21959,1.43875 -5.51758,1.41016 A 1.000105,1.000105 0 0 0 121,313 v 7 c 0,5.511 4.489,10 10,10 2.10223,0 4.06225,-0.65144 5.67383,-1.76367 a 1.000005,1.000005 0 0 0 0.25586,-1.39258 1.000005,1.000005 0 0 0 -1.39258,-0.25391 C 134.24717,327.4801 132.68992,328 131,328 c -4.43011,0 -8,-3.56989 -8,-8 v -6.12305 c 2.15301,-0.13399 4.0319,-0.65419 5.56055,-1.57422 a 1.000005,1.000005 0 0 0 0.33984,-1.37304 1.000005,1.000005 0 0 0 -1.37109,-0.33985 z" id="path18430" style="color:#000000;fill:#000000;fill-rule:evenodd;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4.1;-inkscape-stroke:none"></path> </g> </g></svg>
                            <span class="cairo">تسوق آمن بيانات محمية دائما</span>
                            <br>
                            <svg height="64px" width="50px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path style="fill:#FFDC64;" d="M358.614,102.079H50.772c-4.722,0-8.551,3.829-8.551,8.551v179.574h25.653 c9.445,0,17.102,7.656,17.102,17.102c0,9.445-7.658,17.102-17.102,17.102H42.221v25.653c0,4.722,3.829,8.551,8.551,8.551h316.393 V110.63C367.165,105.908,363.336,102.079,358.614,102.079z"></path> <path style="fill:#C7CFE2;" d="M469.779,238.898H367.165v119.716h136.818v-85.512C503.983,254.212,488.669,238.898,469.779,238.898z "></path> <path style="fill:#AFB9D2;" d="M367.165,264.551h92.638c9.446,0,17.102,7.656,17.102,17.102v76.96h-109.74V264.551z"></path> <path style="fill:#C7CFE2;" d="M435.574,136.284h-68.409v34.205h94.063v-8.551C461.228,147.769,449.742,136.284,435.574,136.284z"></path> <polygon style="fill:#B4E6FF;" points="469.779,238.898 452.676,170.489 367.165,170.489 367.165,238.898 "></polygon> <circle style="fill:#FFFFFF;" cx="204.693" cy="213.244" r="68.409"></circle> <path style="fill:#F1F4FB;" d="M469.779,273.102h34.205v34.205h-17.102c-9.446,0-17.102-7.656-17.102-17.102V273.102z"></path> <path style="fill:#959CB5;" d="M427.023,298.756c-25.772,0-48.194,14.265-59.858,35.317v24.541h127.676 C490.624,324.877,461.902,298.756,427.023,298.756z"></path> <path style="fill:#AFB9D2;" d="M476.904,320.412v38.202h17.937C493.005,343.925,486.518,330.686,476.904,320.412z"></path> <circle style="fill:#5B5D6E;" cx="427.023" cy="367.165" r="42.756"></circle> <path style="fill:#9BD6FF;" d="M401.37,196.142h57.72l-6.413-25.653h-85.511v68.409h25.653v-34.205 C392.818,199.971,396.647,196.142,401.37,196.142z"></path> <path style="fill:#FFC850;" d="M144.835,298.756c-21.593,0-40.819,10.028-53.355,25.653H67.875H42.221v25.653 c0,4.722,3.829,8.551,8.551,8.551h316.393v-34.205H198.19C185.654,308.784,166.428,298.756,144.835,298.756z"></path> <circle style="fill:#5B5D6E;" cx="144.835" cy="367.165" r="42.756"></circle> <path d="M476.158,231.363l-13.259-53.035c3.625-0.77,6.345-3.986,6.345-7.839v-8.551c0-18.566-15.105-33.67-33.67-33.67h-60.392 V110.63c0-9.136-7.432-16.568-16.568-16.568H50.772c-9.136,0-16.568,7.432-16.568,16.568V256c0,4.427,3.589,8.017,8.017,8.017 s8.017-3.589,8.017-8.017V110.63c0-0.294,0.239-0.534,0.534-0.534h307.841c0.295,0,0.534,0.24,0.534,0.534v145.372 c0,4.427,3.589,8.017,8.017,8.017c4.427,0,8.017-3.589,8.017-8.017v-9.088h94.569c0.007,0,0.014,0.002,0.021,0.002 c0.007,0,0.015-0.001,0.022-0.001c11.637,0.007,21.518,7.646,24.912,18.171h-24.928c-4.427,0-8.017,3.589-8.017,8.017v17.102 c0,13.851,11.268,25.119,25.119,25.119h9.086v35.273h-20.962c-6.886-19.884-25.787-34.205-47.982-34.205 s-41.097,14.321-47.982,34.205h-3.86v-60.392c0-4.427-3.589-8.017-8.017-8.017c-4.427,0-8.017,3.589-8.017,8.017v60.391H192.817 c-6.886-19.884-25.787-34.205-47.982-34.205s-41.097,14.321-47.982,34.205H50.772c-0.295,0-0.534-0.241-0.534-0.534v-17.637h34.739 c4.427,0,8.017-3.589,8.017-8.017c0-4.427-3.589-8.017-8.017-8.017h-42.75c-0.002,0-0.003,0-0.005,0s-0.003,0-0.005,0H8.017 c-4.427,0-8.017,3.589-8.017,8.017c0,4.427,3.589,8.017,8.017,8.017h26.188v17.637c0,9.136,7.432,16.568,16.568,16.568h43.304 c-0.002,0.178-0.014,0.356-0.014,0.534c0,27.995,22.777,50.772,50.772,50.772s50.772-22.777,50.772-50.772 c0-0.178-0.012-0.356-0.014-0.534h180.67c-0.002,0.178-0.014,0.356-0.014,0.534c0,27.995,22.777,50.772,50.772,50.772 c27.995,0,50.772-22.777,50.772-50.772c0-0.178-0.012-0.356-0.014-0.534h26.203c4.427,0,8.017-3.589,8.017-8.017v-85.512 C512,251.99,496.423,234.448,476.158,231.363z M375.182,178.505h71.235l13.094,52.376h-84.329V178.505z M435.574,144.301 c9.725,0,17.637,7.912,17.637,17.637v0.534h-78.029v-18.171H435.574z M144.835,401.904c-19.155,0-34.739-15.583-34.739-34.739 c0-19.156,15.584-34.739,34.739-34.739c19.155,0,34.739,15.583,34.739,34.739C179.574,386.321,163.99,401.904,144.835,401.904z M427.023,401.904c-19.155,0-34.739-15.583-34.739-34.739c0-19.156,15.584-34.739,34.739-34.739 c19.155,0,34.739,15.583,34.739,34.739C461.762,386.321,446.178,401.904,427.023,401.904z M486.881,299.29 c-5.01,0-9.086-4.076-9.086-9.086v-9.086h18.171v18.171H486.881z"></path> <path d="M144.835,350.597c-9.136,0-16.568,7.432-16.568,16.568c0,9.136,7.432,16.568,16.568,16.568 c9.136,0,16.568-7.432,16.568-16.568C161.403,358.029,153.971,350.597,144.835,350.597z"></path> <path d="M427.023,350.597c-9.136,0-16.568,7.432-16.568,16.568c0,9.136,7.432,16.568,16.568,16.568s16.568-7.432,16.568-16.568 C443.591,358.029,436.159,350.597,427.023,350.597z"></path> <path d="M205.228,324.409c0,4.427,3.589,8.017,8.017,8.017H332.96c4.427,0,8.017-3.589,8.017-8.017c0-4.427-3.589-8.017-8.017-8.017 H213.244C208.817,316.392,205.228,319.982,205.228,324.409z"></path> <path d="M25.119,298.221h102.614c4.427,0,8.017-3.589,8.017-8.017c0-4.427-3.589-8.017-8.017-8.017H25.119 c-4.427,0-8.017,3.589-8.017,8.017C17.102,294.632,20.692,298.221,25.119,298.221z"></path> <path d="M204.693,136.818c-42.141,0-76.426,34.285-76.426,76.426s34.285,76.426,76.426,76.426s76.426-34.285,76.426-76.426 S246.834,136.818,204.693,136.818z M204.693,273.637c-33.3,0-60.392-27.092-60.392-60.392s27.092-60.392,60.392-60.392 s60.392,27.092,60.392,60.392S237.993,273.637,204.693,273.637z"></path> <path d="M212.71,209.924V179.04c0-4.427-3.589-8.017-8.017-8.017s-8.017,3.589-8.017,8.017v34.205c0,2.126,0.844,4.164,2.348,5.668 l25.653,25.653c1.565,1.565,3.617,2.348,5.668,2.348s4.103-0.782,5.668-2.348c3.131-3.131,3.131-8.206,0-11.337L212.71,209.924z"></path> </g></svg>
                            <span class="cairo">مدة التجهيز الشحن يكون خلال 10 يوم</span>
                        </div>

                        <!--End Controls-->
                    </div>
                </div>
                <!-- col end -->
                <div class="col-lg-7 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="h2 cairo"><?php echo $info_show['title']; ?></h1>
                            <?php 
                                // if isset coupon
                                if(isset($price_coupun)){
                            ?>
                                <span>قبل :</span>
                                <span class="h6 mb-3 cairo text-secondary text-decoration-line-through"><?php echo $info_show['price']; ?> ر.س </span>
                                
                                <br>

                                <span>الان :</span>
                                <span class="h5 py-2 cairo"><?php echo $price_coupun; ?> ر.س </span>
                            <?php }else{ ?>
                                <span>السعر :</span>
                                <span class="py-2 ms-3 cairo"><?php echo $info_show['price']; ?> ر.س </span>
                            <?php } 
                            //end price coupon
                                ?>
                            <br>
                            <br>
                            <!-- model number -->
                            <span>رقم الموديل :</span>
                            <span class="py-2 ms-3 cairo"><?php echo $info_show['generate_code']; ?></span>
                            
                            <p class="py-3">
                                <span class="list-inline-item text-dark">مراجعة 4.8 | 36 تعليقات</span>
                            </p>
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item">
                                    <h6>التصنيف:</h6>
                                </li>
                                <li class="list-inline-item">
                                    <p class="text-dark"><strong><?php echo $deperment->Title; ?></strong></p>
                                </li>
                            </ul>

                            <ul class="list-inline mt-0">
                                <li class="list-inline-item">
                                    <h6>العدد:</h6>
                                </li>
                                <li class="list-inline-item">
                                    <p class="text-dark"><strong><?php echo $info_show['quantity']; ?></strong></p>
                                </li>
                            </ul>

                            <h6>الوصف:</h6>
                            <p><?php echo $info_show['description']; ?></p>
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <h6>الوان متوفرة :</h6>
                                </li>
                                <li class="list-inline-item">
                                    <p class="text-dark"><strong><?php echo $info_show['size_title']; ?></strong></p>
                                </li>
                            </ul>

                            <form action="" method="GET">
                                <input type="hidden" name="product-title" value="Activewear">
                                <div class="row">
                                    <div class="col-auto">
                                        <ul class="list-inline pb-3">
                                            <li class="list-inline-item">مقاسات :
                                                <input type="hidden" name="product-size" id="product-size" value="S">
                                            </li>

                                        <?php foreach($size AS $size_show): ?>
                                            <li class="list-inline-item">
                                                <span class="btn btn-dark btn-size"><?php echo $size_show; ?></span>
                                            </li>
                                        <?php endforeach; ?>

                                        </ul>
                                    </div>
                                    <div class="col-auto">
                                        <ul class="list-inline pb-3">
                                            <li class="list-inline-item text-right">
                                                عدد
                                                <input type="hidden" name="product-quanity" id="product-quanity" value="1">
                                            </li>
                                            <li class="list-inline-item"><span class="btn btn-dark" id="btn-minus">-</span></li>
                                            <li class="list-inline-item"><span class="badge bg-dark" id="var-value">1</span></li>
                                            <li class="list-inline-item"><span class="btn btn-dark" id="btn-plus">+</span></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="row pb-3">
                                    <div class="col d-grid">
                                        <a href="javascript:void()" class="btn btn-dark btn-lg cairo">الاضافة الي لوم كارت</a>
                                    </div>
                                    <div class="col d-grid">
                                        <a href="javascript:void()" class="btn btn-dark btn-lg cairo">الاضافة للمفضلات</a>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Close Content -->

    <?php require "../inc/asset/footer.php"; ?>

    <!-- Start Script -->
    <script src="../assets/js/jquery-1.11.0.min.js"></script>
    <script src="../assets/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/templatemo.js"></script>
    <script src="../assets/js/custom.js"></script>
    <script src="../assets/js/fontawesome.js"></script>
    <!-- End Script -->

</body>

</html>