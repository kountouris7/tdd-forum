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


            @if(auth()->check())


                <div class="col-md-8 col-md-offset-2">

                    <form method="POST" action="{{$thread->path() . '/replies'}}">

                        {{csrf_field()}}

                        <div class="form-group">
                            <textarea name="body" id="body" class="form-control" placeholder="Have something to say?" rows="5"></textarea>
                        </div>
                        <button type="submit" class="btn btn-default">Post Reply</button>

                    </form>

                </div>
        </div>



    @else

            <div class="col-md-8">
                <p class="text-center"> Please <a href="{{route('login')}}">sign in</a> to participate in this discussion</p>
            </div>
        @endif

    </div>




@endsection