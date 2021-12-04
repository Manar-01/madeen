<!DOCTYPE html>
<html lang="en" dir="ltr">
<?php
session_start();
?>

<head>
  <meta charset="utf-8">
  <title>حسابي</title>
  <link rel="stylesheet" href="general.css">
  <link rel="icon" href="images/logo.png">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Tajawal&display=swap" rel="stylesheet">
</head>

<body>

  <a id="logo" href="index.html"><img src="images/logo.png" alt="logo" width="150" height="100"></a>
  <nav>
    <a href="index.php">الصفحة الرئيسية</a>
    <a href="about.php">عن مدين</a>
    <a href="orderProc.php">طريقة الطلب</a>
    <a href="faq.php">الاسئلة الشائعة</a>
    <a href="dpp.php"><i class="fa fa-fw fa-user"></i>حسابي</a>
  </nav>

  <!-- Start -->
  <h1 class="heading"><strong>الملف الشخصي</strong></h1>
  <form id="profile" action="dpp.html" method="post">
    <fieldset>
      <div class="forms-row">
        <div class="col-1">
          <label for="username"> اسم المستخدم</label>
        </div>
        <div class="col-2">
          <input type="text" name="usernamr" id="username" disabled>
        </div>

      </div>
      <div class="forms-row">
        <div class="col-1">
          <label for="usermobile"> رقم الهاتف</label>
        </div>
        <div class="col-2">
          <input type="tel" name="usermobile" id="usermobile" disabled>
        </div>
      </div>
      <div class="forms-row">
        <div class="col-1">
          <label for="email"> البريد الالكتروني</label>
        </div>
        <div class="col-2">
          <input type="email" name="email" id="email" disabled>
        </div>
      </div>
      <div class="forms-row">
        <div class="col-1">
          <label for="card"> رقم البطاقة البنكية</label>
        </div>
        <div class="col-2">
          <input type="text" name="card" id="card" disabled>
        </div>
      </div>
      <div class="forms-row col-3">
        <input class="button" type="submit" name="save" value="حفظ" disabled> <button class="button" type="button" name="edit" onclick="edit_func()">تعديل</button>
      </div>
    </fieldset>

  </form>

  <div class="forms-row">
    <div class="col-1 order-col">
      <h3>حالة الطلبات</h3>
    </div>
  </div>
  <div class="forms-row">
    <div class="col-1 order-col">
      <h2 id="check" style="color: #91CEC3;">لا توجد طلبات</h2>
    </div>
  </div>
  <div class="forms-row order-button">
    <a href="logout.php"><button class="button ordaring" type="button" name="logout"> تسجيل الخروج </button></a>
    <a href="ordering.php"><button class="button ordaring" type="button" name="ordering">تقدم الآن</button></a>
  </div>



  <footer>
    <small>جميع الحقوق محفوظة 2021</small><br>
    <a href="contactUs.html">تواصل معنا</a>
    <a href="faq.html">الاسئلة الشائعة</a>
  </footer>
  <script src="js/index.js"></script>
</body>

</html>
