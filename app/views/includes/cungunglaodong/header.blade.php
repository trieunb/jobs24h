
		<header id="header">
			<nav id="navigation">
				<ul class="menu container">
					<li class="logo"><a href="#" title="Trang tuyển dụng lớn nhất Việt Nam">
					{{HTML::image('cungunglaodong/assets/images/logo.png')}}
					 </a></li>
					<li><a href="{{ URL::route('cungunglaodong.home') }}" class="text-orange">Cung Ứng Lao Động <i class="fa fa-chevron-down"></i></a></li>
					<li><a href="{{ URL::route('jobseekers.home') }}">Người tìm việc <i class="fa fa-chevron-down"></i></a></li>
					
					<li><a href="{{ URL::route('employers.launching') }}">Nhà tuyển dụng <i class="fa fa-chevron-down"></i></a></li>
					<li><a href="{{ URL::route('trainings.home') }}">Đào tạo <i class="fa fa-chevron-down"></i></a></li>
				</ul>	
			</nav>
			<div class="main-banner">
			{{HTML::image('cungunglaodong/assets/images/banner.png')}}
				
			
			</div>
		</header>
		<section id="boxed-main-content">