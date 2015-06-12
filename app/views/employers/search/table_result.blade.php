
						<table class="table table-blue-bordered table-bordered">
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
											<a href="{{ URL::route('employers.search.basic', ['keyword'=>$val->keyword, 'category'=>$val->category, 'level'=>$val->level, 'location'=>$val->location]) }}" target="_blank">{{ implode(';', $params) }}</a>
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
						