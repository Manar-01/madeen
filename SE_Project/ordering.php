<!DOCTYPE html>
<html lang="en" dir="ltr">
<?php
session_start();
?>

<head>
  <meta charset="utf-8">
  <title>الطلبات</title>
  <link rel="icon" href="images/logo.png">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Tajawal&display=swap" rel="stylesheet">
  <script type="text/javascript" src="js/index.js"></script>
</head>

<body>


  <a id="logo" href="index.html"><img src="images/logo.png" alt="logo" width="150" height="100"></a>
  <nav>
    <a href="index.php">الصفحة الرئيسية</a>
    <a href="about.php">عن مدين</a>
    <a href="orderProc.php">طريقة الطلب</a>
    <a href="faq.php">الاسئلة الشائعة</a>
    <a href="dpp.حاح"><i class="fa fa-fw fa-user"></i> حسابي</a>
  </nav>


  <legend class="heading"><strong>تقديم الطلب</strong></legend>
  <form>
    <div class="row-2">
      <div class="colFaq1">
        <div class="forms-row">
          <h3> :السبب</h3>
          <label class="count"><input type="radio" checked="checked" name="checked" value="أخرى" />
            أخرى
          </label>
          <label class="count"><input type="radio" checked="checked" name="checked" value="مشروع" />
            مشروع
          </label>
          <label class="count"><input type="radio" checked="checked" name="checked" value="دراسة" />
            دراسة
          </label>
          <label class="count"><input type="radio" checked="checked" name="checked" value="علاج" />
            علاج
          </label>
        </div>
      </div>

      <div class="colFaq2">
        <div class="forms-row">
          <div class="col-1">
            <h3>:المبلغ</h3>
          </div>
          <div class="col-2">
            <input class="count" type="text" name="المبلغ">
          </div>
        </div>
        <div class="forms-row">
          <div class="col-1">
            <h3>نوع السداد</h3>
          </div>
          <div class="col-2">
            <label class="count"><input type="radio" checked name="checked" value="أقساط" />
              أقساط
            </label>
            <label class="count"><input type="radio" name="checked" value="دفعة كاملة" />
              دفعة كاملة
            </label>
          </div>
        </div>
        <div class="forms-row">
          <div class="col-1">
            <h3>تاريخ السداد</h3>
          </div>
          <div class="col-2">
            <input class="count" type="date" id="date">
          </div>
        </div>
      </div>
      <div class="forms-row">
        <h3><strong>تفاصيل السبب</strong></h3>
        <textarea id="textview" name="textview" rows="10" cols="80"></textarea>
      </div>
    </div>

    <div class="forms-row col-3">
      <input class=" button" type="submit" name="ordering" value="تقديم الطلب" onclick="window.location.href = 'dpp.html';">
    </div>
  </form>


  <footer>
    <small>جميع الحقوق محفوظة 2021</small><br>
    <a href="contactUs.html">تواصل معنا</a>
    <a href="faq.html">الاسئلة الشائعة</a>
  </footer>
  <script type="text/javascript" src="js/index.js"></script>
</body>
