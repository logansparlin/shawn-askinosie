@php
    $thumb_id =           get_post_thumbnail_id();
    $thumb_url_array =    wp_get_attachment_image_src($thumb_id, 'full', true);
    $thumb_url =          $thumb_url_array[0];
    $has_image =          has_post_thumbnail();
    $class =              $has_image ? 'image' : 'no-image'
@endphp

<div class="single-post-container">
  <header class="post-hero {{ $class }}">
    {{-- @if ($has_image)
      <div class="image-container" style="background-image: url('{{ $thumb_url }}')">
        <img src="{{ $thumb_url }}" />
      </div>
    @endif --}}
    <div class="date">
      <time class="updated" datetime="{{ get_post_time('c', true) }}">{{ get_the_date() }}</time>
    </div>
    <h1 class="post-title">{{ the_title() }}</h1>
  </header>
  <div class="post-content">
    @php the_content() @endphp
  </div>
  {{-- @php comments_template('/partials/comments.blade.php') @endphp --}}
</div>
