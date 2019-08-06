{{--
  Template Name: What I'm Doing Now Template
--}}

<?php
  $loop = new WP_Query( array(
    'post_type'   => 'what_im_doing_now',
    'posts'
  ))
?>

@extends('layouts.app')

@section('content')
  <div class="post-hero no-image">
    <h1>{{  the_title() }}</h1>
  </div>
  <div class="post-list full">
    @while($loop->have_posts()) @php $loop->the_post() @endphp
      @include('partials.content-'.get_post_type())
    @endwhile
    {{ wp_reset_query() }}
  </div>
@endsection
