<?php

class TrainingDocument extends \Eloquent {
	protected $fillable = ['title','content','author','view','download','store'];
	protected $table='training_document';
}