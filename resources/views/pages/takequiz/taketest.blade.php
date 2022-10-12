@extends('layouts.master')
@section('page_title', 'Manage Quiz')
@section('style')
<style xmlns='http://www.w3.org/1999/html'>
    .btn-default {
        color: black !important;
        background-color: #d7d6d2 !important;
    }
    .btn-default:hover {
        color: black !important;
        background-color: #6bd098 !important;
    }

    .radiobtn {
        position: relative;
        display: block;
    }
    .radiobtn label {
        display: block;
        background: rgba(0, 0, 0, 0.2);
        color: #000;
        border-radius: 5px;
        padding: 10px 20px;
        margin-bottom: 5px;
        cursor: pointer;
    }
    .radiobtn label:after, .radiobtn label:before {
        content: "";
        position: absolute;
        right: 11px;
        top: 11px;
        width: 20px;
        height: 20px;
        border-radius: 3px;
        /*background:grey;*/
    }
    .radiobtn label:before {
        background: transparent;
        transition: 0.1s width cubic-bezier(0.075, 0.82, 0.165, 1) 0s, 0.3s height cubic-bezier(0.075, 0.82, 0.165, 2) 0.1s;
        z-index: 2;
        overflow: hidden;
        background-repeat: no-repeat;
        background-size: 13px;
        background-position: center;
        width: 0;
        height: 0;
        background-image: url(data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAxNS4zIDEzLjIiPiAgPHBhdGggZmlsbD0iI2ZmZiIgZD0iTTE0LjcuOGwtLjQtLjRhMS43IDEuNyAwIDAgMC0yLjMuMUw1LjIgOC4yIDMgNi40YTEuNyAxLjcgMCAwIDAtMi4zLjFMLjQgN2ExLjcgMS43IDAgMCAwIC4xIDIuM2wzLjggMy41YTEuNyAxLjcgMCAwIDAgMi40LS4xTDE1IDMuMWExLjcgMS43IDAgMCAwLS4yLTIuM3oiIGRhdGEtbmFtZT0iUGZhZCA0Ii8+PC9zdmc+);
    }
    input[type="radio"] {
        display: none;
        position: absolute;
        width: 100%;
        appearance: none;
    }
    /*input[type="radio"]:checked + label {*/
    /*    background:#6bd098;*/
    /*    animation-name: blink;*/
    /*    animation-duration: 1s;*/
    /*    border-color: $accentcolor;*/
    /*}*/
    /*input[type="radio"]:checked + label:after {*/
    /*    background: $accentcolor;*/
    /*}*/
    input[type="radio"]:checked + label:before {
        width: 20px;
        height: 20px;
    }
    .tab-content{
        min-height: auto !important;
    }
    .card-wizard{
        min-height: auto !important;
    }
</style>
@endsection

