<?php

class TrainingPeople extends \Eloquent {
	protected $fillable = ['name','sex','address','phone','email','facebook','twitter','skype','linkedin','training_roll_id','training_id','thumbnail'];
	protected $table='training_people';
}