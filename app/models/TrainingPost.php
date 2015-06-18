<?php

class TrainingPost extends \Eloquent {
	protected $fillable = ['title','subtitle','content','training_cat_id'];
	protected $table='training_post';
}