<?php

class Training extends \Eloquent {
	protected $fillable = ['title','time_day','fee','date_open','shift','date_study','time_hour','content','discount','teacher_id'];
	protected $table='training';
}