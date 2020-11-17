@extends('layouts.app')

@section('content')
    <div class="ui container page-content">
        <h2 class="ui center aligned header">
            <i class="question mark icon"></i>
            <div class="content">
                FAQ
            </div>
        </h2>
        <div class="ui divider"></div>

        <div class="ui styled fluid accordion">
            @foreach (\App\Faq::all() as $question)
                <div class="title">
                    <i class="dropdown icon"></i>
                    {{ $question->question }}
                </div>
                <div class="content">
                    <p class="transition hidden">{!! $question->answer !!}</p>
                </div>
            @endforeach
        </div>
    </div>
    <script type="text/javascript" src="{{ url('/js/jquery-3.2.1.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.accordion').accordion()
        });
    </script>
@endsection
