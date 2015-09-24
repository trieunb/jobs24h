@extends('layouts.admin')
@section('content')
	
	<div class="row">
		<div class="col-sm-12 infobox-container">
			<div class="infobox infobox-green">
				<!-- <div class="infobox-icon">
					<i class="ace-icon fa fa-bar-chart"></i>
				</div> -->

				<div class="infobox-data">
				<div class="infobox-content">Tổng số tin đăng</div>
					<span class="infobox-data-number"><a href="{{URL::route('admin.jobs.index')}}">{{ $totalJobs }}</a></span>
					
				</div>

				<!-- <div class="stat stat-success">8%</div> -->
			</div>

			<div class="infobox infobox-blue">
				<!-- <div class="infobox-icon">
					<i class="ace-icon fa fa-clock-o"></i>
				</div> -->

				<div class="infobox-data">
				<div class="infobox-content">Tin mới chưa duyệt</div>
					<span class="infobox-data-number"><a href="{{URL::route('admin.jobs.waiting')}}">{{ $totalWaiting }}</a></span>
					
				</div>

				<!-- <div class="badge badge-success">
					+32%
					<i class="ace-icon fa fa-arrow-up"></i>
				</div> -->
			</div>

			<div class="infobox infobox-pink">
				<!-- <div class="infobox-icon">
					<i class="ace-icon fa fa-check-square-o"></i>
				</div> -->

				<div class="infobox-data">
					<div class="infobox-content">Tin VIP</div>
					<span class="infobox-data-number"><a href="{{URL::route('admin.jobs.vipwaiting')}}">{{ $totalVipWaiting }}</a></span>
					
				</div>
				<!-- <div class="stat stat-important">4%</div> -->
			</div>

			<!-- <div class="infobox infobox-red">
				<div class="infobox-icon">
					<i class="ace-icon fa fa-bell-o"></i>
				</div>

				<div class="infobox-data">
					<span class="infobox-data-number">{{ $totalVipExpring }}</span>
					<div class="infobox-content">Tin VIP sắp hết hạn</div>
				</div>
			</div> -->

			<!-- <div class="infobox infobox-orange2">
				<div class="infobox-icon">
					<i class="ace-icon fa fa-close"></i>
				</div>

				<div class="infobox-data">
					<span class="infobox-data-number">{{ $totalVipExp }}</span>
					<div class="infobox-content">Tin VIP đã hết hạn</div>
				</div>
			</div> -->
			<div class="space-6"></div>

			
		</div> <!-- end .col-sm-12 -->
		
	</div>
								
@stop

