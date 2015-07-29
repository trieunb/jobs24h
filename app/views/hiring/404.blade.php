@extends('layouts.hiring')
@section('title')404 Page Not Found @stop
@section('primary')
	<div class="row main-content">
					<div class="primary">
						
					    <div class="news">
					    	<h1 class="text-center">Xin lỗi, bài viết không tìm thấy!</h1>
							<h3 class="text-center"><a href="{{ URL::route('hiring.home') }}">Bấm vào đây</a> để trở lại trang chủ</h3>
					    </div>
					</div> <!-- end primary -->
					<div class="sidebar">
						
						<div class="new-posts">
							<h4 class="new-title">TIN XEM NHIỀU NHẤT</h4>
							<div class="sidebar-newposts">
								@foreach($viewest as $post)
								<div class="sidebar-post">
									{{ $post->image('thumbnail/'.$post->thumbnail, ['class'=>'sidebar-thumbnail']) }}
									<h4 class="sidebar-posttitle">
										<a href="{{ URL::route('hiring.detail', [$post->post_slug,$post->id]) }}">{{ $post->title }}</a>
									</h4>
									<div class="sidebar-postcontent">
										<span>{{ Str::limit($post->content, 50) }}</span>
									</div>
								</div><!-- end sidebar-post -->
								@endforeach
								
							</div><!-- end new-posts -->
						</div> 

					</div>
					<div class="clearfix"></div>
					
					
				</div> <!-- end row main-content -->
@stop
