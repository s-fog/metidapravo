<div class="mx-auto h-full relative mobile-550:h-auto">
    <picture class="absolute inset-o w-full h-full z-10 mobile-550:h-564px mobile-550:static mobile-550:w-auto
        ">
        <source srcset="{{ $bgMobile }}.webp, {{ $bgMobile }}@2x.webp 2x" type="image/webp" media="(max-width: 550px)">
        <source srcset="{{ $bgMobile }}.{{ $imageType }}, {{ $bgMobile }}@2x.{{ $imageType }} 2x" media="(max-width: 550px)">
        <source srcset="{{ $bg }}.webp" type="image/webp">
        <img src="{{ $bg }}.{{ $imageType }}" class="m-auto w-full h-full object-center object-cover mobile-550:w-auto mobile-550:w-auto mobile-550:h-auto">
    </picture>
    <div class="relative z-20 pt-355 text-center mobile-550:pt-20 mobile-550:pb-40">
        <div class="font-oranien text-white text-48 tracking-1.2 mobile-550:text-44 mobile-500:text-42
         mobile-450:text-40 mobile-400:text-36 mobile-350:text-32">{{ $header }}</div>
        <div class="mx-auto text-justify text-white text-16 mt-27 leading-1.7
        tablet:px-10" style="max-width: 545px">{{ $text }}</div>
        <div class="button button-larger" data-fancybox data-src="#callback">Заказать консультацию</div>
    </div>
</div>
