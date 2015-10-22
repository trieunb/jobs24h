@extends('layouts.training')
@section('title') Chi tiết giảng viên @stop
@section('header')

@include('includes.trainings.header-chitiet')

@stop
@section('content')
<style type="text/css">
  .image2 {
    position: relative;
    background-color: rgba(122, 203, 229, 1);
    border-radius: 50%;
    height: 160px;
    width: 160px;
    display: inline-block;
}.image2 img{
  border-radius: 50%;
      height: 100%;
      width: 100%;
}
</style>
<div class="container">
        <div class="col-md-12">
          <div class="col-md-8">   @include('includes.trainings.submenu')</div>
          <div class="col-md-4"></div>
        </div>
        <div class="clearfix"></div>
        <div class="col-md-8">
        
           @foreach($people as $value)
           <div class="col-md-12">
           <div class="col-md-4">
              <div class="image2">
                {{HTML::image(URL::to('uploads/training/'.$value['thumbnail'].''))}}
              </div>
           </div>
            <?php 
                
                  $str = trim(mb_strtolower($value['name']));
                  $str = preg_replace('/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/', 'a', $str);
                  $str = preg_replace('/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/', 'e', $str);
                  $str = preg_replace('/(ì|í|ị|ỉ|ĩ)/', 'i', $str);
                  $str = preg_replace('/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/', 'o', $str);
                  $str = preg_replace('/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/', 'u', $str);
                  $str = preg_replace('/(ỳ|ý|ỵ|ỷ|ỹ)/', 'y', $str);
                  $str = preg_replace('/(đ)/', 'd', $str);
                  $str = preg_replace('/[^a-z0-9-\s]/', '', $str);
                  $str = preg_replace('/([\s]+)/', '-', $str);
                   
                 
                ?>
           <div class="col-md-8" style="text-align:left">
             <h4 id="{{$str}}" style="color: #08DDFF;font-weight: bold;">
                  {{$value['name']}}
             </h4>

             <p class="btn{{$value['id']}}" style="display:none;text-align: justify;">{{$value['yourself']}}</p>

             <p class="btn{{$value['id']}}" style="text-align: justify;">{{Str::words($value['yourself'], $limit = 50, $end = '...')}}</p>

              
              
             <button id="btn{{$value['id']}}" style="margin: 13px 0px 50px 0px;" class="btn btn-danger" role="button" data-toggle="" data-target="">Xem chi tiết</button>
             
             

           </div>
           <div class="cleafix"></div>


           </div>



           @endforeach

           <script type="text/javascript">

          $("button").click(function() {
            var id = $(this).attr('id');
            
            
            $("."+id).toggle('slow');
             
           } );
           </script>

         </div>
        <div class="col-md-4" style="box-shadow: 0px 0px 3px 3px #EEEEEE;padding-top: 33px;margin-left: 14px; margin-top: -41px;width: 32%;">
          <div class="col-md-12">
          {{HTML::image('training/assets/img/hotro.png')}}
          <blockquote style=" padding: 0px 20px;margin: 10px 28px 20px; border-left: 5px solid #eee; text-align:left">
             {{HTML::image('training/assets/img/yahoo.png')}} {{HTML::image('training/assets/img/skype.png')}}
             <h4>Điện thoại: 04.3232.1999</h4>
             <h5 style="margin-top: -20px;">Tư vấn và hỗ trợ học viên online</h5>
          </blockquote> 
          </div>
        </div>

        <div class="clearfix"></div>
         
          <div class="main5" id="hvtb">
          <h2>Giảng viên tiêu biểu</h2>
          <h3>Một số hình ảnh của học viện và giảng viên được chúng tôi lưu trữ lại</h3>
          <ul>
              @foreach($people1 as $gv)
                    <li>
                    <div class="image11">
                        {{HTML::image(URL::to('uploads/training/'.$gv['thumbnail'].''))}}
                    </div>
                    <p>{{$gv['name']}}</p>
                    </li>
               @endforeach
          </ul>

        
        </div>
</div>
   

  

      
@stop