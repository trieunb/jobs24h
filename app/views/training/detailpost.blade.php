@extends('layouts.training')
@section('title') Tin tức chi tiết @stop
@section('header')

@include('includes.trainings.header-chitiet')

@stop
@section('content')

<div class="container">
        <div class="col-md-8">
          

          @include('includes.trainings.submenu')


          
          <div class="content-chitiet">
            <h2 style="line-height: 35px;">{{$post['title']}}</h2>
             <?php $create=explode(" ", $post['created_at']);
               $date= date("d-m-Y", strtotime($create[0]));
              ?>
            <p>{{$date}}</p>
              

              <div class="clearfix"></div>
              @if(!empty($post['thumbnail']))

              <img style="width:100%" src="{{URL::to('uploads/training/'.$post['thumbnail'].'')}}">
              @endif
              <h3>{{$post['subtitle']}}</h3>

               <p>{{$post['content']}}</p>
                          
              <h2>Bình luận </h2> 
              <div class="fb-comment">
                <div id="fb-root"></div>
                  <script>(function(d, s, id) {
                    var js, fjs = d.getElementsByTagName(s)[0];
                    if (d.getElementById(id)) return;
                    js = d.createElement(s); js.id = id;
                    js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.3&appId=117547711913462";
                    fjs.parentNode.insertBefore(js, fjs);
                  }(document, 'script', 'facebook-jssdk'));
                  </script>
                  <div class="fb-comments" data-href="{{URL::route('trainings.detailpost',$post['id'])}}" data-numposts="5"></div>
              </div>
          </div>

        </div>

        <div class="col-md-4">
          <div class="sidebar_ct">
          <ul>
          @foreach($post_diff as $val)
          <?php preg_match('/<img[^>]+>/i',$val['content'], $image); 
               ?>
              
            <li>
              <div class="img-tt">
              @if($val['thumbnail']==null)
              {{$image[0]}}
               
              @else
              {{HTML::image(URL::to('uploads/training/'.$val['thumbnail'].''))}}
              @endif
              </div>
              <h2><a href="{{URL::route('trainings.detailpost',array($val['id']))}}">{{$val['title']}}</a></h2>
              <?php $create=explode(" ", $val['created_at']);
               $date= date("d-m-Y", strtotime($create[0]));
              ?>
              <span>{{$date}}</span>
              <p>{{$val['subtitle']}}</p>
              <div class="line"></div>
               
               
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