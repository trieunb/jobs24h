@extends('layouts.training')
@section('title') Trang chủ Đào tạo - VnJobs @stop
@section('header')

@include('includes.trainings.header-chitiet')

@stop
@section('content')

<div class="container">
        <div class="col-md-8">
                    @include('includes.trainings.submenu')

          <div class="content-chitiet">
          
            <h2>{{$doc['title']}}</h2>
            <p><i class="glyphicon glyphicon-eye-open"></i> Lượt xem : {{$doc['view']}}</p>
              <p><i class="glyphicon glyphicon-save"></i> Download : {{$doc['download']}}</p>

              <div class="clearfix"></div>
              <div class="col-md-4 img_book">
              	{{HTML::image($doc['thumbnail'],$doc['title'])}}
              </div>
              <div class="col-md-8"><p align="justify">{{$doc['content']}}</p>
              <a href="{{URL::route('trainings.dowloaddoc',array($doc['id']))}}" style="color:white">
              	<button class="btn dowload"><i class="glyphicon glyphicon-save"></i> Download</button>
              </a>
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
              {{HTML::image($val['thumbnail'],$val['title'])}}
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