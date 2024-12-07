
function initializeValidation(selector, customRules = {}, customMessages = {}) {

    var form = $(selector);
    var submitButton = form.find('button[type="submit"]');
    var participarButton = form.find('button[type="button"]');

    // Deshabilitamos el botón de submit inicialmente
    submitButton.prop('disabled', true);
    participarButton.prop('disabled', true);
    // Reglas predefinidas
    var defaultRules = {
        // Solo letras para el campo name (no se permiten números)
        name: {
            required: true,
            minlength: 3,
            maxlength: 100,
            pattern: /^[a-zA-Z\s]+$/ //
        },
        tipo_documento: {
            required: true,
        },
        // Solo letras para el campo name (no se permiten números)
        terminos: {
            required: true,
        },
        // Solo digitos para el campo name (no se permiten letras nio espacios)
        nro_documento: {
           digits: true,
            required: true,
           documentoLength: true,
        },
        // Campo de email que acepta letras, números, y los caracteres @._-
        email: {
            required: true,
            email: true,
            pattern: /^[a-zA-Z0-9@._\-\s]+$/ // Letras, números, @._-
        },
        // Contraseñas con caracteres permitidos y sin espacios en blanco
        current_password: {
            required: true,
            minlength: 8,
            // hasUppercase: true,        // Al menos una mayúscula
            // hasLowercase: true,        // Al menos una minúscula
            // hasNumber: true,           // Al menos un número
            // hasSpecialChar: true,      // Al menos un carácter especial (@._-$#)
            // noRepeatNumbers: true,     // No más de 2 números repetidos
            // noSequentialNumbers: true,  // No más de 4 números en secuencia
            // validPassword: true           // Solo caracteres permitidos
        },
        password: {
            required: true,
            minlength: 8,
            hasUppercase: true,        // Al menos una mayúscula
            hasLowercase: true,        // Al menos una minúscula
            hasNumber: true,           // Al menos un número
            hasSpecialChar: true,      // Al menos un carácter especial (@._-$#)
            noRepeatNumbers: true,     // No más de 2 números repetidos
            noSequentialNumbers: true,  // No más de 4 números en secuencia
            validPassword: true           // Solo caracteres permitidos
        },
        // Confirmación de la contraseña debe coincidir
        password_confirmation: {
            required: true,
            equalTo: "[name='password']"
        },
        // Solo números enteros en el campo number
        number: {
            required: true,
            number: true,
            min: 1,
            max: 100
        },


        // Teléfono con formato ddd ddd ddd
        tel: {
            required: true,
            pattern: /^\d{3}\s\d{3}\s\d{3}$/ // Formato ddd ddd ddd
        },
        // Campo de URL que acepta solo URLs válidas
        url: {
            required: true,
            url: true
        },
        // Campo checkbox requerido
        checkbox: {
            required: true
        },
        // Radio button requerido
        radio: {
            required: true
        },
        // Select requerido
        select: {
            required: true
        }
    };

    // Mensajes predefinidos
    var defaultMessages = {
        name: {
            required: "Este campo es obligatorio.",
            minlength: "Debe tener al menos 3 caracteres.",
            maxlength: "Debe tener menos de 100 caracteres.",
            pattern: "Solo se permiten letras y espacios."
        },
        tipo_documento: {
            required: "Seleccione un tipo de documento"
        },
        terminos: {
            required: "Debes aceptar los terminos y condiciones.",
        },
        nro_documento: {
            required: "Ingrese su número de documento",
            digits: "Solo se permiten números"
        },
        email: {
            required: "El correo electrónico es obligatorio.",
            email: "Por favor, ingresa un correo válido.",
            pattern: "Solo se permiten letras, números, y los caracteres @._-"
        },
        current_password: {
            required: "La contraseña es obligatoria.",
            validPassword: "Solo se permiten letras, números y los caracteres @._-#$.*",
            minlength: "La contraseña debe tener al menos 8 caracteres.",
            hasUppercase: "Debe contener al menos una letra mayúscula.",
            hasLowercase: "Debe contener al menos una letra minúscula.",
            hasNumber: "Debe contener al menos un número.",
            hasSpecialChar: "Debe contener al menos un carácter especial (@._-$#).",
            noRepeatNumbers: "No se permiten más de 2 números repetidos consecutivos.",
            noSequentialNumbers: "No se permiten secuencias numéricas mayores de 4 dígitos.",
        },
        password: {
            required: "La contraseña es obligatoria.",
            validPassword: "Solo se permiten letras, números y los caracteres @._-#$.*",
            minlength: "La contraseña debe tener al menos 8 caracteres.",
            hasUppercase: "Debe contener al menos una letra mayúscula.",
            hasLowercase: "Debe contener al menos una letra minúscula.",
            hasNumber: "Debe contener al menos un número.",
            hasSpecialChar: "Debe contener al menos un carácter especial (@._-$#).",
            noRepeatNumbers: "No se permiten más de 2 números repetidos consecutivos.",
            noSequentialNumbers: "No se permiten secuencias numéricas mayores de 4 dígitos.",

        },
        password_confirmation: {
            required: "La confirmación de contraseña es obligatoria.",
            hasUppercase: "Debe contener al menos una letra mayúscula.",
            hasLowercase: "Debe contener al menos una letra minúscula.",
            hasNumber: "Debe contener al menos un número.",
            hasSpecialChar: "Debe contener al menos un carácter especial (@._-$#).",
            noRepeatNumbers: "No se permiten más de 2 números repetidos consecutivos.",
            noSequentialNumbers: "No se permiten secuencias numéricas mayores de 4 dígitos.",
            equalTo: "las contraseñas no coinciden"
        },
        number: {
            required: "Este campo es obligatorio.",
            number: "Por favor, ingresa un número válido.",
            min: "Debe ser mayor o igual a 1.",
            max: "Debe ser menor o igual a 100."
        },
        tel: {
            required: "El número de teléfono es obligatorio.",
            pattern: "El formato debe ser ddd ddd ddd (ejemplo: 123 456 789)."
        },
        url: {
            required: "La URL es obligatoria.",
            url: "Por favor, ingresa una URL válida."
        },
        checkbox: {
            required: "Debes seleccionar esta casilla."
        },
        radio: {
            required: "Debes seleccionar una opción."
        },
        select: {
            required: "Debes seleccionar una opción."
        }
    };

    // Usamos $.extend() para combinar las reglas y mensajes predefinidos con los personalizados
    var finalRules = $.extend(true, {}, defaultRules, customRules);
    var finalMessages = $.extend(true, {}, defaultMessages, customMessages);
    // Métodos personalizados para validar cada regla por separado
    $.validator.addMethod("documentoLength", function(value, element) {
        var tipoDoc = $("#tipo_documento").val();
        if (tipoDoc == "1") {
            return value.length === 8;
        } else if (tipoDoc == "4") {
            return value.length >= 3 && value.length <= 12;
        }
        return false;
    }, function(params, element) {
        var tipoDoc = $("#tipo_documento").val();
        return tipoDoc == "1"
            ? "El DNI debe tener exactamente 8 caracteres"
            : "El CEX debe tener entre 3 y 12 caracteres";
    });
    $.validator.addMethod("hasUppercase", function (value, element) {
        return /[A-Z]/.test(value);  // Al menos una mayúscula
    });

    $.validator.addMethod("hasLowercase", function (value, element) {
        return /[a-z]/.test(value);  // Al menos una minúscula
    });

    $.validator.addMethod("hasNumber", function (value, element) {
        return /\d/.test(value);     // Al menos un número
    });

    $.validator.addMethod("hasSpecialChar", function (value, element) {
        return /[@._\-#$*]/.test(value);  // Al menos un carácter especial
    });

    $.validator.addMethod("noRepeatNumbers", function (value, element) {
        return !/(\d)\1{2}/.test(value);  // No más de 2 números repetidos consecutivamente
    });

    $.validator.addMethod("noSequentialNumbers", function (value, element) {
        return !/(0123|1234|2345|3456|4567|5678|6789)/.test(value);  // No secuencias numéricas de más de 4 dígitos
    });
    // Método personalizado para validar los caracteres permitidos
    $.validator.addMethod("validPassword", function (value, element) {
        // Expresión regular que solo permite:
        // Letras (a-z, A-Z)
        // Números (0-9)
        // Espacios en blanco (no dos o más consecutivos)
        // Caracteres especiales permitidos: @._\-#$

        return /^[a-zA-Z0-9@._\-#$*]+$/.test(value);
        // Verifica que solo use los caracteres permitidos y que no haya dos espacios seguidos
    }, "Solo se permiten letras, números y los caracteres @._-#$.");
    $.validator.addMethod("validText", function (value, element) {
        // Expresión regular que solo permite:
        // Letras (a-z, A-Z)
        // Números (0-9)
        // Espacios en blanco (no dos o más consecutivos)
        // Caracteres especiales permitidos: @._\-#$

        return /^[a-zA-Z0-9@._\-#$* ]+$/.test(value) && !/\s{2,}/.test(value);
        // Verifica que solo use los caracteres permitidos y que no haya dos espacios seguidos
    }, "Solo se permiten letras, números, espacios en blanco (no consecutivos), y los caracteres @._-#$.");

    // Aplicamos la validación al formulario seleccionado
    form.validate({
        rules: finalRules,
        messages: finalMessages,
        errorClass: 'invalid-feedback',
        errorElement: 'div',
        onkeyup: function (element) {
            $(element).valid();
            toggleSubmitButton();
        },
        onfocusout: function (element) {
            $(element).valid();
            toggleSubmitButton();
        },
        onclick: function (element) {
            $(element).valid();
            toggleSubmitButton();
        },
        highlight: function (element) {
            $(element).addClass('is-invalid').removeClass('is-valid');
        },
        unhighlight: function (element) {
            $(element).addClass('is-valid').removeClass('is-invalid');
        }
    });
    // Enable button when form is valid
    form.on('change keyup', function() {
        if (form.valid()) {
            participarButton.prop('disabled', false);
        } else {
            participarButton.prop('disabled', true);
        }
    });
    // Función para habilitar o deshabilitar el botón de submit
    function toggleSubmitButton() {
        // Verificamos si todo el formulario es válido
        if (form.valid()) {
            submitButton.prop('disabled', false); // Habilitamos el botón si es válido
            participarButton.prop('disabled', false); // Habilitamos el botón si es válido
        } else {
            submitButton.prop('disabled', true);  // Deshabilitamos si no es válido
            participarButton.prop('disabled', true);  // Deshabilitamos si no es válido
        }
    }
}

