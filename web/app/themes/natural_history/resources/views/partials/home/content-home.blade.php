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
            <h2>Eco living</h2>
            @include('components.social-media-block')
            <section>
                <article>
                    <div class="content-showcase">
                        <p>King Ashurbanipal of Assyria (r. 669–c. 631 BC) was the most powerful man on earth.
                            He described himself in inscriptions as ‘king of the world’, and his reign from the
                            city of Nineveh (now in northern Iraq) marked the high point of the Assyrian empire,
                            which stretched from the shores of the eastern Mediterranean to the mountains of
                            western Iran.</p>
                        <p>Ashurbanipal proved himself worthy of protecting his people through displays of strength,
                            such as hunting lions. Like many rulers of the ancient world, he liked to boast about his
                            victories in battle and brutally crushed his enemies. However, this vast and diverse empire
                            was controlled through more than just brute force. Ashurbanipal used his skills as a scholar,
                            diplomat and strategist to become one of Assyria’s greatest rulers.</p>
                        <button id="j-show-more-button">
                            Show More
                        </button>
                        <div class="show-more j-show-more">
                            <p>Despite his long and successful reign, Ashurbanipal’s death is shrouded in mystery. Shortly
                                afterwards, the Assyrian empire fell and the great city of Nineveh was destroyed in 612 BC,
                                its ruins lost to history until the 1840s. Their rediscovery has allowed us to piece together
                                a portrait of the powerful and complex ruler that was Ashurbanipal.</p>
                            <p>This major exhibition tells the story of Ashurbanipal through the British Museum’s unparalleled
                                collection of Assyrian treasures and rare loans. Step into Ashurbanipal’s world through displays
                                that evoke the splendour of his palace, with its spectacular sculptures, sumptuous furnishings
                                and exotic gardens. Marvel at the workings of Ashurbanipal’s great library, the first in the
                                world to be created with the ambition of housing all knowledge under one roof. Come face to
                                face with one of history’s greatest forgotten kings.</p>
                        </div>
                    </div>
                </article>
            </section>
        </div>
    </section>
    <main role="main">

    </main>
</section>