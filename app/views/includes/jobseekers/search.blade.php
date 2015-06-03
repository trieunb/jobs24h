<div class="boxed-search">
	<div class="bg-search row">
				<div class="search-form container">
					{{Form::open(array('route'=>array('jobseekers.search-job'), 'class'=>'form', 'method'=>'GET' ))}}
					
						<div class="col-sm-9">
							<div class="col-sm-8">
			                    <label class="hidden-xs text-white">Tìm việc làm...</label>
			                    {{Form::input('text','keyword', null, array('class'=>'form-control search-all', 'placeholder'=>'Nhập Chức Danh, Vị Trí Công Việc, Kỹ Năng Liên Quan...'))}}
			                </div>
			                <div class="col-sm-4">
			                	<label class="hidden-xs text-white">Tại Việt Nam</label>
			                	{{Form::select('province[]', Province::lists('province_name', 'id'),null, array('class'=>'form-control chosen-select', 'id'=>'locationMainSearch', 'multiple'=>'true','data-placeholder'=>'Tất cả địa điểm','multiple'))}}
		                    </div>
		                    <div class="clearfix"></div>
		                    <div class="col-sm-4">
		                   		{{Form::select('categories[]', Category::lists('cat_name', 'id'),null, array('class'=>'form-control chosen-select', 'id'=>'categoryMainSearch', 'multiple'=>'true','data-placeholder'=>'Tất cả ngành nghề','multiple'))}}
		                    </div>
		                    <div class="col-sm-4">
		                    	{{Form::input('number','salary', null, array('class'=>'form-control search-all','step'=>'50' ,'placeholder'=>'Mức lương tối thiểu hàng tháng (USD)'))}}
		                    </div>
		                    <div class="col-sm-4">
		                    	{{Form::select('level', array('all'=>'Tất cả cấp bậc')+Level::lists('name', 'id'),null, array('class'=>'form-control chosen-select', 'id'=>'jobLevelMainSearch','data-placeholder'=>'Tất cả cấp bậc'))}}
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
		                    	<a href="#"><strong class="text-white">Ngành nghề hấp dẫn <i class="glyphicon glyphicon-arrow-right"></i></strong></a>
		                	</div>
		                </div>
					{{Form::close()}}
				</div>
					<div class="shadow"></div>
				</div>
				<div class="container">
					<ul class="fa-ul bottom-search">
						<li><i class="fa-li fa fa-square"></i><a href="">Top Ngành Nghề</a></li>
						<li><i class="fa-li fa fa-square"></i><a href="">Top Địa Điểm</a></li>
						<li><i class="fa-li fa fa-square"></i><a href="" class="new">Việc Làm Toàn Cầu</a></li>
						<li><i class="fa-li fa fa-square"></i><a href="">Download Ứng Dụng VNJobs</a></li>
					</ul>
				</div>
			</div><!-- boxed-search -->