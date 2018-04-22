@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3>Gallery Showroom</h3></div>
                    <div class="panel-heading">Page {{ $artpieces->currentPage() }} of {{ $artpieces->lastPage() }}</div>
                    @foreach ($artpieces as $artpiece)
                        <div class="panel-body">
                            <li style="list-style-type:disc">
                                <a href="{{ route('artpieces.show', $artpiece->id ) }}"><b>{{ $artpiece->title }}</b><br>
                                    <p class="teaser">
                                       {{  str_limit($artpiece->description, 100) }} {{-- Limit teaser to 100 characters --}}
                                    </p>
                                </a>
                            </li>
                        </div>
                    @endforeach
                    </div>
                    <div class="text-center">
                        {!! $artpieces->links() !!}
                    </div>
                </div>
            </div>
        </div>
    
    
    
@endsection