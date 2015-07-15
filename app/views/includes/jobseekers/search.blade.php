<div class="boxed-search">
	<div class="bg-search row">
				<div class="search-form container">
					<?php 
					if (!isset($keyword)) {
						$keyword = null;
					} 
					if (!isset($province)) {
						$province = null;
					} 
					if (!isset($categories)) {
						$categories = null;
					} 
					if (!isset($salary)) {
						$salary = null;
					} 
					if (!isset($level)) {
						$level = null;
					} 
					?>
					{{Form::open(array('route'=>array('jobseekers.search-job'), 'class'=>'form', 'method'=>'GET' ))}}
						<div class="col-sm-9">
							<div class="col-sm-8">
			                    <label class="hidden-xs text-white">Tìm việc làm...</label>
			                    {{Form::input('text','keyword', $keyword, array('class'=>'form-control search-all', 'placeholder'=>'Nhập Chức Danh, Vị Trí Công Việc, Kỹ Năng Liên Quan...'))}}
			                </div>
			                <div class="col-sm-4">
			                	<label class="hidden-xs text-white">Tại Việt Nam</label>
			                	{{Form::select('province[]', Province::lists('province_name', 'id'),$province, array('class'=>'form-control chosen-select', 'id'=>'locationMainSearch', 'multiple'=>'true','data-placeholder'=>'Tất cả địa điểm','multiple'))}}
		                    </div>
		                    <div class="clearfix"></div>
		                    <div class="col-sm-4">
		                   		{{Form::select('categories[]', Category::getList(),null, array('class'=>'form-control chosen-select categories', 'id'=>'categoryMainSearch', 'multiple'=>'true','data-placeholder'=>'Tất cả ngành nghề','multiple'))}}
		                    </div>
		                    <div class="col-sm-4">
		                    	{{Form::input('number','salary', $salary, array('class'=>'form-control search-all','step'=>'10' ,'placeholder'=>'Mức lương tối thiểu hàng tháng (VND)'))}}
		                    </div>
		                    <div class="col-sm-4">
		                    	{{Form::select('level', array('all'=>'Tất cả cấp bậc')+Level::lists('name', 'id'),$level, array('class'=>'form-control chosen-select', 'id'=>'jobLevelMainSearch','data-placeholder'=>'Tất cả cấp bậc'))}}
		                    </div>
						</div>
						<div class="col-sm-9">
                            <div class="col-xs-7 col-sm-3 col-sm-push-6 push-top-xs">
                            	<div class="relative">
                       				<button class="btn-search btn btn-default" type="button"><strong>Việc Làm Cao Cấp</strong></button><strong class="text-red small absolute-right"><em>Mới</em></strong>
                       			</div>
                   			</div>
		                    <div class="col-sm-3 col-sm-push-6 push-top-xs">
		                        <button class="btn-search btn bg-orange" type="submit">
		                            <span><strong class="text-white">Tìm ngay!</strong></span>
		                        </button>
		                    </div>
		                    <div class="col-sm-6 col-sm-pull-6 push-top-md">
		                    	<a href="{{URL::route('jobseekers.get-list-category')}}"><strong class="text-white">Ngành nghề hấp dẫn <i class="glyphicon glyphicon-arrow-right"></i></strong></a>
		                	</div>
		                </div>
					{{Form::close()}}
				</div>
					<div class="shadow"></div>
				</div>
				<div class="container">
					<ul class="fa-ul bottom-search">
						<li class="top-category"><i class="fa-li fa fa-square"></i>Top Ngành Nghề
							<ul class="arrow-square-orange hidden-xs">
								<h4>Top Ngành Nghề <span><i class="fa-li fa fa-remove"></i></span></h4>
								@foreach($widget_categories_hot as $key => $cate)
								@if($key < 12)
									<li class="col-sm-6"><a href="{{URL::route('jobseekers.get-category', array('id'=>$cate->id))}}">{{$cate->cat_name}}</a></li>
									@endif
								@endforeach
								<div class="clearfix"></div>
								<a href="{{URL::route('jobseekers.get-list-category')}}" class="btn btn-sm bg-orange pull-right">Xem thêm</a>
							</ul>
						</li>
						<li class="top-province"><i class="fa-li fa fa-square"></i>Top Địa Điểm
							<ul class="arrow-square-orange hidden-xs">
								<h4>Top Địa Điểm <span><i class="fa-li fa fa-remove"></i></span></h4>
								@foreach($widget_province_hot as $key => $province)
									@if($key < 12)
									<li class="col-sm-6"><a href="{{URL::route('jobseekers.search-job', array('province[]'=>$province->id))}}">{{$province->province_name}}</a></li>
									@endif
								@endforeach
								<div class="clearfix"></div>
								<a href="{{URL::route('jobseekers.get-list-province')}}" class="btn btn-sm bg-orange pull-right">Xem thêm</a>
							</ul>
						</li>
						
					</ul>
				</div>
			</div><!-- boxed-search -->