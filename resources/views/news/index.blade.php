@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3>News</h3></div>
                    <div class="panel-heading">Page {{ $news->currentPage() }} of {{ $news->lastPage() }}</div>
                    @foreach ($news as $news)
                        <div class="panel-body">
                            <li style="list-style-type:disc">
                                <a href="{{ route('news.show', $news->id ) }}"><b>{{ $news->title }}</b><br>
                                    <p class="teaser">
                                       {{  str_limit($news->body, 100) }} {{-- Limit teaser to 100 characters --}}
                                    </p>
                                </a>
                            </li>
                        </div>
                    @endforeach
                    </div>
                    <div class="text-center">
                        {!! $news->links() !!}
                    </div>
                </div>
            </div>
        </div>
@endsection