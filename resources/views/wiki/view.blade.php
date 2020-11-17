@extends('layouts.app')
@section('content')
    <div class="ui container page-content">
        <h2 class="ui center aligned header">
            <div class="content">
                {{ $wiki->title }}
            </div>
        </h2>
        <div class="ui divider"></div>
        <article>
            {!! $wiki->content !!}
        </article>
        <br><br>
    </div>
@endsection
