<?php

include "connection.php";

session_start();

$sqlc = "SELECT * FROM notice where area='header'";
$resultc = $conn->query($sqlc);
$_Notice="";
if ($resultc->num_rows > 0) {
 
  while($row = $resultc->fetch_assoc()) {

    $_Notice=$row["text"];
  }    

}


?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="frontend/assets/imgs/logo1.ico">
    <meta name="_token" content="vInpwhT7RLeMSdzcQTJpDmEsvpTJlFzHjADXT1LR">
    <meta name="token" content="vInpwhT7RLeMSdzcQTJpDmEsvpTJlFzHjADXT1LR">
    <meta name="csrf-token" content="vInpwhT7RLeMSdzcQTJpDmEsvpTJlFzHjADXT1LR">
    <title>Krishok BD</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

    <link href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" rel="stylesheet">
    <!--Toaster-->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <link rel="stylesheet" href="assets/css/tiny-slider.css">
    <link rel="stylesheet" href="assets/css/jQuery-mooZoom-1.0.0.css">
    <link rel="stylesheet" href="assets/css/venobox.min.css" type="text/css" media="screen">
    <!-- Yajira DataTables -->
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css">
    <link rel="stylesheet" href="assets/css/select2.css">
    <link rel="stylesheet" href="assets/css/cssanimation.min.css">
    <link rel="stylesheet" href="assets/css/custom.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/cards.css">
    <style>
    </style>
</head>


<body>
    <!-- Messenger Chat Plugin Code -->
    <div id="fb-root"></div>

    <!-- Your Chat Plugin code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>

    <script>
        var chatbox = document.getElementById('fb-customer-chat');
        chatbox.setAttribute("page_id", "109923401374636");
        chatbox.setAttribute("attribution", "biz_inbox");
    </script>

    <!-- Your SDK code 
    <script>
        window.fbAsyncInit = function() {
            FB.init({
                xfbml: true,
                version: 'v14.0'
            });
        };

        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
    <!-- Begin page -->
    <!-- loader Start -->
    <div id="loading">
        <div id="loading-center">

        </div>
    </div>
    <!-- loader END -->
    <!-- header section start -->
    <div class="backdrop"></div>
    <!-- Header Section -->
    <header>
        <div class="dam-main-header">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <nav class="navbar navbar-expand-lg navbar-light">
                            <a href="#" class="navbar-brand dam-brand-logo">
                            <img src="assets/images/logo/logo1.png" alt="DAM Logo" style="width: 80px; height: 68px; ">
                        </a>
                            <div>
                                <div class="d-inline-block d-sm-none">
                                    <div class="d-inline-block">
                                        <i id="toggle-search" class="fas fa-search"></i>
                                        <input style="display:none;" id='searchBar' name='search' type='search' placeholder='অনুসন্ধান করুন&hellip;'>
                                        <i style="display:none;" id="closeSearch" class="fas fa-times"></i>
                                    </div>
                                    <div class="mob-header-cart">
                                        <a href="#" onclick="OpenCart()" title="Cart">
                                        <i class="fas fa-shopping-cart"></i>
                                        <sup class="item_amount_cart d-none">0</sup>
                                        <!-- <small>কার্ট</small> -->
                                    </a>
                                    </div>
                                </div>
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            </div>
                            <div class="collapse navbar-collapse dam-main-manu" id="navbarSupportedContent">
                                <ul class="navbar-nav mr-auto">
                                    <li class="nav-item active">
                                        <a class="nav-link active" href="index.php" data-hover="হোম">হোম</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#" data-hover="নোটিশ ">নোটিশ </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" onclick="online_payment()" data-hover="নোটিশ ">অনলাইন পেমেন্ট </a>
                                    </li>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#" data-hover="আমার প্রোফাইল">আমার প্রোফাইল</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#" data-hover="আবহাওয়া রিপোর্ট">আবহাওয়া রিপোর্ট</a>
                                    </li>
                                    <!-- <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" data-hover="ম্যানুয়াল" role="button" data-toggle="dropdown" aria-expanded="false">
                                        ম্যানুয়াল
                                    </a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#"></a>
                                        <a class="dropdown-item" href="#"></a>
                                        <a class="dropdown-item" href="#"></a>
                                        <a class="dropdown-item" href="#">/a>
                                        <a class="dropdown-item" href="#"></a>
                                    </div>
                                </li> -->
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" data-hover="অন্যান্য " role="button" data-toggle="dropdown" aria-expanded="false">
                                        অন্যান্য
                                    </a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#">অ্যাপ শেয়ার করুন</a>
                                        <a class="dropdown-item" href="#">অ্যাপ রেটিং</a>
                                        <a class="dropdown-item" href="#">আমাদের সম্পর্কে</a>
                                        <a class="dropdown-item" href="#">Contact us</a>
                                        
                                    </div>
                                </li>
                                </ul>
                                <ul class="dam-header-manu search">

                                    <li class="header-cart d-none d-sm-block">
                                        <a href="#" onclick="OpenCart()" title="Cart">
                                        <i class="fas fa-shopping-cart"></i>
                                        <!-- <i class="ri-shopping-cart-line"></i> -->
                                        <sup class="item_amount_cart d-none">0</sup>
                                        <!-- <small>কার্ট</small> -->
                                    </a>
                                    </li>
                                <?php if(isset($_SESSION["user_id"])) {
$user_name="";
$user_id= $_SESSION["user_id"];
$sql = "SELECT * FROM users_registration where id='$user_id' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $user_name=$row["name"];
  }
}

