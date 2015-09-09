<?php 
namespace Camnang;
use View, HiringPost;
class HomeController extends \Controller {
	public function getIndex()
	{
		$ntv = HiringPost::where('cat_id', 1)->orWhereIn('sub_cat_id', [5,6])->orderBy('id', 'desc')->limit(5)->get();
		$main = HiringPost::orderBy('id', 'desc')->with('admin')->limit(4)->get();
		$viewest = HiringPost::orderBy('views', 'desc')->limit(7)->get();
		$ntd = HiringPost::where('cat_id', 2)->orWhereIn('sub_cat_id', [4])->orderBy('id', 'desc')->limit(5)->get();
		$news = HiringPost::where('cat_id', 3)->with('admin')->orWhereIn('sub_cat_id', [7])->orderBy('id', 'desc')->limit(4)->get();
		//return View::make('hiring.index', compact('ntv', 'main', 'viewest', 'ntd', 'news'));
		return Redirect::to('http://vnjobs.vn/cam-nang-viec-lam');
	}
	public function getXemBaiViet($post_slug = false, $post_id = false)
	{
		$detail = HiringPost::where('id', $post_id)->where('post_slug', $post_slug)->first();
		$viewest = HiringPost::orderBy('views', 'desc')->limit(7)->get();
		if( ! $detail) return View::make('hiring.404', compact('viewest'));
		$lastPost = HiringPost::where('user_id', $detail->user_id)->orderBy('id', 'desc')->with('admin')->limit(3)->get();
		//update View;
		$detail->views += 1;
		$detail->save();
		return View::make('hiring.detail', compact('detail', 'viewest','lastPost'));
	}
	public function getDanhMuc($id)
	{
		$main = HiringPost::where('sub_cat_id', $id)->orderBy('id', 'desc')->with('admin')->paginate(5);
		$viewest = HiringPost::orderBy('views', 'desc')->limit(7)->get();
		return View::make('hiring.category', compact('main', 'viewest'));
	}
}