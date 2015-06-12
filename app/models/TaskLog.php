<?php

class TaskLog extends \Eloquent {
	protected $fillable = ['ntd_id', 'action_type', 'target'];
	protected $table = 'task_logs';
	public function taskName()
	{
		$task = Config::get('custom_task.name');
		foreach ($task as $key => $value) {
			if($this->action_type == $key)
				return $value;
		}
	}
	public function ntd()
	{
		return $this->belongsTo('NTD', 'ntd_id');
	}
}