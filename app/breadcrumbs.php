<?php

Breadcrumbs::register('home', function($breadcrumbs)
{
	$breadcrumbs->push('<i class="ace-icon fa fa-home home-icon"></i> Dashboard', route('admin.dashboard'));
});

Breadcrumbs::register('admin.jobseekers.index', function($breadcrumbs)
{
	$breadcrumbs->parent('home');
	$breadcrumbs->push('Người tìm việc', route('admin.jobseekers.index'));
});
Breadcrumbs::register('admin.jobseekers.create', function($breadcrumbs)
{
	$breadcrumbs->parent('admin.jobseekers.index');
	$breadcrumbs->push('Thêm mới Người tìm việc', route('admin.jobseekers.create'));
});

Breadcrumbs::register('admin.resumes.index', function($breadcrumbs)
{
	$breadcrumbs->parent('admin.jobseekers.index');
	$breadcrumbs->push('Hồ sơ người tìm việc', route('admin.resumes.index'));
});
Breadcrumbs::register('admin.resumes.create', function($breadcrumbs)
{
	$breadcrumbs->parent('admin.resumes.index');
	$breadcrumbs->push('Tạo mới hồ sơ', route('admin.resumes.create'));
});
Breadcrumbs::register('admin.resumes.edit', function($breadcrumbs)
{
	$breadcrumbs->parent('admin.resumes.index');
	$breadcrumbs->push('Sửa hồ sơ', route('admin.resumes.edit'));
});


