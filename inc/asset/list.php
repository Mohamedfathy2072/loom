        <?php $url_name_page = "https://".$_SERVER['HTTP_HOST']; ?>

                <?php if(!isset($_SESSION['email_member']) && !isset($_SESSION['password_member'])): ?>
                    <a class="cairo position-relative text-decoration-none me-4 icon-navbar" href="<?= $url_name_page; ?>/login/login.php">
                       <i class="fa-regular fa-fw fa-user text-dark mr-3"></i>
                    </a>
                
                <?php endif; ?>
                
                <?php if(isset($_SESSION['email_member']) && isset($_SESSION['password_member'])): ?>
                    <a class="cairo position-relative text-decoration-none me-4 icon-navbar"  href="<?= $url_name_page; ?>/inc/user.php"
                    <img src="<?= $url_name_page; ?>/assets/img/list_icon/loom_icon.png" style="width:35px;height: 37px;">
                        <i class="fa-regular fa-fw fa-user text-dark mr-3"></i>
                    </a>


                    <ul class="dropdown-menu dropdown-menu-white text-center shadow border-0 mb-5 p-2 bg-body rounded top-list-style" aria-labelledby="dropdownMenuButton2" style="z-index: 3 !important;">
                   
                        <li class="mt-2 text-end">
                            <a class="cairo dropdown-item text-secondary" href="<?= $url_name_page; ?>/page/acc.php">
                                <img src="<?= $url_name_page; ?>/assets/img/list_icon/loom_icon.png" class="float-end ms-2" width="26px">
                                <span class="cairo"><?= $_SESSION['first_name']; ?> </span>
                            </a>
                        </li>

                        <li class="mt-2">
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="cairo dropdown-item text-secondary" href="<?= $url_name_page; ?>/page/order.php">
                            <img src="<?= $url_name_page; ?>/assets/img/list_icon/talabat.png" class="float-end" style="width:28px;height:28px;">
                                الطلبات
                            </a>
                        </li>
                        
                        <li class="mt-2">
                            <a class="cairo dropdown-item text-secondary" href="<?= $url_name_page; ?>/page/addresses.php">
                            <img src="<?= $url_name_page; ?>/assets/img/list_icon/address.png" class="float-end" style="width:28px;height:28px;">
                                العناوين
                            </a>
                        </li>
                        
                        <li class="mt-2">
                            <a class="cairo dropdown-item text-secondary" href="<?= $url_name_page; ?>/page/cards.php">
                            <img src="<?= $url_name_page; ?>/assets/img/list_icon/loompay.png" class="float-end" style="width:28px;height:28px;">
                                البطاقات المحفوظة
                            </a>
                        </li>

                        <li class="mt-2">
                            <a class="cairo dropdown-item text-secondary" href="<?= $url_name_page; ?>/page/coupon.php">
                            <img src="<?= $url_name_page; ?>/assets/img/list_icon/coupon.png" class="float-end" style="width:28px;height:28px;">
                                اكواد الخصم                          
                            </a>
                        </li>
                        
                        <li class="mt-2">
                            <a class="cairo dropdown-item text-secondary" href="#">
                            <img src="<?= $url_name_page; ?>/assets/img/list_icon/chat.png" class="float-end" style="width:28px;height:28px;">
                                الرسائل                          
                            </a>
                        </li>
                        
                        <li class="mt-2">
                            <a class="cairo dropdown-item text-secondary" href="<?= $url_name_page; ?>/page/myheart.php">
                            <img src="<?= $url_name_page; ?>/assets/img/list_icon/heart.png" class="float-end" style="width:28px;height:28px;">
                                المفضلة
                            </a>
                        </li>
                        
                        <li class="mt-2">
                            <a class="cairo dropdown-item text-secondary" href="<?= $url_name_page; ?>/page/myheart.php">
                                <img src="<?= $url_name_page; ?>/assets/img/list_icon/flag-sa.png" class="float-end" style="width:26px;height:22px;">
                                English
                            </a>
                        </li>

                        <li class="mt-2">
                            <a class="cairo dropdown-item text-secondary" href="<?= $url_name_page; ?>/supports/support.php">
                            <img src="<?= $url_name_page; ?>/assets/img/list_icon/support.png" class="float-end" style="width:28px;height:28px;">
                                الدعم والمساعدة
                            </a>
                        </li>
                        
                        <li class="mt-2">
                            <hr class="dropdown-divider">
                        </li>

                        <li class="mt-2">
                            <a class="cairo dropdown-item text-secondary fs-6 p-0 m-0" href="<?= $url_name_page; ?>/login/logout.php">
                                تسجيل الخروج
                            </a>
                        </li>
                        
                    </ul>
                    </div>

                
                <?php endif; ?>