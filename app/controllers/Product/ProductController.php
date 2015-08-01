<?php 
namespace Product;
use View;
class ProductController extends \Controller {
	public function getIndex()
	{
		return View::make('product.index');
	}
	public function getDangTuyenDung()
	{
		return View::make('product.job_add');
	}
	public function getTimHoSo()
	{
		return View::make('product.find_resume');
	}
	public function getTalentSolution()
	{
		return View::make('product.talent');
	}
	public function getQuangBaThongTinTuyenDung()
	{
		return View::make('product.marketing');
	}
	public function getQuangCaoTuyenDung()
	{
		return View::make('product.advertising');
	}
	public function getDangHoSoTimHsQuocTe()
	{
		return View::make('product.submit_resume');
	}

	public function getCustomHiring()
	{
		return View::make('product.custom_hiring');
	}
	public function getTalentDriver()
	{
		return View::make('product.talent_driver');
	}
}