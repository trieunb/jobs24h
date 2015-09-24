@extends('layouts.admin')
@section('title')Jobseeker Manager @stop
@section('content')
	<div class="row">
		<div class="col-sm-9 infobox-container">
			<div class="infobox infobox-green">
				<div class="infobox-data">
					<span class="infobox-data-number">{{ $ntvLogin }}</span>
					<div class="infobox-content">Số lượng đăng nhập</div>
				</div>
			</div>
			<div class="infobox infobox-green">
				<div class="infobox-data">
					<span class="infobox-data-number">{{ $ntvCreate }}</span>
					<div class="infobox-content">Số lượng đăng ký</div>
				</div>
			</div>
			<div class="infobox infobox-green">
				<div class="infobox-data">
					<span class="infobox-data-number">{{ $ntvUnactive }}</span>
					<div class="infobox-content">Chưa kích hoạt</div>
				</div>
			</div>
			<div class="infobox infobox-green">
				<div class="infobox-data">
					<span class="infobox-data-number">{{ $totalNTV }}</span>
					<div class="infobox-content">Thành viên hiện có</div>
				</div>
			</div>
			<div class="infobox infobox-green">
				<div class="infobox-data">
					<span class="infobox-data-number">{{ $ntvNologin }}</span>
					<div class="infobox-content">Khách</div>
				</div>
			</div>
			<div class="infobox infobox-green">
				<div class="infobox-data">
					<span class="infobox-data-number">{{ $ntvNologin+$totalNTV }}</span>
					<div class="infobox-content">Tổng số NTV</div>
				</div>
			</div>
		</div>
	</div>
@stop
