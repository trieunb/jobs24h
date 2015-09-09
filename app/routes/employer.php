<?php 
Route::group(array('prefix'=>$locale), function() {
	Route::group(array('prefix'=>'nha-tuyen-dung', 'namespace'=>'NTD'), function() {
		Route::get('/', array('as'=>'employers.launching', 'uses'=>'HomeController@launching'));
		Route::group(array('before'=>'ntd.auth'), function() {
			Route::get('/dashboard', array('as'=>'employers.home', 'uses'=>'HomeController@home'));
			Route::controller('account', 'AccountController', array(

			));
			Route::controller('viec-lam', 'JobController', array(
				'getIndex'		=>	'employers.jobs.index',
				'getDangTuyenDung'		=>	'employers.job.add',
				'getDangHienThi'	=>	'employers.jobs.active',
				'getSapHetHan'	=>	'employers.jobs.expiring',
				'getDanhSachCho'	=>	'employers.jobs.inactive',
				'getNgungNhanHs'	=>	'employers.jobs.isapply',
				'getHetHan'	=>	'employers.jobs.expired',
				'postAction'	=>	'employers.jobs.action',
				'getSuaTinDang'		=>	'employers.jobs.edit',
				'postSuaTinDang'		=>	'employers.jobs.update',
				'getDelete'		=>	'employers.jobs.delete',
				'getTimKiem'		=>	'employers.jobs.search',
				'postAjax'		=>'employers.jobs.ajax',
				'getExport'		=>'employers.jobs.export',
			));
			Route::controller('quan-ly-ung-vien', 'CandidateController', array(
				'getIndex'		=>	'employers.candidates.index',
				'getCongViec'		=>	'employers.candidates.job',
				'getThuMuc'		=>	'employers.candidates.folder',
				'getQuanLyThuMuc'=>	'employers.candidates.folderManager',
				'postTaoThuMuc'=>	'employers.candidates.createFolder',
				'postSuaThuMuc'=>	'employers.candidates.updateFolder',
				'getXoaThuMuc'=>	'employers.candidates.deleteFolder',
				'getHoSoDaXoa'	=>	'employers.candidates.deleted',
				'getDanhSachTuChoi'	=>	'employers.candidates.blocked',
				'getDanhSachHoSoDaXem'	=>	'employers.candidates.viewed',

				'getReport'		=>	'employers.candidates.report',
				
				'getTest'		=>	'employers.candidates.test',
				'postXoaTatCaHoSoDaChon'=>'employers.candidates.deleteAll',
			));

			Route::controller('tai-khoan', 'AccountController', array(
				'getIndex'			=>	'employers.account.index',
				'getThongTinCongTy'		=>	'employers.account.company',
				'getXemThongTinCongTy'	=>	'employers.account.companyreview',
				'getDoiMatKhau'		=>	'employers.account.changepass',
				'getDoiEmail'	=>	'employers.account.changeemail',
				'getQuanLyTacVu'		=>	'employers.account.tasklog',
				'getThuPhanHoiUngVien'=>	'employers.account.respond',
				'getThuTraLoiTuDong'		=>	'employers.account.auto',
				'getLogout'			=>	'employers.account.logout',
				'getUserManager'	=>	'employers.account.usermanager',
				'getThongTinTaiKhoan'=>	'employers.account.userinformation',
				'getChinhSuaThu'		=>	'employers.account.edit_letter',
				'getSaoChepThu'		=>	'employers.account.copy_letter',
				'getTaoThuMoi'	=>	'employers.account.create_letter',
				'postXoaThu'	=>	'employers.account.delete_letter',
				'getChinhSuaThuTuDong'	=>	'employers.account.edit_letter_auto',
				'getSaoChepThuTuDong'	=>	'employers.account.copy_letter_auto',
				'getTaoThuTuDong'=>	'employers.account.create_letter_auto',
				'postXoaThuTuDong'=>'employers.account.delete_letter_auto',
				
			));

			Route::controller('bao-cao', 'ReportController', array(
				'getBaoCaoDichVuHoSo'			=>	'employers.report.candidates',
				'getXemDichVu'		=>	'employers.report.viewcandidate',
				'getThongBao'				=>	'employers.report.alert',
				'getPhanHoiCuaUngVien'			=>	'employers.report.respond',
				'getTest'				=>	'employers.report.test',
				'getXuatDuLieu'				=>	'employers.report.export',
				'postGuiPhanHoi'		=>	'employers.report.sendrespond',
				
			));
			Route::controller('don-hang', 'OrderController', array(
				'getDanhSachDonHang'			=>	'employers.orders.index',
				'getMuaDichVu'			=>	'employers.orders.add',
				'getDetail'			=>	'employers.orders.detail',
				'getLienHeMua'			=>	'employers.orders.contact',
				
			));
			Route::controller('tim-kiem', 'SearchController', array(
				'getNangCao'			=>	'employers.search.advance',
				'getCoBan'				=>	'employers.search.basic',
				'getTheoNganhNghe'			=>	'employers.search.category',
				'getCat'				=>	'employers.search.viewcat',
				'postCalendar'			=>	'employers.search.calendar',
				'postCalendarView'		=>	'employers.search.calendarview',
				'getHistory'			=>	'employers.search.history',
				'getHistoryInfo'		=>	'employers.search.historyinfo',
				'getXemHoSo'			=>	'employers.search.resumeinfo',
				'postAjax'				=>	'employers.search.ajax',
				'getResumeIframe'		=>	'employers.search.resume_viewer',
				'getInHoSo'			=>	'employers.search.print_cv',
				'getXemchitiet'	=>	'employers.search.xemchitiet1',
			));
		});

		Route::group(array('before'=>'ntd.guest'), function() {

			Route::controller('/', 'AuthController', array(
				'getDangNhap'		=>	'employers.login',
				'getDangKy'	=>	'employers.register',
				'getKichHoat' =>'employers.active'
			));
		});
	});
});
Event::listen('auth.login', function($user) {
	$user->last_login = date('Y-m-d H:i:s');
	$user->save();
});
 