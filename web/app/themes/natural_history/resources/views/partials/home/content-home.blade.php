<section>
    <section>
        <div class="home-jumbo" role="presentation">
            <a href="{{ get_permalink($get_home_jumbo_post[0]->ID) }}">
                <div class="home-jumbo-image" style="background-image: url({!! $get_home_jumbo_featured_thumb[0] !!})">
                    <div class="cover"></div>
                    <div class="home-jumbo-excerpt">
                        <h3>{{ $get_home_jumbo_post[0]->post_excerpt }}</h3>
                    </div>
                </div>
            </a>
            <div class="home-jumbo-control">
                <span class="fa fa-arrow-down"></span>
            </div>
        </div>
    </section>
    <section>
        <div class="home-showcase">
            <h2>{!! $get_home_showcase_tag['home-paragraph-tag'][0] !!}</h2>
            @include('components.social-media-block')
            <section>
                <article>
                    @php
                        var_dump($get_truncate_home_jumbo_post);
                    @endphp
                    <div class="content-showcase">
                        @for ($p = 0; $p < 3; $p++)
                            {!! $get_truncate_home_jumbo_post[$p] !!}
                        @endfor
                        <button id="j-show-more-button">
                            Show More
                        </button>
                        <div class="show-more j-show-more">
                        @for ($p = 3; $p < count($get_truncate_home_jumbo_post); $p++)
                            {!! $get_truncate_home_jumbo_post[$p] !!}
                        @endfor
                        </div>
                    </div>
                </article>
            </section>
        </div>
    </section>
</section>
