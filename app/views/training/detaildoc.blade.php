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
                message: "Vui lòng like để được tải về."
            },
            theme: "secrets",
            buttons: {
                order: [
                    "facebook-like"
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
                       <a  href="{{URL::route('trainings.dowloaddoc',array($doc['id']))}}" style="color:white">
                       <button class="btn dowload"> <i class="glyphicon glyphicon-save"></i> Download </button>
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
    		?>
            <li>
              <div class="date-book">{{$date}}</div>
              {{HTML::image(URL::to('uploads/training/'.$val['thumbnail'].''),$val['title'])}}
              <h2>{{$val['title']}}</h2>
              <span>By {{$val['author']}}</span>
              <p><i class="glyphicon glyphicon-eye-open"></i> Lượt xem : {{$val['view']}} &nbsp;&nbsp;&nbsp;<i class="glyphicon glyphicon-save"></i> Download : {{$val['download']}}</p>
               
              <a href="{{URL::route('trainings.detaildoc',array($val['id']))}}"> <button class="btn btn-default more-book">Xem thêm </button></a>
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