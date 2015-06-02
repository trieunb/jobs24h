<?php

class MTEducation extends \Eloquent {
	protected $fillable = ['rs_id'];
	protected $table = 'mt_education_history';
	
	public function edu(){
		return $this->beLongsTo('Education', 'level');
	}
	public function linhvuc(){
		return $this->beLongsTo('FieldsInWorkExp', 'field_of_study');
	}
	public function diem(){
		return $this->beLongsTo('AverageGrade', 'average_grade_id');
	}
}