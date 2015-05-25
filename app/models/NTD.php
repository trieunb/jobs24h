<?php
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
class NTD extends \Eloquent implements UserInterface, RemindableInterface {
	use UserTrait, RemindableTrait;
	protected $fillable = [];
	protected $table = 'employers';
	protected $hidden = array('password', 'remember_token');

	public function company()
	{
		return $this->hasOne('Company', 'ntd_id');
	}
}