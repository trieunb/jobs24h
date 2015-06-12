@extends('layouts.employer')
@section('title') Báo cáo tác vụ @stop
@section('content')
	<section class="boxed-content-wrapper clearfix">
		<div class="container">
			<aside id="sidebar" class="col-sm-3">
				@include('includes.employers.accounttask_navbar')
			</aside>

			<section id="content" class="pull-right right">
				<div class="boxed">
					<div class="heading-image">
						<h2 class="text-blue">{{ HTML::image('assets/ntd/images/icon-logs-lg.png') }} Các tác vụ đã thực hiện</h2>
					</div>
					<div class="filter">
						<label>Các thao tác của <span class="text-orange">{{ Auth::getUser()->full_name }}</span>
					</label>
					</div>
					<table class="table table-bordered table-blue-bordered white">
						<thead>
							<tr>
								<th>Ngày</th>
								<th>Loại thao tác</th>
								<th>Đối tượng thao tác</th>
								<th>Người thao tác</th>
							</tr>
						</thead>
						<tbody>
							@if(count($task))
							@foreach($task as $val)
								<tr>
									<td>{{ $val->created_at->format('Y-m-d') }}</td>
									<td>{{ $val->taskName() }}</td>
									<td>{{ $val->target }}</td>
									<td>{{ $val->ntd->full_name }}</td>
								</tr>
							@endforeach
							@endif
							
						</tbody>
					</table>
					<div id="pagination" class="pull-right pagination-sm pagination-blue push-top">
						{{ $task->links() }}
					</div>
					
				</div>		
			</section>
@stop