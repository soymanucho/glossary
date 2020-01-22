@extends('layouts.app')

@section('header')

  <div class="card-columns mt-2">
    @if ($glossaries->count() == 0)
      <div class="card" >
          <div class="card-body" >
            <strong class="d-inline-block mb-2" style="color:#cb5656">Nothing in here..</strong>
            <h3 class="mt-1">
              <a class="text-dark">Nothing matches your search</a>
            </h3>
            <div class="mb-1 text-muted"></div>
            <p class="card-text mb-auto">You want to create some new stuff?</p>
            <a class="badge badge-pill badge-success fancybox" href="{!! route('new-glossary') !!}">Create new glossary</a>
          </div>
      </div>
    @else
    @foreach ($glossaries as $glossary)
      <div class="card" >
          <div class="card-body" >
            <strong class="d-inline-block mb-2" style="color:{{$glossary->lenguage->color}}">{{$glossary->lenguage->name}}</strong>
            <h3 class="mt-1">
              <a class="text-dark" href="{!! route('show-glossary',compact('glossary')) !!}">{{$glossary->title}}{{-- @if ($loop->iteration <=10) <span class="badge badge-pill badge-primary">Latest</span> @endif--}}</a>
            </h3>
            <div class="mb-1 text-muted" data-toggle="tooltip" data-placement="right" title="{{$glossary->created_at->format('d/m/Y h:m')}}">{{$glossary->created_at->diffForHumans()}}</div>
            <p class="card-text mb-auto">{{$glossary->description}}</p>
            <a href="{!! route('show-glossary',compact('glossary')) !!}">Continue reading...</a>
          </div>
      </div>
    @endforeach
  @endif
  </div>

@endsection

@section('content')
  <div class="row">
    <div class="col-md-8 blog-main">
      

      <nav class="blog-pagination">
        {{ $glossaries->links() }}
        {{-- <a class="btn btn-outline-primary" href="#">Older</a> --}}
        {{-- <a class="btn btn-outline-secondary disabled" href="#">Newer</a> --}}
      </nav>

    </div><!-- /.blog-main -->

    <aside class="col-md-4 blog-sidebar">
   
    </aside><!-- /.blog-sidebar -->

  </div><!-- /.row -->
@endsection
