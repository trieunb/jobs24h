@extends('layouts.employer')
@section('title') Cập nhật thông tin công ty @stop
@section('content')
	<section class="main-content">
		<div class="container">
			<div class="banner">
				{{ HTML::image('assets/ntd/images/banner-for-ntd.jpg') }}
			</div>
			<div class="row push-padding-20 company-info">
				<div class="col-sm-2">
					@if(file_exists(Config::get('app.upload_path') . 'companies/logos/'.$company->logo) && $company->logo != NULL)
					{{ HTML::image('uploads/companies/logos/'.$company->logo) }}
					@endif
				</div>
				<div class="col-sm-10">
					<h1 class="gotham">{{ $company->company_name }}</h1>
					<h3>{{ $company->company_address }}</h3>
				</div>
			</div>
			<div class="update-info">
				<div class="col-sm-6 row">
					<div class="row blocked">
						<div class="header-blocked">
							<h2>Tổng quan công ty</h2>
						</div>
						<div class="push-padding-20">
							<article>
								<!-- <ul class="arrow-square-orange">
									
								</ul> -->
								{{ $company->full_description }}
							</article>
						</div>
					</div>	
					<div class="row blocked">
						<div class="header-blocked">
							<h2>Vì sao chọn chúng tôi</h2>
						</div>
						<div class="push-padding-20">
							<ul class="arrow-square-orange">
								<li>
								{{ nl2br($company->chonchungtoi) }}
								</li>
							</ul>
						</div>
					</div>
					<div class="row blocked">
						<div class="header-blocked">
							<h2>Vị trí đang tuyển dụng</h2>
						</div>
						<div class="push-padding-10">
							<table class="table table-blue">
								<thead>
									<tr>
										<th>Ngày</th>
										<th>Vị trí</th>
										<th>Địa điểm làm việc</th>
									</tr>
								</thead>
								<tbody>
									@if(count($jobs))
										@foreach($jobs as $job)
											<tr>
												<td>{{ $job->created_at }}</td>
												<td>{{ $job->vitri }}</td>
												<td>{{ $job->province->first()->province->province_name }}</td>
											</tr>
										@endforeach
									@endif
									
								</tbody>
							</table>
							<ul class="sosial-share col-sm-7">
								<li>Facebook</li>
								<li>Twitter</li>
								<li>Google +</li>
							</ul>
							<!-- <ul class="pagination pull-right pagination-sm pagination-blue">
								
							</ul> -->
							<div id="pagination">
								{{ $jobs->links() }}
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-6 row">
					<div class="row blocked snapshot">
						<div class="header-blocked">
							<h2>THÔNG TIN CƠ BẢN</h2>
						</div>
						<div class="push-padding-20">
							<ul class="arrow-square-orange">
								<li class="col-sm-6">
									<strong>Loại hình công ty</strong>
									<span>{{ $company->work_type }}</span>
								</li>
								<li class="col-sm-6">
									<strong>Lĩnh vực hoạt động</strong>
									<span>{{ isset($company->work_field)?nl2br($company->work_field):'' }}</span>
								</li>
								<li class="col-sm-6">
									<strong>Quy mô công ty</strong>
									<span>{{ Config::get('custom_quymo.quymo')[$company->quymocty] }}</span>
								</li>
								<li class="col-sm-6">
									<strong>Giờ làm việc</strong>
									<span>{{ $company->giolamviec }}</span>
								</li>
								<li class="col-sm-6">
									<strong>Website</strong>
									<span>{{ ($company->website)?'<a href="'.$company->website.'" target="_blank">'.$company->website.'</a>':'' }}</span>
								</li>
								
							</ul>
						</div>
					</div>
					<div class="row blocked gallery-photo">
						<div class="header-blocked">
							<h2>Hình ảnh công ty</h2>
						</div>
						<div class="push-padding-20">
							<ul>
							@if(json_decode($company->company_images))
								@foreach(json_decode($company->company_images) as $image)
									@if($image)
									<li class="col-sm-4"><a>{{ HTML::image('uploads/companies/images/'.$image) }}</a></li>
									@endif
								@endforeach
							@endif
							</ul>
						</div>
					</div>
					
					<div class="row blocked">
						<div class="header-blocked">
							<h2>Địa chỉ</h2>
						</div>
						<div id="map" style="width:100%; height:300px;"></div>
						<!-- <iframe src="https://www.google.com/maps/embed/v1/place?q={{ urlencode($company->company_address) }}&key=AIzaSyBv2alU4RKCx8knReQMVcejcuvYeMha1Dk" width="100%" height="100%" frameborder="0" style="border:0"></iframe> -->
						<span class="push-padding-10"><i class="fa fa-map-marker fa-1x"></i>  {{ $company->company_address }}</span>
					</div>
				</div>
			</div>
		</div>
	</section>
@stop

@section('style')
	{{ HTML::style('assets/css/datepicker.min.css') }}
	<style type="text/css">
	.main-content .push-padding-20 article {
		text-align: justify;
	}
	</style>
@stop

@section('script')
	@section('script')
	{{ HTML::script('assets/js/bootstrap-datepicker.min.js') }}
	<script>
function initMap() {
  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 15,
    center: {lat: -34.397, lng: 150.644}
  });
  var geocoder = new google.maps.Geocoder();

 // document.getElementById('submit').addEventListener('click', function() {
    geocodeAddress(geocoder, map);
    //map.addMarker(new MarkerOptions().title("{{$company->company_name}}"));
  //});
}

function geocodeAddress(geocoder, resultsMap) {
  var address = '{{$company->company_address}}';
  geocoder.geocode({'address': address}, function(results, status) {
    if (status === google.maps.GeocoderStatus.OK) {
      resultsMap.setCenter(results[0].geometry.location);
      var marker = new google.maps.Marker({
        map: resultsMap,
        title: "{{$company->company_name}}",
        position: results[0].geometry.location
      });
      
    } else {
      alert('Geocode was not successful for the following reason: ' + status);
    }
  });
}

    </script>
    <script src="https://maps.googleapis.com/maps/api/js?signed_in=true&callback=initMap"
        async defer></script>

	

@stop
	
@stop