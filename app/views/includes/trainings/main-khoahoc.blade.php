<div class="main-chitiet">
        <div class="container">

          
          <div class="top-main-ct">
          <div class="left"></div>
          <div class="main_ul">
          <h2>Các khóa học</h2>
          <ul>
          @foreach($training as $val)
            <li>
              <h3>{{$val['title']}}</h3>
              <p>Ngày khai giảng :{{$val['date_open']}}</p>
              <p>Ca học : {{$val['shift']}}</p>
              <p>Giờ học : {{$val['time_hour']}} giờ</p>
              <p>Ngày học : {{$val['date_study']}}</p>
              <p>Thời lượng : {{$val['time_day']}} buổi</p>
              <p>Học phí : {{$val['fee']}}</p>
              <button class="btn dowload"> Đăng ký </button>
            </li>
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