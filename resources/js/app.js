window.$ = window.jQuery = require('jquery');
require('@fancyapps/fancybox');
import { tns } from "../../node_modules/tiny-slider/src/tiny-slider"
import Inputmask from "inputmask";
import ymaps from 'ymaps';

$('[data-fancybox]').fancybox({
    mobile: {
        clickSlide: 'close'
    }
});

const slider = tns({
    container: '.main-slider',
    items: 1,
    preventActionWhenRunning: true,
    preventScrollOnTouch: true,
    mouseDrag: true,
    prevButton: '.main-slider-prev-button',
    nextButton: '.main-slider-next-button'
});

setDisplayType();

function setDisplayType() {
    console.log(document.querySelector('meta[name="csrf-token"]'))
    var xhr = new XMLHttpRequest(),
        width;
    xhr.open('POST', '/set-type', true);
    xhr.setRequestHeader("Content-type", "application/json");
    xhr.setRequestHeader("X-CSRF-TOKEN", document.querySelector('meta[name="csrf-token"]').content);

    if (typeof jQuery === undefined || typeof jQuery === 'undefined') {
        width = window.innerWidth;
    } else {
        width = $(window).width();
    }

    xhr.send(JSON.stringify({
        width: width,
    }));

    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                var response = JSON.parse(xhr.responseText);

                if (response.reload === true) {
                    location.reload();
                }
            }
        }
    }
}

let prevWindowWidth = window.innerWidth;
$(window).on('resize', () => {
    const currentWindowWidth = $(window).width(),
        step = 550;

    if (prevWindowWidth >= step && currentWindowWidth < step) {
        setDisplayType();
    } else if (prevWindowWidth < step && currentWindowWidth >= step) {
        setDisplayType();
    }

    prevWindowWidth = currentWindowWidth;
});

window.addEventListener('orientationchange', () => {
    setDisplayType();
});

const mobileMenu = $('.js-mobile-menu'),
    mobileMenuOpen = $('.js-mobile-menu-open');

mobileMenuOpen.on('click', () => {
    if (mobileMenu.hasClass('active')) {
        mobileMenu.removeClass('active');
        mobileMenuOpen.removeClass('active');
    } else {
        mobileMenu.addClass('active');
        mobileMenuOpen.addClass('active');
    }
})

$('html').on('click', (event) => {
    if ($(event.target).parents('.js-mobile-menu-open').get(0) === undefined
        && !$(event.target).hasClass('js-mobile-menu-open')
        && $(event.target).parents('.js-mobile-menu').get(0) === undefined
        && !$(event.target).hasClass('js-mobile-menu')
    ) {
        mobileMenu.removeClass('active');
        mobileMenuOpen.removeClass('active');
    }
})


$('[name="phone"]').toArray().forEach(function(field) {
    const im = new Inputmask("+7 999 999-99-99");
    im.mask(field);
})

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

$(document).on('submit', '.js-send-form', (event) => {
    const thisForm = $(event.currentTarget),
        _token = $('meta[name="csrf-token"]').attr('content'),
        data = thisForm.serialize()+'&_token='+_token,
        button = $('[type="submit"]', thisForm);

    if (button.hasClass('loading')) {
        return false;
    }

    button.addClass('loading');

    $.ajax({
        type: "POST",
        url: '/send',
        data: data,
        success: (response) => {
            clearErrors();
            hideLoading(button);
            $.fancybox.close();
            $.fancybox.open($('#success'));
        },
        error: (error) => {
            clearErrors();
            hideLoading(button);

            if (error.status === 422) {
                const errors = error.responseJSON.errors;

                Object.keys(errors).map((objectKey, index) => {
                    const value = errors[objectKey];
                    const input = $(`[name="${objectKey}"]`, thisForm);
                    const parent = $(input).parent();

                    parent.addClass('error');
                    $(`.js-input-error`, parent).html(value.toString());
                });
            } else {
                alert('Что-то пошло не так');
            }
        }
    });

    return false;
});

function hideLoading(button) {
    button.removeClass('loading');
}

function clearErrors() {
    $(`.js-input`).each((index, element) => {
        const parent = $(element).parent();

        parent.removeClass('error');
        $(`.js-input-error`, parent).html('');
    });
}

window.onload = () => {
    setTimeout(() => {
        ymaps
            .load('https://api-maps.yandex.ru/2.1/?lang=ru_RU')
            .then(maps => {
                const center = [55.544489, 37.722648],
                    map = new maps.Map(document.getElementById('map'), {
                        center: center,
                        zoom: 15
                    }),
                    myPlacemark = new maps.Placemark(center, {

                    }, {
                        iconLayout: 'default#image',
                        iconImageHref: '/svg/map_m.svg',
                        iconImageSize: [76, 74],
                        iconImageOffset: [-38, -37]
                    });

                map.behaviors.disable('scrollZoom')

                map.geoObjects.add(myPlacemark);
            })
            .catch(error => console.log('Failed to load Yandex Maps', error));
    }, 200)
}
