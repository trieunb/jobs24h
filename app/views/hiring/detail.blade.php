@extends('layouts.hiring')
@section('title') {{ $detail->title }} @stop
@section('primary')
	<div class="row main-content">
					<div class="primary">
						<h3 class="detail-title"><a href="{{ URL::route('hiring.detail', [$detail->post_slug,$detail->id]) }}">{{ $detail->title }}</a></h3>
						@if($detail->thumbnail)
							{{ $detail->image($detail->thumbnail, ['class'=>'detail-image']) }}
						@else 
							{{ $detail->image('post-detail.jpg', ['class'=>'detail-image']) }}
						@endif
					    <div class="clearfix"></div>
					    <div class="detail-left">
					    	{{ $detail->image('author-avatar.jpg', ['class'=>'author-avatar']) }}
					    	<div class="center author-info">
					    		<h5 class="author-name">{{ $detail->admin->username }}</h5>
					    		<div class="contributor">
					    			<div class="contributor-name">Tác giả</div>
					    			<!-- <div class="contributor-info">Digital Marketing, Web Designer, Developer, Author</div> -->
					    		</div>
					    	</div>
					    	<div class="clearfix"></div>
					    	<div class="author-lastest-post">
					    		@foreach($lastPost as $post)
					    		<div class="author-post">
					    			
					    			<a href="{{ URL::route('hiring.detail', [$post->post_slug,$post->id]) }}">
					    				@if($post->thumbnail)
											{{ $post->image($post->thumbnail) }}
								        @else
											{{ $post->image('author-post-default.jpg') }}
								        @endif
					    			</a>
					    			<h4 class="author-post-title"><a href="{{ URL::route('hiring.detail', [$post->post_slug,$post->id]) }}">{{ $post->title }}</a></h4>
					    		</div>
					    		@endforeach
					    		
					    	</div>
					    </div>
					    <div class="detail-right">
					    	<div class="detail-meta">
					    		<div class="socials">
						    			<a target="_blank" href="http://www.facebook.com/sharer/sharer.php?u={{ urlencode(URL::full()) }}&title={{ urlencode($detail->title) }}" class="btn btn-default btn-facebook">
											<span class="fa fa-facebook"></span> <span class="total">0</span>
						    			</a><a target="_blank" href="https://twitter.com/share?url={{ urlencode(URL::full()) }}&via=TWITTER_HANDLE&text={{ urlencode($detail->title) }}" class="btn btn-default btn-twitter">
											<span class="fa fa-twitter"></span> <span class="total">0</span>
						    			</a><a target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(URL::full()) }}&title={{ urlencode($detail->title) }}&summary=&source=" class="btn btn-default btn-linkedin">
											<span class="fa fa-linkedin"></span> <span class="total">0</span>
						    			</a><a target="_blank" href="https://plus.google.com/share?url={{ urlencode(URL::full()) }}" class="btn btn-default btn-plus">
											<span class="fa fa-plus"></span>
						    			</a>
						    		</div>
					    		<div class="connect pull-right">
					    			<a href="#comment-box" class="btn btn-default btn-comment">
										<span class="fa fa-comment"></span> <span class="total">0</span>
					    			</a><a href="#" class="btn btn-default btn-email">
										<span class="fa fa-envelope-o"></span>
					    			</a><a href="#" onclick="window.print(); return false;" class="btn btn-default btn-print">
										<span class="fa fa-print"></span>
					    			</a>
					    		</div>
					    	</div>
					    	<div class="clearfix"></div>
					    	<div class="detail-content">
					    		<div class="detail-date">
					    			{{ date('Y-m-d', strtotime($detail->created_at)) }}
					    		</div>
					    		<div class="clearfix"></div>
					    		<div class="detail-info">
					    			<p>
					    				{{ nl2br($detail->content()) }}
					    			</p>
					    			<div class="clearfix"></div>
					    			<button type="button" class="btn btn-primary btn-all-comment btn-block">
										<span class="fa fa-comment"></span>
										Xem các bình luận (<span class="total-comment">0</span>)
					    			</button>
					    		</div> <!-- end detail-info -->
					    		<div class="detail-meta">
						    		<div class="socials">
						    			<a target="_blank" href="http://www.facebook.com/sharer/sharer.php?u={{ urlencode(URL::full()) }}&title={{ urlencode($detail->title) }}" class="btn btn-default btn-facebook">
											<span class="fa fa-facebook"></span> <span class="total">0</span>
						    			</a><a target="_blank" href="https://twitter.com/share?url={{ urlencode(URL::full()) }}&via=TWITTER_HANDLE&text={{ urlencode($detail->title) }}" class="btn btn-default btn-twitter">
											<span class="fa fa-twitter"></span> <span class="total">0</span>
						    			</a><a target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(URL::full()) }}&title={{ urlencode($detail->title) }}&summary=&source=" class="btn btn-default btn-linkedin">
											<span class="fa fa-linkedin"></span> <span class="total">0</span>
						    			</a><a target="_blank" href="https://plus.google.com/share?url={{ urlencode(URL::full()) }}" class="btn btn-default btn-plus">
											<span class="fa fa-plus"></span>
						    			</a>
						    		</div>
						    		<div class="connect pull-right">
						    			<a href="#comment-box" class="btn btn-default btn-comment">
											<span class="fa fa-comment"></span> <span class="total">0</span>
						    			</a><a href="#" class="btn btn-default btn-email">
											<span class="fa fa-envelope-o"></span>
						    			</a><a href="#" onclick="window.print(); return false;" class="btn btn-default btn-print">
											<span class="fa fa-print"></span>
						    			</a>
						    		</div>
					    		</div>
					    		<div class="comment" id="comment-box">
					    			<div id="fb-root"></div>
									<script>(function(d, s, id) {
									  var js, fjs = d.getElementsByTagName(s)[0];
									  if (d.getElementById(id)) return;
									  js = d.createElement(s); js.id = id;
									  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.4";
									  fjs.parentNode.insertBefore(js, fjs);
									}(document, 'script', 'facebook-jssdk'));</script>
									<div class="fb-comments" data-href="{{ URL::full() }}" data-width="100%" data-numposts="5"></div>
					    		</div>
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
					
					<div id="full-url" style="display:none;">{{ URL::full() }}</div>
				</div> <!-- end row main-content -->
