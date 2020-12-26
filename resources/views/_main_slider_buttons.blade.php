<div class="relative container z-20">
    <div class="main-slider-arrow main-slider-prev-button left-40 mobile-550:left-20 mobile-400:left-10">
        @include('_arrow', [
            'classes' => 'transform rotate-180'
        ])
    </div>
    <div class="main-slider-arrow main-slider-next-button right-40 mobile-550:right-20 mobile-400:right-10">
        @include('_arrow', ['classes' => ''])
    </div>
</div>
