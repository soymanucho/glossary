@extends('layouts.app')

@section('header')

  <div class="nav-scroller py-1 mb-2">
    <nav class="nav d-flex justify-content-between">
      @foreach ($lenguages as $lenguage)
        <a class="p-2 text-muted" href="{!! route('lenguage-glossary',compact('lenguage')) !!}">{{$lenguage->name}}</a>
      @endforeach
    </nav>
  </div>

  <div class="jumbotron row p-3 p-md-5 text-white rounded bg-dark" style="padding: 15px!important; height: 300px;">
    <div class="col-md-6 col-lg-6 px-0">
      <h1 class="display-4 font-italic">Welcome to mini-glossary app test</h1>
      <p class="lead my-3">I hope you enjoy and understand this test.</p>
    </div>
    <div class="col-lg-6 col-md-2 col-sm-0 px-0 py-10" style="background: url('/img/jumbo.svg'); background-size: auto; background-repeat:no-repeat; background-position:right;" ></div>
  </div>

  <div class="row mb-2">
    @foreach ($glossaries as $glossary)
      <div class="col-md-6 col-sm-12">
        <div class="card flex-md-row mb-4 box-shadow h-md-250 h-sm-350">
          <div class="card-body d-flex flex-column align-items-start">
            <strong class="d-inline-block mb-2" style="color:{{$glossary->terms()->first()->lenguage->color}}">{{$glossary->terms()->first()->lenguage->name}}</strong>
            <h3 class="mt-1">
              <a class="text-dark" href="{!! route('show-glossary',compact('glossary')) !!}">{{$glossary->title}} <span class="badge badge-pill badge-primary">Latest</span></a>
            </h3>
            <div class="mb-1 text-muted">{{$glossary->created_at->diffForHumans()}}</div>
            <p class="card-text mb-auto">{{$glossary->description}}</p>
            <a href="{!! route('show-glossary',compact('glossary')) !!}">Continue reading...</a>
          </div>
          <img class="card-img-right flex-auto d-none d-md-block" data-src="holder.js/200x250?theme=thumb" alt="Thumbnail [200x250]"  src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22200%22%20height%3D%22250%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20200%20250%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_16acb6416e2%20text%20%7B%20fill%3A%23eceeef%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A13pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_16acb6416e2%22%3E%3Crect%20width%3D%22200%22%20height%3D%22250%22%20fill%3D%22%2355595c%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2256.203125%22%20y%3D%22131%22%3EThumbnail%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true">
        </div>
      </div>
    @endforeach
  </div>
@endsection

@section('content')
  <div class="row">
    <div class="col-md-8 blog-main">
     

      <nav class="blog-pagination">
        {{-- <a class="btn btn-outline-primary" href="#">Older</a>
        <a class="btn btn-outline-secondary disabled" href="#">Newer</a> --}}
      </nav>

    </div><!-- /.blog-main -->

    <aside class="col-md-4 blog-sidebar">
     
    </aside><!-- /.blog-sidebar -->

  </div><!-- /.row -->
@endsection
