<!doctype html>
<!--[if lt IE 7]><html lang="en" class="no-js ie6"><![endif]-->
<!--[if IE 7]><html lang="en" class="no-js ie7"><![endif]-->
<!--[if IE 8]><html lang="en" class="no-js ie8"><![endif]-->
<!--[if gt IE 8]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->

<head>
    <meta charset="UTF-8">
    <title>Vidyanusa - Playable Learning</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <link rel="shortcut icon" href="favicon.png">

    <link rel="stylesheet" href="<?php echo $this->config->item('assets') ?>/css/bootstrap.css">
    
    <link rel="stylesheet" href="<?php echo $this->config->item('assets') ?>/css/animate.css">
    <link rel="stylesheet" href="<?php echo $this->config->item('assets') ?>/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo $this->config->item('assets') ?>/css/slick.css">
    <link rel="stylesheet" href="<?php echo $this->config->item('assets') ?>/js/rs-plugin/css/settings.css">

    <link rel="stylesheet" href="<?php echo $this->config->item('assets') ?>/css/freeze.css">


    <script type="text/javascript" src="<?php echo $this->config->item('assets') ?>/js/modernizr.custom.32033.js"></script>
 <script type="text/javascript">
            var BASE_URL = '<?php echo base_url() ?>index.php/';
        </script>
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
</head>

