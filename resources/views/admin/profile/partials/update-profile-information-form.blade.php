<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Información personal') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Actualiza tu nombre o dirección de email.') }}
        </p>
    </header>
    <x-form action="{{ route('verification.send') }}" method="POST" id="send-verification">
    </x-form>
    <x-form action="{{ route('admin.profile.update') }}" method="PATCH" id="formUpdateProfile">
        <div>
            <x-inputs.text-input label="{{ __('Nombre') }}" name="name" placeholder="{{ __('Introduce tu Nombre') }}"
                required autofocus autocomplete="username" value="{{ old('name', $user->name) }}" />
        </div>

        <div>
            <x-inputs.text-input label="{{ __('Email') }}" name="email" placeholder="{{ __('Introduce tu email') }}"
                required autofocus autocomplete="username" value="{{ old('email', $user->email) }}" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification"
                            class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <button type="submit" class="btn btn-primary">Enviar</button>
            @if (session('status') === 'profile-updated')
                <x-alerts.swal-notification icon="success" title="Exito"
                    text="Tus datos se han actualizado correctamente." timer="3000" />
            @endif
        </div>
    </x-form>


</section>
@push('scripts')
    <script>
        initializeValidation("#formUpdateProfile", {
            name: {
                minlength: 5 // Sobreescribe la regla de longitud mínima para 'name'
            },
            password: {
                minlength: 12 // Sobreescribe la regla para contraseñas
            }
        }, {
            name: {
                minlength: "El nombre debe tener al menos 5 caracteres."
            },
            password: {
                minlength: "La contraseña debe tener al menos 12 caracteres."
            }
        })
    </script>
@endpush