echo "<span class='header-login-section'>
".$user_name."
</span>";
} 
                                   else {
                                   ?>
                                <span class="header-login-section">
                                    <a  class="login btn-sm animated pulse" onclick="login()"><i class="fas fa-sign-in-alt"></i> লগইন</a>
                                    <a  class="signup btn-sm" onclick="registration()"><i class="fas fa-user-plus"></i> নিবন্ধন করুন</a>
                                </span>
                                <?php } ?>
                                    <!-- <li class="header-cart" >
                                    <a href="#" onclick="OpenCart()" title="Cart">
                                        <i class="fas fa-shopping-cart"></i>
                                        <sup class="item_amount_cart d-none">0</sup>
                                        Cart
                                    </a>
                                </li>
                                 -->
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="marquee-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <marquee onmouseover="this.stop();" onmouseout="this.start();">
                            

                              <a href="#">
                              <?php
                                  echo "<span style='color: red;'>".$_Notice."</span>";
                                ?>
                            </a> </marquee>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <hr>
<div id="Content" style="min-height: 600px !important;">
    <!-- cart sidebar start -->
    <aside class="dam-cart-sidebar">
        <div class="cart-header">
            <div class="cart-total"><i class="fas fa-shopping-basket"></i><span class="mr-2">মোট </span> <span class="item_amount_cart2">  </span><span> টি আইটেম</span></div>
            <button onclick="CloseCart()" class="cart-close"><i class="fas fa-times"></i></button>
        </div>
        <ul class="cart-list">

        </ul>
        <div class="cart-footer">
            <a class="cart-checkout-btn" href="javascript:void(0)" id="logCheck">
            <span class="checkout-label">চেকআউট</span>
        </a>
        </div>
    </aside>
    <!-- cart sidebar end -->
    <!-- header section end -->

    <main class="main-wrapper bg-light">
        <!-- Slider Section Start-->
        <!-- Slider Section -->
        <section class="dam-home-slider">
            <ul class="control" id="home-control">
                <li class="prev">
                    <i class="fas fa-angle-left fa-2x"></i>
                </li>
                <li class="next">
                    <i class="fas fa-angle-right fa-2x"></i>
                </li>
            </ul>
            <div class="home-slider dam-event-slider">
              
                <a href="javascript:" class="dam-slide-item d-none">
                        <img src="assets/images/slider/slider 2.png" alt="home slider image">
                    </a>
                <a href="javascript:" class="dam-slide-item d-none">
                        <img src="assets/images/slider/slider 3.png" alt="home slider image">
                    </a>
                      <a href="javascript:" class="dam-slide-item">
                        <img src="assets/images/slider/slider 1.png" alt="home slider image">
                    </a>
            </div>
        </section>
        <!-- Entry Button Section -->
        <section id="categories" class="py-5">
            <div class="container-fluid">
                <h2 class="text-center section-title mb-4">বাজার ডিরেক্টরি</h2>
                <div class="row justify-content-center">
                    <div class="col-2 col-responsive" onclick="GetTodaysMarketPrice('Daily')">
                        <div class="feature-card">
                            <img src="assets/images/cart/cart1.png" alt="Feature 1" class="card-img">
                            <h4 class="mt-2">আজকের বাজার দর</h4>
                        </div>
                    </div>
                    <div class="col-2 col-responsive" onclick="GetTodaysMarketPrice('Weekly')">
                        <div class="feature-card">
                            <img src="assets/images/cart/cart2.png" alt="Feature 2" class="card-img">
                            <h4 class="mt-2">সপ্তাহের বাজার দর</h4>
                        </div>
                    </div>
                    <div class="col-2 col-responsive"  onclick="GetTodaysMarketPrice('Graph')">
                        <div class="feature-card">
                            <img src="assets/images/cart/cart3.png" alt="Feature 3" class="card-img">
                            <h4 class="mt-2">সর্বোচ্চ ও সর্বনিম্ন দরের আঞ্চলিক গ্রাফ</h4>
                        </div>
                    </div>
                    <div class="col-2 col-responsive" >
                        <div class="feature-card">
                            <img src="assets/images/cart/cart4.png" alt="Feature 4" class="card-img">
                            <h4 class="mt-2">কৃষক ও ব্যবসায়ী প্রফিট লিস্ট</h4>
                        </div>
                    </div>
                    <div class="col-2 col-responsive"  onclick="GetTodaysMarketPrice()">
                        <div class="feature-card">
                            <img src="assets/images/cart/cart5.png" alt="Feature 5" class="card-img">
                            <h4 class="mt-2">ক্রয় বিক্রয়</h4>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Event Section Start -->
        <!--Event Slider -->
        <section class="main-event-slider dam-home-slider dam-home-event-slider">
            <div class="container">
                <div class="row  ">
                    <div class="col">
                        <h2 class="dam--title">চলমান ইভেন্ট</h2>
                        <ul class="control" id="event-control">
                            <li class="prev">
                                <i class="fas fa-angle-left fa-2x"></i>
                            </li>
                            <li class="next">
                                <i class="fas fa-angle-right fa-2x"></i>
                            </li>
                        </ul>
                        <div class="event-slider d-none">
                            <a href="javascript:void(0)" style="display: none;">
                                <div class="event-inner">
                                    <img src="assets/images/event/1701170246Q2Wqf.png" class="img-fluid" alt="পোড়াদহ মেলা" onclick="eventUrl('পোড়াদহ_মেলা_SXAwZ2ZjSkdrTkNMNzZDRWpMZVduZz09')">
                                    <div class="card-body">
                                        <h4 class="dam-slide-item" onclick="eventUrl('পোড়াদহ_মেলা_SXAwZ2ZjSkdrTkNMNzZDRWpMZVduZz09')"> পোড়াদহ মেলা </h4>
                                        <small class="event-category d-block"><span style="color: #888">বিভাগ-</span> মিষ্টি</small>
                                        <small class="event-date d-block">তারিখ: ২৮ নভেম্বর ২০২৩ - ২৭ নভেম্বর ২০২৪</small>
                                        <p class="event-page discription">
                                            <span id="des1">
                                        পোড়াদহ মেলার অন্যতম আকর্ষণ মিষ্টি। রসগোল্লা, সন্দেশ, জিলাপী, নিমকি, তিলের নাড়ু, খই, শুকনা মিষ্টি। আরও আকর্ষণীয় হল বড় বড় আকারের মিষ্টি। একেকটি মিষ্টি দেড় থেকে দুই কেজি ওজনের হয়ে থাকে।
                                    </span>
                                            <span class="see-more" onclick="OpenDescription(1)">বিস্তারিত দেখুন</span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                            <a href="javascript:void(0)" style="display: none;">
                                <div class="event-inner">
                                    <img src="assets/images/event/1701180296SWxJW.jpg" class="img-fluid" alt="ফলের মেলা" onclick="eventUrl('ফলের_মেলা_ZG4waTFKdVd4K2VzdG1iNjRGSXpadz09')">
                                    <div class="card-body">
                                        <h4 class="dam-slide-item" onclick="eventUrl('ফলের_মেলা_ZG4waTFKdVd4K2VzdG1iNjRGSXpadz09')"> ফলের মেলা </h4>
                                        <small class="event-category d-block"><span style="color: #888">বিভাগ-</span> ফল-ফলাদি</small>
                                        <small class="event-date d-block">তারিখ: ২৮ নভেম্বর ২০২৩ - ২৯ সেপ্টেম্বর ২০২৫</small>
                                        <p class="event-page discription">
                                            <span id="des2">
                                        ফলের মেলা উৎসব
                                    </span>
                                            <span class="see-more" onclick="OpenDescription(2)">বিস্তারিত দেখুন</span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                            <a href="javascript:void(0)" style="display: none;">
                                <div class="event-inner">
                                    <img src="assets/images/event/1701251686fJSRp.jpg" class="img-fluid" alt="মাছের মেলা" onclick="eventUrl('মাছের_মেলা_QXJZV2FFUnRyK3U0aExrcUJMVkx4QT09')">
                                    <div class="card-body">
                                        <h4 class="dam-slide-item" onclick="eventUrl('মাছের_মেলা_QXJZV2FFUnRyK3U0aExrcUJMVkx4QT09')"> মাছের মেলা </h4>
                                        <small class="event-category d-block"><span style="color: #888">বিভাগ-</span> মাছ</small>
                                        <small class="event-date d-block">তারিখ: ২৯ নভেম্বর ২০২৩ - ২৮ সেপ্টেম্বর ২০২৫</small>
                                        <p class="event-page discription">
                                            <span id="des3">
                                        মাছের মেলায় বিশাল আকারের বাহারি সব মাছের পসরা সাজিয়ে বসে দুই শতাধিক মাছ ব্যবসায়ী। এই আয়োজন ঘিরে সেখানে আশপাশের কয়েকটি জেলার মানুষের সমাগম হয়। দিনটির জন্য পুরো বছরজুড়ে অপেক্ষায় থাকেন স্থানীয়রা। এদিন এলাকার প্রতিটি বাড়ি ভরপুর থাকে অতিথিদের আনাগোনায়। মেলা থেকে মাছ কিনে জামাইদের সোজা গন্তব্য শ্বশুরবাড়ি।
                                    </span>
                                            <span class="see-more" onclick="OpenDescription(3)">বিস্তারিত দেখুন</span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                            <a href="javascript:void(0)" style="display: none;">
                                <div class="event-inner">
                                    <img src="assets/images/event/1701347262cinoa.jpg" class="img-fluid" alt="অর্গানিক মেলা" onclick="eventUrl('অর্গানিক_মেলা_S09ic0wwaUN0ZDZxYng4YlFZRXM1UT09')">
                                    <div class="card-body">
                                        <h4 class="dam-slide-item" onclick="eventUrl('অর্গানিক_মেলা_S09ic0wwaUN0ZDZxYng4YlFZRXM1UT09')"> অর্গানিক মেলা </h4>
                                        <small class="event-category d-block"><span style="color: #888">বিভাগ-</span> অর্গানিক</small>
                                        <small class="event-date d-block">তারিখ: ৩০ নভেম্বর ২০২৩ - ২৮ সেপ্টেম্বর ২০২৬</small>
                                        <p class="event-page discription">
                                            <span id="des8">
                                        অর্গানিক মেলা
                                    </span>
                                            <span class="see-more" onclick="OpenDescription(8)">বিস্তারিত দেখুন</span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--event details modal -->
        <div class="modal eventDetailsModal" id="eventDetailsModal" tabindex="-1" role="dialog" aria-labelledby="eventDetailsModal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">ইভেন্ট বিস্তারিত</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    &#xD7;
                </button>
                    </div>
                    <div class="modal-body">
                        <p class="text-justify" id="des_modal"></p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Video Section start
        <div class="dam-promo-video">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="dam--title">অর্গানিক ফুড ভিডিও</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-8">
                        <div class="video-item-wrapper">
                            <iframe src="https://www.youtube.com/embed/vNJXx0xxqRs?mute=1&rel=0&version=3&autoplay=1&controls=1&showinfo=0&loop=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="video-subitem-wrapper mt-2 mt-sm-0">
                            <div class="video-body">
                                <img src="http://img.youtube.com/vi/j0Hff3OpKdI/hqdefault.jpg" alt="">
                                <a class="my-video-links fas fa-play" title="পণ্যের ভিডিও" data-toggle="tooltip" data-placement="bottom" href="https://www.youtube.com/embed/j0Hff3OpKdI" data-maxwidth="800px" data-autoplay="true" data-vbtype="video"></a>
                            </div>
                            <div class="video-content-wrapper">
                                <p title="কৃষি সম্ভাবনাময় বাংলাদেশ এর কিছু গুরুত্বপূর্ণ তথ্য">কৃষিতে ব্যাপক সাফল্য (ডকুমেন্টারি)</p>
                                <small></small>
                            </div>
                        </div>
                        <div class="video-subitem-wrapper mt-2 mt-sm-0">
                            <div class="video-body">
                                <img src="http://img.youtube.com/vi/nl01VYFIY48/hqdefault.jpg" alt="">
                                <a class="my-video-links fas fa-play" title="পণ্যের ভিডিও" data-toggle="tooltip" data-placement="bottom" href="https://www.youtube.com/embed/nl01VYFIY48" data-maxwidth="800px" data-autoplay="true" data-vbtype="video"></a>
                            </div>
                            <div class="video-content-wrapper">
                                <p title="কৃষি সম্ভাবনাময় বাংলাদেশ এর কিছু গুরুত্বপূর্ণ তথ্য">কৃষি বিপণন অধিদপ্তর</p>
                                <small></small>
                            </div>
                        </div>
                        <div class="video-subitem-wrapper mt-2 mt-sm-0">
                            <div class="video-body">
                                <img src="http://img.youtube.com/vi/4JqkiLGyHec/hqdefault.jpg" alt="">
                                <a class="my-video-links fas fa-play" title="পণ্যের ভিডিও" data-toggle="tooltip" data-placement="bottom" href="https://www.youtube.com/embed/4JqkiLGyHec" data-maxwidth="800px" data-autoplay="true" data-vbtype="video"></a>
                            </div>
                            <div class="video-content-wrapper">
                                <p title="কৃষি সম্ভাবনাময় বাংলাদেশ এর কিছু গুরুত্বপূর্ণ তথ্য">কাঁচা কাঁঠাল হতে আটা তৈরীর প্রক্রিয়া</p>
                                <small></small>
                            </div>
                        </div>
                        <a href="https://sadai.gov.bd/get-all-video" class="btn btn-video"><i class="fas fa-video"></i> সব ভিডিও দেখুন</a>
                    </div>
                </div>
                <div class="row">
                <div class="col">
                    <div class="text-center">
                        <a href="https://sadai.gov.bd/get-all-video" class="btn btn-success btn-video"><i class="fas fa-video"></i> সব ভিডিও দেখুন</a>
                    </div>
                </div>
            </div>
            </div>
        </div>
        Video section end -->
    </main>

