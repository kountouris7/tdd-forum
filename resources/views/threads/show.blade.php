@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-header">


                        <a href="#">{{ $thread->creator->name }}</a> posted:
                        {{ $thread->title }}
                    </div>

                    <div class="panel-body">
                        {{ $thread->body }}
                    </div>

                </div>

            </div>

        </div>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-header">


                @foreach ($thread->replies as $reply)

                            <article>


                                    @include ('threads.reply')

                                <hr>

                            </article>
                @endforeach

            </div>

        </div>

    </div>

        </div>
@endsection