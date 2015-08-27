<?php
namespace NTD;
use View, Input, Redirect, Hash, Company, Auth, NTD, Mail;
class AuthController extends \BaseController {

	public function getDangNhap()
	{
		return View::make('employers.login');
	}
	public function postDangNhap()
	{
		$candicates = array(
			'email'		=>	Input::get('email'),
			'password'	=>	Input::get('password'),
			'is_active' => 1
			);
		if(Auth::attempt($candicates, true))
		{
			return Redirect::route('employers.jobs.index');
		} else {
			return Redirect::back()->withInput()->withErrors('Thông tin đăng nhập không chính xác hoặc tài khoản của quí khách chưa được kích hoạt !');
		}
	}
	public function getDangKy()
	{
		return View::make('employers.register');
	}
	public function postDangKy()
	{
		$validator = new \App\DTT\Forms\EmployerRegister;
		if($validator->fails())
		{
			return Redirect::back()->withInput()->withErrors($validator);
		} else {
			$ntd = new NTD;
			$ntd->email = Input::get('email');
			$ntd->password = Hash::make(Input::get('password'));
			$ntd->is_active=0;
			$code_active=$this->generateRandomString(10);
			$ntd->code_active=$code_active;
			if($ntd->save())
			{
				$company = new Company;
				$company->ntd_id = $ntd->id;
				$company->company_name = Input::get('company_name');
				$company->total_staff = Input::get('quymo');
				$company->full_description = Input::get('soluoc');
				$company->company_address = Input::get('company_address');
				$company->contact_name = Input::get('contact_name');
				$company->save();


				/* $subject = "Kich hoat tai khoan VNJobs / Activate your VNJobs account";
				$message = "<h3>Chào Quý khách</h3>
				Tài khoản của Quý khách đã được đăng ký miễn phí tại website: VnJobs.vn ,
				<br>Để hoàn tất quá trình đăng ký và truy cập vào tài khoản Nhà tuyển dụng tại VnJobs, vui lòng kích hoạt tài khoản tại đây.
				<br><a href='".\URL::route('employers.active',array(Input::get('email'),$code_active))."' style='font-family: Arial,sans-serif;font-size: 16px;font-weight: bold;color: #ffffff;text-decoration: none;display: inline-block;background:orange;padding:12px;margin:10px 0; border-radius:5px;'>Kích hoạt tài khoản của bạn ngay.</a><br>
				<br>
				<table border=\"1\">
				 
				<tr>
					<td style=\"padding:10px\">Tài khoản truy cập : </td><td style=\"padding:10px\">".Input::get('email')."</td>
				</tr>
				<tr>
					<td style=\"padding:10px\">Mật khẩu: </td><td style=\"padding:10px\">".Input::get('password')."</td>
				</tr>
				</table>
				<br><br>
				<br>Vui lòng lưu lại email này để tham khảo lại sau này.<br>
				<br>Chúng tôi luôn sẵn sàng hỗ trợ nếu quý khách gặp bất cứ vấn đề nào:<br>
				<br>&nbsp;&nbsp;<span style=\"font-size: 1.17em;font-weight: bold;\">+ Chat</span> với chúng tôi qua skype: cskh.vnjobs
				<br>&nbsp;&nbsp;<span style=\"font-size: 1.17em;font-weight: bold;\">+ Gọi đường dây nóng</span> 1900 58 58 53 
				<br>
				<br><span style=\"font-weight: bold\">Pham Quan</span><br>
				Customer Care Manager<br>
				VnJobs.vn<br><br>
				<table style=\"width:100%;background:#DEDFE0;border: 1px dotted;\">
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
				Email: sales.hcm@vnjobs.vn



				</table>

	
				";

			   	// setting the server, port and encryption
				if(\App\DTT\Services\SendMail::send(Input::get('email'), Input::get('contact_name'), $subject, $message ) )
				{
					return Redirect::back()->with('success', 'Chúc mừng bạn đã đăng ký thành công! <br>Vui lòng mở email và làm theo hướng dẫn để kích hoạt tài khoản của bạn.');
				} else {
					return Redirect::back()->with('success', 'Hiện tại bạn không thể đăng ký. Xin vui lòng thử lại sau.');
				}*/

				Mail::send('employers.mail.active', array('send_email'=> Input::get('email'),'code_active'=>$code_active, 'password'=>Input::get('password')), function($message){
		        $message->to(Input::get('email'), Input::get('email'))->subject('Kich hoat tai khoan VNJobs / Activate your VNJobs account');
		    	});
				return Redirect::back()->with('success', 'Chúc mừng bạn đã đăng ký thành công! <br>Vui lòng mở email và làm theo hướng dẫn để kích hoạt tài khoản của bạn.');
				/*Mail::send('employers.mail.active', array('password'=>Input::get('password'),'code_active'=>$code_active,'email'=> Input::get('email')), function($message){
		        $message->to(Input::get('email'),Input::get('email'))->subject('[VNJOBS.VN] Kính Chào Quý khách');
		    	});
				
				// return Redirect::back()->with('success', 'Tạo tài khoản thành công. <a href="'.\URL::route("employers.login").'">Bấm vào đây để đăng nhập</a>.');
				return Redirect::back()->with('success', 'Tạo tài khoản thành công. Bạn vui lòng mở email để kích hoạt');*/
			}
		}
	}
	
	public function getKichHoat($email,$code_active)
	{
		$active=NTD::whereCodeActive($code_active)->whereEmail($email)->first();
		if ($active) {
			$active->is_active=1;
		$active->code_active=null;
		if($active->save())
			return View::make('employers.account.active');
		else
			return View::make('employers.account.not_active');
		}
		else
			return View::make('employers.account.not_active');
		
	}

	private function generateRandomString($length = 10) {
	    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
	    return $randomString;
	}	
}