<!DOCTYPE html>
<html>

<head>
	{{ HTML::style('assets/ntd/css/bootstrap343.min.css') }}
	<style type="text/css">
	.head {
		background: #3c73a9;
		color: #FFF;
		height: 30px;
	}
	</style>
</head>
<body onload="window.print()">
<div class="container" style="width: 800px; margin: 0 auto;">
<h2 style="text-align: center">{{ $resume->tieude_cv }}</h2>
<table width="100%" cellpadding="2" cellspacing="0" style="border:1px solid rgb(47,132,186)">
	<tbody><tr>
		<td colspan="2" class="head"><b>Thông tin liên hệ</b></td>
	</tr>
	<tr>
	<td width="50%">
		<strong>Họ &amp; tên</strong> {{ $resume->ntv->first_name }} {{ $resume->ntv->last_name }}<br>
		<strong>Ngày sinh:</strong> {{ $resume->ntv->date_of_birth }}<br>
		<strong>Tình trạng hôn nhân:</strong> 
					@if($resume->ntv->marital_status == 1)
												Độc thân
												@else
												Đã lập gia đình
												@endif
				<br>
		<strong>Giới tính:</strong>  @if($resume->ntv->gender == 1)
												Nam
												@elseif($resume->ntv->gender == 2)
												Nữ
												@else 
												Không công khai
												@endif <br>

	</td>
	</tr>
	<tr>
	<td width="50%">
					
				
				<strong>Quốc tịch:</strong> Việt Nam
				</td>
  </tr>
</tbody></table>  


<table width="100%" cellpadding="2" cellspacing="0" style="border:1px solid rgb(47,132,186)">
  <tbody><tr>
    <td class="head">Thông tin nghề nghiệp</td>
  </tr>
  <tr>
  	<td>
	
	<table cellpadding="0" cellspacing="0" border="0">
			<tbody><tr>
				<td style="width:130px" valign="top"><strong>Mức lương:</strong></td>
				<td>
													{{ $resume->mucluong }} USD													</td>
			</tr>
			<tr>
				<td valign="top"><strong>Bằng cấp cao nhất:</strong></td>
				<td>{{ $resume->bangcap->name }}</td>
			</tr>
						<tr>
				<td valign="top"><strong>Ngôn ngữ:</strong></td>
				<td>@if(count($resume->cvlanguage))
								@foreach($resume->cvlanguage as $lang)
									{{ $lang->lang->lang_name }} - {{ $lang->lvlang->name }}<br>
								@endforeach
								@endif</td>
			</tr>
						<tr>
				<td valign="top"><strong>Hình thức:</strong></td>
				<td>{{ $resume->worktype->name }}</td>
			</tr>
			<tr>
				<td valign="top"><strong>Ngành nghề:</strong></td>
				<td>@if(count($resume->cvcategory))
								@foreach($resume->cvcategory as $cat)
									{{ $cat->category->cat_name }}, 
								@endforeach
								@endif</td>
			</tr>
			<tr>
				<td valign="top"><strong>Cấp bậc hiện tại:</strong></td>
				<td>{{ $resume->level->name }}</td>
			</tr>
			<tr>
				<td valign="top"><strong>Cấp bậc mong muốn:</strong></td>
				<td>{{ $resume->capbac->name }}</td>
			</tr>
			<tr>
				<td valign="top"><strong>Nơi làm việc:</strong></td>
				<td>
				@if(count($resume->location))
								@foreach($resume->location as $loc)
									{{ $loc->province->province_name }}<br>
								@endforeach
								@endif
								
				</td>
			</tr>
			<tr>
				<td valign="top"><strong>Số năm kinh nghiệm:</strong> </td>
				<td>
									@if($resume->namkinhnghiem == 0) Chưa có kinh nghiệm @else {{ $resume->namkinhnghiem }} Năm @endif
								</td>
			</tr>
	  </tbody></table>
		
	</td>
  </tr>
</tbody></table>
<table width="100%" cellpadding="2" cellspacing="0" style="border:1px solid rgb(47,132,186)">
	<tbody><tr>
		<td class="head">Mục tiêu nghề nghiệp</td>
	</tr>
	<tr>
		<td>
			<p>
		{{ $resume->dinhhuongnn }}
	</p>

		</td>
	</tr>
</tbody></table>


<table width="100%" cellpadding="2" cellspacing="0" style="border:1px solid rgb(47,132,186)">
	<tbody><tr>
		<td class="head">Quá trình học vấn</td>
	</tr>
	<tr>
		<td>
		@if(count($resume->education))
			@foreach($resume->education as $edu)
				<table border="0" cellspacing="0" cellpadding="0">
				<tbody><tr>
				<td style="width:130px" valign="top">
					{{ $edu->study_from }} - {{ $edu->study_to }}
				</td>
				<td>
				{{ $edu->school }} - {{ $edu->edu->name }}<br>
				{{ nl2br($edu->achievement) }}<br>
				- Điểm: {{ $edu->diem->name }}<br>
				- Lĩnh vực nghiên cứu: {{ $edu->linhvuc->name }}
				</td>
				</tr>
			</tbody></table>
			@endforeach
		@endif
				
	</td>
  </tr>
</tbody></table>

<table width="100%" cellpadding="2" cellspacing="0" style="border:1px solid rgb(47,132,186)">
  <tbody><tr>
    <td class="head">Kinh nghiệm làm việc</td>
  </tr>
  <tr>
  	<td>
  	@if(count($resume->experience))
		@foreach($resume->experience as $exp)
				<table border="0" cellspacing="0" cellpadding="0">
			<tbody><tr>
			<td style="width:130px" valign="top">
				{{ $exp->from_date }}- {{ ($exp->to_date=='')?'Hiện tại':$exp->to_date }}
							</td>
			<td>
				{{ $exp->company_name }} - {{ $exp->position }} <br>	
				{{ nl2br($exp->job_detail) }}<br>
					- Lĩnh vực: {{ $exp->fieldofwork->name }}<br>
					- Chuyên ngành: {{ $exp->chuyennganh->name }}<br>
					- Cấp bậc: {{ $exp->capbac->name }}<br>
					@if($exp->salary != '')- Lương: {{ $exp->salary }}<br>@endif
			</td>
		  </tr>
		</tbody></table>
		@endforeach
	@endif
				
	</td>
  </tr>

</tbody></table>

<table width="100%" cellpadding="2" cellspacing="0" style="border:1px solid rgb(47,132,186)">
  <tbody><tr>
    <td class="head">Kỹ năng</td>
  </tr>
  <tr>
  	<td>
  		
  		@if(count($resume->kynang() ))
			@foreach($resume->kynang() as $kn)
				<table border="0" cellspacing="0" cellpadding="0">
		  <tbody><tr>
			<td valign="top">
			{{ $kn[0] }} ({{ Config::get('custom_kynang.kynang')[$kn[1]] }})
			</td>			
			</tr>
		</tbody></table>
			@endforeach
		@endif
				
	</td>
	</tr>
</tbody></table>
</div>
</body>
</html>