<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kiosco;
use Illuminate\Http\Request;
use League\Csv\Reader;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class KioscoController extends Controller
{
    public function index()
    {
        $kioscos = Kiosco::paginate(10);
        return view('admin.kiosco.index', compact('kioscos'));
    }

    public function import(Request $request)
    {
        $request->validate([
            'csv_file' => 'required|mimes:csv,txt|max:2048'
        ]);

        try {
            DB::beginTransaction();

            $file = $request->file('csv_file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/kioskos', $filename);

            $csv = Reader::createFromPath(storage_path('app/public/kioskos/' . $filename), 'r');
            $csv->setHeaderOffset(0);

            $validator = Validator::make([], []); // Empty initial validator

            foreach ($csv->getRecords() as $index => $record) {
                $validator = Validator::make($record, [
                    'fecha' => 'required|date_format:Y-m-d',
                    'hora' => 'required|date_format:H:i:s',
                    'tipo_documento' => 'required|in:1,2',
                    'nro_documento' => 'required|string|min:3|max:12',
                    'codigo_tienda' => 'required|numeric',
                    'orden_compra' => 'required|string|max:20|alpha_num',
                    'monto' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',

                ], [
                    'fecha.date_format' => 'La fecha debe tener el formato YYYY-MM-DD en la línea ' . ($index + 2),
                    'hora.date_format' => 'La hora debe tener el formato HH:mm:ss en la línea ' . ($index + 2),
                    'tipo_documento.in' => 'El tipo de documento debe ser 1 o 2 en la línea ' . ($index + 2),
                    'nro_documento.min' => 'El número de documento debe tener al menos 3 caracteres en la línea ' . ($index + 2),
                    'nro_documento.max' => 'El número de documento no debe exceder 12 caracteres en la línea ' . ($index + 2),
                    'codigo_tienda.numeric' => 'El código de tienda debe ser numérico en la línea ' . ($index + 2),
                    'orden_compra.alpha_num' => 'La orden de compra debe ser alfanumérica en la línea ' . ($index + 2),
                    'orden_compra.max' => 'La orden de compra no debe exceder 20 caracteres en la línea ' . ($index + 2),
                    'monto.regex' => 'El monto debe tener formato válido de moneda en la línea ' . ($index + 2),
                ]);

                if ($validator->fails()) {
                    throw new \Exception('Error de validación: ' . implode(', ', $validator->errors()->all()));
                }

                Kiosco::create([
                    'fecha' => $record['fecha'],
                    'hora' => $record['hora'],
                    'tipo_documento' => $record['tipo_documento'],
                    'nro_documento' => $record['nro_documento'],
                    'codigo_tienda' => $record['codigo_tienda'],
                    'orden_compra' => $record['orden_compra'],
                    'monto' => $record['monto'],
                    'estado' => $record['estado'],
                ]);
            }

            DB::commit();
            return redirect()->route('admin.kiosco.index')->with('success', 'CSV importado correctamente');

        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error('Error importing CSV: ' . $e->getMessage());
            return redirect()->route('kiosco.index')
                ->with('error', 'Error al importar CSV: ' . $e->getMessage());
        }
    }
    public function download($filename)
    {
        return response()->download(storage_path('app/public/kioskos/' . $filename));
    }

    public function edit(string $id)
    {
        $kioscos = Kiosco::select('id','fecha','hora','tipo_documento','nro_documento','codigo_tienda','orden_compra','monto')
        ->where('id','=', $id)->first();

        //dd($kioscos);
        return view("admin.kioscos.edit", compact("kioscos"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $data = $request->validate([
            'fecha' => 'required|date_format:Y-m-d',
            'hora' => 'required|date_format:H:i:s',
            'tipo_documento' => 'required|in:1,2',
            'nro_documento' => 'required|string|min:3|max:12',
            'codigo_tienda' => 'required|numeric',
            'orden_compra' => 'required|string|max:20|alpha_num',
            'monto' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
        ]);

        //dd($data);
        $kioscos = Kiosco::where("id","=", $id)->update($data);
        return redirect()->route("admin.kioscos.index")->with("success","Registro modificado con exito");

    }

}
