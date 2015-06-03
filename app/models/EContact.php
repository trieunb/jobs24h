<?php

class EContact extends \Eloquent {
	protected $fillable = ['ntd_id', 'full_name', 'phone', 'email', 'company', 'province_id', 'service_id', 'content'];
	protected $table = 'employer_contacts';

}