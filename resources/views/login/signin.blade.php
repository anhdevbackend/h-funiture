@extends('layout')

@section('content')
<div id="#content" class="site-content">
    <div class="container">
        <!--page title-->
        <div class="page_title_area row">
            <div class="col-md-12">
                <div class="bredcrumb">
                    <ul>
                        <li><a href="{{route('home')}}">Trang chủ</a>
                        </li>
                        <li class="active"><a href="#">Đăng nhập</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--/.page title-->

        <!--Login-Page-->
        <div class="login-page">
            <div class="row">
                <div class="col">
                    <div class="login">
                        <h3 class="small-title">Đăng nhập vào tài khoản của bạn</h3>
                        <form action="{{ route('login') }}" method="POST" class="login-form" >
                            <div class="col-md-6 col-sm-6 no-padding-left">
                                <div class="email">
                                    <label for="your-email">Địa chỉ mail <span class="required">*</span>
                                    </label>
                                    <br>
                                    <input type="email" name="email" value="" class="input-field" id="your-email">
                                </div>
                            </div>
                            @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                            <div class="col-md-6 col-sm-6 no-padding-right">
                                <div class="password">
                                    <label for="password">Mật khẩu <span class="required">*</span>
                                    </label>
                                    <br>
                                    <input type="password" name="password" value="" class="input-field" id="password">
                                    <br>
                                </div>
                            </div>

                            <div class="col-md-6 no-padding-left">
                                <label for="remember" class="label-remember">
                                    <input type="checkbox" name="remember-pass" value="" class="input-field" id="remember"><span>Nhớ mật khẩu!</span>
                                </label>
                                @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="forgot-pass">Quên mật khẩu?</a>
                            </div>
                            @endif
                        </form>
                        <!--login-form-->
                        <div class="login-method col-md-12 no-padding-left no-padding-right">
                            <button type="submit" class="btn-hover btn-submit">Đăng nhập</button>
                            <a class="method-facebook" href="#"><i class="fa fa-facebook"></i>Đăng nhập bằng facebool</a>
                            <a class="method-twitter" href="#"><i class="fa fa-twitter"></i>Đăng nhập bằng Twitter</a>
                        </div>
                        <!--login-method-->
                    </div>
                    <!--losin-->
                </div>
                <!--col-md-6-->

                
            </div>
            <!--row-->
        </div>
        <!--/.login-page-->

    </div>
    <!--/.container-->
</div>
@endsection

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        {{-- <x-auth-validation-errors class="mb-4" :errors="$errors" /> --}}

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />

                <x-text-input id="email" class="block mt-1 w-full" type="text" name="email" :value="old('email')"  autofocus />
            </div>
            @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Mật khẩu')" />

                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                 autocomplete="current-password" />
            </div>
            @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Nhớ mật khẩu?') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Quên mật khẩu?') }}
                    </a>
                    &ensp;
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('register') }}">
                        {{ __('Đăng ký') }}
                    </a>
                @endif

                <x-primary-button class="ml-3">
                    {{ __('Đăng nhập') }}
                </x-primary-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>

