@extends('layouts.master')
@section('page_title', 'Student Attendance')

@section('content')
	
	<style type="text/css">
		thead {
		    background: rgba(149, 165, 166,.3);
		    color: rgba(44, 62, 80,1.0);
		    border-top: 1px solid #bdc3c7;
		}
		th .c-container {
		    margin-top: 12px;
		    margin-bottom: 11px;
		}
		.c-container {
		    display: block;
		    position: relative;
		    padding-left: 35px;
		    margin-bottom: 23px;
		    cursor: pointer;
		    font-size: 14px;
		    -webkit-user-select: none;
		    -moz-user-select: none;
		    -ms-user-select: none;
		    user-select: none;
		}
		.c-container input {
		    position: absolute;
		    opacity: 0;
		    cursor: pointer;
		}
		input[type=checkbox], input[type=radio] {
		    margin: 4px 0 0;
		    margin-top: 1px\9;
		    line-height: normal;
		}
		.checkmark {
		    position: absolute;
		    top: 0;
		    left: 0;
		    height: 20px;
		    width: 20px;
		    background-color: #bdc3c7;
		}
		.c-container input:checked ~ .checkmark {
		    background-color: #007bff;
		}
		.c-container input:checked ~ .checkmark:after {
		    display: block;
		}
		.c-container .checkmark:after {
		    left: 8px;
		    top: 4px;
		    width: 5px;
		    height: 10px;
		    border: solid white;
		    border-width: 0 3px 3px 0;
		    -webkit-transform: rotate(45deg);
		    -ms-transform: rotate(45deg);
		    transform: rotate(45deg);
		}
		.checkmark:after {
		    content: "";
		    position: absolute;
		    display: none;
		}
	</style>

    <div class="card">
        <div class="card-header header-elements-inline">
            <h6 class="card-title">Student Attendance</h6>
            {!! Qs::getPanelOptions() !!}
        </div>

        <div class="card-body">
            <form id="search_form" class="validate row" action="{{ url('student/attendance') }}" method="post" autocomplete="off">
				@csrf
				<div class="col-sm-3">
					<div class="form-group">
						<label class="control-label">{{ __('Class') }}</label>
						<select name="class_id" class="form-control select-search"  required>
							<option value="">{{ __('Select One') }}</option>
							@if($classes->count() > 0)
							@foreach($classes as $class)
							<option value="{{ $class->id }}">{{ $class->name }}</option>
							@endforeach
							@endif
						</select>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="form-group">
						<label for="date" class="control-label">Date</label>
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
							<input type="date" class="form-control datepicker" name="date" value="{{ $date }}" required>
					    </div>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="form-group">
						<button type="submit" style="margin-top:24px;" class="btn btn-primary btn-block rect-btn">{{__('Manage Attendance')}}</button>
					</div>
				</div>
			</form>

			<hr>

			@if( !empty($attendance) )	
			<div class="col-md-12" id="attendance">	
				<div class="panel-heading text-center">
					<div class="panel-title" >
						<h4>
							{{ __('Attendance For Class') }} {{ $class->name }}<br>
					
							{{ date('d-M-Y', strtotime($date)) }}<br>
						</h4>
					</div>
				</div>
				<form action="{{ url('student/attendance/save') }}" class="appsvan-submit-validate" method="post" accept-charset="utf-8">
					@csrf
					<table class="table table-bordered">
						<thead>
							<th>{{__('Name')}}</th>
							<th>
								<label class="c-container">{{__('Present')}}<input type="checkbox" id="present_all" onclick="present(this)"><span class="checkmark"></span></label>
							</th>
							<th>
								<label class="c-container">{{__('Absent')}}<input type="checkbox" id="absent_all" onclick="absent(this)"><span class="checkmark"></span></label>
							</th>
							<th>
								<label class="c-container">{{__('Late')}}<input type="checkbox" id="late_all" onclick="late(this)"><span class="checkmark"></span></label>
							</th>
							<th>
								<label class="c-container">{{__('Holiday')}}<input type="checkbox" id="holiday_all" onclick="holiday(this)"><span class="checkmark"></span></label>
							</th>
						</thead>
						<tbody>
							@foreach($attendance AS $key => $data)
							<tr>
								<td>{{ $data->user->name }}</td>
								<input type="hidden" name="student_id[]" value="{{ $data->user_id }}">
								<input type="hidden" name="class_id[]" value="{{ $data->my_class_id }}">
								
								<input type="hidden" name="date" value="{{ $date }}">
								<input type="hidden" name="attendance_id[]" value="{{ $data->attendance_id }}">
								<td>
									<label class="c-container">
									<input type="checkbox" name="attendance[{{$key}}][]" @if($data->attendance=='present') checked @endif value="present" class="present"><span class="checkmark"></span>
									</label>
								</td>
								<td>
									<label class="c-container">
									<input type="checkbox" name="attendance[{{$key}}][]" @if($data->attendance=='absent') checked @endif value="absent" class="absent"><span class="checkmark"></span>
									</label>
								</td>
								<td>
									<label class="c-container">
									<input type="checkbox" name="attendance[{{$key}}][]" @if($data->attendance=='late') checked @endif value="late" class="late"><span class="checkmark"></span>
									</label>
								</td>
								<td>
									<label class="c-container">
									<input type="checkbox" name="attendance[{{$key}}][]" @if($data->attendance=='holiday') checked @endif value="holiday" class="holiday"><span class="checkmark"></span>
									</label>
								</td>
							</tr>
							@endforeach
							
							<tr>
							  <td colspan="100"><button type="submit" class="btn btn-primary pull-right">{{__('Save Attendance')}}</button></td>
							</tr>
						</tbody>
					</table>
				</form>
			</div>
			@endif
        </div>
    </div>

    {{--Class List Ends--}}

