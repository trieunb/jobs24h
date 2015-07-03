@extends('layouts.jobseeker')
@section('title') Hồ sơ - VnJobs @stop
@section('content')
	<div class="container">
		@include('includes.jobseekers.breadcrumb')
	</div>
	<section class="main-content container single-post">
		<section id="content" class="col-sm-9">
				<div class="box">
					<div class="col-sm-3">
						<div class="avatar">
						@if(isset($user))
							@if($user->avatar !=null)
								{{ HTML::image('uploads/jobseekers/avatar/'.$user->avatar.'') }}
							@else
								{{ HTML::image('assets/images/avatar.jpg') }}
							@endif
						@endif
						</div>
					</div>
					<div class="col-sm-9">
						<div class="profile">
							<h2>{{$user->first_name}} {{$user->last_name}}</h2>
							<p>Điện thoại: <span class="text-blue">{{$user->phone_number}}</span></p>
							<p>Email: <span class="text-blue">{{$user->email}}</span></p>
							<p>Hồ Sơ: <a href="{{URL::route('jobseekers.view-resume', array($my_resume->id))}}" class="text-blue" target="_blank">{{URL::route('jobseekers.view-resume', array($my_resume->id))}}</a></p>
						</div>
					</div>
				</div><!-- Box -->
				<div class="boxed">
				<div class="rows">
					<div class="title-page">
						<h2>Thông tin cá nhân</h2> 
						<!--<a href="#" class=" pull-right"><i class="fa fa-edit"></i> Chỉnh sửa</a>-->
					</div>
							<div class="form-group">
								<label for="" class="col-sm-3 control-label">Ngày sinh:</label>
								<div class="col-sm-3">
					                {{$user->date_of_birth}} 
								</div>
								<label for="" class="col-sm-3 control-label">Giới tính:</label>
								<div class="col-sm-3">
									@if($user->gender == 0)
										Nam
									@else
										Nữ
									@endif
								</div>
							</div>
							<div class="clearfix"></div>
							<div class="form-group">
								<label for="" class="col-sm-3 control-label">Tình trạng hôn nhân:</label>
								<div class="col-sm-3">
									@if($user->marital_status == 0)
										Độc thân
									@else
										Đã kết hôn
									@endif
								</div>
								<label for="" class="col-sm-3 control-label">Quốc tịch:</label>
								<div class="col-sm-3">
									@if($user->country != null)
										{{$user->country->country_name}}
									@endif		
								</div>
							</div>
							<div class="clearfix"></div>
							<div class="form-group">
								<label for="" class="col-sm-3 control-label">Địa chỉ:</label>
								<div class="col-sm-9">
									{{$user->address}}
								</div>
							</div>
							<div class="clearfix"></div>
							<div class="form-group">
								<label for="" class="col-sm-3 control-label">Quốc gia:</label>
								<div class="col-sm-3">
									@if($user->country != null)
										{{$user->country->country_name}}
									@endif
								</div>
								<label for="" class="col-sm-3 control-label">Tỉnh/Thành phố:</label>
								<div class="col-sm-3">
									@if($user->province != null)
										{{$user->province->province_name}}
									@endif
								</div>
							</div>
				</div><!-- rows -->
				</div><!-- boxed -->
				
				@if($my_resume->namkinhnghiem != null || $my_resume->namkinhnghiem != 0)
				<div class="boxed">
				<div class="rows">
					<div class="title-page">
						<h2>Thông tin chung</h2> 
						<!--<a href="#" class=" pull-right"><i class="fa fa-edit"></i> Chỉnh sửa</a>-->
					</div>
						
						<div class="form-group">
			                <label class="col-sm-3 control-label">Số năm kinh nghiệm:</label>
			                <div class="col-sm-3">
			                	<?php if ($my_resume->namkinhnghiem == 0){$namkinhnghiem = 'Thỏa thuận';}else{$namkinhnghiem= $my_resume->namkinhnghiem;}?>
			                	{{$namkinhnghiem}}
			                </div>
			            </div>
			            <div class="clearfix"></div>
			            <div class="form-group">
			            	<label class="col-sm-3 control-label">Bằng cấp cao nhất:</label>
			            	<div class="col-sm-3">
			            		@if(count($my_resume->bangcap))
			            		{{$my_resume->bangcap->name}}
			            		@endif
			            	</div>
			            </div>
			            <div class="clearfix"></div>
			            <div class="form-group">
			            	<label class="col-sm-3 control-label">Ngoại ngữ:</label>
				            <div class="col-sm-3 ">
				            	@foreach($my_resume->cvlanguage as $value)
				            		@if($value->lang_id != 0)
				            		{{$value->lang->lang_name}}<br>
				            		@endif
				            	@endforeach
				            </div>
				            <label class="col-sm-3 control-label">Ngoại ngữ:</label>
				            <div class="col-sm-3 ">
				            	@foreach($my_resume->cvlanguage as $value)
				            		@if($value->level != 0)
				            		{{$value->lvlang->name}}<br>
				            		@endif
				            	@endforeach
				            </div>	
			            </div>
			            <div class="clearfix"></div>
			            <div class="form-group">
			            	<label class="col-sm-3 control-label">Công ty gần đây nhất:</label>
			            	<div class="col-sm-9">
			            		{{$my_resume->ctyganday}}
			            	</div>
			            </div>
			            <div class="clearfix"></div>
			            <div class="form-group">
			            	<label class="col-sm-3 control-label">Công việc gần đây nhất:</label>
			            	<div class="col-sm-3">
			            		{{$my_resume->cvganday}}
			            	</div>
			            	<label class="col-sm-3 control-label">Cấp bậc hiện tại:</label>
			            	<div class="col-sm-3">
			            		@if(count($my_resume->level))
			            		{{$my_resume->level->name}}
			            		@endif
			            	</div>
			            </div>
			            <div class="clearfix"></div>
			            <div class="form-group">
			            	<label class="col-sm-3 control-label">Vị trí mong muốn:</label>
			            	<div class="col-sm-3">
			            		{{$my_resume->vitrimongmuon}}
			            	</div>
			            	<label class="col-sm-3 control-label">Cấp bậc mong muốn:</label>
			            	<div class="col-sm-3">
			            	@if(count($my_resume->capbac))
			            		{{$my_resume->capbac->name}}
			            		@endif
			            	</div>
			            </div>
			            <div class="clearfix"></div>
			            <div class="form-group">
				            <label class="col-sm-3 control-label">Nơi làm việc:</label>
				            	<div class="col-sm-3">
				 				@foreach($my_resume->location as $value)
				 					{{$value->province->province_name}}<br>
				 				@endforeach
			            		</div>
			            	<label class="col-sm-3 control-label">Ngành nghề:</label>
			            	<div class="col-sm-3">
			            		@foreach($my_resume->cvcategory as $value)
				 					{{$value->category['cat_name']}}<br>
				 				@endforeach
			            	</div>
			            </div>
			            <div class="form-group">
			                <label class="col-sm-3 control-label">Mức lương mong muốn:</label>
							<div class="col-sm-4">
								@if($my_resume->mucluong == 0)
									Thỏa thuận
								@else
									{{$my_resume->mucluong}}
								@endif
								</div>
						</div>
				</div><!-- rows -->
				</div><!-- boxed -->
				@endif
				@if($my_resume->dinhhuongnn != '')
				<div class="boxed">
				<div class="rows">
					<div class="title-page">
						<h2>Định hướng nghề nghiệp</h2>
					</div>
					<label>Giới Thiệu Bản Thân Và Miêu Tả Mục Tiêu Nghề Nghiệp Của Bạn:</label>
					<div class="col-sm-12 row">
						{{$my_resume->dinhhuongnn}}
					</div>
				</div><!-- rows -->
				</div><!-- boxed -->
				@endif
				@if(count($my_resume->experience))
				@foreach($my_resume->experience as $exp)
				@endforeach
				@if($exp->position != null)
				<div class="boxed">
					<div class="rows">
						<div class="title-page">
							<h2>Kinh nghiệm làm việc</h2>
							<!--<a href="#" class=" pull-right"><i class="fa fa-edit"></i> Chỉnh sửa</a>-->
						</div>
							@foreach($my_resume->experience as $exp)
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Chức danh:</label>
								<div class="col-sm-10">
									{{$exp->position}}
								</div>
							</div>
							<div class="clearfix"></div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Công ty:</label>
								<div class="col-sm-10">
									{{$exp->company_name}}
								</div>
							</div>
							<div class="clearfix"></div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Từ tháng:</label>
								<div class="col-sm-3">
									{{$exp->from_date}}
								</div>
								<label for="" class="col-sm-2 control-label">Đến tháng:</label>
								<div class="col-sm-3">
									{{$exp->to_date}}
								</div>
							</div>
							<div class="clearfix"></div>
							<div class="form-group">
				            	<label class="col-sm-2 control-label">Lĩnh vực:</label>
				            	<div class="col-sm-4">
				            		@if(count($exp->fieldofwork))
				            		{{$exp->fieldofwork->name}}
				            		@endif
				            	</div>
				            </div>
				            <div class="clearfix"></div>
				            <div class="form-group">
				            	<label class="col-sm-2 control-label">Chuyên ngành:</label>
				            	<div class="col-sm-4">
				            		@if(count($exp->chuyennganh))
				            		{{$exp->chuyennganh->name}}
				            		@endif
				            	</div>
				            </div>
				            <div class="clearfix"></div>
				            <div class="form-group">
				            	<label class="col-sm-2 control-label">Cấp bậc:</label>
				            	<div class="col-sm-4">
				            		@if(count($exp->capbac))
				            		{{$exp->capbac->name}}
				            		@endif
				            	</div>
				            </div>
				            <div class="clearfix"></div>
				            <div class="form-group">
				            	<label class="col-sm-2 control-label">Mức lương</label>
				            	<div class="col-sm-4">
				            		{{$exp->salary}}
				            	</div>
				            </div>
				            <div class="clearfix"></div>
				            <div class="form-group">
				            	<label class="col-sm-2 control-label">Mô tả</label>
				            	<div class="col-sm-10">
									{{$exp->job_detail}}
								</div>
							</div>
							@endforeach
					</div><!-- rows -->
				</div><!-- boxed -->
				@endif
				@endif
				@if(count($my_resume->education))
				@foreach($my_resume->education as $education)
				@endforeach
				@if($education->specialized != null )
				<div class="boxed">
					<div class="rows">
						<div class="title-page">
							<h2>Học vấn và Bằng Cấp</h2>
						</div>
						@foreach($my_resume->education as $education)
							<div class="form-group">
								<label class="col-sm-3 control-label">Chuyên ngành:</label>
				            	<div class="col-sm-9">
				            		{{$education->specialized}}
				            	</div>
							</div>
							<div class="clearfix"></div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Trường:</label>
				            	<div class="col-sm-4">
				            		{{$education->school}}
				            	</div>
				            	<label class="col-sm-2 control-label">Bằng cấp:</label>
				            	<div class="col-sm-3">
				            		@if(count($education->edu))
				            		{{$education->edu->name}}
				            		@endif
				            	</div>
							</div>
							<div class="clearfix"></div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Từ tháng</label>
				            	<div class="col-sm-4">
				            		{{$education->study_from}}
				            	</div>
				            	<label class="col-sm-2 control-label">Đến tháng</label>
				            	<div class="col-sm-3">
				            		{{$education->study_to}}
				            	</div>
							</div>
							<div class="clearfix"></div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Lĩnh vực nghiên cứu:</label>
				            	<div class="col-sm-4">
				            		@if(count($education->linhvuc))
				            		{{$education->linhvuc->name}}
				            		@endif
				            	</div>
				            	<label class="col-sm-2 control-label">Điểm:</label>
				            	<div class="col-sm-3">
				            		@if(count($education->diem))
				            		{{$education->diem->name}}
				            		@endif
				            	</div>
							</div>
							<div class="clearfix"></div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Thành tựu</label>
								<div class="col-sm-9">
									{{$education->achievement}}
								</div>
							</div>
							@endforeach
					</div><!-- rows -->
				</div><!-- boxed -->
				@endif
				@endif
				<?php $skills = json_decode($my_resume->kynang);?>
				@if(count($skills))
				<div class="boxed">
					<div class="rows">
						<div class="title-page">
							<h2>Kỹ năng</h2>
						</div>
						
						<div class="col-sm-8"><h3 class="text-gray-light">Kỹ năng</h3></div>
						<div class="col-sm-4"><h3 class="text-gray-light">Mức độ thành thạo</h3></div>
						<div class="box">
							@for ($i=0; $i < count($skills) ; $i++)
								<div class='form-group'>
									<div class='col-sm-8'>
										{{$skills[$i][0]}}<br>
									</div>
									<div class='col-sm-4'>
										@if($skills[$i][1]==1)
											Sơ cấp<br>
										@elseif($skills[$i][1]==1)
											Trung cấp<br>
										@else
											Cao cấp<br>
										@endif
									</div>
								</div>
							@endfor
						</div>
					</div><!-- rows -->
				</div><!-- boxed -->
				@endif
	</section>
	<aside id="sidebar" class="col-sm-3 pull-right">
		@if(count($camnang_ntv))
				<div class="widget row">
					<h3>Cẩm nang nghề nghiệp</h3>
					<ul>
						@foreach($camnang_ntv as $post)	
						<li>
							<div class="col-sm-3">{{$post->thumbnail}}</div>
							<div class="col-sm-9">
								<a href="#" class="text-blue">{{$post->title}}</a>
								<?php
									// strip tags to avoid breaking any html
									$string = $post->content;
									$string = strip_tags($string);

									if (strlen($string) > 50) {
									    // truncate string
									    $stringCut = substr($string, 0, 50);
									    // make sure it ends in a word so assassinate doesn't become ass...
									    $string = substr($stringCut, 0, strrpos($stringCut, ' ')); 
									}
									echo "<p>$string</p>";
								?>
							</div>
						</li>
						@endforeach
					</ul>
				</div>
		@endif			
	</aside>
	</section>
@stop
