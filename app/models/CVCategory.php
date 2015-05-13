<?php

class CVCategory extends \Eloquent {
	protected $fillable = ['rs_id', 'mt_type', 'cat_id'];
	protected $table = 'mt_categories';
}