</div> <!--Content-->
    <!-- footer section start-->
    <!-- footer start -->
    <footer class="footer-wrapper">
        <div class="container py-4">
            <div class="row">
                <div class="col-md-3 border-f-col">
                    <img src="assets/images/logo/logo1.png" width="140" alt="dam logo">

                </div>
                <div class="col-md-3 border-f-col text-center text-sm-left">
                    <h5 class="mb-3 mob-footer-title font-weight-bold">গুরুত্বপূর্ণ লিংক সমূহ</h5>
                    <ul class="dam-contact-info">

                        <li><a href="" data-toggle="modal" data-target="#exampleModal"><i class="far fa-dot-circle"></i> নীতিমালা</a></li>
                        <li><a href="#"><i class="far fa-dot-circle"></i> সচরাচর জিজ্ঞাস্য</a></li>
                    </ul>
                </div>
                <div class="col-md-3 border-f-col text-center text-sm-left">
                    <h5 class="mb-3 mob-footer-title font-weight-bold">যোগাযোগ করুন</h5>
                    <ul class="dam-contact-info">
                        <li><a href="mailto:sadai@dam.gov.bd"><i class="fas fa-envelope"></i> info@krisokbd.com</a></li>
                        <li><a href="tel:+8801737269938"><i class="fas fa-phone"></i>+880 1737-269938</a></li>
                        <li><a href="#"><i class="fas fa-map-marker-alt"></i>বীরগঞ্জ, দিনাজপুর।</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h5 class="mb-3 mob-footer-title font-weight-bold text-center text-sm-left">অ্যাপ ডাউনলোড করুন</h5>

                    <div class="app-img d-flex align-items-center pt-2">
                        <a href="#"><img src="https://sadai.gov.bd/frontend/assets/imgs/play-store.png" class="mr-2"
                            alt="Play Store" /></a>
                        <a href="#"><img src="https://sadai.gov.bd/frontend/assets/imgs/apple-store.png" alt="Apple Store" /></a>
                    </div> 
                    <div class="social-icons">
                        <a href="https://t.ly/LI6_z" class="social facebook" title="facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social twitter" title="twitter"><i class="fab fa-twitter"></i></a>


                        <a href="#" class="social share" title="share"><i class="fas fa-share-alt"></i></a>
                    </div>
                </div>
            </div>
        </div>
         <div class="footer-bottom" style="background-color:#DAF7A6 !important; color:#000000 !important;">
            <div class="container">
                <div class="dam-footer-credit">
                   <center> <p style="color:#000000 !important;">krisokbd.com রেজানুর, সাইফুল ও একদল স্বপ্নবাজ তরুণের সামাজিক উদ্যোগ। আমাদের এই প্রয়াসে যেকোনো ধরনের সহায়তা, পার্টনারশিপ এবং স্পন্সরশিপ কে আমরা স্বাগত জানাই।
