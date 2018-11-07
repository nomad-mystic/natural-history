<section>
    @php
        $socialMetadata = App\Controllers\SocialMediaBlock::all_social_metadata();
    @endphp
    <div class="social-media-links-container">
        <span class="fa fa-share-alt-square share-icon"></span>
        @for ($i = 0; $i < count($socialMetadata); $i++)
            @php($name = $socialMetadata[$i][0])
            @if ($socialMetadata[$i][0] === 'facebook')
                @php($name = $name . '-f')
            @endif
            <a href="{{ $socialMetadata[$i][1] }}" target="_blank">
                <span class="fab fa-{{ $name }}" aria-hidden="true"></span>
            </a>
        @endfor
    </div>
</section>
{{--@debug('controller')--}}
