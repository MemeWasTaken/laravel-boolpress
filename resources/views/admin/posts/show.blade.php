@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            @if (session('status'))
                <div class="alert alert-danger">
                    {{ session('status') }}
                </div>
            @endif
        </div>

        <div class="row">
            <div class="col">
                <h1>
                    {{ $post->title }}
                </h1>
                <h2>Category: {{ $post->category()->first()->name }} </h2>
                <h3>Author: {{ $post->user()->first()->name }} </h3>
            </div>
        </div>
        <div class="row">
            <div class="col">
                Content: {{ $post->content }}
            </div>
        </div>
        <div class="row">
            <div class="col">
                Tags:
                @foreach ($post->tags()->get() as $tag)
                    {{ $tag->name }}
                @endforeach
            </div>
        </div>
    </div>
@endsection