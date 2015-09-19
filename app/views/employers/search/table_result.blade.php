
						<table class="table table-blue-bordered table-bordered rs-table">
							<thead>
								<tr>
									<th>Tìm</th>
									<th>Kết quả tìm kiếm</th>
									<th>Ngày</th>
								</tr>
							</thead>
							<tbody id="result-detail">
								@if(count($result))
								
								@foreach($result as $val)

									<tr>
										<td>
										<?php $params = []; ?>
											@if($val->keyword!='')
												<?php $params[] = "Keyword: ".$val->keyword; ?>
											@endif
											@if($val->category!='')
												<?php $params[] = "Danh mục: ".$category[$val->category]; ?>
											@endif
											@if($val->level!='')
												<?php $params[] = "Cấp bậc: ".$level[$val->level]; ?>
											@endif
											@if($val->location!='')
												<?php $params[] = "Địa điểm: ".$location[$val->location]; ?>
											@endif
											<?php 
											$kw = ($val->keyword==0)?'':$val->keyword;
											$ct = ($val->category==0)?'all':$val->category;
											$lv = ($val->level==0)?'all':$val->level;
											$lc = ($val->location==0)?'all':$val->location;
											?>
												<a href="{{ URL::to($locale.'/nha-tuyen-dung/tim-kiem/co-ban?keyword='.$val->keyword.'&category=all&level=all&location=all') }}" target="_blank">{{ implode(';', $params) }}</a> 
										 <!-- 	<a href="{{ URL::to($locale.'/nha-tuyen-dung/tim-kiem/co-ban?keyword='.$val->keyword.'&category='.$val->category.'&level='.$val->level.'&location='.$val->location.'') }}" target="_blank">{{ implode(';', $params) }}</a>  -->
										<!-- 	<a href="{{ URL::to($locale.'/employers/search/basic?' . implode('&', ['keyword='.$val->keyword, 'category='.$ct, 'level='.$lv, 'location='.$lc])) }}" target="_blank">{{ implode(';', $params) }}</a> -->
										</td>
										<td>
											{{ $val->total_result }}
										</td>
										<td>
											{{ $val->created_at }}
										</td>
									</tr>
								@endforeach
								@else
									<tr>
										<td colspan="3">Không có lich sử</td>
									</tr>
								@endif
							</tbody>
						</table>
						<div id="pagination" class="pull-right pagination-sm pagination-blue push-top">
							{{ $result->links() }}
						</div>
						