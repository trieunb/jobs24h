@extends('layouts.training')
@section('title') Khóa học chi tiết @stop
@section('header')

@include('includes.trainings.header-chitiet')

@stop
@section('content')
<style type="text/css">
  .hover-pointer:hover {cursor: pointer;}
</style>
<div class="fixed-menu display-none">
  <nav class="navbar navbar-fixed-top" role="navigation">
    
    <!-- Collect the nav links, forms, and other content for toggling -->
      <ul class="nav navbar-nav">
        <li><a href="#tq2">Tổng quan</a></li>
        <li><a href="#chiphi">Chi phí</a></li>
        <li><a href="#giangvien">Giảng viên</a></li>
        <li><a href="#tq4_r">Đăng ký</a></li>
        
      </ul>
    
  </nav>
</div>
<!-- <ul>
          <li><a href="#tq2">Tổng quan</a></li>
          <li><a href="#chiphi">Chi phí</a></li>
          <li><a href="#giangvien">Giảng viên</a></li>
          <li><a href="#tq4_r">Đăng ký</a></li>
        </ul> -->
<div class="container"> 
<div class="banner-ct">
          
          <div class="title">
            <h2>Hãy đăng ký những khóa học hấp dẫn</h2>
            <h3>Công ty chúng tôi thường xuyên mở các khóa học hấp dẫn để các bạn đăng ký và tham gia nâng cao kỹ năng cũng như nghiệp vụ của mình.</h3>
            <div class="row">
               
              <div class="col-md-12">
                <a href="{{URL::route('trainings.allcouser')}}"><button class="btn more1">Xem thêm</button></a>
                <button onclick="window.location.href='#tq4_r';" class="btn more2">Đăng ký</button>
              </div>
              
                
              
               
            </div>
      </div>
        </div>



      <div class="col-md-12 menu-ctdt">


                  <a class="btn btn-default sub-menu" href="#tq2">
                    Tổng quan
                  </a>
                   <a class="btn btn-default sub-menu" href="#chiphi">
                   
                   Chi phí
                  </a>
                   
                   {{HTML::image('training/assets/img/down.png')}}
                  <a class="btn btn-default sub-menu" href="#giangvien">
                   
                   Giảng viên
                   </a>
                   <a class="btn btn-default sub-menu" href="#tq4_r">
                  
                     Đăng ký
                   </a>
                 
               
               
      </div>




      <div id="thongtinchung">
        <div class="col-md-6 pull-left tt-left">

      <div class="tq1">

      {{HTML::image('training/assets/img/ttc.png')}}
      
      </div>
      <div class="tq2" id="tq2" style="position: inherit;overflow: hidden;">
            <h2>Tổng quan</h2>
            <?php 
              @preg_match('/<img[^>]+>/i',@$couser['content'], $image);
              $content = preg_replace("/<img[^>]+\>/i", "", $couser['content']); 
             ?>
            <p align="left" style="margin-top: -29px;font-size: 16px;font-weight: bold;">{{$couser['title']}}</p>
              <?php
              $string_length = 2000; // give a random character value including whitespace.
              if(strlen($content)>$string_length){
              do{
                  $new_string = mb_substr($content,0,$string_length);
                  $string_length++;
                  }while(ctype_graph(mb_substr($new_string,-1)));
                }
              else {
                 $new_string = $content;
              }

              echo $new_string; ?> 
              
              <a style="position: absolute;right: 28px;bottom: 0px;" data-toggle="modal" data-target="#myModal"> ... Đọc tiếp</a>
             

            
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
            <div class="tq3-image">
                        {{HTML::image(URL::to('uploads/training/'.$couser['thumbnail'].''))}}
             
            </div>
            <div class="bt-tt">
              <p class="name" style="text-align: center;font-size: 17px;font-weight: bold;" >{{$couser['name']}}</p>

              <p class="ct-worked" style="text-align: justify;">{{Str::words($couser['worked'], $limit = 50, $end = '<a id="worked" style="color:white"> ... Xem thêm</a> ')}} </p>
              
              <p class="ct-worked" style="display:none" align="justify">{{$couser['worked']}}</p>
               
            </div>
          </div>

          <div class="tq4">
          <p class="cdk">Các cách đăng ký khóa học</p>
          <p>Học viên đăng ký tham gia khóa học trực tiếp tại trung tâm đào tạo hoặc đăng ký online theo mẫu</p>

          <p class="ttht">Thông tin hỗ trợ</p>
          <p><i class="fa fa-phone-square"></i> <span style="font-weight: bold;"> Hotline :</span> +84-4-3577-1680  &nbsp;&nbsp;&nbsp;<i class="glyphicon glyphicon-envelope"></i>  <span style="font-weight: bold;">Email :</span> daotao@vnjobs.vn </p>
          
          <p><i class="fa fa-map-marker"></i> <span style="font-weight: bold;"> Địa điểm :</span></p><br>

          <span>
          -  Hà Nội : Tầng 10 Tòa nhà Sudico, Đường Mễ Trì, Phường Mỹ Đình 1, Quận Nam Từ Liêm, Hà Nội.
          </span><br><br>
          <span>
          -  Đà Nẵng : 06 Trần Phú, Hải Châu, Đà Nẵng.
          </span><br><br>
          <span>
          -  Hồ Chí Minh : 36- 38 A Trần Văn Dư, Quận Tân Bình, T.p Hồ Chí Minh.
          </span>
          
         </div>

    </div>
        <div class="col-md-6 pull-right tt-right">

        <div class="tq1-r">
          <h2 class="white">Thông tin chung</h2>
            <div class="col-md-9 pull-left dk1">
            <ul>
              <li>
                <h2>Khai giảng: </h2> <p>{{date("d-m-Y", strtotime($couser['date_open']))}}</p>
              </li>
              <li>
                <h2>Ca học : </h2> <p>{{$couser['shift']}}</p>
              </li>
              <li>
                <h2>Giờ học : </h2> <p>{{$couser['time_hour']}} giờ</p>
              </li>
              <li>
                <h2>Ngày học : </h2> <p>{{date("d-m-Y", strtotime($couser['date_study']))}}</p>
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
            {{@$image[0]}}
             
            <div class="bt-tt">
              <h2 class="white" id="chiphi">Chi Phí</h2>
              <p>Học phí : {{$couser['fee']}}</p>
              <p>Bao gồm :Tài liệu và chi phí</p>
              @if($couser['discount'] !=null)
              <div class="ttgiamgia">
                {{str_replace(".",".<br>",$couser['discount'])}}
             </div>
              @else
              <div class="ttgiamgia">Khóa học hiện tại không có chương trình giảm giá</div>
              @endif
            </div>
          </div>

          <div class="tq3-r">
            <h2 class="gv" id="giangvien">Giảng viên</h2>
            <p class="more" align="justify">
            {{Str::words($couser['yourself'], $limit = 100, $end = '<a id="more">... Xem thêm</a> ')}} 
          </p>
          <p class="more" align="justify" style="display:none">{{$couser['yourself']}}</p>

          </div>
          <div class="tq4_r" id="tq4_r">
            <h3>Nếu bạn muốn đăng ký online, vui lòng đăng ký thông tin theo mẫu dưới :</h3>
         
          <div id="thongbao"></div>
                  
          {{ Form::open(['role' => 'form','class'=>'form form-horizontal','files'=>true,'id'=>'dangky']) }}
          
                    
                    
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
                       <div class="image11">
                        {{HTML::image(URL::to('uploads/training/'.$gv['thumbnail'].''))}}
                         
                       </div>
                       <a href="{{URL::route('trainings.allgv')}}#{{$gv['id']}}">{{$gv['name']}}</a>
                    </li>
                  @endforeach
                     
                     
                     
                     
          </ul>

        </div>
        <script>

        

          $("#more").click(function() {
            $(".more").toggle('slow');
           } );
          $("#worked").click(function() {
            $(".ct-worked").toggle('slow');
           } );
        
        


        $('.captcha').click(function(event) {
          $(this).attr({
            src: '{{ URL::to('captcha') }}?t='+Math.random()
          });
        });




        $( "#dangky" ).submit(function( event ) {
          
          var url = "{{URL::route('trainings.detailcouser',$couser['id'])}}"; // the script where you handle the form input.

          $.ajax({
             type: "POST",
             url: url,
             data: $("#dangky").serialize(), // serializes the form's elements.
             success: function(data)
             {
                    // show response from the php script.
                    $('#thongbao').empty();

                    if (data.success ==false) {
                      $("#thongbao").addClass('alert alert-danger')
                      $.each( data.data, function( key, value ) {
                         $("#thongbao").append(value + '<br>');
                          
                      });
                    }

                    else 
                    {
                      $("#thongbao").removeClass('alert alert-danger').addClass('alert alert-success');
                      $("#thongbao").append(  " Đã gửi đăng ký, chúng tôi sẽ liên hệ với bạn trong thời gian sớm nhất");
                    }

             }
            });

          return false; // avoid to execute the actual submit of the form.


        });

        </script>

         

@stop

@section('style')
  <style type="text/css">
    .display-none {
      display: none;
    }
  </style>
@stop

@section('script')
  <script type="text/javascript">
    var lastScrollTop = 0;
    $(window).scroll(function(event){
       var st = $(this).scrollTop();
       if (st > lastScrollTop){
          checkScroll();
       } else {
          checkScroll();
       }
       lastScrollTop = st;
    });
    var checkScroll = function()
    {
      if($(document).scrollTop() >= 700)
      {
        $('.fixed-menu').removeClass('display-none');
      } else {
        $('.fixed-menu').addClass('display-none');
      }
    }
    checkScroll();  
  </script>
@stop