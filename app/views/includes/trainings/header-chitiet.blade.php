<header id="header_chitiet">
    <div class="container">
      <div class="col-md-3 column logo">
      <a href="{{URL::to('/')}}">
      {{HTML::image('training/assets/img/logo.png')}}</a>
      </div>
      <div class="col-md-9 column menu">


        <nav class="navbar navbar-default" role="navigation">
           
          
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav detail-hd">
              <li>
                <a href="{{ URL::route('jobseekers.home') }}">Người tìm việc</a>
              </li>
              <li>
                <a href="{{ URL::route('employers.home') }}">Nhà tuyển dụng</a>
              </li>
              <li>
                <a href="{{ URL::route('cungunglaodong.home') }}">Cung ứng lao động</a>
              </li>
              <li class="active1">
                <a href="{{ URL::route('trainings.home') }}">Đào tạo</a>
              </li>
               
            </ul>
            </div>
          
        </nav>
      </div>
      </div>
  </header>