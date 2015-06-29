<?php

class Partner extends \Eloquent {
	protected $fillable = ['name','thumbnail','link'];
	protected $table='partner';
}