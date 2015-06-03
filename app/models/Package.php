<?php

class Package extends \Eloquent {
	protected $fillable = ['service_id', 'package_name', 'total_date', 'total_resume', 'price'];
	protected $table = 'packages';
}