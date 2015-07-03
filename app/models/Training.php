<?php

class Training extends \Eloquent {
	protected $fillable = ['title','time_day','fee','date_open','shift','date_study','time_hour','content','discount'];
	protected $table='training';
	 public function trainingpeoples() {
	 	return $this->hasMany('TrainingTrainingPeople', 'training_id');
	 }
}