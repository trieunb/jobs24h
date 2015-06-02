<?php

class CVLanguage extends \Eloquent {
	protected $fillable = [];
	protected $table = 'mt_languages';
	public function lang(){
		return $this->beLongsTo('Language', 'lang_id');
	}
	public function lvlang(){
		return $this->beLongsTo('LevelLang', 'level');
	}
}