<div class="post-container">
  <header>
    <div class="date">
      <time class="date" datetime="{{ get_post_time('c', true) }}">{{ get_the_date() }}</time>
    </div>
    <h2>{{ the_title() }}</h2>
  </header>
  <p>{{ the_excerpt() }}</p>
  <a href="{{ get_permalink() }}">Read More ↳</a>
</div>
