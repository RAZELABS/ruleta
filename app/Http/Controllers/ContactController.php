<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    // Muestra el formulario de contacto
    public function index()
    {
        return view('emails.contact');
    }

    // Maneja el envío del formulario
    public function send(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|max:2000',
        ]);

        // Preparar los datos del correo
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'userMessage' => $request->message,
        ];
        // dd($data);
        // Enviar el correo
        Mail::send('emails.template-contact', $data, function ($message) use ($request) {
            $message->to('website@z-cconsultants.com')
                ->subject('Nuevo mensaje desde la pagina web')
                ->from($request->email, $request->name);
        });

        return back()->with('success', 'Tu mensaje ha sido enviado con éxito.');
    }
}
