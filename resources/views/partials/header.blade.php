<div class="search-bar">
  <div class="close-icon search-bar--close-icon">
    <div class="bar"></div>
    <div class="bar"></div>
  </div>
  <?php get_search_form(); ?>
</div>

<header class="site-header desktop-header">
  <div class="container">
    <nav class="nav-primary">
      <div>
        <a class="site-logo" href="{{ home_url('/') }}">{{ get_bloginfo('name', 'display') }}</a>
      </div>
      <div style="text-align: center;">
        {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'container_class' => 'primary-navigation']) !!}
      </div>
      <div style="text-align: right;">
        {!! wp_nav_menu(['theme_location' => 'secondary_navigation', 'container_class' => 'secondary-navigation']) !!}
        <a class="buy-my-book" target="_blank" href="https://www.amazon.com/Meaningful-Work-Quest-Business-Calling/dp/0143130315">Buy My Book</a>
        <img class="search-icon" src="@asset('images/search-icon.svg')">
      </div>
    </nav>
  </div>
</header>

<header class="site-header mobile-header">
  <div class="container">
    <div>
      <a class="site-logo" href="{{ home_url('/') }}">{{ get_bloginfo('name', 'display') }}</a>
    </div>
    <div>
      <img class="search-icon" src="@asset('images/search-icon.svg')">
      <div class="menu-icon">
        <span class="bar"></span>
        <span class="bar"></span>
        <span class="bar"></span>
      </div>
    </div>
  </div>
  <div class="mobile-menu">
    <div class="container">
      {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'container_class' => 'primary-navigation']) !!}
      {!! wp_nav_menu(['theme_location' => 'secondary_navigation', 'container_class' => 'secondary-navigation']) !!}
      <a class="buy-my-book" target="_blank" href="https://www.amazon.com/Meaningful-Work-Quest-Business-Calling/dp/0143130315">Buy My Book</a>
    </div>
  </div>
</header>
