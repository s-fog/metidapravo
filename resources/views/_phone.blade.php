@php
    $classes = $classes ?? '';
@endphp
<a href="tel:{{ $phoneClear }}" class="block text-{{ $color }} font-nimbus text-26 tracking-1 {{ $classes }}">{{ $phone }}</a>
