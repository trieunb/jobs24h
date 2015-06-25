<?php

class TrainingPeople extends \Eloquent {
	protected $fillable = ['name','sex','address','phone','yourself','worked','feeling','email','facebook','twitter','skype','linkedin','training_roll_id','training_id','thumbnail'];
	protected $table='training_people';
	 public function training()
    {
        return $this->belongsToMany('training');
    }
}