<nav id="menu-right">
		<ul>
			@foreach($all_dichvu as $value)
				<li>
					<a href="{{URL::action('CungungController@detail',$value['id'])}}">
						@if($value['name']=="DỊCH VỤ ĐÀO TẠO NHÂN SỰ")
							<span class="bg-pink">{{HTML::image('cungunglaodong/assets/images/icon_photo_w.png')}}</span> 
						@elseif($value['name']=="QUẢN LÝ NHÂN SỰ")
							<span class="bg-little-blue">{{HTML::image('cungunglaodong/assets/images/icon_paint_w.png')}}</span>
						@elseif($value['name']=="DỊCH VỤ HEAD HUNTING")
							<span class="bg-purple">{{HTML::image('cungunglaodong/assets/images/icon_cart_w.png')}}</span>
						@elseif($value['name']=="THUÊ NGOÀI NHÂN SỰ")
							<span class="bg-little-blue">{{HTML::image('cungunglaodong/assets/images/icon_human_w.png')}}</span>
						@elseif($value['name']=="DỊCH VỤ TUYỂN DỤNG")
							<span class="bg-purple">{{HTML::image('cungunglaodong/assets/images/icon_user_w.png')}}</span>
						@elseif($value['name']=="TƯ VẤN CHIẾN LƯỢC NHÂN SỰ")
							<span class="bg-pink">{{HTML::image('cungunglaodong/assets/images/icon_hand_up_w.png')}}</span>
						@elseif($value['name']=="LƯƠNG VÀ CHẾ ĐỘ")
							<span class="bg-pink">{{HTML::image('cungunglaodong/assets/images/icon_gift_w.png')}}</span>
						
						@endif

						{{$value['name']}}
					</a>
				</li>
				
			@endforeach
		</ul>
	</nav>