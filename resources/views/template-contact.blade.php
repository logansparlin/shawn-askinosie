{{--
  Template Name: Contact Template
--}}

@extends('layouts.app')

@section('content')
  <div class="contact-page-content">
    @while(have_posts()) @php the_post() @endphp
      @include('partials.content-page')
    @endwhile
  </div>
@endsection
