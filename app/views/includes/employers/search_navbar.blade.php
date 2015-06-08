<div class="widget row">
	<h3>Các tìm kiếm gần đây</h3>
	<div class="calendar-content">
		<div class="row">
			<div class="col-xs-6">
				<select name="select-year" id="select-year" class="form-control">
					@foreach(range(date('Y'), 2012, 1) as $val)
					<option value="{{ $val }}">{{ $val }}</option>
					@endforeach
				</select>
			</div>
			<div class="col-xs-6">
				<select name="select-month" id="select-month" class="form-control">
					@foreach(range(1, 12, 1) as $val)
					<option value="{{ $val }}" @if($val==date('m')) selected @endif >{{ $val }}</option>
					@endforeach
				</select>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12">
				<div class="calendar">
					<table class="table">
						<thead>
							<th>Hai</th>
							<th>Ba</th>
							<th>Tư</th>
							<th>Năm</th>
							<th>Sáu</th>
							<th class="bg-orange">Bảy</th>
							<th class="bg-orange">CN</th>
						</thead>
						<tbody id="calendar-body">
							
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

@section('style')
	<style type="text/css">

	</style>
@stop

@section('script')
	<script type="text/javascript">
	$('#select-year').change(function(event) {
		getCalendar();
	});
	$('#select-month').change(function(event) {
		getCalendar();
	});
	var getCalendar = function()
	{
		var year = $('#select-year').val();
		var month = $('#select-month').val();
		$.ajax({
			url: '{{ URL::route('employers.search.calendar') }}',
			data: {year: year, month: month},
			type: 'POST',
			success: function(res)
			{
				$('#calendar-body').html(res);
			}
		})
	}
	jQuery(document).ready(function($) {
		getCalendar();
	});
	</script>
@stop