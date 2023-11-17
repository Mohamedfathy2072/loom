<?php 
    $pageName = "شروط البيع على لوم";
    require "../inc/asset/header.php";

    if(isset($_POST['btn'])){
        $country = filter_var($_POST['country'],FILTER_SANITIZE_STRING);
        if($country == "sa"){
            echo "<script>
                    document.location = 'depetment_merchant.php';
                </script>";
        }else{
            echo "<script>
                     document.location = 'coming.php';
                </script>".'sdsd';
        }
    }

?>
    <section class="py-5">
        <div class="container">
            <div class="row">

                <div class="col-lg-12">
                    <h2 class="cairo">شروط البيع على لوم</h2>
                    <h5 class="cairo text-secondary">يحق لك التسجيل والبيع على موقع لوم</h5>
                </div>

                <div class="col-lg-12 mt-5">

                    <p class="cairo title-09rem mb-2 text-secondary">
                        بعد تسجيلك في الموقع يصبح لديك صفحة خاصة لاضافة المنتجات وإدارة جميع الطلبات الخاصة بك وطلب تحويل المدفوعات المالية إلى حسابك البنكي
                    </p>
                    
                    <p class="cairo title-09rem">
                        المستندات المطلوبة للأفراد والمؤسسات والشركات سوف تظهر جميع الطلبات بعد النقر على موافق شرط تطابق جميع المستندات إذا لم يتم تطابق المستندات سوف يتم رفض الاشتراك                    
                    </p>

                </div>

                <div class="col-lg-12 mt-5">
                    <h3 class="cairo">يحق لك بيع منتجاتك على موقعنا</h3>

                    <h6 class="cairo fw-bold mt-4">الشروط والإحكام:</h6>

                    <ul class="mt-3">
                        <li class="cairo text-secondary title-09rem">للتسجيل على الموقع ستحتاج إلى تقديم بعض المعلومات ولن يتم قبول تسجيلك في الموقع إذا لم يتم تقديم المعلومات اللازمة لنا. لدينا الحق في رفض أي من عمليات التسجيل دون إبداء الأسباب. كما يحق لنا أيضا القيام بعمليات التحقق اللازمة للتأكد من هويتك ومتطلبات التسجيل.</li>
                        <li class="cairo text-secondary title-09rem">وبمجرد الانتهاء من التسجيل بنجاح. يستمر التسجيل الخاص بك لفترة غير محددة خاضعاً تعليقه أو إلغائه الالتزامات الخاصة بك</li>
                    </ul>

                    <h6 class="cairo fw-bold mt-4">عند استخدامك للخدمات أو وصولك إليها، فأنت توافق على ما يلي:</h6>

                    <ul class="mt-3">
                        <li class="cairo text-secondary title-09rem">مسؤوليتك عن الحفاظ على الخصوصية وتقييد الوصول إلى الحساب الخاص بك واستخدامه هو وكلمة المرور. الموافقة على تحمل مسؤولية جميع الأنشطة التي تتم باسم الحساب الخاص بك وكلمة المرور الخاصة بك.</li>
                        <li class="cairo text-secondary title-09rem">لموافقة على إخطارنا فورا عن اي استخدام غير مصرح به لكلمة المرور أو الحساب الخاص بك أو أي خرق أخر لمعايير الاستخدام الآمن للموقع.</li>
                        <li class="cairo text-secondary title-09rem">تقديم المعلومات الكاملة والحقيقة والدقيقة عن نفسك وعن استخدامك للخدمات كما هو محدد من قلبنا.</li>
                        <li class="cairo text-secondary title-09rem">عدم الإفصاح على معلومات الخاصة بك للغير فقط لما هو محدد من قبلنا عن معلومات المستخدم المقدمة لك.</li>
                        <li class="cairo text-secondary title-09rem">التعاون مع الطلبات الصادرة عنا للحصول على معلومات إضافية فيما يتعلق بأهليتك واستخدامك لخدماتنا</li>
                        <li class="cairo text-secondary title-09rem"></li>
                    </ul>

                    
                    <h2 class="cairo mt-5">تنويه</h2>
                    <h6 class="cairo fw-bold mt-4">نشر أو إدراج أو تحميل أي من المحتويات أو المواد غير المناسبة أو المحظورة في موقعنا بما في ذلك :</h6>

                    <ul>
                        <li class="cairo text-danger title-09rem">المحتوى أو المواد غير الملائمة أخلاقيا أودينياً بأي شكل من الأشكال .</li>
                        <li class="cairo text-danger title-09rem">المحتوى أو المواد التي لا تتوافق مع القانون المحلي والشريعة الإسلامية والقواعد والأخلاق والقيم والآداب والتقاليد.</li>
                        <li class="cairo text-danger title-09rem">المحتوى أو المواد التي تهدد الأمن القومي.</li>
                        <li class="cairo text-danger title-09rem">المحتوى أو المواد التي قد تروج أو تندرج في أطار المقامرة.</li>
                        <li class="cairo text-danger title-09rem">الأوراق المالية، بما في ذلك الأسهم أو السندات أو الصكوك أو أي من الأوراق المالية الأخرى أو أي من الأصول.</li>
                        <li class="cairo text-danger title-09rem">المخلوقات الحية أو غيرها وأي جزء من أي حيوان تم الاحتفاظ به أو الحفاظ عليه بأي من الوسائل الصناعية أو الطبيعية.</li>
                        <li class="cairo text-danger title-09rem"> يمنع بيع الأسلحة أو جزء منها.</li>
                        <li class="cairo text-danger title-09rem">الخمر ومنتجات التبغ والمخدرات والمواد المؤثرة على العقل والمواد المنومة والمسكرات بأي من أنواعها والأدوية الطبية.</li>
                        <li class="cairo text-danger title-09rem">المواد التي تكون معيبة أو مغشوشة و تالفة أو مضللة أو قد تسبب ضررا عند استخدمها بشكل طبيعي لمصلحة مستخدم آخر للموقع أو لصحته.</li>
                        <li class="cairo text-danger title-09rem">قسائم غير قابلة للتحويل .</li>
                        <li class="cairo text-danger title-09rem">المواد الكيميائية.</li>
                        <li class="cairo text-danger title-09rem">نشر المواد التي لا يحق لك مشاركة الرابط الخاص بها أو إدراجها .</li>
                        <li class="cairo text-danger title-09rem">نشر المواد المزيفة أو المسروقة.</li>
                        <li class="cairo text-danger title-09rem">خرق القانون أو التحايل عليه أو خرق أي من حقوق الغير أو الأنظمة الخاصة بنا أو السياسات أو خرق القرارات المتعلقة بحالة الحساب الخاصة بك.</li>
                        <li class="cairo text-danger title-09rem">استخدام الخدمات إذا لم تعد تستوفي معايير أهلية الاستخدام أو كنت غير قادر على إبرام عقود ملزمة قانونياً أو تم إيقاف حسابك بشكل مؤقت أو لأجلٍ غير مسمى.</li>
                        <li class="cairo text-danger title-09rem">عدم تسديد ثمن منتجاتك التي قمت بشرائها الا اذا كان هناك سبب يمنع ذلك ويؤيد ذلك من السياسات الخاصة بنا.</li>
                        <li class="cairo text-danger title-09rem">عدم تسليم العملاء المنتجات التي قمت ببيعها إذا انطبق ذلك الا إذا كان هناك سبب يؤيد ذلك ومذكور في الشروط الخاصة بنا.</li>
                        <li class="cairo text-danger title-09rem">استخدام معلومات الاتصال المقدمة لك أثناء الاتفاقية عبر الموقع لمحاولة زيادة مبيعاتك خارج حدود الموقع أو عبر مواقع أخرى. – التلاعب في سعر أي من المنتجات.</li>
                        <li class="cairo text-danger title-09rem">التدخل في القوائم الخاصة بالمستخدمين الاخرين .</li>
                        <li class="cairo text-danger title-09rem"> نشر محتوى خاطئ أو غير دقيق أو مضلل أو مخادع وما شابه ذلك .</li>
                        <li class="cairo text-danger title-09rem">نشر الرسائل أو المراسلات الإلكترونية غير المرغوب فيها وما الى ذلك .</li>
                        <li class="cairo text-danger title-09rem">نشر الفيروسات أو أي من التقنيات المضرة التي تضر بخوادمنا أو بالمستخدمين والبائعين الأخرين وأملاكهم</li>
                        <li class="cairo text-danger title-09rem">خرق القوانين .</li>
                        <li class="cairo text-danger title-09rem">القانونين الخاصة بحقوق النشر التجارية او الحقوق الخاصة بالملكية الفكرية.</li>
                        <li class="cairo text-danger title-09rem"> جمع معلومات المستخدمين دون الحصول على موافقة منهم .</li>
                        <li class="cairo text-danger title-09rem">التحايل على الأنظمة التي نتبعها في تقديم الخدمات</li>
                    </ul>

                </div>

                <div class="col-lg-12 mt-5">
                    
                    <p class="bg-light cairo title-09rem py-2">
                        <span class="fw-bold">ملاحظة:</span>
                            يمكنك التسجيل والبيع معنا خلال  النقرعلى موافق علماً أنه عند النقر على موافق أنت توافق على الشروط والأحكام في الأعلى.
                    </p>


                </div>

                <div class="col-lg-12 d-flex mt-3">

                <form method="POST">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="country" id="flexRadioDefault1" value="sa" checked>
                        <label class="form-check-label" for="flexRadioDefault1">
                            المملكة العربية السعودية
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="country" id="flexRadioDefault2" value="other">
                        <label class="form-check-label" for="flexRadioDefault2">
                            دول العالم الأخرى
                        </label>
                    </div>

                       <div class="mt-4">
                            <button class="btn btn-dark cairo" type="submit" name="btn">موافق</button>
                       </div>
                </form>


                </div>

            </div>
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
<!-- End Script -->
</body>

</html>