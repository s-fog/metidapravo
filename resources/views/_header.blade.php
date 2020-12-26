@php
$classes = $classes ?? null;
@endphp
<div class="text-48 text-center mb-20 font-oranien tracking-1 <?=$classes === null ? ' mt-21' : $classes?>">
    <span class="block mb-8">{{ $header }}</span>
    <div style="background-image: url(../img/h-line.png); height:31px"
         class="bg-no-repeat bg-center mt-19"></div>
</div>
