<header class="">
  <div class="primary-menu">
    <a class="" href="{{ home_url('/') }}">{{ get_bloginfo('name', 'display') }}</a>
    <nav class="">
      @if (has_nav_menu('primary_navigation'))
        {!! wp_nav_menu([
          'theme_location' => 'primary_navigation',
          'menu_class' => 'nav'
        ]) !!}
      @endif
    </nav>
  </div>
</header>
