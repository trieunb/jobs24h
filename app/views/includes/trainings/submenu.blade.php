<div class="menu-chitiet">


            <a href="{{URL::to('/')}}"><i class="fa fa-home"></i> Trang chủ 
            <a href="{{URL::route('trainings.home')}}"><i class="fa fa-chevron-right"></i> Đào tạo </a>
            
            <?php
             
            
            if(Request::is(''.Request::segment(1).'/trainings/detail-doc/*'))
           	echo '<a href="'.URL::route("trainings.alldoc").'"><i class="fa fa-chevron-right"></i> Tài liệu </a>';
            else
            echo '<a href="'.URL::route("trainings.allpost").'"><i class="fa fa-chevron-right"></i> Tin tức </a>';
           
            ?>
            <i class="fa fa-chevron-right"></i> <span>@yield('title')</span>
          	</a>

          </div>