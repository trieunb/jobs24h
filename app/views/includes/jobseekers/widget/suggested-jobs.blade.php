<div class="title-page">
					<h2>Việc Làm Gợi Ý</h2>
				</div>
				<div id="searchresult">
				<ul>
						@foreach($jobs_for_widget as $job)
						<li>
							<div class="col-sm-1">
								<a href="{{URL::route('jobseekers.job', array($job->slug, $job->id))}}">{{HTML::image('../uploads/companies/images/'.$job->ntd->company->logo.'')}}</a>
							</div>
							<div class="col-sm-5">
								<div class="job-title">
									<a href="{{URL::route('jobseekers.job', array($job->slug, $job->id))}}">{{$job->vitri}}</a>
									<span class="new-tag">(Mới)</span>
								</div>
								<div class="job-info">
									{{$job->ntd->company->company_name}}
								</div>
								<div class="job-meta">
									<i class="glyphicon glyphicon-calendar"></i>
									Đăng tuyển: <span class="text-blue">{{date('d/m/Y',strtotime($job->updated_at))}}</span>
									<i class="glyphicon glyphicon-eye-open"></i>
									Số lượng xem: <span class="text-orange">{{$job->luotxem}}</span>
								</div>
							</div>
							<div class="col-sm-2">
								@foreach($job->province as $pv)
									{{ $pv->province->province_name }}<br>
								@endforeach
							</div>
							<div class="col-sm-3 pull-right">
								<div class="salary text-orange">
									<strong>
										@if($job->mucluong_max != 0)
											Tới ${{$job->mucluong_max}}
										@elseif($job->mucluong_max == 0 && $job->mucluong_min != 0)
											${{$job->mucluong_min}}
										@else 
											Thỏa thuận
										@endif
									</strong>
								</div>
								<div class="share">
									<a href="{{URL::route('jobseekers.save-job', array($job->id))}}" title="Lưu việc làm này">{{HTML::image('assets/images/icons/floppy-copy.png')}}</a>
									<a href="#" title="Tìm kiếm việc làm tương tự">{{HTML::image('assets/images/icons/search-job.png')}}</a>
									<a href="#" title="Lưu việc làm này">{{HTML::image('assets/images/icons/email-job.png')}}</a>
								</div>
								<a href="#" class="share-with-friend" title="Lưu việc làm này"><i class="glyphicon glyphicon-share-alt"></i> Giới thiệu bạn bè</a>
							</div>
						</li>
						<?php 
							foreach ($job->province as $pv) {
								$arr_pv[] = $pv->province_id;
							}
							foreach ($job->category as $cate) {
								$arr_cate[] = $cate->cat_id;
							}
						?>
						@endforeach
					</ul>
				</div>
				<a href="{{URL::route('jobseekers.search-job', array('province' => $arr_pv, 'categories'=> $arr_cate))}}" class="pull-right push-top"><strong>Xem tất cả việc làm tương tự</strong></a>