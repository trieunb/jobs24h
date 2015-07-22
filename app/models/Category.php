<?php

class Category extends \Eloquent {
	protected $fillable = ['cat_name', 'id', 'parent_id'];
	protected $table = 'categories';

	public static function getList()
	{
		$cats = Category::select('cat_name', 'id', 'parent_id')->get();
		if(count($cats))
		{
			$parent = $child = array();
			foreach ($cats as $key => $value) {
				if($value->parent_id == 0) $parent[$value->id] = $value->cat_name;
				if($value->parent_id != 0) $child[$value->parent_id][$value->id] = $value->cat_name;
			}
			$category = array();
			foreach ($parent as $key => $value) {
				if(empty($child[$key])) {
					$category[$value] = array();
				} else {
					$category[$value] = $child[$key];
				}
				
			}
			return $category;
		}
		return array();
	}

	public function mtcategory(){
		return $this->hasMany('CVCategory', 'cat_id');
	}
	public static function subcatCount($subid, $category)
	{
		foreach ($category as $key => $value) {
			if($value->id == $subid)
			{
				return $value->mtcategory->count();
			}
		}
		return 0;
	}
}