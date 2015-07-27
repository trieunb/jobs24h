@extends('layouts.jobseeker')
@if($company != null)
	@section('title') {{$company->company_name}} @stop
@else
	@section('title') Không tìm thấy thông tin công ty @stop
@endif

@section('content')

	<div class="container">
		@include('includes.jobseekers.breadcrumb')
	</div>
	<section class="main-content container single-post view-company">
		@if($company != null)
		<div class="boxed top">
			@if($company->logo != '')
			<div class="col-sm-2">
				{{HTML::image('/uploads/companies/logos/'.$company->logo.'')}}
			</div>
			<div class="col-sm-10">
				<h1 class="capitalize">{{$company->company_name}}</h1>
				<strong class="capitalize">{{$company->company_address}}</strong>
			</div>
			@else
			<div class="col-sm-12">
				<h1 class="capitalize">{{$company->company_name}}</h1>
				<strong class="capitalize">{{$company->company_address}}</strong>
			</div>
			@endif
			
		</div>
		@endif
		<div class="col-sm-7 row">
			<div class="boxed">
				<div class="header-box">
					<h2>TỔNG QUAN CÔNG TY</h2>
				</div>
				<div class="company-content">
					{{nl2br($company->full_description)}}
				</div>
			</div>
			<div class="boxed">
				<div class="header-box">
					<h2>VÌ SAO CHỌN CHÚNG TÔI</h2>
				</div>
				<div class="company-content">
					{{nl2br($company->chonchungtoi)}}
				</div>
			</div>
			<div class="boxed">
				<div class="header-box">
					<h2>VỊ TRÍ ĐANG TUYỂN DỤNG</h2>
				</div>
				<div class="company-content posts">
					@include('jobseekers.detail-company')
				</div>
			</div>
		</div>
		<div class="col-sm-5 row pull-right">
			<div class="boxed snapshot">
				<div class="header-box">
					<h2>THÔNG TIN CƠ BẢN</h2>
				</div>
				<div class="company-content">
					<ul class="arrow-square-orange">
								<li class="col-sm-6">
									<strong>Loại hình công ty</strong>
									<span>@if($company->work_type != '')
									{{nl2br($company->work_type)}}
									@else
										đang cập nhật
									@endif</span>
								</li>
								<li class="col-sm-6">
									<strong>Quy mô công ty</strong>
									<span>@if($company->quymocty != '')
									{{Config::get('custom_quymo.quymo')[$company->quymocty]}}
									@else
										đang cập nhật
									@endif</span>
								</li>
								<li class="col-sm-6">
									<strong>Website</strong>
									<span>@if($company->website != '')
									{{$company->website}}
									@else
										đang cập nhật
									@endif</span>
								</li>
								<li class="col-sm-6">
									<strong>Giờ làm việc</strong>
									<span>@if($company->giolamviec != '')
									{{$company->giolamviec}}
								@else
									đang cập nhật
								@endif</span>
								</li>
							</ul>
				</div>
			</div>
			<div class="boxed gallery-photo">
				<div class="header-box">
					<h2>HÌNH ẢNH CÔNG TY</h2>
				</div>
				<div class="company-content">
					@if(count(json_decode($company->company_images)))
					<ul>
						@foreach(json_decode($company->company_images) as $img)
							<li class="col-sm-4">{{HTML::image('/uploads/companies/images/'.$img.'')}}</li>
						@endforeach
					</ul>
					@endif
				</div>
			</div>
			<div class="boxed">
				<div class="header-box">
					<h2>ĐỊA CHỈ</h2>
				</div>
			    <div id="map-canvas" style="width:100%; height:445px;"></div>	
				<span class="push-padding-10"><i class="fa fa-map-marker fa-1x"></i>   {{$company->company_address}}</span>
			</div>
		</div>
	</section>
@stop
@section('scripts')
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true"></script>
	<script type="text/javascript">
	

	// Lấy map từ địa chỉ công ty
	var geocoder;
	var map;
	function initialize() {
	  geocoder = new google.maps.Geocoder();
	  var latlng = new google.maps.LatLng(-34.397, 150.644);
	  var mapOptions = {
	    zoom: 12,
	    center: latlng
	  }
	  map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
	}

	function codeAddress() {
	  var address = '{{$company->company_address}}';
	  geocoder.geocode( { 'address': address}, function(results, status) {
	    if (status == google.maps.GeocoderStatus.OK) {
	      map.setCenter(results[0].geometry.location);
	      var marker = new google.maps.Marker({
	          map: map,
	          position: results[0].geometry.location
	      });
	    } else {
	      alert('Geocode was not successful for the following reason: ' + status);
	    }
	  });
	}

	google.maps.event.addDomListener(window, 'load', initialize);

	// Lấy map từ địa chỉ công ty
	setTimeout(codeAddress,2000);

	// Ajax phân trang
	$(window).on('hashchange', function() {
        if (window.location.hash) {
            var page = window.location.hash.replace('#', '');
            if (page == Number.NaN || page <= 0) {
                return false;
            } else {
                getPosts(page);
            }
        }
    });

    $(document).ready(function() {
        $(document).on('click', '.pagination a', function (e) {
            getPosts($(this).attr('href').split('page=')[1]);
            e.preventDefault();
        });
    });

    function getPosts(page) {
        $.ajax({
            url : '?page=' + page,
            dataType: 'json',
        }).done(function (data) {
            $('.posts').html(data);
            location.hash = page;
        }).fail(function () {
            alert('Hiện tại không thể load trang');
        });
    }
    </script>
@stop
