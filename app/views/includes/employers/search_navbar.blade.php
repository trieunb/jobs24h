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
							<th>T2</th>
							<th>T3</th>
							<th>T4</th>
							<th>T5</th>
							<th>T6</th>
							<th class="bg-orange">T7</th>
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
		$('#select-year1').val($('#select-year').val());
		$('#select-month1').val($('#select-month').val());
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
		getCalendar1();
	});
	$('#select-year1').change(function(event) {
		getCalendar1();
	});
	$('#select-month1').change(function(event) {
		getCalendar1();
	});
	var getCalendar1 = function()
	{
		var year = $('#select-year1').val();
		var month = $('#select-month1').val();
		$.ajax({
			url: '{{ URL::route('employers.search.calendarview') }}',
			data: {year: year, month: month},
			type: 'POST',
			success: function(res)
			{
				$('#calendar-body1').html(res);
			}
		})
	}
	$(document).on('click', '.view-history', function(event) {
		thisId = this.id;
		var dateId = thisId.split('_');
		dateId = parseInt(dateId[1]);
		var year = $('#select-year1').val();
		var month = $('#select-month1').val();
		if( ! isNaN(dateId))
		{
			$.ajax({
				url: '{{ URL::route('employers.search.historyinfo') }}',
				data: {year: year, month: month, day: dateId},
				type: 'GET',
				success: function(res)
				{
					$('.view-history').each(function(index, el) {
						$(this).removeClass('active');
					});
					$('#'+thisId).addClass('active');
					$('#table-search-info').html(res);
				}
			})
		}
	});
	$( "#search-fo" ).submit(function( event ) {
		if($('#keyword').val() == '' && $('#category').val() == 'all' && $('#level').val() == 'all' && $('#location').val() == 'all')
		{
			alert('Vui lòng chọn tiêu chí tìm kiếm.');
			return false;
		} else {
			$(this).submit();
		}
		
	});
	$(document).on('click', '.pagi a', function() {
		var href = $(this).attr('href');
		$.ajax({
			url: href,
			success: function(res)
			{
				$('#table-search-info').html(res);
			}
		})
		return false;
	});
	</script>
@stop