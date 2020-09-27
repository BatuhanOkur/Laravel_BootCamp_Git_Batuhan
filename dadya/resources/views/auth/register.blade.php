@extends('layouts.app')

@section('content')
<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <i class="nav-icon fas fa-book fa-5x"></i>
        </x-slot>
        <div class="card-header text-center bg-dark font-weight-bold text-uppercase" style="color: white;">Kayıt ol</div>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mt-4">
                <x-jet-label class="font-weight-bold" value="{{ __('İsim') }}" />
                <x-jet-input class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label class="font-weight-bold" value="{{ __('Email') }}" />
                <x-jet-input class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-jet-label class="font-weight-bold" value="{{ __('Şifre') }}" />
                <x-jet-input class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label class="font-weight-bold" value="{{ __('Şifreni Onayla') }}" />
                <x-jet-input class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="font-weight-bold underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Zaten hesabın var mı?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Kayıt ol') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
@endsection
