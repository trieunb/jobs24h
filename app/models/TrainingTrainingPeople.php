<?php

class TrainingTrainingPeople extends \Eloquent {
	protected $fillable = ['training_people_id','training_id'];
	protected $table='training_training_people';
	public function training() {return $this->belongsTo('Training');}
	public function trainingpeople() {return $this->belongsTo('TrainingPeople', 'training_people_id');}
}