<body>

    <div class="pre-loader">
        <div class="load-con">
            <img src="<?php echo $this->config->item('assets') ?>/img/freeze/logo.png" class="animated fadeInDown" alt="">
            <div class="spinner">
              <div class="bounce1"></div>
              <div class="bounce2"></div>
              <div class="bounce3"></div>
            </div>
        </div>
    </div>
   
    <header>
        
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="fa fa-bars fa-lg"></span>
                        </button>
                        <a class="navbar-brand" href="index.html">
                            <img src="<?php echo $this->config->item('assets') ?>/img/freeze/logo.png" alt="" class="logo">
                        </a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="#about">tentang</a>
                            </li>
                            <li><a href="#features">fitur</a>
                            </li>
                            <li><a href="#reviews">review</a>
                            </li>
                           
                            <li><a href="#demo">pengantar</a>
                            </li>
                            <li><a class="getApp" href="#getApp">daftar</a>
                            </li>
                            <li><a href="#support">support</a>
                            </li>
                            <li><a href="<?php echo base_url('index.php/main/login_page') ?>">Login</a>
                            <li><a href="#"> <div class="padding10">User Online : <span id="cnt_ol" style="font-weight: bold"></span></div></a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.navbar-collapse -->
                </div>
                <!-- /.container-->
        </nav>

        
        <!--RevSlider-->
        <div class="tp-banner-container">
            <div class="tp-banner" >
                <ul>
                    <!-- SLIDE  -->
                    <li data-transition="fade" data-slotamount="7" data-masterspeed="1500" >
                        <!-- MAIN IMAGE -->
                        <img src="<?php echo $this->config->item('assets') ?>/img/transparent.png"  alt="slidebg1"  data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">
                        <!-- LAYERS -->
                        <!-- LAYER NR. 1 -->
                        <div class="tp-caption lfl fadeout hidden-xs"
                            data-x="left"
                            data-y="bottom"
                            data-hoffset="30"
                            data-voffset="0"
                            data-speed="500"
                            data-start="700"
                            data-easing="Power4.easeOut">
                            <img src="<?php echo $this->config->item('assets') ?>/img/freeze/Slides/hand-freeze.png" alt="">
                        </div>

                        <div class="tp-caption lfl fadeout visible-xs"
                            data-x="left"
                            data-y="center"
                            data-hoffset="700"
                            data-voffset="0"
                            data-speed="500"
                            data-start="700"
                            data-easing="Power4.easeOut">
                            <img src="<?php echo $this->config->item('assets') ?>/img/freeze/iphone-freeze.png" alt="">
                        </div>

                        <div class="tp-caption large_brown_bold sft" data-x="550" data-y="center" data-hoffset="0" data-voffset="-80" data-speed="500" data-start="1200" data-easing="Power4.easeOut">
                            Playable
                        </div>
                        <div class="tp-caption large_brown_light sfr" data-x="820" data-y="center" data-hoffset="0" data-voffset="-80" data-speed="500" data-start="1400" data-easing="Power4.easeOut">
                            Learning
                        </div>
                        <div class="tp-caption medium_white_light sfb" data-x="550" data-y="center" data-hoffset="0" data-voffset="0" data-speed="1000" data-start="1500" data-easing="Power4.easeOut">
                            Mathematic Game for Junior High School
                        </div>

                        <div class="tp-caption sfb hidden-xs" data-x="600" data-y="center" data-hoffset="0" data-voffset="85" data-speed="1000" data-start="1700" data-easing="Power4.easeOut">
                            <a href="#about" class="btn btn-primary inverse btn-lg">Tentang</a>
                        </div>
                        <div class="tp-caption sfr hidden-xs" data-x="730" data-y="center" data-hoffset="0" data-voffset="85" data-speed="1500" data-start="1900" data-easing="Power4.easeOut">
                            <a href="#getApp" class="btn btn-default btn-lg">Daftar</a>
                        </div>
                        <div class="tp-caption sfr hidden-xs" data-x="860" data-y="center" data-hoffset="0" data-voffset="85" data-speed="1500" data-start="1900" data-easing="Power4.easeOut">
                            <a href="<?php echo base_url('index.php/main/login_page') ?>" class="btn btn-default btn-lg">Login</a>
                        </div>

                    </li>
                    

                    <!-- SLIDE 2 -->
                    <li data-transition="zoomout" data-slotamount="7" data-masterspeed="1000" >
                        <!-- MAIN IMAGE -->
                        <img src="<?php echo $this->config->item('assets') ?>/img/transparent.png"  alt="slidebg1"  data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">
                        <!-- LAYERS -->
                        <!-- LAYER NR. 1 -->
                        <div class="tp-caption customin customout hidden-xs"
                            data-x="right"
                            data-y="center"
                            data-hoffset="0"
                            data-customin="x:50;y:150;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.5;scaleY:0.5;skewX:0;skewY:0;opacity:0;transformPerspective:0;transformOrigin:50% 50%;"
                        data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                            data-voffset="50"
                            data-speed="1000"
                            data-start="700"
                            data-easing="Power4.easeOut">
                            <img src="<?php echo $this->config->item('assets') ?>/img/freeze/Slides/family-freeze.png" alt="">
                        </div>

                        <div class="tp-caption customin customout visible-xs"
                            data-x="center"
                            data-y="center"
                            data-hoffset="0"
                            data-customin="x:50;y:150;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.5;scaleY:0.5;skewX:0;skewY:0;opacity:0;transformPerspective:0;transformOrigin:50% 50%;"
                        data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                            data-voffset="0"
                            data-speed="1000"
                            data-start="700"
                            data-easing="Power4.easeOut">
                            <img src="<?php echo $this->config->item('assets') ?>/img/freeze/Slides/family-freeze.png" alt="">
                        </div>

                        <div class="tp-caption lfb visible-xs" data-x="center" data-y="center" data-hoffset="0" data-voffset="400" data-speed="1000" data-start="1200" data-easing="Power4.easeOut">
                            <a href="#" class="btn btn-primary inverse btn-lg">Purchase</a>
                        </div>

                        
                        <div class="tp-caption mediumlarge_light_white sfl hidden-xs" data-x="left" data-y="center" data-hoffset="0" data-voffset="-50" data-speed="1000" data-start="1000" data-easing="Power4.easeOut">
                           Membuat Belajar
                        </div>
                        <div class="tp-caption mediumlarge_light_white sft hidden-xs" data-x="left" data-y="center" data-hoffset="0" data-voffset="0" data-speed="1000" data-start="1200" data-easing="Power4.easeOut">
                           Menjadi Menyenangkan
                        </div>
                        <div class="tp-caption small_light_white sfb hidden-xs" data-x="left" data-y="center" data-hoffset="0" data-voffset="80" data-speed="1000" data-start="1600" data-easing="Power4.easeOut">
                           <p>Eksplorasi dunia Vidyanusa, Selesaikan misi, dan lihat rekam jejak permainan teman-teman.<br>
                            Belajar jadi menyenangkan!!</p>
                        </div>
    
                    </li>

                    <!-- SLIDE 3 -->
                    <li data-transition="zoomout" data-slotamount="7" data-masterspeed="1000" >
                        <!-- MAIN IMAGE -->
                        <img src="<?php echo $this->config->item('assets') ?>/img/transparent.png"  alt="slidebg1"  data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">
                        <!-- LAYERS -->
                        <!-- LAYER NR. 1 -->
                        <div class="tp-caption lfb fadeout hidden-xs"
                            data-x="center"
                            data-y="bottom"
                            data-hoffset="0"
                            data-voffset="0"
                            data-speed="1000"
                            data-start="700"
                            data-easing="Power4.easeOut">
                            <img src="<?php echo $this->config->item('assets') ?>/img/freeze/Slides/freeze-slide2.png" alt="">
                        </div>

                        
                        <div class="tp-caption large_white_light sft" data-x="center" data-y="250" data-hoffset="0" data-voffset="0" data-speed="1000" data-start="1400" data-easing="Power4.easeOut">
                            Bantu penduduk Vidyanusa!!!</i>
                        </div>
                        
                        
                    </li>
                </ul>
            </div>
        </div>


    </header>


    <div class="wrapper">

        

        <section id="about">
            <div class="container">
                
                <div class="section-heading scrollpoint sp-effect3">
                    <h1>Tentang Vidyanusa</h1>
                    <div class="divider"></div>
                    <p>Transformasi Pembelajaran</p>
                </div>

                <div class="row">
                    <div class="col-md-3 col-sm-3 col-xs-6">
                        <div class="about-item scrollpoint sp-effect2">
                            <i class="fa fa-child fa-2x"></i>
                            <h3>Metode Pengajaran</h3>
                            <p>menyediakan media pembelajaran yang menyenangkan serta bersifat tematik dan dapat diakses oleh 
                                banyak siswa (massive) tanpa dibatasi oleh ruang dan waktu</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-6" >
                        <div class="about-item scrollpoint sp-effect5">
                            <i class="fa fa-clock-o fa-2x"></i>
                            <h3>Waktu Pembelajaran</h3>
                            <p>akselerasi proses pembelajaran siswa melalui VidyaNusa yang bersinergi dengan metode pengajaran konvensional di kelas</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-6" >
                        <div class="about-item scrollpoint sp-effect5">
                            <i class="fa fa-file-zip-o fa-2x"></i>
                            <h3>Rencana Pelaksanaan Pembelajaran</h3>
                            <p>Rencana Pelaksanaan Pembelajaran (RPP) berbasis game VidyaNusa</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-6" >
                        <div class="about-item scrollpoint sp-effect1">
                            <i class="fa fa-book fa-2x"></i>
                            <h3>Assesment Siswa</h3>
                            <p>analisis data pembelajaran siswa melalui game
                             VidyaNusa dalam bentuk visualisasi grafik dan laporan perkembangan belajar siswa berdasarkan periode tertentu
                             </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="features">
            <div class="container">
                <div class="section-heading scrollpoint sp-effect3">
                    <h1>Fitur</h1>
                    <div class="divider"></div>
                    <p>Berbagai keunggulan Vidyanusa</p>
                </div>

                <div class="row">
                    <div class="col-md-4 col-sm-4 scrollpoint sp-effect1">
                        <div class="media media-left feature">
                            <a class="pull-right" href="#">
                                <i class="fa fa-gamepad fa-2x"></i>
                            </a>
                            <div class="media-body">
                                <h3 class="media-heading">Gamifikasi</h3>
                                Pembelajaran menjadi menyenangkan
                            </div>
                        </div>
                        <div class="media media-left feature">
                            <a class="pull-right" href="#">
                                <i class="fa fa-trophy fa-2x"></i>
                            </a>
                            <div class="media-body">
                                <h3 class="media-heading">Reward system</h3>
                                MVP, badge, dan banyak lagi
                            </div>
                        </div>
                        <div class="media media-left feature">
                            <a class="pull-right" href="#">
                                <i class="fa fa-users fa-2x"></i>
                            </a>
                            <div class="media-body">
                                <h3 class="media-heading">Berbasis komunitas</h3>
                                Bermain bersama teman anda
                            </div>
                        </div>
                        <div class="media media-left feature">
                            <a class="pull-right" href="#">
                                <i class="fa fa-graduation-cap fa-2x"></i>
                            </a>
                            <div class="media-body">
                                <h3 class="media-heading">Evaluasi</h3>
                                Belajar dari kesalahan
                            </div>
                        </div>
                        <div class="media media-left feature">
                            <a class="pull-right" href="#">
                                <i class="fa fa-bar-chart fa-2x"></i>
                            </a>
                            <div class="media-body">
                                <h3 class="media-heading">Statistik</h3>
                                Melihat statistik permainan Anda
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4" >
                        <img src="<?php echo $this->config->item('assets') ?>/img/freeze/iphone-freeze.png" 
                        class="img-responsive scrollpoint sp-effect5" alt="">
                    </div>
                    <div class="col-md-4 col-sm-4 scrollpoint sp-effect2">
                        <div class="media feature">
                            <a class="pull-left" href="#">
                                <i class="fa fa-sitemap fa-2x"></i>
                            </a>
                            <div class="media-body">
                                <h3 class="media-heading">Dynamic Map</h3>
                                Peta permainan yang dinamis
                            </div>
                        </div>
                        <div class="media feature">
                            <a class="pull-left" href="#">
                                <i class="fa fa-sitemap fa-2x"></i>
                            </a>
                            <div class="media-body">
                                <h3 class="media-heading">Dynamic Story</h3>
                                Cerita yang tidak pernah sama
                            </div>
                        </div>
                        <div class="media feature">
                            <a class="pull-left" href="#">
                                <i class="fa fa-check-square-o fa-2x"></i>
                            </a>
                            <div class="media-body">
                                <h3 class="media-heading">Tantangan Harian</h3>
                                Selesaikan tantangan untuk mendapat hadiah
                            </div>
                        </div>
                        <div class="media feature">
                            <a class="pull-left" href="#">
                                <i class="fa fa-dashboard fa-2x"></i>
                            </a>
                            <div class="media-body">
                                <h3 class="media-heading">Dashboard Terintegrasi</h3>
                                Dashboard yang terintegrasi
                            </div>
                        </div>
                        <div class="media active feature">
                            <a class="pull-left" href="#">
                                <i class="fa fa-plus fa-2x"></i>
                            </a>
                            <div class="media-body">
                                <h3 class="media-heading">Dan banyak lagi!</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="reviews">
            <div class="container">
                <div class="section-heading inverse scrollpoint sp-effect3">
                    <h1>Reviews</h1>
                    <div class="divider"></div>
                    <p>Read What's The People Are Saying About Us</p>
                </div>
                <div class="row">
                    <div class="col-md-10 col-md-push-1 scrollpoint sp-effect3">
                        <div class="review-filtering">
                            <div class="review">
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="review-person">
                                            <img src="<?php echo $this->config->item('assets') ?>/img/scott.jpg" alt="" class="img-responsive">
                                        </div>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="review-comment">
                                            <h3>“ If you aren't playing, it isn't a life”</h3>
                                            <p>
                                                - Scott Osterweil | Creative Director MIT
                                                <span>
                                                    <i class="fa fa-star fa-lg"></i>
                                                    <i class="fa fa-star fa-lg"></i>
                                                    <i class="fa fa-star fa-lg"></i>
                                                    <i class="fa fa-star fa-lg"></i>
                                                    <i class="fa fa-star-o fa-lg"></i>
                                                </span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="review rollitin">
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="review-person">
                                            <img src="<?php echo $this->config->item('assets') ?>/img/pakari.jpg" alt="" class="img-responsive">
                                        </div>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="review-comment">
                                            <h3>“VidyaNusa is a new transformation tool in learning process”</h3>
                                            <p>
                                                - Ary Setijadi | Media Digital and Game Technology ITB
                                                <span>
                                                    <i class="fa fa-star fa-lg"></i>
                                                    <i class="fa fa-star fa-lg"></i>
                                                    <i class="fa fa-star fa-lg"></i>
                                                    <i class="fa fa-star-half-o fa-lg"></i>
                                                    <i class="fa fa-star-o fa-lg"></i>
                                                </span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="review rollitin">
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="review-person">
                                           <img src="<?php echo $this->config->item('assets') ?>/img/escher.jpg" alt="" class="img-responsive">
                                        </div>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="review-comment">
                                            <h3>“My work is a game, a very serious game.”</h3>
                                            <p>
                                                - M. C. Escher | Artist
                                                <span>
                                                    <i class="fa fa-star fa-lg"></i>
                                                    <i class="fa fa-star fa-lg"></i>
                                                    <i class="fa fa-star fa-lg"></i>
                                                    <i class="fa fa-star-half-o fa-lg"></i>
                                                    <i class="fa fa-star-o fa-lg"></i>
                                                </span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="review rollitin">
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="review-person">
                                           <img src="<?php echo $this->config->item('assets') ?>/img/charlie.jpg" alt="" class="img-responsive">
                                        </div>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="review-comment">
                                            <h3>“The Game of Life is the game of everlasting learning. At least it is if you want to win.”</h3>
                                            <p>
                                                - Charlie Munger | American Business
                                                <span>
                                                    <i class="fa fa-star fa-lg"></i>
                                                    <i class="fa fa-star fa-lg"></i>
                                                    <i class="fa fa-star fa-lg"></i>
                                                    <i class="fa fa-star-half-o fa-lg"></i>
                                                    <i class="fa fa-star-o fa-lg"></i>
                                                </span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
