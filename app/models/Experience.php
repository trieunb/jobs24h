<?php

class Experience extends \Eloquent {
	protected $fillable = ['rs_id'];
	protected $table = 'mt_work_exps';
	public function fieldofwork(){
		return $this->beLongsTo('FieldsInWorkExp', 'field');
	}
	public function chuyennganh(){
		return $this->beLongsTo('Specialized', 'specialized');
	}
	public function capbac(){
		return $this->beLongsTo('Level', 'level');
	}
}