<?php

class SearchHistory extends \Eloquent {
	protected $fillable = ['id', 'ntd_id', 'keyword', 'category', 'level', 'location', 'total_result', 'search_date'];
	protected $table = 'search_history';
}