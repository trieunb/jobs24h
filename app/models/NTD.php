<?php
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
class NTD extends \Eloquent implements UserInterface, RemindableInterface {
	use UserTrait, RemindableTrait;
	protected $fillable = ['email', 'password', 'full_name', 'position', 'address', 'province_id', 'country_id', 'phone_number', 'tel', 'fax', 'tax_number', 'is_active', 'subscribe'];
	protected $table = 'employers';
	protected $hidden = array('password', 'remember_token');

	public function company()
	{
		return $this->hasOne('Company', 'ntd_id');
	}
	public function job()
	{
		return $this->hasMany('Job', 'ntd_id');
	}
	public function ntdpackage() {
	 	return $this->hasMany('NtdPackage', 'ntd_id');
	 }
	public function order()
	{
		return $this->hasMany('Order','ntd_id');
	}
	public function orderpostrec()
	{
		return $this->hasMany('OrderPostRec','ntd_id');
	}

}