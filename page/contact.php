<?php   
        require "../inc/config/db.php";
        
        if($_SERVER['REQUEST_METHOD'] == "POST"){
                // here send form
            if(isset($_POST['send'])){
                // here filter data
                $name = filter_var($_POST['name'],FILTER_SANITIZE_STRING);
                $email = filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
                $subject = filter_var($_POST['subject'],FILTER_SANITIZE_STRING);
                $message = filter_var($_POST['message'],FILTER_SANITIZE_STRING);
                // here check data
                if(empty($name) || empty($email) || empty($message)){
                    echo "<script>alert('رجاء املاء بيانات بشكل صحيح');<script>";
                }else{
                    // inset to database
                    @$sendDAta = $conn->prepare("INSERT INTO contact(full_name,email,subject,msg) VALUES(:full_name,:email,:subject,:msg)");
                    @$sendDAta->bindParam("full_name",$name);
                    @$sendDAta->bindParam("email",$email);
                    @$sendDAta->bindParam("subject",$subject);
                    @$sendDAta->bindParam("msg",$message);
                    if($sendDAta->execute()){
                        echo "<script>
                                    alert('تم ارسال بنجاح');
                                    document.location = 'contact.php';
                                </script>";
                    }
                }
            }
        }

        // here header page
        $pageName = "اتصل بنا";
        require "../inc/asset/header.php";
    ?>

    <!-- Start Content Page -->
    <div class="container-fluid bg-light py-5">
        <div class="col-md-6 m-auto text-center">
            <h1 class="h1">اتصل بنا</h1>
        </div>
    </div>

    <!-- Start Contact -->
    <div class="container py-5">
        <div class="row py-5">
            <form class="col-md-9 m-auto" method="POST" role="form">
                <div class="row">
                    <div class="form-group col-md-6 mb-3">
                        <label for="inputname">الاسم كامل</label>
                        <input type="text" class="form-control mt-1" id="name" name="name" placeholder="الاسم كامل" required>
                    </div>
                    <div class="form-group col-md-6 mb-3">
                        <label for="inputemail">البريد الكتروني</label>
                        <input type="email" class="form-control mt-1" id="email" name="email" placeholder="البريد الكتروني" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="inputsubject">موضوع</label>
                    <input type="text" class="form-control mt-1" id="subject" name="subject" placeholder="موضوع">
                </div>
                <div class="mb-3">
                    <label for="inputmessage">الرسالة</label>
                    <textarea class="form-control mt-1" id="message" name="message" placeholder="الرسالة" rows="8" required></textarea>
                </div>
                <div class="row">
                    <div class="col text-end mt-2">
                        <button type="submit" class="btn btn-dark px-3" name="send">ارسال</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- End Contact -->

    <?php require "../inc/asset/footer.php"; ?>

    <!-- Start Script -->
    <script src="../assets/js/jquery-1.11.0.min.js"></script>
    <script src="../assets/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/templatemo.js"></script>
    <script src="../assets/js/fontawesome.js"></script>
    <script src="../assets/js/custom.js"></script>
    <!-- End Script -->
</body>

</html>