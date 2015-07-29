@extends('layouts.hiring')
@section('primary')
	<div class="row main-content">
					<div class="primary">
						
					    <div class="news">
					    	@foreach($main as $post)
					    	<div class="post">
					    		<div class="post-left">
					    			@if($post->thumbnail)
					    				{{ $post->image($post->thumbnail, ['class'=>'thumbnail']) }}
					    			@else 
					    				{{ $post->image('post-default.jpg', ['class'=>'thumbnail']) }}
					    			@endif
					    		</div>
					    		<div class="post-right">
					    			<h3 class="post-title"><a href="{{ URL::route('hiring.detail', [$post->post_slug,$post->id]) }}">{{ $post->title }}</a></h3>
					    			<p class="post-content">
					    				{{ Str::limit($post->content, 100) }}
					    			</p>
					    			<div class="post-meta">
					    				<ul>
					    					<li>
					    						{{ HTML::image('hiringsite/images/icon-user.png', '', ['class'=>'post_avatar']) }}
						    					<a href="" class="post-author"> {{ $post->admin->username }} </a>
					    					</li>
					    					<li><span class="fa fa-clock-o"></span> {{ $post->getUpdateAt() }}</li>
					    					<li><a href="{{ URL::route('hiring.detail', [$post->post_slug,$post->id]) }}"><span class="fa fa-arrow-circle-right"></span> Xem thêm</a></li>
					    				</ul>
					    			</div>
					    		</div>
					    	</div><!-- end post -->
					    	<div class="clearfix"></div>
					    	@endforeach
							<div id="pagination" class="text-center">
								{{ $main->links() }}
							</div>	

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
