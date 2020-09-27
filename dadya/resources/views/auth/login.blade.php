@extends('layouts.app')

@section('content')

<x-guest-layout>

    <x-jet-authentication-card>
        <x-slot name="logo">
            <i class="nav-icon fas fa-book fa-5x"></i>
        </x-slot>
        <div class="card-header text-center bg-dark font-weight-bold text-uppercase" style="color: white;">Giriş Yap</div>
        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif
        <div class="form-container" >
            <form method="POST" action="{{ route('login') }}">
                @csrf
                @if (session('message'))
                    <div class="alert alert-danger">{{ session('message') }}</div>
                @endif
                <div class="mt-4">
                    <x-jet-label class="font-weight-bold" value="{{ __('Email') }}" />
                    <x-jet-input class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                </div>

                <div class="mt-4">
                    <x-jet-label class="font-weight-bold"  value="{{ __('Şifre') }}" />
                    <x-jet-input class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                </div>

                <div class="block mt-4">
                    <label class="flex items-center">
                        <input type="checkbox" class="form-checkbox" name="remember">
                        <span class="ml-2 text-sm text-gray-600">{{ __('Beni Hatırla') }}</span>
                    </label>
                </div>

                <div class="flex items-center justify-end mt-4">
                    @if (Route::has('password.request'))
                        <a class="font-weight-bold underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                            {{ __('Şifreni mi unuttun?') }}
                        </a>
                    @endif

                    <x-jet-button  class="ml-4 hover:bg-white hover:color-dark">
                        {{ __('Giriş Yap') }}
                    </x-jet-button>
                </div>
            </form>
        </div>
    </x-jet-authentication-card>
</x-guest-layout>
@endsection
