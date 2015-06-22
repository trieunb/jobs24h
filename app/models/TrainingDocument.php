<?php

class TrainingDocument extends \Eloquent {
	protected $fillable = ['title','content','author','thumbnail','view','download','store'];
	protected $table='training_document';
}