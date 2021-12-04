<!DOCTYPE html>
<html>
<?php
session_start();
?>

<head>
  <meta charset="utf-8" />
  <title>عن مدين</title>
  <script type="text/javascript" src="js/index.js"></script>
  <link rel="icon" href="images/logo.png">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Tajawal&display=swap" rel="stylesheet">
</head>

<body>
  <?php

  //تسجيل الدخول

  if (isset($_POST['login'])) {
    include 'connec.php'; //يتصل بقاعدة البيانات
    $nat2 = $_POST['nationalId1']; //يخزن البيانات اللي دخلها اليوزر
    $pass2 = $_POST['password'];
    $error;
    //يبحث في جدول الدائن
    $stm1 = $conn->prepare("SELECT * FROM creditior WHERE nationalID = '$nat2'");
    $stm1->execute();
    $data1 = $stm1->fetch();
    //يبحث في جدول المدين
    $stm2 = $conn->prepare("SELECT * FROM debitor WHERE nationalID = '$nat2'");
    $stm2->execute();
    $data2 = $stm2->fetch();
    if (!$data1 && !$data2) {  //إذا مالقاه في الجدولين
      $error = "رقم الهوية الوطنية غير صحيح";
    } else if ($data1) { // الهوية للدائن
      $password_hash1 = $data1['password'];
      if (strcmp($pass2, $password_hash1)) {
        $_SESSION['id1'] = $nat2;
      } else
        $error =  "كلمة المرور غير صحيحة";
    } else if ($data2) { //رقم الهوية للمدين
      $password_hash2 = $data2['password'];
      if (strcmp($pass2, $password_hash2)) {
        $_SESSION['id2'] = $nat2;
      }
    } else
      $error =  "كلمة المرور غير صحيحة";
  }
  ?>



  <a id="logo" href="index.php"><img src="images/logo.png" alt="logo" width="150" height="100"></a>
  <nav>
    <a href="index.php">الصفحة الرئيسية</a>
    <a href="about.php">عن مدين</a>
    <a href="orderProc.php">طريقة الطلب</a>
    <a href="faq.php">الاسئلة الشائعة</a>
    <?php

    if (!isset($_SESSION['id1']) && !isset($_SESSION['id2']))
      echo ' <a href="#" onclick="document.getElementById(\'id01\').style.display=\'block\' "><i class="fa fa-fw fa-user"></i> تسجيل الدخول</a>';
    else if (isset($_SESSION['id1']))
      echo '<a href=cpp.php><i class="fa fa-fw fa-user"></i> حسابي</a>';
    else if (isset($_SESSION['id2']))
      echo '<a href=dpp.php><i class="fa fa-fw fa-user"></i> حسابي</a>';
    ?>

  </nav>

  <div id="id01" class="modal">
    <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>

    <div class="modal-content animate">
      <form id="signin" action="about.php" method="post">
        <img src="images/login.png" width="100" height="100">
        <div class="row">
          <div class="col-1">
            <label for="nationalId1"> الهوية الوطنية</label>
            <span id="massege" style="color:red; font-size:0.8em;"></span>
          </div>
          <div class="col-2">
            <input type="text" id="user_name" name="nationalId1" placeholder="أدخل رقم الهوية الوطنية " min="3" size="10" autofocus required>
          </div>
        </div>

        <div class="row">
          <div class="col-1">
            <label for="pasword"> كلمة المرور</label>
          </div>
          <div class="col-2">
            <input type="password" id="password" name="password" placeholder="أدخل كلمة المرور" min="8" required>
          </div>
        </div>
        <div class="row">
          <div class="col-1">
            <label for="remember">تذكرني لاحقًا</label>
            <input type="checkbox" name="remember" value="true" checked>
          </div>
        </div>

        <div class="row">
          <div class="col-3">
            <b style="color: red;">
              <?php
              if (isset($error)) {
                if (!empty($error)) {
                  echo $error;
                }
              }
              echo '</b>';
              ?>
              <a href="createAcc.php"><button class="button" type="button" name="button">إنشاء حساب</button></a>
              <input class="button" type="submit" name="login" value="دخول">
          </div>
        </div>

      </form>
    </div>
  </div>

  <!-- Start -->
  <div>
    <h1 class="heading underlined-heading"> عن مدين</h1>
    <!--<hr class="line-heading"> -->
    <p class="top-p">
      نقدم المساندات اليوم بشكل مختلف حيث نعتمد على التقنيات لحل العادات
      التقليدية، فنحن موقع عربي يسهم في تسهيل عملية التديّن بأسلوب أمثل
    </p>
  </div>

  <!-- Goals section -->
  <div class="row">
    <h1 class="heading underlined-heading centeral-heading"> الأهـــداف</h1>
  </div>
  <div class="row">
    <span class="col r1-col">رفع مستوى الموثوقية <img src="images/handicon.png" alt="icon" width="40" height="40" /></span>
    <span class="col r1-col">تعزيز <img src="images/handicon.png" alt="icon" width="40" height="40" /></span>
    <span class="col r1-col">تمكين <img src="images/handicon.png" alt="icon" width="40" height="40" /></span>
  </div>
  <div class="row">
    <span class="col">و الشفافية للعمل الخيري</span>
    <span class="col">قيم الأنتماء الوطني <br /> و العمل الإنساني للفرد</span>
    <span class="col">القطاع غير الربحي <br /> وتوسيع أثره</span>
  </div>


  <footer>
    <small>جميع الحقوق محفوظة 2021</small><br>
    <a href="contactUs.html">تواصل معنا</a>
    <a href="faq.html">الاسئلة الشائعة</a>
  </footer>
  <script type="text/javascript" src="js/index.js"></script>
</body>

</html>
