@component('mail::layout')
    @slot('header')
        @component('mail::header')

        @endcomponent
    @endslot


    @component('mail::table_array', ['data' => $arrayData])
    @endcomponent

    @slot('footer')
        @component('mail::footer')

        @endcomponent
    @endslot
@endcomponent
