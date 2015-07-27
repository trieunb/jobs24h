<?php

class Experience extends \Eloquent {
	protected $fillable = ['rs_id','position','company_name','from_date','to_date','job_detail','field','specialized','level','salary'];
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
	public function salary()
	{
		return number_format($this->salary, 0, ',', '.');
	}
}