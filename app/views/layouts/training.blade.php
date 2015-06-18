<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>@yield('title')</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">

	<!--link rel="stylesheet/less" href="less/bootstrap.less" type="text/css" /-->
	<!--link rel="stylesheet/less" href="less/responsive.less" type="text/css" /-->
	<!--script src="js/less-1.3.3.min.js"></script-->
	<!--append ‘#!watch’ to the browser URL, then refresh the page. -->
	
    {{ HTML::style('training/assets/css/bootstrap.min.css') }}
    {{ HTML::style('training/assets/css/style.css') }}
    {{ HTML::style('training/assets/css/font-awesome.css') }}


  <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
  <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
  <![endif]-->

  <!-- Fav and touch icons -->
   {{ HTML::script('training/assets/js/jquery.min.js') }}
   {{ HTML::script('training/assets/js/bootstrap.min.js') }}
   {{ HTML::script('training/assets/js/scripts.js') }}
  
@yield('style')
	 




	 
</head>

<body>

@yield('header')

<section id="main-content">

@yield('content')


</section>





<footer id="footer">
    
  <div class="container">
    <div class="top-footer">
      <div class="col-md-6"><i class="glyphicon glyphicon-circle-arrow-right"></i>     Hổ trợ ứng viên: (84.4) 3577-1608         <i class="glyphicon glyphicon-earphone"></i>   Hotline : 1900 585853  </div>
      <div class="col-md-6">
        <div class="col-md-6">Kết nối với Vnjob.vn
        </div>
        <div class="col-md-6 icon">
        {{HTML::image('training/assets/img/rss.png')}}
        {{HTML::image('training/assets/img/facebook.png')}}
        {{HTML::image('training/assets/img/twitter.png')}}
        {{HTML::image('training/assets/img/dribble.png')}}
        {{HTML::image('training/assets/img/pinterest.png')}}
        {{HTML::image('training/assets/img/ico-linkkedin.png')}}      
           

        </div>
      </div>
    </div>


    <div class="bottom-footer">
      <ul>
        <li>
          <h2>Chức năng</h2>
          <p><i class="fa fa-chevron-circle-right"></i> Tài khoản</p>
          <p><i class="fa fa-chevron-circle-right"></i> Tạo/Đăng hồ sơ</p>
          <p><i class="fa fa-chevron-circle-right"></i> Tạo thông báo việc làm</p>
          <p><i class="fa fa-chevron-circle-right"></i> Việc làm phù hợp với bạn</p>
          <p><i class="fa fa-chevron-circle-right"></i> Phản hồi từ nhà tuyển dụng</p>
          <p><i class="fa fa-chevron-circle-right"></i> Talent Community</p>

        </li>

        <li>
          <h2>Website đối tác</h2>
           
          <p><i class="fa fa-chevron-circle-right"></i> Vieclam.tuoitre.vn</p>
          <p><i class="fa fa-chevron-circle-right"></i> Vieclam.tuoitre.vn</p>
          <p><i class="fa fa-chevron-circle-right"></i> Vieclam.tuoitre.vn</p>
          <p><i class="fa fa-chevron-circle-right"></i> Vieclam.tuoitre.vn</p>
          <p><i class="fa fa-chevron-circle-right"></i> Vieclam.tuoitre.vn</p>
          <p><i class="fa fa-chevron-circle-right"></i> Vieclam.tuoitre.vn</p>

        </li>
        <li>
          <h2>Chức năng</h2>
          <p>
            <a href="https://play.google.com/store/search?q=pub:minhphuctelecom">
              <img alt="Android app on Google Play"
                   src="https://developer.android.com/images/brand/en_app_rgb_wo_45.png" />
            </a>
          </p>
          <p><img src="https://www.northwestsavingsbank.com/images/App_Store_Badge_EN.png"></p>
          <p><img src="img/windowstore.png"></p>
           

        </li>
        <li>
          <h2>Liên hệ</h2>
          <p><i class="fa fa-map-marker"></i> Địa chỉ : Tầng 10, tòa nhà HH3, Phường Mỹ Đình I, Quận Nam Từ Liêm, Thành phố Hà Nội</p>
          <p><i class="glyphicon glyphicon-envelope"></i> Email : Info@vnjobs.vn</p>
          <p><i class="glyphicon glyphicon-earphone"></i> Điện thoại : 04-3577-1608</p>
          <p><i class="glyphicon glyphicon-earphone"></i> Hotline : 1900 5858 53</p>
           

        </li>

      </ul>

      <div class="copy-right">Copyright 2015 Công ty TNHH Minh Phúc (MPTelecon)</div>
    </div>
  </div>
     
  </footer>

</body>
</html>