@extends('layouts.app')

@section('content')
  <div class="container">
    @if (!have_posts())
      <div class="alert alert-warning">
        {{ __('Sorry, no results were found.', 'sage') }}
      </div>
      {!! get_search_form(false) !!}
    @endif
  </div>

  @if (have_posts()) 
    <header class="post-hero">
      <h1 class="post-title">Search Results</h1>
    </header>
  @endif

  <div class="post-list full">
    @while(have_posts()) @php the_post() @endphp
      @include('partials.content-search')
    @endwhile

    {!! get_the_posts_navigation() !!}
  </div>
@endsection
