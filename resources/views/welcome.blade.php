@php
    $phones = config('app.phones');
    $isMobile = isMobile();
@endphp
    <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ mix('css/fancybox.css') }}" rel="stylesheet">
    <link href="{{ mix('css/tiny-slider.css') }}" rel="stylesheet">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <title>Laravel</title>
</head>
<body class="">
@if(!$isMobile)
    <div class="flex
        justify-between
        absolute
        z-30
        inset-x-0 container">
        <div class="flex text-white pt-81 pl-21 relative z-20">
            @include('_top_menu_link', ['name' => 'О компании', 'href' => '#about'])
            @include('_top_menu_link', ['name' => 'Услуги', 'href' => '#services'])
            @include('_top_menu_link', ['name' => 'Контакты', 'href' => '#contacts'])
        </div>
        <div>
            @include('_logo_header')
        </div>
        <div class="flex group mr-1 pr-20 pt-57 relative z-20">
            <div class="pr-23 text-right">
                @include('_phone', [
                    'phone' => $phones[0]['phone'],
                    'phoneClear' => $phones[0]['phoneClear'],
                    'color' => 'white',
                ])
                <div class="text-white text-md underline mt-10">{!! config('app.address') !!}</div>
            </div>
            <div class="relative mt-17 rounded-full bg-grey transition group-hover:bg-grey-hover"
                 style="width: 47px;height: 47px;">
                <div class="absolute transform inset-0 triangle-b w-0 h-0 m-auto transition
                    group-hover:rotate-180"></div>
            </div>
            @include('_contacts_block', ['classesC' => 'absolute top-full right-0 transform translate-y-12
            transition opacity-0 invisible group-hover:opacity-100 group-hover:visible'])
        </div>
    </div>
@endif
@if($isMobile)
    <div class="h-70 bg-primary flex justify-between items-center px-20 box-border mobile-400:px-10">
        <div class="mobile-header-trigger js-mobile-menu-open">
            <div class="mobile-header-trigger-inner">
                <span></span><span></span><span></span><span></span>
            </div>
            <div class="mobile-header-trigger-text text-24 font-oranien text-white ml-10">Меню</div>
        </div>
        <div class="button flex-shrink px-25 py-12 m-0 mobile-500:px-15 mobile-450:hidden" data-fancybox data-src="#callback">Заказать звонок</div>
        <a href="tel:{{ $phones[0]['phoneClear'] }}" class="text-white font-nimbus text-18">{{ $phones[0]['phone'] }}</a>
    </div>
    <div class="text-center absolute inset-x-0 top-80 z-50 m-auto bg-white w-95% px-35 box-border pt-10 pb-40 invisible
    opacity-0 transition
    js-mobile-menu
    mobile-menu
    mobile-400:px-15">
        @include('_mobile_menu_link', ['name' => 'О компании', 'href' => '#about'])
        @include('_mobile_menu_link', ['name' => 'Услуги', 'href' => '#services'])
        @include('_mobile_menu_link', ['name' => 'Контакты', 'href' => '#contacts'])
        <div class="h-1 bg-hr mt-11 mb-17"></div>
        @include('_contacts_info')
    </div>
    <div class="block absolute top-70 z-20 left-0 right-0 m-auto">
        @include('_logo_header')
    </div>
@endif
<div class="main-slider-wrapper relative">
    @if($isMobile)
        @include('_main_slider_buttons')
    @endif
    <div class="main-slider h-763px mobile-550:h-auto">
        @include('_main_slide', [
            'bg' => '/img/sl_01',
            'bgMobile' => '/img/sl_mob_01',
            'imageType' => 'jpg',
            'header' => 'Наследственные споры',
            'text' => 'Получение наследства длительный и сложный процесс, зачастую разрешаемый в судебном порядке, однако, можно окончить все мирным соглашением. Специалисты нашей компании помогут Вам грамотно разрешить указанные споры, а также вступить в наследственные права.',
        ])
        @include('_main_slide', [
            'bg' => '/img/sl_02',
            'bgMobile' => '/img/sl_mob_02',
            'imageType' => 'jpg',
            'header' => 'Трудовые споры',
            'text' => 'Неурегулированные разногласия с работодателем, а именно: невыплата заработной платы, нарушение трудового договора, принуждение подписания дополнительных соглашений, необоснованные требования работодателя, невыплата больничных и отпускных, Вы можете обратиться к специалисту нашей компании для получения бесплатной консультации.',
        ])
        @include('_main_slide', [
            'bg' => '/img/sl_03',
            'bgMobile' => '/img/sl_mob_03',
            'imageType' => 'jpg',
            'header' => 'Земельные споры',
            'text' => 'Если у Вас имеются разногласия о правах собственности на землю, по границам земельных участков, с соседями, либо совладельцами. Если вы не можете оформить свои права собственности или устранить их нарушение обращайтесь в нашу компанию с многолетним опытом разрешения земельных споров.',
        ])
    </div>
    @if(!$isMobile)
        @include('_main_slider_buttons')
    @endif
</div>

<div class="relative">
    <picture class="absolute z-10 top-160 text-center w-full">
        <source srcset="/img/bg.webp" type="image/webp">
        <img src="/img/bg.jpg" alt="bg" class="inline-block">
    </picture>
    <div class="relative z-20">
        @include('_header', ['header' => 'О компании'])
        <div class="text-justify box-border px-10 mx-auto mt-34 text-16 leading-1.7" style="max-width: 840px">
            Юридическая компания «Метида» — это команда юристов с большим опытом работы в части представления и защиты интересов граждан в спорах с государственными органами власти, а также в судебных процессах. Тщательно анализируя все тонкости гражданско-правовых норм мы можем гарантировать, что ваш вопрос будет изучен и проанализирован тщательнейшим образом, а наши правовые специалисты смогут грамотно и убедительно донести процессуальную позицию до ответственных представителей государственной и муниципальной власти и судьи, председательствующего в судебном заседании. В работе мы всегда придерживаемся принципов добросовестности, справедливости и честности, потому что дорожим доверием наших клиентов и ценим Вашу высокую оценку качества наших услуг.
        </div>
        <div class="grid grid-cols-3 text-center mx-auto mt-96 -mb-13 mobile-550:block
        mobile-550:mt-30 mobile-550:mb-0" style="max-width: 1230px">
            @include('_advantage', [
                'number' => '01',
                'header' => 'Бесплатная консультация'
            ])
            @include('_advantage', [
                'number' => '02',
                'header' => 'Гарантированная помощь <br> в правовых вопросах'
            ])
            @include('_advantage', [
                'number' => '03',
                'header' => 'Прозрачное ценообразование'
            ])
            @include('_advantage', [
                'number' => '04',
                'header' => 'Несем ответственность <br> за оказываемые услуги'
            ])
            @include('_advantage', [
                'number' => '05',
                'header' => 'Только профессиональные <br> практикующие юристы'
            ])
            @include('_advantage', [
                'number' => '06',
                'header' => 'Гарантированная защита <br> личной информации '
            ])
        </div>
        @include('_header', ['header' => 'Услуги'])
        <div class="flex justify-center flex-wrap container mt-28">
            @include('_service', [
                'id' => 1,
                'image' => 'service1',
                'imageType' => 'png',
                'header' => 'Представительство в судах <br>
                    общей юрисдикции',
            ])
            @include('_service', [
                'id' => 2,
                'image' => 'service2',
                'imageType' => 'png',
                'header' => 'Представительство <br>
                    в Арбитражных судах',
            ])
            @include('_service', [
                'id' => 3,
                'image' => 'service3',
                'imageType' => 'png',
                'header' => 'Услуги <br>
                    юридическим лицам',
            ])
            @include('_service', [
                'id' => 4,
                'image' => 'service4',
                'imageType' => 'png',
                'header' => 'Подготовка <br>
                    документов',
            ])
            @include('_service', [
                'id' => 5,
                'image' => 'service5',
                'imageType' => 'png',
                'header' => 'Закажите бесплатную <br>
                    консультацию',
            ])
        </div>
        @include('_header', ['header' => 'Контакты', 'classes' => 'mt-4'])
        <div class="text-center w-598px h-376px relative z-20 mx-auto -mt-4 pt-38 px-60 box-border -mb-222
        mobile-550:w-auto mobile-550:h-auto  mobile-550:bg-white mobile-550:mb-20 mobile-550:px-10">
            <picture class="absolute inset-0 m-auto z-10 mobile-550:hidden">
                <source srcset="/img/c_bg.webp" type="image/webp">
                <img src="/img/c_bg.png" alt="hover-bg" class="object-fill w-full h-full">
            </picture>
            <div class="relative z-20">
                @include('_contacts_info')
            </div>
        </div>
        <div id="map" class="h-575px relative z-10
        mobile-550:h-376px"></div>
    </div>
</div>

<div class="bg-grey-dark pt-25 pb-35">
    <div class="container flex justify-between
    mobile-550:block">
        <div class="text-white pt-72 pl-41 relative z-20
        mobile-550:pt-0 mobile-550:pl-0">
            <div class="flex
            mobile-550:justify-center mobile-550:flex-wrap">
                @include('_top_menu_link', ['name' => 'О компании', 'href' => '#about'])
                @include('_top_menu_link', ['name' => 'Услуги', 'href' => '#services'])
                @include('_top_menu_link', ['name' => 'Контакты', 'href' => '#contacts'])
            </div>
            <div class="text-white opacity-60 text-12 mt-21 leading-1.4
            mobile-550:text-center">© <?=date('Y')?> www.metidapravo.ru. Все права защищены. <br>
                <a href="/doc.pdf" target="_blank" class="link-span"><span>Согласие на обработку персональных данных</span></a>.</div>
        </div>
        <div class="transform -translate-x-89
        mobile-550:hidden">
            @include('_logo_footer')
        </div>
        <div class="flex group mr-1 pr-20 pt-72 relative z-20
        mobile-550:hidden">
            <div class="pr-23 text-right">
                @include('_phone', [
                    'phone' => $phones[0]['phone'],
                    'phoneClear' => $phones[0]['phoneClear'],
                    'color' => 'white',
                ])
                <div class="text-white text-md underline mt-12">{!! config('app.address') !!}</div>
            </div>
        </div>
    </div>
</div>

<form action="/send"
      method="post"
      class="hidden bg-transparent w-full p-0 js-send-form"
      style="max-width: 500px;"
      autocomplete="off"
      id="callback">
    <div class="block text-center">
        @include('_logo_popup')
        @include('_popup_header', ['header' => 'Заказать консультацию'])
        <div class="bg-white rounded-xl px-45 pt-5 w-full mobile-500:px-15">
            @include('_input', [
                'name' => 'name',
                'placeholder' => 'Имя',
            ])
            <div class="h-1 w-full bg-grey"></div>
            @include('_input', [
                'name' => 'phone',
                'placeholder' => 'Телефон',
            ])
        </div>
        <button type="submit" class="button button-bigger mt-25" style="outline: none;">Заказать консультацию</button>
        <div class="text-white mt-25 text-12">Заказывая обратный звонок, Вы принимаете <br>
            <a href="/doc.pdf" target="_blank" class="link-span">
                <span>условия обработки персональных данных</span>
            </a>.</div>
    </div>
    <input type="text" name="BC" value="">
    <input type="hidden" name="subject" value="Заказана консультация metida.ru">
</form>
<div class="block text-center hidden bg-transparent p-0" id="success">
    @include('_logo_popup')
    @include('_popup_header', ['header' => 'Заявка принята'])
    <div class="text-white leading-1.8 -mt-15 mobile-550:mt-0">Менеджеры компании свяжутся с вами <br>
        в самое ближайшее время.</div>
</div>
</div>
<script src="{{mix('js/app.js')}}"></script>
</body>
</html>
