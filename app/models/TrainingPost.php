<?php

class TrainingPost extends \Eloquent {
	protected $fillable = ['title','subtitle','content','thumbnail','training_cat_id'];
	protected $table='training_post';
	public function trainingCat(){
		return $this->beLongsTo('TrainingCat', 'training_cat_id');
	}
}