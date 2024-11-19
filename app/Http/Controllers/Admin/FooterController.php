<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Footer;
use Illuminate\Http\Request;

class FooterController extends Controller
{
    public function edit()
    {
        $footer = Footer::first();
        return view('admin.footer.edit', compact('footer'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'contact_info' => 'nullable|string',
            'social_links' => 'nullable|array',
            // Otros campos según necesidad
        ]);

        $footer = Footer::firstOrCreate([]);

        $footer->contact_info = $request->contact_info;
        $footer->social_links = json_encode($request->social_links);
        // Asigna otros campos según necesidad
        $footer->save();

        return redirect()->route('admin.footer.edit')->with('success', 'Footer actualizado exitosamente.');
    }
}
