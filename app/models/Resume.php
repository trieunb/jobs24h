<?php

class Resume extends \Eloquent {
	protected $fillable = ['ntv_id', 'tieude_cv', 'bangcapcaonhat', 'namkinhnghiem','bangcapcaonhat','ctyganday',
	'cvganday','capbachientai','vitrimongmuon','capbacmongmuon','mucluong','loaitien',
	'dinhhuongnn','kynang','danhgiabanthan','sothich','hinhthuclamviec','loaihs','trangthai',
	'is_public','is_visible','is_default'];
	protected $table = 'resumes';

	public function ntv()
	{
		return $this->beLongsTo('NTV', 'ntv_id');
	}
	public function location()
	{
		return $this->hasMany('WorkLocation', 'rs_id');
	}
	public function certificate()
	{
		return $this->hasMany('Certificate', 'rs_id');
	}
	public function experience()
	{
		return $this->hasMany('Experience', 'rs_id');
	}

}