@section('content')
<div class="content">
    <div class="col-md-10 mr-auto ml-auto">
        <!--      Wizard container        -->
        <div class="wizard-container">
            <div class="card card-wizard" data-color="primary" id="wizardProfile">
                <form action="{{ route('posttest') }}" method="post">
                    @csrf
                    <!--        You can switch " data-color="primary" "  with one of the next bright colors: "green", "orange", "red", "blue"       -->

                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show">
                                <button type="button" aria-hidden="true" class="close" data-dismiss="alert"
                                        aria-label="Close">
                                    <i class="nc-icon nc-simple-remove"></i>
                                </button>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    <div class="card-body">
                        <div class="tab-content">
                            @if($questions->isEmpty())
                                <div class='justify-content-center'>
                                    <h4 class='text-center' >!! You Have Mastered All Questions in This Section Please select other Section to give Test !!</h4>
                                    <br>
                                    <a href='' class='btn btn-danger float-right'>Back</a>
                                </div>
                            @else
                            @foreach($questions as $question)
                                <?php
                                $arr = [
                                	'a' => $question->option_a,
                                	'b' => $question->option_b,
                                	'c' => $question->option_c,
                                	'd' => $question->option_d,
                                ];
                                shuffle($arr);
                                ?>

                               
                                    <h5 class="info-text font-weight-bold"> {{ $question->question }}</h5>
                                    <div class="row justify-content-center">
                                        <div class="col-md-10 jugarquestion{{ $question->id }}" id="{{ $question->id }}">
                                            <div class="radiobtn">
                                                <input type="radio" id="{{ $question->option_a.$question->id.(1) }}" class="question{{ $question->id }}1 btnRadio"
                                                       name="answer[{{$question->id}}]" value="{{  $arr[0] }}" data-question="{{$question->id}}"/>
                                                <label for="{{  $question->option_a.$question->id.(1) }}">{{ $arr[0] }}</label>
                                            </div>
                                            <div class="radiobtn">
                                                <input type="radio" id="{{ $question->option_b.$question->id.(2) }}"
                                                       name="answer[{{$question->id}}]" value="{{ $arr[1] }}" data-question="{{$question->id}}" class="btnRadio"/>
                                                <label for="{{ $question->option_b.$question->id.(2) }}">{{ $arr[1] }}</label>
                                            </div>
                                            <div class="radiobtn">
                                                <input type="radio" id="{{ $question->option_c.$question->id.(3)}}"
                                                       name="answer[{{$question->id}}]" value="{{$arr[2] }}" data-question="{{$question->id}}" class="btnRadio"/>
                                                <label for="{{ $question->option_c.$question->id.(3) }}">{{$arr[2]}}</label>
                                            </div>
                                            <div class="radiobtn">
                                                <input type="radio" id="{{ $question->option4.$question->id.(4 )}}"
                                                       name="answer[{{$question->id}}]" value="{{ $arr[3] }}" data-question="{{$question->id}}" class="btnRadio"/>
                                                <label for="{{ $question->option_d.$question->id.(4) }}">{{ $arr[3] }}</label>
                                            </div>
                                            <input hidden name='client_id' type='text' value='{{ auth::user()->id }}'>

                                        </div>
                                        {{-- <div class="col-12"></div>
                                        <div class="col-md-10">
                                            <label class="font-weight-bold">Reference</label>
                                            <textarea class="form-control text-center" rows="20" readonly>{{ $question->reference }}</textarea>
                                        </div> --}}

                                        {{-- <div class="col-10 next ">
                                            <input type='hidden' value='0' name='check[{{$question->id}}]'>
                                            @if( $question->testResultDetails->where('check',1)->where('user_id',auth::user()->id)->first() )
                                                <input type="hidden" name="check[{{$question->id}}]" value="1" />
                                                <label class="mt-3"><input disabled checked  type="checkbox" class="mr-2" /> If you feel you have mastered this content and don't want to see this question again, please check this box. You will only see this question one more time.?</label>
                                            @else
                                                <label class="mt-3"><input name="check[{{$question->id}}]" value='1' type="checkbox" class="mr-2" /> If you feel you have mastered this content and don't want to see this question again, please check this box. You will only see this question one more time.?</label>
                                                <label  class="mt-3" style='float: right'><i class="fa fa-exclamation-triangle fa-lg " style='color: #e0a800'></i><b>REPORT</b> this Question!<input name="report[{{$question->id}}]" value='1' type="checkbox" class="ml-2"  /></label>


                                            @endif
                                        </div> --}}
                                    </div>
                                    <input type="hidden" value="{{$question->option_a}}" name="katopito[{{$question->id}}]"  data-question="{{ $question->id }}">
                                

                            @endforeach
                                <input hidden type='text' name='no_of_question' value='{{ $no_of_questions }}'>
                        </div>

                    </div>


                    <div class="card-footer">

                        <div class="pull-right">
                            
                            <button type='submit' id='finish' class='btn btn-warning btn-fill btn-rose btn-wd'>Finish</button>

                        </div>
                       
                        

                      
                    </div>

                </form>
                
                @endif
            </div>
        </div> <!-- wizard container -->
    </div>
</div>
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script>

        $(document).ready(function() {
            // Initialise the wizard
            demo.initWizard();
            setTimeout(function() {
                $('.card.card-wizard').addClass('active');
            }, 600);
            // var check=$('.tab-pane').find("show").attr('id');

          //   alert(check)
          // console.log(check)
        });

        $('.btnRadio').click(function() {
            var katopito = $("input[name='katopito[" + $(this).data('question') + "]'").val();
            if(katopito == $(this).val()){
                $(this).next('label').css('background-color', "#6bd098");
                $(this).next('label').css('white', "#6bd098");
            }else{
                $(this).next('label').css('background-color', "red");
                $(this).next('label').css('white', "#6bd098");
            }
            $("input[name='answer[" + $(this).data('question') + "]'").prop('disabled', true);
        });

        // $("#finish").click(function(){
        //     let id = $('.tab-pane.active').attr('id');

        //     let jugarId = $('.jugar' + id).attr('id');
        //     console.log(
        //         jugarId,
        //         "input[name='answer[" + jugarId + "]']:checked"
        //     );
        //     if (
        //         $("input[name='answer[" + jugarId + "]']:checked").val() ==
        //         null
        //     ) {
        //         alert('select option');
        //         return false;
        //     }

        //     else{
        //         $('.btnRadio').removeAttr("disabled")
        //         $("#fin").click()

        //     }
        // });


    </script>

@endsection