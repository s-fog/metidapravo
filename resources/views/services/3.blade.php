<div{!! config('app.service-popup-div') !!}>
    @include('_logo_popup')
    @include('_popup_header', ['header' => 'Услуги <br> юридическим лицам'])
    @include('services/_line')
    @include('services/_button')
    <ul class="text-white text-left mt-20">
        <li class="my-15">&mdash; Ведение организаций (абонентское обслуживание);</li>
        <li class="my-15">&mdash; Внесение изменений в ЕГРЮЛ;</li>
        <li class="my-15">&mdash; Правовая экспертиза договоров/документов;</li>
        <li class="my-15">&mdash; Проведение переговоров/представление интересов.</li>
    </ul>
</div>