<!--
        <section id="screens">
            <div class="container">

                <div class="section-heading scrollpoint sp-effect3">
                    <h1>Screens</h1>
                    <div class="divider"></div>
                    <p>See what’s included in the App</p>
                </div>

                <div class="filter scrollpoint sp-effect3">
                    <a href="javascript:void(0)" class="button js-filter-all active">All Screens</a>
                    <a href="javascript:void(0)" class="button js-filter-one">User Access</a>
                    <a href="javascript:void(0)" class="button js-filter-two">Social Network</a>
                    <a href="javascript:void(0)" class="button js-filter-three">Media Players</a>
                </div>
                <div class="slider filtering scrollpoint sp-effect5" >
                    <div class="one">
                        <img src="<?php echo $this->config->item('assets') ?>/img/freeze/screens/profile.jpg" alt="">
                        <h4>Profile Page</h4>
                    </div>
                    <div class="two">
                        <img src="<?php echo $this->config->item('assets') ?>/img/freeze/screens/menu.jpg" alt="">
                        <h4>Toggel Menu</h4>
                    </div>
                    <div class="three">
                        <img src="<?php echo $this->config->item('assets') ?>/img/freeze/screens/weather.jpg" alt="">
                        <h4>Weather Forcast</h4>
                    </div>
                    <div class="one">
                        <img src="<?php echo $this->config->item('assets') ?>/img/freeze/screens/signup.jpg" alt="">
                        <h4>Sign Up</h4>
                    </div>
                    <div class="one">
                        <img src="<?php echo $this->config->item('assets') ?>/img/freeze/screens/calendar.jpg" alt="">
                        <h4>Event Calendar</h4>
                    </div>
                    <div class="two">
                        <img src="<?php echo $this->config->item('assets') ?>/img/freeze/screens/options.jpg" alt="">
                        <h4>Some Options</h4>
                    </div>
                    <div class="three">
                        <img src="<?php echo $this->config->item('assets') ?>/img/freeze/screens/sales.jpg" alt="">
                        <h4>Sales Analysis</h4>
                    </div>
                </div>
            </div>
        </section>
