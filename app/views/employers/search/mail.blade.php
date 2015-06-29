<table align="center" border="0" cellpadding="0" cellspacing="0" width="600">
	<tbody>
        <tr>
        	<td style="font-size:11px;font-family:Arial,Tahoma;color:#ffffff;line-height:16px;padding:5px 0" bgcolor="#ff5b00" align="center">Để email luôn được vào inbox, bạn vui lòng thêm <a rel="nofollow" href="mailto:mpvnjobsvn@gmail.com" style="text-decoration:underline;color:#ffffff" target="_blank">mpvnjobsvn@gmail.com</a> vào danh bạ hoặc đánh dấu email<br> này "Không phải thư quảng cáo / spam"</td>
        </tr>

		<tr>
        	<td style="border:1px solid #d9d9d9">
            	<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
                	<tbody>
                    	<tr>
                        	<td style="padding:30px 20px">
                            	<table border="0" cellpadding="0" cellspacing="0" width="100%">
                                	<tbody><tr>
                                    	<td valign="top"><a href="http://vnjobs.vn" target="_blank">VNJOBS.VN</a></td>
                                        <td valign="top" align="right" width="200">
                                        	
                                        </td>
                                    </tr>
                                </tbody></table>
                            </td>
                        </tr>
                        <tr>
                        	<td><img></td>
                        </tr>
                        <tr>
                        	<td style="padding:15px 20px;border-bottom:9px solid #d9d9d9;font-family:arial">
                            	
<p>Chào <span>{{ $send_email }}, <br><br>Bạn vừa được lời mời xem hồ sơ ứng viên từ {{ $ntd_email }} thông qua http://vnjobs.vn với nội dung:</p><br>
<p>{{ $send_content }}</p><br>
<table width="100%" cellpadding="2" cellspacing="0" style="border:1px solid rgb(47,132,186)">
	<tbody><tr>
		<td colspan="2" style="color:#ffffff;background-color:#3c73a9"><b>Thông tin liên hệ</b></td>
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
    <td style="color:#ffffff;background-color:#3c73a9">Thông tin nghề nghiệp</td>
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
		<td style="color:#ffffff;background-color:#3c73a9">Mục tiêu nghề nghiệp</td>
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
		<td style="color:#ffffff;background-color:#3c73a9">Quá trình học vấn</td>
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
    <td style="color:#ffffff;background-color:#3c73a9">Kinh nghiệm làm việc</td>
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
    <td style="color:#ffffff;background-color:#3c73a9">Kỹ năng</td>
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





<br>
								<table width="100%" cellspacing="0" cellpadding="0" border="0">
																														<tbody><tr>
												<td style="font-family:arial;font-size:12px;color:#333">Trân trọng,</td>
											</tr>
											<tr>
												<td style="font-family:arial;font-size:12px;color:#333">Phòng Dịch vụ Khách hàng</td>
											</tr>
											<tr>
												<td style="font-family:arial;font-size:12px;color:#333"><a href="http://vnjobs.vn" target="_blank">VnJobs.vn</a></td>
											</tr>
																			 
								</tbody></table>
                            </td>
                        </tr> 
												<tr>
                        	
                        </tr>
                        <tr>
                            <td style="font-size:10px;color:#6d6d6d;text-align:center;padding:0 0 10px;font-family:arial">Để ngưng không nhận email thông báo từ vnjobs.vn, vui lòng click vào đây <a href="http://vnjobs.vn/" style="color:#0078c9" target="_blank">(unsubscribe)</a></td>
                        </tr>
						                    </tbody>
                </table>
            </td>        
        </tr>
    </tbody>
</table>