@endsection


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script type="text/javascript">
	function getData(val) {
		var _token=$('input[name=_token]').val();
		var class_id=$('select[name=class_id]').val();
		$.ajax({
			type: "POST",
			url: "{{url('sections/section')}}",
			data:{_token:_token,class_id:class_id},
			beforeSend: function(){
				$("#preloader").css("display","block");
			},success: function(sections){
				$("#preloader").css("display","none");
				$('select[name=section_id]').html(sections);				
			}
		});
	}

	$("input:checkbox").on('click', function() {
		
		var $box = $(this);
		if ($box.is(":checked")) {
			var group = "input:checkbox[name='" + $box.attr("name") + "']";
			$(group).prop("checked", false);
			$box.prop("checked", true);
		} else {
			$box.prop("checked", false);
		}
	});

	function present(source) {
		$(".absent,.late,.present,.holiday,#late_all,#absent_all,#holiday_all").prop("checked",false);
		var checkboxes = document.querySelectorAll('.present');
		for (var i = 0; i < checkboxes.length; i++) {
			if (checkboxes[i] != source)
				checkboxes[i].checked = source.checked;
		}
	}
	function absent(source) {
		$(".absent,.late,.present,.holiday,#present_all,#late_all,#holiday_all").prop("checked",false);
		var checkboxes = document.querySelectorAll('.absent');
		for (var i = 0; i < checkboxes.length; i++) {
			if (checkboxes[i] != source)
				checkboxes[i].checked = source.checked;
		}
	}
	function late(source) {
		$(".absent,.late,.present,.holiday,#present_all,#absent_all,#holiday_all").prop("checked",false);
		var checkboxes = document.querySelectorAll('.late');
		for (var i = 0; i < checkboxes.length; i++) {
			if (checkboxes[i] != source)
				checkboxes[i].checked = source.checked;
		}
	}
	
	function holiday(source) {
		$(".absent,.late,.present,.holiday,#present_all,#absent_all").prop("checked",false);
		var checkboxes = document.querySelectorAll('.holiday');
		for (var i = 0; i < checkboxes.length; i++) {
			if (checkboxes[i] != source)
				checkboxes[i].checked = source.checked;
		}
	}
</script>