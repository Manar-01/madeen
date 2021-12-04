<!DOCTYPE html>
<html lang="ar" dir="rtl">
<?php
session_start();
?>

<head>
  <meta charset="utf-8" />
  <title>الأسئلة الشائعة</title>
  <link rel="icon" href="images/logo.png">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
      if ($pass2 == $password_hash1) {
        $_SESSION['id1'] = $nat2;
      } else
        $error =  "كلمة المرور غير صحيحة";
    } else if ($data2) { //رقم الهوية للمدين
      $password_hash2 = $data2['password'];
      if ($pass2 == $password_hash2) {
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
    <span onclick="document.getElementById('id01').style.display='none'" class=" close" title="Close Modal">&times;</span>
    <div class="modal-content animate">
      <form id="signin" action="" method="post">
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
            <b id="cardmsg"> <?php
                              if (isset($error)) {
                                if (!empty($error))
                                  echo $error;
                              }
                              ?> </b>

            <a href="createAcc.php"><button class="button" type="button" name="button">إنشاء حساب</button></a>
            <input class="button" type="submit" name="login" value="دخول">
          </div>
        </div>

      </form>
    </div>
  </div>


  <!-- Start -->
  <h1 class="heading centeral-heading">الأسئلة الشائعة</h1>

  <div class="row">
    <div class="colFaq1">
      <ul>
        <li>هل تظهر بيانات الدائن للمدين ؟ </li>
        <p>- يوفر مدين الخصوصية التامة لكلا الطرفين</p>


        <li>ما هي المعايير التي يجب توفرها للمدين ؟</li>
        <p>- الالتزام بالسداد في الوقت المحدد</p>
        <p>-توفر مصدر للدخل</p>
        <p>-صلاحية البطاقة البنكية</p>


        <li>كيف يتم تقسيم المبلغ لأقساط ؟</li>
        <p>- يوفر مدين خاصية الحاسبة لتقسيم المبلغ على عدد الأشهر المعنية</p>

      </ul>
    </div>

    <div class="colFaq2">
      <ul>
        <li>ما الحد الأعلى و الأدنى للدين ؟</li>
        <p>- الحد الأدنى 50 ريال</p>
        <p>- الحد الأعلى 3000 ريال</p>


        <li>ما هي أهداف مدين ؟</li>
        <p>- تمكين القطاع غير الربحي وتوسيع أثره</p>
        <p>- تعزيز قيم الإنتماء الوطني و العمل اللإنساني</p>
        <p>- رفع مستوى الموثوقية و الشفافية للعمل الخيري</p>



      </ul>
    </div>

  </div>

  <a href="contactUs.html" class="link">لم أجد سؤالي : يمكنك التواصل معنا هنا</a>


  <footer class="footer">
    <small>جميع الحقوق محفوظة 2021</small><br>
    <a href="contactUs.html">تواصل معنا</a>
    <a href="faq.html">الاسئلة الشائعة</a>
  </footer>
  <script type="text/javascript" src="js/index.js"></script>
</body>

</html>
