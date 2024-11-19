<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::all();
        return view('admin.banners.index', compact('banners'));
    }

    public function create()
    {
        return view('admin.banners.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image',
            'title' => 'nullable|string',
            'subtitle' => 'nullable|string',
            'link' => 'nullable|url',
        ]);

        // Manejar la subida de la imagen
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('banners', 'public');
        }

        Banner::create([
            'image' => $path ?? null,
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'link' => $request->link,
        ]);

        return redirect()->route('admin.banners.index')->with('success', 'Banner creado exitosamente.');
    }

    public function show(Banner $banner)
    {
        return view('admin.banners.show', compact('banner'));
    }

    public function edit(Banner $banner)
    {
        return view('admin.banners.edit', compact('banner'));
    }

    public function update(Request $request, Banner $banner)
    {
        $request->validate([
            'image' => 'nullable|image',
            'title' => 'nullable|string',
            'subtitle' => 'nullable|string',
            'link' => 'nullable|url',
        ]);

        if ($request->hasFile('image')) {
            // Eliminar la imagen anterior si existe
            if ($banner->image) {
                \Storage::disk('public')->delete($banner->image);
            }
            $path = $request->file('image')->store('banners', 'public');
            $banner->image = $path;
        }

        $banner->title = $request->title;
        $banner->subtitle = $request->subtitle;
        $banner->link = $request->link;
        $banner->save();

        return redirect()->route('admin.banners.index')->with('success', 'Banner actualizado exitosamente.');
    }

    public function destroy(Banner $banner)
    {
        if ($banner->image) {
            \Storage::disk('public')->delete($banner->image);
        }
        $banner->delete();
        return redirect()->route('admin.banners.index')->with('success', 'Banner eliminado exitosamente.');
    }
}
