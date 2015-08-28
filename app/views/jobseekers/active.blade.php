
<div class="container" style="   border-left: 1px solid #EFF0F0;  border-right: 1px solid #EFF0F0;background: #EFF0F0;width:97%">
	<div class="header" style="padding:20px;background: #EFF0F0;text-align:center;"><a href="vnjobs.vn" target="_blank">
		{{ HTML::image('assets/images/logo.png') }}</a>
	</div>
	<div class="content" style="border-top: 10px solid #FF4400;border-bottom: 10px solid #FF4400;padding:30px ; line-height: 18px;background: white;">

	<h3>Chào Quý khách</h3>

					Tài khoản của Quý khách đã được đăng ký miễn phí tại website: VnJobs.vn ,
					<br>Để hoàn tất quá trình đăng ký và truy cập vào tài khoản Nhà tuyển dụng tại VnJobs, vui lòng kích hoạt tài khoản tại đây.
					<br><a href='{{URL::route('employers.active',array($send_email,$code_active))}}' style='font-family: Arial,sans-serif;font-size: 16px;font-weight: bold;color: #ffffff;text-decoration: none;display: inline-block;background:#FF4400;padding:12px;margin:10px 0; border-radius:5px;'>Kích hoạt tài khoản của bạn ngay.</a><br>
					<br>
					 
					 <div class="acount" style="background-color: #F6F6F6;">
						 <table style="border-spacing: 0px; width:100%">
						  <tr style="">
						    <td style="    padding: 10px; border-bottom: 1px solid #FF4400; border-right: 1px solid #FF4400;">Tài khoản truy cập :</td>

						    <td  style="      border-bottom: 1px solid #FF4400;    padding: 10px;" >{{$send_email}} </td> 
						     
						  </tr>
						  
						  <tr>
						    <td style="border-right: 1px solid #FF4400; padding: 10px;">Mật khẩu:</td>
						    <td style="    padding: 10px;">{{$password}}</td> 
						     
						  </tr>
						</table>
					 </div>
					
					<br>Vui lòng lưu lại email này để tham khảo lại sau này.<br>
					<br>Chúng tôi luôn sẵn sàng hỗ trợ nếu quý khách gặp bất cứ vấn đề nào:<br>
					<br>&nbsp;&nbsp;<span style="font-size: 1.17em;font-weight: bold;">+ Chat</span> với chúng tôi qua skype: cskh.vnjobs
					<br>&nbsp;&nbsp;<span style="font-size: 1.17em;font-weight: bold;">+ Gọi đường dây nóng</span> 1900 58 58 53 
					<br>
					<br><span style="font-weight: bold">Pham Quan</span><br>
					Customer Care Manager<br>
					VnJobs.vn<br><br>
					
	</div>
	<div class="footer" style="width:100%;">
		<table style="padding-bottom: 17px;width:100%; text-align:center">
					<h3>Hà Nội</h3>
					Tầng 10 Tòa nhà Sudico, Đường Mễ Trì, Phường Mỹ Đình 1, Quận Nam Từ Liêm, Hà Nội. <br>
					Điện thoại: +84-4-3577-1608 / +84-4-3577-1609 <br>
					Fax: +84-4-3787-8212 <br>
					Email: sales@vnjobs.vn <br>
					<h3>Đà Nẵng</h3> 
					06 Trần Phú, Hải Châu, Đà Nẵng<br>
					Điện thoại: +84-511-394-5676 / +84-511-394-5678<br>
					Fax: +84-511-394-5676<br>
					Email:sales.dn@vnjobs.vn<br>
					<h3>Hồ Chí Minh</h3> 
					36- 38 A Trần Văn Dư, Quận Tân Bình, T.p Hồ Chí Minh <br>
					Điện thoại: :+84-8-7300-7979<br>
					Fax: +84-8-6293-6896<br>
					Email: sales.hcm@vnjobs.vn<br>



		</table>
	</div>

</div>
 
	
