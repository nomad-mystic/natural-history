<section>
    <h4>Social media block</h4>
    @php
        $socialMetadata = App\Controllers\SocialMediaBlock::all_social_metadata();
    @endphp
    <div class="social-media-links-container">
        @for ($i = 0; $i < count($socialMetadata); $i++)
            <span class="fa fa-facebook"></span>
            <p>{{ ucwords($socialMetadata[$i][0]) }}</p>
            <p>{{ $socialMetadata[$i][1] }}</p>
        @endfor
    </div>
</section>
{{--@debug('controller')--}}
