@extends('layouts.app')

@section('header')

  {{-- <div class="jumbotron p-3 p-md-5 text-white rounded bg-dark">
    <div class="col-md-6 px-0">
      <h1 class="display-4 font-italic">Browse the best glossaries on the internet translated by our best users</h1>

      <p class="lead mb-0"><a href="#" class="text-white font-weight-bold">Browse all glossaries...</a></p>
    </div>
  </div> --}}


@endsection

@section('content')
  <div class="row">
    <div class="col-md-8 blog-main">
      <h3 class="pb-3 mb-4 font-italic border-bottom">
        Original lenguage <span style="color:{{$glossary->terms()->first()->lenguage->color}}">{{$glossary->terms->first()->lenguage->name}}</span>
      </h3>

      <div class="blog-post">
        <h2 class="blog-post-title">{{$glossary->title}}</h2>
        <p class="blog-post-meta">{{ \Carbon\Carbon::parse($glossary->created_at)->toFormattedDateString()}} by <a href="#">{{$glossary->user->name}}</a></p>

        <p>{{$glossary->description}}</p>
        <hr>
        <h2>Terms:</h2>
        @foreach ($glossary->terms as $term )
          {{-- {{dd($term)}} --}}
          <h3><a class="btn btn-lg btn-info" href="{!! route('show-translation',compact('term')) !!}" data-toggle="tooltip" data-placement="left" title="Show translations"  >{{$term->name}}</a></h3>
          <p>{{$term->definition}}</p>
        @endforeach

      </div><!-- /.blog-post -->

      <nav class="blog-pagination">
        {{-- <a class="btn btn-outline-primary" href="#">Older</a>
        <a class="btn btn-outline-secondary disabled" href="#">Newer</a> --}}
      </nav>

    </div><!-- /.blog-main -->

    <aside class="col-md-4 blog-sidebar">
      <div class="p-3 mb-3 bg-light rounded">
        <h4 class="font-italic">Author</h4>
        <p class="mb-0">{{$glossary->user->name}} <br><em> {{$glossary->user->email}}</em> <br>Member since {{$glossary->user->created_at->diffForHumans()}}</p>
      </div>

      <div class="p-3">
        <h4 class="font-italic">Other glossaries of {{$glossary->user->name}}</h4>
        <ol class="list-unstyled mb-0">
          @foreach ($glossary->user->glossaries as $userGlossary)
            <li><a href="{!! route('show-glossary',compact('userGlossary')) !!}">{{$userGlossary->title}}</a></li>
          @endforeach
        </ol>
      </div>

      <div class="p-3">
        <h4 class="font-italic">Follow us on:</h4>
        <ol class="list-unstyled">
          <li><a href="https://www.github.com/eclavelr">GitHub</a></li>
          <li><a href="https://www.linkedin.com/company/proz-com/">LinkedIn</a></li>
          <li><a href="https://twitter.com/prozcom">Twitter</a></li>
          <li><a href="https://www.facebook.com/prozdotcom">Facebook</a></li>
        </ol>
      </div>
    </aside><!-- /.blog-sidebar -->

  </div><!-- /.row -->

@endsection
