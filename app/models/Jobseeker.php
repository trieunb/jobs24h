<?php
Class Jobseeker extends \Eloquent {
	protected $fillable = ['email', 'password'];
	protected $table = "jobseekers";
}