-->
        <section id="demo">
            <div class="container">
                <div class="section-heading scrollpoint sp-effect3">
                    <h1>Pengantar</h1>
                    <div class="divider"></div>
                    <p>Video pengenalan tentang Vidyanusa</p>
                </div>
                <div class="row">
                    <div class="col-md-8 col-md-offset-2 scrollpoint sp-effect2">
                        <div class="video-container" >
                            <iframe width="560" height="315" src="https://www.youtube.com/embed/htdG4EhA9y0" frameborder="0" allowfullscreen></iframe>
                            <iframe width="560" height="315" src="https://www.youtube.com/embed/IevENYrwe_c" frameborder="0" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="getApp">
            <div class="container-fluid">
                <div class="section-heading inverse scrollpoint sp-effect3">
                    <h1>Daftar</h1>
                    <div class="divider"></div>
                    <p>Daftar sekarang untuk menggunakan Vidyanusa!</p>
                </div>
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="hanging-phone scrollpoint sp-effect2 hidden-xs">
                            <img src="<?php echo $this->config->item('assets') ?>/img/freeze/freeze-angled2.png" alt="">
                        </div>
                        <div class="platforms">
                            <a href="<?php echo base_url('index.php/registration') ?>" class="btn btn-primary inverse scrollpoint sp-effect1">
                                <i class="fa fa-graduation-cap fa-3x pull-left"></i>
                                <span>Daftar sebagai</span><br>
                                <b>Guru</b>
                            </a>
                            
                                <a href="<?php echo base_url('index.php/registration/registrasi_siswa') ?>" class="btn btn-primary inverse scrollpoint sp-effect2">
                                    <i class="fa fa-users fa-3x pull-left"></i>
                                    <span>Daftar sebagai</span><br>
                                    <b>Siswa</b>
                                </a>
                        </div>

                    </div>
                </div>

                

            </div>
        </section>

        <section id="support" class="doublediagonal">
            <div class="container">
                <div class="section-heading scrollpoint sp-effect3">
                    <h1>Dukungan</h1>
                    <div class="divider"></div>
                    <p>Untuk info dan dukungan lebih lanjut, hubungi kami!</p>
                </div>
                <div class="row">

                   

                    <div class="col-lg-4 col-lg-offset-2 text-center">
                        <i class="fa fa-phone fa-3x wow bounceIn" style="visibility: visible;"></i>
                        <p>022-2500960</p>
                    </div>
                    <div class="col-lg-4 text-center">
                        <i class="fa fa-envelope-o fa-3x wow bounceIn" data-wow-delay=".1s" style="visibility: visible; -webkit-animation-delay: 0.1s;"></i>
                        <p><a href="mailto:your-email@your-domain.com">vidyanusa@lskk.stei.itb.ac.id</a></p>
                    </div>

                </div>
            </div>
        </section>

        <footer>
            <div class="container">
                <a href="#" class="scrollpoint sp-effect3">
                    <img src="<?php echo $this->config->item('assets') ?>/img/freeze/logo.png" alt="" class="logo">
                </a>
                <div class="social">
                    <a href="#" class="scrollpoint sp-effect3"><i class="fa fa-twitter fa-lg"></i></a>
                    <a href="https://plus.google.com/u/0/103316261532547269831/posts" class="scrollpoint sp-effect3"><i class="fa fa-google-plus fa-lg"></i></a>
                    <a href="https://www.facebook.com/vidyanusa" class="scrollpoint sp-effect3"><i class="fa fa-facebook fa-lg"></i></a>
                </div>
                <div class="rights">
                    <p>Copyright &copy; 2014</p>
                    <p>Template by <a href="http://www.scoopthemes.com" target="_blank">ScoopThemes</a></p>
                </div>
            </div>
        </footer>

    </div>
    <script src="<?php echo $this->config->item('assets') ?>/js/jquery-1.11.1.min.js"></script>
    <script src="<?php echo $this->config->item('assets') ?>/js/bootstrap.min.js"></script>
    <script src="<?php echo $this->config->item('assets') ?>/js/slick.min.js"></script>
    <script src="<?php echo $this->config->item('assets') ?>/js/placeholdem.min.js"></script>
    <script src="<?php echo $this->config->item('assets') ?>/js/rs-plugin/js/jquery.themepunch.plugins.min.js"></script>
    <script src="<?php echo $this->config->item('assets') ?>/js/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
    <script src="<?php echo $this->config->item('assets') ?>/js/waypoints.min.js"></script>
    <script src="<?php echo $this->config->item('assets') ?>/js/scripts.js"></script>

    <script>
        $(document).ready(function() {
            appMaster.preLoader();
            
             setInterval(function(){
       $.ajax({
           url : BASE_URL + 'main/count_online',
           dataType: 'text',
           success: function (data) {               
               $("#cnt_ol").html(data);
           }
       });
   },5000);
        });
    </script>

</body>

</html>
