<?php

class Province extends \Eloquent {
	protected $fillable = [];
	protected $table = 'provinces';
	protected $hidden = array(
        'created_at',
        'updated_at'
    );
}