</p></center>
                    
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="dam-footer-credit">
                    <p>কপিরাইট &copy; কৃষক বি.ডি </p>
                    <p>কারিগরি সহতায় : <a target="_blank" href="#"> প্রাইম এগ্রো বায়োটেক এবং এমক্রো সার্ভিসেস </a></p>
                </div>
            </div>
        </div>
        
    </footer>

    <!-- footer end -->
    <div class="modal fade" id="authModal" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content bg-transparent border-0">
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel1">নীতিমালা</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      krisokbd.com 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

    <script src='https://www.google.com/recaptcha/api.js'></script>
    <script>
        function showPw() {
            var input = document.getElementById("InputPassword");
            var showEye = document.getElementById("Show");
            var hideEye = document.getElementById("Hide");
            if (input.type === "password") {
                input.type = "text";
                showEye.style.display = "none"
                hideEye.style.display = "block"
            } else {
                input.type = "password";
                showEye.style.display = "block"
                hideEye.style.display = "none"
            }
        }
    </script>
    <!-- footer section end-->
    <script src="assets/js/script.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/59109e2a4f.js" crossorigin="anonymous"></script>
    <!--Toaster-->
    <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="//cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>

    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="assets/js/select2.js"></script>
    <script src="assets/js/bn.js"></script>
    <script src="assets/js/flyto.js"></script>
    <script src="assets/js/venobox.min.js"></script>
    <script src="assets/js/tiny-slider.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/cart.js"></script>
    <script src="assets/js/review.js"></script>
    <script src="assets/js/auth.js"></script>
    <script src="assets/js/register.js"></script>
    <script src="assets/js/common.js"></script>
    <script>
        $('.dam-slide-item').removeClass('d-none')
        $('.event-slider').removeClass('d-none')
    </script>
    <script src="assets/js/home.js"></script>
    <script>
        function OpenDescription(id) {
            $('#des_modal').text($('#des' + id).text())
            $('#eventDetailsModal').modal('show')
        }
    </script>

</body>

</html>