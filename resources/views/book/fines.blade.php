@extends('layouts.master')
@section('page_title', 'Fine')
@section('content')

<div class="card">
    <div class="card-header header-elements-inline">
        <h6 class="card-title">Fine</h6>
        {!! Qs::getPanelOptions() !!}
    </div>

    <div class="card-body">
        <ul class="nav nav-tabs nav-tabs-highlight">
            <li class="nav-item"><a href="#new-user" class="nav-link active" data-toggle="tab">Manage Fine</a></li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane fade show active" id="new-user">
                <form method="post" enctype="multipart/form-data" class="wizard-form steps-validation ajax-store" action="{{ route('fine.update') }}" data-fouc>
                    @csrf
                    <h6>Fine Info</h6>
                    <fieldset>
                    <fieldset>
                    <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Return Days : <span class="text-danger">*</span></label>
                                    <input value="{{ $data->return_days }}" required type="text" name="return_days" placeholder="Return Days" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Fine: <span class="text-danger">*</span></label>
                                    <input value="{{ $data->fine }}" required type="text" name="fine" placeholder="Fine" class="form-control">
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>

{{--End--}}

@endsection
