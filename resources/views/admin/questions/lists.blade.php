@extends('admin.layouts.admin')

@section('content')
    <div class="page-header clearfix">
        <h1>
            Questions
            <a class="btn btn-success pull-right" href="{{ route('admin.questions.create') }}"><i class="glyphicon glyphicon-plus"></i> Create</a>
        </h1>

    </div>
    <div class="row">
        <div class="col-md-12">
            @if($questions->count())
                <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
               width="100%">
                    <thead>
                        <tr>
                        <th>Question</th>
                        <th>Answer 1</th>
                        <th>Answer 2</th>
                        <th>Answer 3</th>
                        <th>Answer 4</th>
                        <th>Correct Answer</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($questions as $question)
                            <tr>
                                <td>{{$question->question}}</td>
                                <td>{{$question->answer1}}</td>
                                <td>{{$question->answer2}}</td>
                                <td>{{$question->answer3}}</td>
                                <td>{{$question->answer4}}</td>
                                <td>Answer {{$question->correct_answer}}</td>
                                
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="pull-right">
                    {{ $questions->links() }}
                </div>
            @else
                <h3 class="text-center alert alert-info">Empty!</h3>
            @endif

        </div>
    </div>

@endsection