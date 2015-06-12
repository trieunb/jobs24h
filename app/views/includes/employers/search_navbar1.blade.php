<div class="widget row">
	<h3>Các tìm kiếm gần đây</h3>
	<div class="calendar-content">
		<div class="row">
			<div class="col-xs-6">
				<select name="select-year" id="select-year1" class="form-control">
					@foreach(range(date('Y'), 2012, 1) as $val)
					<option value="{{ $val }}">{{ $val }}</option>
					@endforeach
				</select>
			</div>
			<div class="col-xs-6">
				<select name="select-month" id="select-month1" class="form-control">
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
						<tbody id="calendar-body1">
							
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

