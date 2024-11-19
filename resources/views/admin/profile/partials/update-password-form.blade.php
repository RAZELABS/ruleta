<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Actualizar contraseña') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('asegurese de usar una contraseña segura.') }}
        </p>
    </header>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <x-form action="{{ route('password.update') }}" method="PUT" id="formUpdatePassword">
        <x-inputs.password-input label="Antigua Contraseña" name="current_password"
            placeholder="{{ __('Introduce tu contraseña Anterior') }}" required />
        <x-inputs.password-input label="Nueva Contraseña" name="password"
            placeholder="{{ __('Introduce tu nueva contraseña') }}" required />
        <x-inputs.password-input label="Confirme su Contraseña" name="password_confirmation"
            placeholder="{{ __('Introduce tu nueva contraseña otra vez') }}" required />

        <div class="flex items-center gap-4">
            <button type="submit" class="btn btn-primary">Enviar</button>
            @if (session('status') === 'password-updated')
                <x-alerts.swal-notification icon="success" title="Contraseña Actualizada"
                    text="Tu contraseña se ha actualizado correctamente." timer="2000" />
            @endif
            @if ($errors->any())
                <x-alerts.swal-notification icon="error" title="Errores al actualizar" text="{!! implode('</br>', $errors->all()) !!}"
                    timer="4000" />
            @endif
        </div>
    </x-form>

</section>
@push('scripts')
    <script>
        initializeValidation("#formUpdatePassword")
    </script>
@endpush
