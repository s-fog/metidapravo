@include('_phone', [
    'phone' => $phones[0]['phone'],
    'phoneClear' => $phones[0]['phoneClear'],
    'color' => 'primary',
    'classes' => 'mb-6'
])
@include('_phone', [
    'phone' => $phones[1]['phone'],
    'phoneClear' => $phones[1]['phoneClear'],
    'color' => 'primary',
])
<div class="text-md mt-20">МО, Ленинский район г. Видное, <br> ул. Ольховая д.4, помещение 16, лит. A1, комната 23</div>
<div class="h-1 bg-hr mt-11 mb-17"></div>
<a href="mailto:info@metipravo.ru" class="block mb-2">info@metipravo.ru</a>
<a href="/cart_org_metida.pdf" target="_blank" class="link block">Карточка организации | pdf</a>
<div class="button mobile-350:px-35" data-fancybox data-src="#callback">Заказать консультацию</div>
