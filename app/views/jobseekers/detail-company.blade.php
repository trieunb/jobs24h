
					@if(count($jobs))
						<table class="table table-bordered">
							<thead>
								<tr>
									<th class="col-sm-2">Ngày</th>
									<th>Vị trí</th>
									<th>Địa điểm làm việc</th>
								</tr>
							</thead>
							<tbody>
								@foreach($jobs as $job)
								<tr>
									<td>{{date('d-m-Y',strtotime($job->updated_at))}}</td>
									<td class="capitalize"><a href="{{URL::route('jobseekers.job', array($job->slug, $job->id))}}">{{$job->vitri}}</a></td>
									<td>@foreach($job->province as $key=>$val)
										{{$job->province[$key]->province->province_name}}<br>
									@endforeach</td>
								</tr>
								@endforeach
							</tbody>
						</table>
						<div class="pull-right">
							{{ $jobs->links(); }}
						</div>
					@else
						<p class="uppercase text-align-center">Hiện tại chưa có tin đăng tuyển.</p>
					@endif