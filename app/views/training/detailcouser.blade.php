@extends('layouts.training')
@section('title') Trang chủ Đào tạo - VnJobs @stop
@section('header')

@include('includes.trainings.header-chitiet')

@stop
@section('content')
<div class="container"> 
<div class="banner-ct">
          
          <div class="title">
            <h2>Hãy đăng ký những khóa học hấp dẫn</h2>
            <h3>Công ty chúng tôi thường xuyên mở các khóa học hấp dẫn để các bạn đăng ký và tham gia nâng cao kỹ năng cũng như nghiệp vụ của mình.</h3>
            <div class="row">
              <div class="col-md-4"></div>
              <div class="col-md-2">
                <button class="btn more1">Xem thêm</button>
              </div>
              <div class="col-md-2">
                <button class="btn more2">Đăng ký</button>
              </div>
              <div class="col-md-4"></div>
            </div>
      </div>
        </div>



      <div class="menu-ctdt">


          <nav class="navbar navbar-default" role="navigation">
             
            
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav">
                <li class="">
                  <a href="#tq2">Tổng quan</a>
                </li>
                 
                <li class="">
                  <a href="#chiphi">Chi phí</a>
                </li>
                <li class="img">
                            {{HTML::image('training/assets/img/down.png')}}

                </li>
                <li class="">
                  <a href="#giangvien">Giảng viên</a>
                </li>
                <li class="">
                  <a href="#tq4_r">Đăng ký</a>
                </li>
                 
              </ul>
              </div>
          
        </nav>
      </div>




      <div id="thongtinchung">
        <div class="col-md-6 pull-left">

      <div class="tq1">

      {{HTML::image('training/assets/img/ttc.png')}}
      
      </div>
      <div class="tq2" id="tq2">
            <h2>Tổng quan</h2>
            <?php 
              preg_match('/<img[^>]+>/i',$couser['content'], $image);
              $content = preg_replace("/<img[^>]+\>/i", "", $couser['content']); 
             ?>
            <p align="left">{{$couser['title']}}
              <br>
              {{str_limit($content, $limit = 1300, $end = '<a data-toggle="modal" data-target="#myModal">
            Đọc tiêp
          </a> ')}}
            </p>

            
          <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="myModalLabel">Nội dung</h4>
                </div>
                <div class="modal-body">
                  {{$content}}
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  
                </div>
              </div>
            </div>
          </div>



        </div>
          

          <div class="tq3">

            <img src="{{$couser['gvthumbnail']}}">
            <div class="bt-tt">
              <p class="name">{{$couser['name']}}</p>
              <p align="justify">{{$couser['worked']}}</p>
               
            </div>
          </div>

          <div class="tq4">
          <p class="cdk">Các cách đăng ký khóa học</p>
          <p>Học viên đăng ký tham gia khóa học trực tiếp tại trung tâm đào tạo hoặc đăng ký online theo mẫu</p>

          <p class="ttht">Thông tin hổ trợ</p>
          <p><i class="fa fa-phone-square"></i> <span>Hotline :</span> +84-4-3577-1680  &nbsp;&nbsp;&nbsp;<i class="glyphicon glyphicon-envelope"></i>  <span>Email :</span> daotao@vnjobs.vn </p>
          <p><i class="fa fa-map-marker"></i> <span>Địa điểm :</span> 06 Trần Phú , Đà Nẵng</p>
         </div>

    </div>
        <div class="col-md-6 pull-right">

        <div class="tq1-r">
          <h2 class="white">Thông tin chung</h2>
            <div class="col-md-9 pull-left dk1">
            <ul>
              <li>
                <h2>Khai giảng: </h2> <p>{{$couser['date_open']}}</p>
              </li>
              <li>
                <h2>Ca học : </h2> <p>{{$couser['shift']}}</p>
              </li>
              <li>
                <h2>Giờ học : </h2> <p>{{$couser['time_hour']}} giờ</p>
              </li>
              <li>
                <h2>Ngày học : </h2> <p>{{$couser['date_study']}}</p>
              </li>
              <li>
                <h2>Thời lượng : </h2> <p>{{$couser['time_day']}} buổi</p>
              </li>
              <li>
                <h2>Học phí : </h2> <p>{{$couser['fee']}}</p>
              </li>

               
              

               

            </ul>
            </div>
          <div class="col-md-3 dk">
           <a href="#tq4_r">
            {{HTML::image('training/assets/img/dkh.png')}}
            </a>
      </div>
    </div>
      <div class="tq2-r">
            {{$image[0]}}
             
            <div class="bt-tt">
              <h2 class="white" id="chiphi">Chi Phí</h2>
              <p>Học phí : {{$couser['fee']}}</p>
              <p>Bao gồm :Tài liệu và chi phí</p>
              @if($couser['discount'] !=null)
              <div class="ttgiamgia">{{$couser['discount']}}</div>
              @endif
            </div>
          </div>

          <div class="tq3-r">
            <h2 class="gv" id="giangvien">Giảng viên</h2>
            <p align="justify">{{$couser['yourself']}}</p>
          </div>
          <div class="tq4_r" id="tq4_r">
            <h3>Nếu bạn muốn đăng ký online, vui lòng đăng ký thông tin theo mẫu dưới :</h3>
         

    {{ Form::open(['role' => 'form','class'=>'form form-horizontal','files'=>true]) }}
    
              @include('includes.notifications')

    <div class="form-group">
      <label for="inputTitle" class="col-sm-5 control-label">Số người đăng ký:</label>
      <div class="col-sm-7">
        {{ Form::select('songuoi',array(
                                  '1'=>'1',
                                  '2'=>'2',
                                  '3'=>'3',
                                  '4'=>'4'
        ))}}
      </div>
    </div>


    <div class="form-group">
      <label for="inputTitle" class="col-sm-5 control-label">Quí danh:</label>
      <div class="col-sm-7">
        {{ Form::select('sex',array(
                                  '1'=>'MR',
                                  '2'=>'MS',
        ))}}
      </div>
    </div>


    <div class="form-group">
      <label for="inputFullname" class="col-sm-5 control-label"><abbr>*</abbr>Họ và tên:</label>
      <div class="col-sm-7">
        {{ Form::input('text', 'name', null, array('class'=>'form-control') ) }}
      </div>
    </div>
    <div class="form-group">
      <label for="inputFullname" class="col-sm-5 control-label"><abbr>*</abbr>Nơi học tập và làm việc:</label>
      <div class="col-sm-7">
        {{ Form::input('text', 'address', null, array('class'=>'form-control') ) }}
      </div>
    </div>

    <div class="form-group">
      <label for="inputFullname" class="col-sm-5 control-label"><abbr>*</abbr>Điện thoại:</label>
      <div class="col-sm-7">
        {{ Form::input('text', 'phone', null, array('class'=>'form-control') ) }}
      </div>
    </div>
    <div class="form-group">
      <label for="inputFullname" class="col-sm-5 control-label"><abbr>*</abbr>Email:</label>
      <div class="col-sm-7">
        {{ Form::input('email', 'email', null, array('class'=>'form-control') ) }}
      </div>
    </div>
    <div class="form-group">
            <label for="input" class="col-sm-5 control-label"><abbr>*</abbr>Mã bảo vệ:</label>
      <div class="col-sm-4">
            {{ HTML::image(Captcha::img(), 'Captcha', ['class'=>'captcha', 'title'=>'Click để lấy chuỗi mới']) }}
 
      </div>
      <div class="col-sm-3">
        {{ Form::text('captcha') }}
      </div>
    </div>
     
     
     
    <div class="form-group">
      <div class="col-sm-10 col-sm-offset-2">
        {{ Form::button('Đăng Ký', array('type'=>'submit', 'class'=>'btn dkh')) }}
      </div>
    </div>
    {{ Form::close() }}



         </div>
        </div>
      </div>


        
     
      <div class="clearfix"></div>
       @include('includes.trainings.main-khoahoc')

      <div class="clearfix"></div>

      <div class="main5">
          <h2>Giảng viên tiêu biểu</h2>
          <h3>Một số hình ảnh của học viện và giảng viên được chúng tôi lưu trữ lại</h3>

          <ul>
              @foreach($people[0] as $gv)
                    <li>
                       <div class="image  wow bounceInLeft">{{HTML::image($gv['thumbnail'])}}</div>
                       <div class="linkgv">
                        <a href="{{$gv['facebook']}}"><i class="fa fa-facebook"></i></a>
                        <a href="{{$gv['twitter']}}"><i class="fa fa-twitter"></i></a>
                        <a href="{{$gv['linkedin']}}"><i class="fa fa-linkedin"></i></a>
                        <a href="{{$gv['skype']}}"><i class="fa fa-skype"></i></a>
                       </div>
                       <p>{{$gv['name']}}</p>
                    </li>
                  @endforeach
                     
                     
                     
                     
          </ul>

        </div>
        <script>
        $('.captcha').click(function(event) {
          $(this).attr({
            src: '{{ URL::to('captcha') }}?t='+Math.random()
          });
        });
        </script>
@stop