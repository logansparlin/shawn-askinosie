<footer class="site-footer">
  <div class="container flex">
    <div>
      <div class="footer-group">
        <h4>Subscribe To My Blog</h4>
        {!! do_shortcode('[jetpack_subscription_form title="" subscribe_text=""]') !!}
      </div>
      <div class="footer-group">
        <h4>Social</h4>
          <?php dynamic_sidebar('social-icons') ?>
      </div>
    </div>
    <div>
      <h4>Site Links</h4>
      {!! wp_nav_menu([
        'theme_location'  => 'site_links', 
        'container_class' => 'site-links footer-links'
      ]) !!}
    </div>
    <div>
      <h4>External Links</h4>
      {!! wp_nav_menu([
        'theme_location'  => 'external_links', 
        'container_class' => 'external-links footer-links'
      ]) !!}
    </div>
  </div>
  <div class="container">
    <p class="copyright">{{ date('Y') }} © Shawn Askinosie</p>
  </div>
</footer>
