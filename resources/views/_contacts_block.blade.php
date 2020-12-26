@php
    $classesC = $classesC ?? '';
@endphp
<div class="pt-24 pb-22 text-center px-40 w-550px {{ $classesC }}">
    <div class="absolute left-0 -top-15 h-16 bg-transparent w-full"></div>
    <picture class="absolute inset-0 m-auto z-10">
        <source srcset="/img/hbg.webp" type="image/webp">
        <img src="/img/hbg.png" alt="hover-bg" class="object-fill w-full h-full">
    </picture>
    <div class="relative z-20">
        @include('_contacts_info')
    </div>
</div>
