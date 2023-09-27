@extends('layouts.main')
@section('title.page'){{__('Подтвердите Email')}}@endsection
@section('content.page')
    <x-title>
        {{__('Подтвердите Email')}}
    </x-title>
    <p>Необходимо подтвердить ваш  Email</p>
    <a href="{{ route('verification.send') }}">
        Отправить повторно !
    </a>
@endsection
