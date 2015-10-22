@extends('layouts.training')
@section('title') Tài liệu chi tiết  @stop
@section('header')

@include('includes.trainings.header-chitiet')

@stop
@section('content')
{{ HTML::style('training/assets/css/jquery.onp.sociallocker.1.7.6.min.css') }}
{{ HTML::script('training/assets/js/jquery.ui.highlight.min.js') }}
{{ HTML::script('training/assets/js/jquery.onp.sociallocker.1.7.6.min.js') }}
 <script>
    jQuery(document).ready(function ($) {
        $("#default-usage .to-lock").sociallocker({
            demo: false,
      url: "https://www.facebook.com/vnjobs.vn",
            text: {
                header: "Bạn muốn download tài liệu này",
                message: "Vui lòng like hoặc shared để được tải về."
            },
            theme: "secrets",
            buttons: {
                order: [
                    "facebook-like","facebook-share"
                ]},
            facebook: {
                appId: "1536226246625315"
            }        
        });

    });
  </script>
<div class="container">
        <div class="col-md-8">
                    @include('includes.trainings.submenu')

          <div class="content-chitiet">
          
            <h2 style="line-height: 30px;">{{$doc['title']}}</h2>
            <p><i class="glyphicon glyphicon-eye-open"></i> Lượt xem : {{$doc['view']}}</p>
              <p><i class="glyphicon glyphicon-save"></i> Download : {{$doc['download']}}</p>

              <div class="clearfix"></div>
              <div class="col-md-4 img_book">
              	{{HTML::image(URL::to('uploads/training/'.$doc['thumbnail'].''),$doc['title'])}}
              </div>
              <div class="col-md-8"><p align="justify">{{$doc['content']}}</p>
               <article id="default-usage">
                  <div class="to-lock" style="display: none;">
                        <a href="{{URL::route('trainings.dowloaddoc',array($doc['id']))}}" style="color:white">
                          <button class="btn dowload"><i class="glyphicon glyphicon-save"></i> Download</button>
                        </a>
                  </div>
              </article>

             
              </div>
          
          </div>

        </div>

        <div class="col-md-4">
          <div class="sidebar_ct">
          <ul>
          @foreach($doc_diff as $val)
          <?php $create=explode(" ", $val['created_at']);
    			$date= date("d-m-Y", strtotime($create[0]));
           $str1 = trim(mb_strtolower($val['title']));
                  $str1 = preg_replace('/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/', 'a', $str1);
                  $str1 = preg_replace('/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/', 'e', $str1);
                  $str1 = preg_replace('/(ì|í|ị|ỉ|ĩ)/', 'i', $str1);
                  $str1 = preg_replace('/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/', 'o', $str1);
                  $str1 = preg_replace('/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/', 'u', $str1);
                  $str1 = preg_replace('/(ỳ|ý|ỵ|ỷ|ỹ)/', 'y', $str1);
                  $str1 = preg_replace('/(đ)/', 'd', $str1);
                  $str1 = preg_replace('/[^a-z0-9-\s]/', '', $str1);
                  $str1 = preg_replace('/([\s]+)/', '-', $str1);
    		?>

            <li>
              <div class="date-book">{{$date}}</div>
              {{HTML::image(URL::to('uploads/training/'.$val['thumbnail'].''),$val['title'])}}
              <h2>{{$val['title']}}</h2>
              <span>By {{$val['author']}}</span>
              <p><i class="glyphicon glyphicon-eye-open"></i> Lượt xem : {{$val['view']}} &nbsp;&nbsp;&nbsp;<i class="glyphicon glyphicon-save"></i> Download : {{$val['download']}}</p>
               
              <a href="{{URL::route('trainings.detaildoc',array($val['id']))}}/{{$str1}}"> <button class="btn btn-default more-book">Xem thêm </button></a>
            </li>
            @endforeach
            

          </ul>
          </div>
        </div>
      </div>
      <div class="clearfix"></div>
      @include('includes.trainings.main-khoahoc')

      <div class="clearfix"></div>
@stop