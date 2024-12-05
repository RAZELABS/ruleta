<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kiosco;
use Illuminate\Http\Request;
use League\Csv\Reader;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class KioscoController extends Controller
{
    public function index()
    {
        //$kioscos = Kiosco::select('id','fecha','tipo_documento','nro_documento');
        $kioscos=Kiosco::all();
        //dd($kioscos);
        return view('admin.kiosco.index', compact('kioscos'));
    }

    public function import(Request $request)
    {
        $request->validate([
            'csv_file' => 'required|mimes:csv,txt|max:2048'
        ]);

        try {
            DB::beginTransaction();

            // Fix directory path with correct separators
            $storage_path = storage_path('app' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'kioscos');

            // Create directory if doesn't exist
            if (!File::exists($storage_path)) {
                File::makeDirectory($storage_path, 0755, true);
            }

            $file = $request->file('csv_file');
            $filename = time() . '_' . $file->getClientOriginalName();

            // Store file using Storage facade
            Storage::disk('public')->putFileAs('kioscos', $file, $filename);

            // Get correct path with proper separators
            $csv_path = Storage::disk('public')->path('kioscos' . DIRECTORY_SEPARATOR . $filename);

            // Verify file exists before processing
            if (!File::exists($csv_path)) {
                throw new \Exception('El archivo no se pudo guardar correctamente');
            }
            $csv = Reader::createFromPath($csv_path, 'r');
            $csv->setHeaderOffset(0);

            $validator = Validator::make([], []); // Empty initial validator

            // dd($csv->getRecords());

            foreach ($csv->getRecords() as $index => $record) {
                $validator = Validator::make($record, [
                    'TRAN_ID' => 'numeric', // orden de compra
                    'TRAN_DT' => 'date_format:d/m/Y', // fecha
                    // 'hora' => 'required|date_format:H:i:s',
                    'CUST_ID_TYPE' => 'numeric',
                    'CUST_ID' => 'string',
                    'LOC_ID' => 'numeric',
                    'TOTAL_AMT' => 'numeric|regex:/^\d+(\.\d{1,2})?$/',

                ], [
                    'TRAN_DT' => 'La fecha debe tener el formato DD-MM-YYYY en la línea ' . ($index + 2),
                    // 'hora.date_format' => 'La hora debe tener el formato HH:mm:ss en la línea ' . ($index + 2),
                    'CUST_ID_TYPE.in' => 'El tipo de documento debe ser 1 o 6 en la línea ' . ($index + 2),
                    'CUST_ID.min' => 'El número de documento debe tener al menos 3 caracteres en la línea ' . ($index + 2),
                    'CUST_ID.max' => 'El número de documento no debe exceder 12 caracteres en la línea ' . ($index + 2),
                    'LOC_ID.numeric' => 'El código de tienda debe ser numérico en la línea ' . ($index + 2),
                    'TRAN_ID.max' => 'La orden de compra no debe exceder 20 caracteres en la línea ' . ($index + 2),
                    'TOTAL_AMT.regex' => 'El monto debe tener formato válido de moneda en la línea ' . ($index + 2),
                ]);
                if ($validator->fails()) {
                    throw new \Exception('Error de validación: ' . implode(', ', $validator->errors()->all()));
                }
                // dd($validator);
                $fecha = \Carbon\Carbon::createFromFormat('d/m/Y', $record['TRAN_DT'])->format('Y-m-d');
                Kiosco::create([
                    'fecha' => $fecha,
                    // 'hora' => $record['hora'],
                    'tipo_documento' => $record['CUST_ID_TYPE'],
                    'nro_documento' => $record['CUST_ID'],
                    'codigo_tienda' => $record['LOC_ID'],
                    'orden_compra' => $record['TRAN_ID'],
                    'monto' => $record['TOTAL_AMT']
                ]);
            }

            DB::commit();
            return redirect()->route('admin.kiosco.index')->with('success', 'CSV importado correctamente');

        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error('Error importing CSV: ' . $e->getMessage());

            return redirect()->route('admin.kiosco.index')
                ->with('error', 'Error al importar CSV: ' . $e->getMessage());
        }
    }
    public function download($filename)
    {
        return response()->download(storage_path('app/public/kioskos/' . $filename));
    }

    public function edit(string $id)
    {
        $kioscos = Kiosco::select('id', 'fecha', 'hora', 'tipo_documento', 'nro_documento', 'codigo_tienda', 'orden_compra', 'monto')
            ->where('id', '=', $id)->first();

        //dd($kioscos);
        return view("admin.kiosco.edit", compact("kioscos"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //dd($request);
        $data = $request->validate([
            // 'fecha' => 'required|date_format:Y-m-d',
            // 'hora' => 'required|date_format:H:i:s',
            'tipo_documento' => 'required|in:1,2',
            'nro_documento' => 'required|string|min:3|max:12',
            'codigo_tienda' => 'required|numeric',
            'orden_compra' => 'required|string|max:20|alpha_num',
            'monto' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
        ]);

        //dd($data);
        $kioscos = Kiosco::where("id", "=", $id)->update($data);
        return redirect()->route("admin.kiosco.index")->with("success", "Registro modificado con exito");

    }

    public function destroy(Request $request, $id)
    {
        $kiosco = Kiosco::findOrFail($id);
        // Show confirmation view
        $kiosco->delete();
        return redirect()->route("admin.kiosco.index")->with("success", "Registro eliminado con exito");
    }


}
