<section>
    <section>
        <div class="home-jumbo" role="presentation">
            <a href="{{ get_permalink($get_home_jumbo_post[0]->ID) }}">
                {{--<img src="https://s3-eu-west-1.amazonaws.com/us-website-content/Images/c3cbf8a47b/us-website-content/Images/Residential/lakeshore/external/16-9/lakeshore_015_16_9_3840x2160_af6b9dd550aec5963380aa5ba7dbe70c.jpg" alt="">--}}
                {{--<img src="../../../assets/images/home/10_26_2018_home_jumbo_v1.jpg" alt="I am Ashurbanipal, king of the world, king of Assyria">--}}

                <div class="home-jumbo-image" style="background-image: url({!! $get_home_jumbo_featured_thumb[0] !!})">
                    <div class="home-jumbo-excerpt">
                        <h3>{{ $get_home_jumbo_post[0]->post_excerpt }}</h3>
                    </div>
                </div>
            </a>
            <div class="home-jumbo-control">
                <span class="fas fa-arrow-down"></span>
            </div>
        </div>
    </section>
    <section>
        {{--{{ var_dump($get_home_jumbo_featured_thumb) }}--}}
        <div class="home-showcase">
            <h2>Eco living</h2>
            @include('components.social-media-block')
            <section>
                <article>
                    <div class="content-showcase">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae cum deleniti dignissimos,
                            doloremque exercitationem iste mollitia neque obcaecati perspiciatis repellendus? Aliquam
                            consectetur cupiditate dolore in ipsum pariatur quas rerum sunt.</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae cum deleniti dignissimos,
                            doloremque exercitationem iste mollitia neque obcaecati perspiciatis repellendus? Aliquam
                            consectetur cupiditate dolore in ipsum pariatur quas rerum sunt.</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae cum deleniti dignissimos,
                            doloremque exercitationem iste mollitia neque obcaecati perspiciatis repellendus? Aliquam
                            consectetur cupiditate dolore in ipsum pariatur quas rerum sunt.</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae cum deleniti dignissimos,
                            doloremque exercitationem iste mollitia neque obcaecati perspiciatis repellendus? Aliquam
                            consectetur cupiditate dolore in ipsum pariatur quas rerum sunt.</p>
                    </div>
                </article>
            </section>
        </div>
    </section>
    <main role="main">

    </main>
</section>