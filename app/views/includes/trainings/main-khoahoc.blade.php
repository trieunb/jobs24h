<div class="main-chitiet">
        <div class="container">

          
          <div class="top-main-ct">
          <div class="left"></div>
          <div class="main_ul">
          <h2>Các khóa học</h2>
          <ul>
          @foreach($training as $val)
          <?php 
                
                  $str = trim(mb_strtolower($val['title']));
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
            <li>
              <h3><a href="{{URL::route('trainings.detailcouser',$val['id'])}}/{{$str}}">{{$val['title']}}</a></h3>
              <p>Ngày khai giảng :{{$val['date_open']}}</p>
              <p>Ca học : {{$val['shift']}}</p>
              <p>Giờ học : {{$val['time_hour']}} giờ</p>
              <p>Ngày học : {{$val['date_study']}}</p>
              <p>Thời lượng : {{$val['time_day']}} buổi</p>
              <p>Học phí : {{$val['fee']}}</p>

              <a href="{{URL::route('trainings.detailcouser',$val['id'])}}/{{$str}}#tq4_r"><button class="btn dowload"> Đăng ký </button>
            </a></li>
            @endforeach
             
          </ul>  

          </div>
         
          <div class="right"></div>
          </div>
          <div class="clearfix"></div>
           <div class="bottom-main-ul">
            
           {{HTML::image('training/assets/img/bottom_ct.png')}}
           </div>
        </div>
        </div>