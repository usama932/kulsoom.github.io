@extends('layouts.master')
@section('page_title', 'Manage Quiz')
@section('content')
<div class="card">
    <div class="card-header header-elements-inline">
        <h6 class="card-title">Manage Quiz</h6>
        
    </div>

    <div class="card-body">
        <div class="tab-content">
                <div class="tab-pane fade show active" id="all-classes">
                    <table class="table datatable-button-html5-columns">
                        <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Question</th>
                            <th>Your Answer</th>
                            <th>Correct</th>
                            <th>Status</th>
                            
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($result as $res)
                            <tr>
                                <td>{{ $res->id }}</td>
                                <td>{{ $res->question }}</td>
                                <td> {{ $res->your_ans }}</td>
                                <td>{{ $res->correct }}</td>
                                <td>{{ $res->status }}</td>
                               
                            </tr>
                            @endforeach
                          
                       
                        </tbody>
                    </table>
                </div>

           
        </div>
    </div>
</div>
@endsection