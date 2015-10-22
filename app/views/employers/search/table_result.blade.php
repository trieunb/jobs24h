
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
											@if((int)$val->category!='')
												<?php $params[] = "Danh mục: ".$category[(int)$val->category]; ?>
											@endif
											@if((int)$val->level!='')
												<?php $params[] = "Cấp bậc: ".$level[(int)$val->level]; ?>
											@endif
											@if((int)$val->location!='')
												<?php $params[] = "Địa điểm: ".$location[(int)$val->location]; ?>
											@endif
											<?php 
											$kw = ($val->keyword==0)?'':$val->keyword;
											$ct = ((int)$val->category==0)?'all':$val->category;
											$lv = ((int)$val->level==0)?'all':$val->level;
											$lc = ((int)$val->location==0)?'all':$val->location;
											?>
												<a href="{{ URL::to($locale.'/nha-tuyen-dung/tim-kiem/co-ban?keyword='.$val->keyword.'&category=all&level=all&location=all') }}" target="_blank">{{ implode(';', $params) }}</a> 
											<!-- <a href="{{ URL::to($locale.'/employers/search/basic?' . implode('&', ['keyword='.$kw, 'category='.$ct, 'level='.$lv, 'location='.$lc])) }}" target="_blank">{{ implode(';', $params) }}</a> -->
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
						