@stop

@section('script')
	<script type="text/javascript">
		jQuery.getJSON('https://api.facebook.com/method/fql.query?query=select%20%20like_count,comment_count%20from%20link_stat%20where%20url=%22'+$("#full-url").text()+'%22&format=json', function (data) {
			console.log(data);
		    jQuery('.socials .btn-facebook .total').text(formatSizeUnits(data[0].like_count));
		    jQuery('.btn-comment .total').text(formatSizeUnits(data[0].comment_count));
		    jQuery('.total-comment').text(formatSizeUnits(data[0].comment_count));
		});
		jQuery.getJSON('https://cdn.api.twitter.com/1/urls/count.json?url='+$("#full-url").text()+'&callback=?', function (data) {
		    jQuery('.socials .btn-twitter .total').text(formatSizeUnits(data.count));
		});
		jQuery.getJSON('https://www.linkedin.com/countserv/count/share?url='+$("#full-url").text()+'&format=jsonp&callback=?', function (data) {
		    jQuery('.socials .btn-linkedin .total').text(formatSizeUnits(data.count));
		});
		function formatSizeUnits(total){
				if (total>=1000000)    {total=(total/1000000).toFixed(0)+'M';}
		        else if (total>=1000)       {total=(total/1000).toFixed(0)+'K';}
		        else if (total>1)           {total=total+'';}
		        else if (total==1)          {total=total+'';}
		        else                        {total='0';}
		        return total;
		}
	</script>
@stop