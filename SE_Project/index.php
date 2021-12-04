<!DOCTYPE html>
<html lang="en" dir="ltr">
<?php
session_start();
?>

<head>
  <meta charset="utf-8">
  <title>الصفحة الرئيسية</title>
  <link rel="icon" href="images/logo.png">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Tajawal&display=swap" rel="stylesheet">
  <script type="text/javascript" src="js/index.js"></script>
</head>

<body>

  <?php

  //تسجيل الدخول
  if (!isset($_SESSION['id1']) && !isset($_SESSION['id2'])) {
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
        } else {
          $error =  "كلمة المرور غير صحيحة";
        }
      } else if ($data2) { //رقم الهوية للمدين
        $password_hash2 = $data2['password'];
        if (strcmp($pass2, $password_hash2)) {
          $_SESSION['id2'] = $nat2;
        } else {
          $error =  "كلمة المرور غير صحيحة";
        }
      }
    }
  }
  ?>



  <a id="logo" href=""><img src="images/logo.png" alt="logo" width="150" height="100"></a>
  <nav>
    <a href="">الصفحة الرئيسية</a>
    <a href="about.php">عن مدين</a>
    <a href="orderProc.php">طريقة الطلب</a>
    <a href="faq.php">الاسئلة الشائعة</a>

    <?php
    if (!isset($_SESSION['id1']) && !isset($_SESSION['id2']))
      echo '<a href=#sign-form><i class="fa fa-fw fa-user"></i> تسجيل الدخول</a>';
    else if (isset($_SESSION['id1']))
      echo '<a href=cpp.php><i class="fa fa-fw fa-user"></i> حسابي</a>';
    else if (isset($_SESSION['id2']))
      echo '<a href=dpp.php><i class="fa fa-fw fa-user"></i> حسابي</a>';
    ?>

  </nav>


  <?php

  if (!isset($_SESSION['id1']) && !isset($_SESSION['id2'])) {
    echo ' <div class="sign-form" >
    <img src="images/login.png" width="100" height="100">
    <form id="signin" action="" method="post">

      <div class="row">
        <div class="col-1">
          <label for="nationalId1"> رقم الهوية الوطنية</label>
          <span id="massege" style="color:red; font-size:0.8em;"></span>
        </div>
        <div class="col-2">
          <input type="text" id="user_name" name="nationalId1" placeholder="أدخل رقم الهوية الوطنية " min="3" size="10" autofocus required>
        </div>
      </div>

      <div class="row">
        <div class="col-1">
          <label for="password"> كلمة المرور</label>
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
         <b id="cardmsg">  ';
    if (isset($error)) {
      if (!empty($error))
        echo $error;
    }

    echo '
           </b>

      <div class="row col-3">
        <a href="createAcc.php"><button class="button" type="button" name="button">إنشاء حساب</button></a>
        <input class="button" name="login" type="submit" value="دخول">

      </div>

    </form>
  </div>';
  }
  ?>

  <!-- Start -->
  <!--
  <div class="sign-form" >
    <img src="images/login.png" width="100" height="100">
    <form id="signin" action="" method="post">

      <div class="row">
        <div class="col-1">
          <label for="nationalId1"> رقم الهوية الوطنية</label>
          <span id="massege" style="color:red; font-size:0.8em;"></span>
        </div>
        <div class="col-2">
          <input type="text" id="user_name" name="nationalId1" placeholder="أدخل رقم الهوية الوطنية " min="3" size="10" autofocus required>
        </div>
      </div>

      <div class="row">
        <div class="col-1">
          <label for="password"> كلمة المرور</label>
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
         <b id="cardmsg">  <?php
                            if (isset($error)) {
                              if (!empty($error))
                                echo $error;
                            }
                            ?> </b>

      <div class="row col-3">
        <a href="createAcc.html"><button class="button" type="button" name="button">إنشاء حساب</button></a>
        <input class="button" name="login" type="submit" value="دخول">

      </div>

    </form>
  </div>
-->


  <div>
    <h1 class="heading underlined-heading"> : مدين </h1>
    <p class="top-p"> نقدم المساندات اليوم بشكل مختلف حيث نعتمد على التقنيات لحل العادات التقليدية، فنحن موقع عربي يسهم في تسهيل عملية الاستدانة بأسلوب أمثل </p>
  </div>

  <?php
  include 'connec.php';
  $stmt = $conn->prepare("SELECT * FROM madeen.order WHERE status= 'unaccept'");
  $stmt->execute();
  $result = $stmt->fetchAll();
  if (!empty($result) && !isset($_SESSION['id2'])) {
    if (isset($_SESSION['id1'])) {
      echo '<div class="home" style="padding:9em 0 0 0;">';
    } else {
      echo '<div class="home">';
    }
    $j = 0;
    foreach ($result as $i) {
      if ($j < 3 && !empty($i)) {
        echo ' <div class="col">
                  <div class="order-card ' . $i["type"] . '">
                    <img src="images/' . $i["type"] . '.png" alt="' . $i["type"] . '">
                    <span><strong>رقم الطلب:</strong></span>
                    <span>' . $i["orderID"] . '</span><br>
                    <span> المبلغ:</span>
                    <span>' . $i["whole"] . '</span><br>
                    <span> نوع الدفع:</span>
                    <span>' . $i["paymentway"] . '</span><br>';
        if (isset($_SESSION['id1'])) {
          echo '<a href="orderDetails.php">مساندة الحالة</a>';
        } else {
          echo '<a href="#signin" onclick="checksingin();">مساندة الحالة</a>';
        }
        echo '
                  </div>
                </div>
                ';
      } else {
        break;
      }
      $j++;
    }
    echo '<footer>
            <small>جميع الحقوق محفوظة 2021</small><br>
            <a href="contactUs.html">تواصل معنا</a>
            <a href="faq.html">الاسئلة الشائعة</a>
          </footer>';
  } else {
    echo '<footer style="padding-top: 20em;">
            <small>جميع الحقوق محفوظة 2021</small><br>
            <a href="contactUs.html">تواصل معنا</a>
            <a href="faq.html">الاسئلة الشائعة</a>
          </footer>';
  }
  ?>


  <script type="text/javascript" src="js/index.js"></script>
</body>

</html>
