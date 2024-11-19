@extends('admin.layouts.app')

@section('content')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="container">
        <div class="row">
            <div class="p-4 col-6 bg-white">
                <div class="p-4">
                    @include('admin/profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 col-6 bg-white">
                <div class="p-4">
                    @include('admin/profile.partials.update-password-form')
                </div>
            </div>

            {{-- <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('admin/profile.partials.delete-user-form')
                </div>
            </div> --}}
        </div>
    </div>
@endsection
