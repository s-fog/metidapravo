<div class="flex items-end flex-wrap relative mx-20 mb-38
         mobile-550:mx-0"
     style="flex: 0 1 370px;height: 552px;">
    <picture class="absolute z-10 top-0 w-full h-full">
        <source srcset="/img/{{ $image }}.webp" type="image/webp">
        <img src="/img/{{ $image }}.{{ $imageType }}" alt="bg" class="inline-block
         mobile-450:w-full mobile-450:h-full object-cover mobile-450:max-w-none">
    </picture>
    <div class="pb-45 px-30 relative z-20 text-center flex-full
        mobile-350:px-10">
        <div class="text-white text-28 font-oranien leading-1.2
        mobile-400:text-24
        mobile-350:text-22">{!! $header !!}</div>
        <div class="h-1 bg-grey-light mt-20 mb-10 w-full"></div>
        <div class="button py-13
         @if ($id === 5) px-35 @else px-85 @endif
        tracking-1"
             data-fancybox
             @if ($id !== 5) data-type="ajax" @endif
             data-src="<?=$id === 5 ? '#callback' : '/get-service/'.$id?>">
            @if ($id === 5) Заказать консультацию @else Подробнее @endif
        </div>
    </div>
</div>
