@extends('layouts.app')
@section('content')
    <div class="ui container page-content">
        <div class="ui grid">
            @foreach (\App\WikiCategory::all() as $category)
                <div class="ui sixteen wide mobile eight wide tablet four wide computer column">
                    <div class="ui card">
                        <div class="content">
                            <div class="header">{{ $category->name }}</div>
                        </div>
                        <div class="content">
                            <h4 class="ui sub header">Articles</h4>
                            <div class="ui small feed">
                                @foreach (\App\WikiItem::all() as $article)
                                    @if($article->category == $category->id)
                                        <div class="event">
                                            <div class="content">
                                                <div class="summary">
                                                    <div class="ui list">
                                                        <a class="item"
                                                           href="{{ url("/wiki/{$article->id}") }}" {{ !$article->displayed ? 'disabled' : '' }}>
                                                            <i class="right triangle icon"></i>
                                                            <div class="content">
                                                                <div class="header">
                                                                    {{ $article->title }}
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
    <style media="screen">
        .ui.list a.item .content .header {
            color: rgba(80, 79, 79, 0.87) !important;
        }

        .ui.card {
            width: 100%;
        }

        .label {
            text-transform: uppercase;
        }
    </style>
@endsection
