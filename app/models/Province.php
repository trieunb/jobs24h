<?php

class Province extends \Eloquent {
	protected $fillable = ['province_name', 'country_id', 'sort_order'];
	protected $table = 'provinces';
	protected $hidden = array(
        'created_at',
        'updated_at'
    );
    public function mtprovince(){
		return $this->hasMany('WorkLocation', 'province_id');
	}
}