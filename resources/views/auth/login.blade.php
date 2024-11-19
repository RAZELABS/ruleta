@extends('admin.layouts.login')

@section('content')
    <div class="container d-flex flex-column">
        <div class="row">
            <div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-auto d-table h-100">
                <div class="d-table-cell align-middle">
                    <div class="text-center">
                        <img src="{{ asset('img/zyc_white.png') }}" alt="" srcset="" class="p-4" width="250">
                    </div>

                    <div class="card rounded-5">
                        <div class="card-body">
                            <div class="m-sm-3">
                                <!-- Session Status -->
                                <x-auth-session-status class="mb-4" :status="session('status')" />
                                <x-form action="{{ route('login') }}" method="POST" class="needs-validation" novalidate>
                                    <div class="mb-3">
                                        <x-inputs.text-input label="{{ __('Email') }}" name="email"
                                            placeholder="{{ __('Introduce tu email') }}" required autofocus
                                            autocomplete="username" />
                                    </div>
                                    <div class="mb-3">
                                        <x-inputs.password-input label="Contraseña" name="password"
                                            placeholder="{{ __('Introduce tu contraseña') }}" required />
                                    </div>
                                    {{-- <div>
                                        <div class="form-check align-items-center">
                                            <input id="customControlInline" type="checkbox" class="form-check-input"
                                                value="remember-me" name="remember-me" checked>
                                            <label class="form-check-label text-small" for="customControlInline">
                                                Remember me
                                            </label>
                                        </div>
                                    </div> --}}
                                    <div class="d-grid gap-2 mt-3">
                                        @if (Route::has('password.request'))
                                            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                                href="{{ route('password.request') }}">
                                                {{ __('Olvisaste tu contraseña?') }}
                                            </a>
                                        @endif
                                        <button type="submit" class="btn btn-primary">Enviar</button>
                                    </div>
                                </x-form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
