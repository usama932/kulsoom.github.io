@extends('layouts.master')
@section('page_title', 'Return Book')
@section('content')

    <div class="card">
        <div class="card-header header-elements-inline">
            <h6 class="card-title">Return Book</h6>
            {!! Qs::getPanelOptions() !!}
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <form method="post" action="{{ route('book_issue.update',[Qs::hash($book->id),$fine]) }}">
                        @csrf
                        <div class="form-group row">
                            <label class="col-lg-6 col-form-label font-weight-semibold">Book Name : </label>
                            <div class="col-lg-9">
                            <label class="col-lg-9 col-form-label">{{ App\Models\book::where('id',$book->book_id)->first()['name']}}</label>
                                <!-- <input name="name" value="{{ App\Models\book::where('id',$book->book_id)->first()['name']}}" required type="text" class="form-control" placeholder="Name of Book" disabled> -->
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-lg-6 col-form-label font-weight-semibold">Student Name : </label>
                            <div class="col-lg-9">
                            <label class="col-lg-9 col-form-label">{{ App\User::where('id',$book->student_id)->first()['name'] }}</label>
                                <!-- <input name="name" value="{{ App\User::where('id',$book->student_id)->first()['name'] }}" required type="text" class="form-control" placeholder="Name of Student" disabled> -->
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-lg-6 col-form-label font-weight-semibold">Issue Date : </label>
                            <div class="col-lg-9">
                            <label class="col-lg-9 col-form-label">{{ date('d-M-Y', strtotime($book->issue_date)) }}</label>
                                <!-- <input name="name" value="{{ App\User::where('id',$book->student_id)->first()['name'] }}" required type="text" class="form-control" placeholder="Name of Student" disabled> -->
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-6 col-form-label font-weight-semibold">Return Date : </label>
                            <div class="col-lg-9">
                            <label class="col-lg-9 col-form-label">{{ date('d-M-Y', strtotime($book->return_date)) }}</label>
                                <!-- <input name="name" value="{{ App\User::where('id',$book->student_id)->first()['name'] }}" required type="text" class="form-control" placeholder="Name of Student" disabled> -->
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-lg-6 col-form-label font-weight-semibold">Fine : </label>
                            <div class="col-lg-9">
                            <label class="col-lg-9 col-form-label">{{ $fine }}</label>
                                <input name="fine" value="{{ $fine }}" type="text" hidden disabled>
                            </div>
                        </div>

                        @if($book->issue_status == 'N')
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Return Book <i class="icon-paperplane ml-2"></i></button>
                        </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{--Class Return Ends--}}

@endsection
