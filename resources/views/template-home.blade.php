{{--
  Template Name: Home Page
--}}

@extends('layouts.app')

@include('partials.subscribe-popup')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    @include('partials.content-page')
  @endwhile
@endsection
