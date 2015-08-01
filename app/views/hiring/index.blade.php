@extends('layouts.hiring')
@section('primary')
	<div class="row main-content">
					<div class="primary">
						<div id="myCarousel" class="carousel slide" data-ride="carousel">
    
					      <!-- Wrapper for slides -->
					      <div class="carousel-inner">
					      	@foreach($ntv as $k=>$post)
					        <div class="item @if($k==1)active @endif">
					        	@if($post->thumbnail)
									{{ $post->image($post->thumbnail) }}
						        @else
									{{ $post->image('slide1.jpg') }}
						        @endif
					          
					           <div class="carousel-caption ">
					            <h4><a href="{{ URL::route('hiring.detail', [$post->post_slug,$post->id]) }}">{{ $post->title }}</a></h4>
					            <p>{{ Str::limit(strip_tags($post->content), 150) }}</p>
					          </div>
					        </div><!-- End Item -->
					       	@endforeach
					 
					         
					                
					      </div><!-- End Carousel Inner -->


					    <ul class="list-group col-sm-4">
					    	<h3 class="slide-title">NGƯỜI TÌM VIỆC</h3>
					    	@foreach($ntv as $k=>$post)
						    <li data-target="#myCarousel" data-slide-to="{{$k}}" class="list-group-item @if($k==1)active @endif">
						    	<h4>{{ $post->title }}</h4>
						    </li>
						    @endforeach
					     
					    </ul>

					      <!-- Controls -->
					      <div class="carousel-controls">
					          <a class="left carousel-control" href="#myCarousel" data-slide="prev">
					            <span class="glyphicon glyphicon-chevron-left"></span>
					          </a>
					          <a class="right carousel-control" href="#myCarousel" data-slide="next">
					            <span class="glyphicon glyphicon-chevron-right"></span>
					          </a>
					      </div>

					    </div><!-- End Carousel -->
					    <div class="clearfix"></div>
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
					    				{{ Str::limit(strip_tags($post->content), 100) }}
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
					    					    	

					    </div>
					</div> <!-- end primary -->
					<div class="sidebar">
						<div class="banner-ads">
							{{ HTML::image('hiringsite/images/sidebar-ads.jpg') }}
						</div>
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
										<span>{{ Str::limit(strip_tags($post->content), 50) }}</span>
									</div>
								</div><!-- end sidebar-post -->
								@endforeach
								
							</div><!-- end new-posts -->
						</div> 

					</div>
					<div class="clearfix"></div>
					<hr class="big-sep">
					<div class="employer">
						<h3 class="e-title">Nhà tuyển dụng</h3>
						<div class="col-xs-6 e-main">
							@foreach($ntd as $key=>$post)
							@if($key == 0)
								@if($post->thumbnail)
									{{ $post->image($post->thumbnail, ['class'=>'full-image']) }}
								@else 
									{{ $post->image('nha-tuyen-dung.jpg', ['class'=>'full-image']) }}
								@endif
							
							<h3 class="e-slide-title"><a href="{{ URL::route('hiring.detail', [$post->post_slug,$post->id]) }}">{{ $post->title }}</a></h3>
							<p>
								{{ Str::limit(strip_tags($post->content)) }}
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
			    			@endif
			    			@endforeach
						</div>

						<div class="col-xs-6 e-post">
							<div class="row">
								@foreach($ntd as $key=>$post)
								@if($key != 0)
								<div class="col-xs-6">
									@if($post->thumbnail)
										{{ $post->image($post->thumbnail, ['class'=>'full-image esubpost']) }}
									@else 
										{{ $post->image('nha-tuyen-dung.jpg', ['class'=>'full-image esubpost']) }}
									@endif
									<h4 class="e-post-title"><a href="{{ URL::route('hiring.detail', [$post->post_slug,$post->id]) }}" title="{{ $post->title }}">{{ Str::limit($post->title, 30) }}</a></h4>
									<p>
										{{ Str::limit(strip_tags($post->content), 50) }}
									</p>
								</div>
								@endif
								@endforeach
								
							</div>
						</div>
					</div> <!-- end employer -->
					<div class="clearfix"></div>
					<hr class="big-sep">
					<div class="employer">
						<h3 class="e-title">Góc báo chí VNjobs</h3>
						<div class="col-xs-12 news-main">
							<div class="row">
								<div class="col-xs-8 news-post">
									@foreach($news as $key=>$post)
									@if($key == 0)
									<div class="row">
										<div class="col-xs-5">
											@if($post->thumbnail)
												{{ $post->image($post->thumbnail, ['class'=>'news-thumbnail']) }}
											@else 
												{{ $post->image('news-default.jpg', ['class'=>'news-thumbnail']) }}
											@endif
										
										</div>
										<div class="col-xs-7 news-postinfo">
											<h3 class="news-title"><a href="{{ URL::route('hiring.detail', [$post->post_slug,$post->id]) }}">{{ $post->title }}</a></h3>
											<p>
												{{ Str::limit(strip_tags($post->content)) }}
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
							    			</div> <!-- end post-meta -->
										</div> <!-- end col-xs-7 -->
									</div>
									@endif
									@endforeach
								</div>
								<div class="col-xs-4 news-related">
									@foreach($news as $key=>$post)
									@if($key != 0)
									<div class="news-related-post">
										<h4 class="related-title"><a href="{{ URL::route('hiring.detail', [$post->post_slug,$post->id]) }}">{{ $post->title }}</a></h4>
									</div>
									@endif
									@endforeach
								</div>
							</div>

						</div> <!-- end news-main -->
						
					</div> <!-- end employer -->
					
				</div> <!-- end row main-content -->
@stop
