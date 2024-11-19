@extends('admin.layouts.app')

@section('content')
<div class="container p-5">
    <div class="row justify-content-center">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center">
                    <h3>{{ __('Ingreso de Cotizaciones') }}</h3>
                </div>
                <div class="card-body">
                    <form action="/cotizacion" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12 col-md-12">
                                <div class="form-group">
                                    <label for="gestion">Cliente</label>
                                    <select class="form-control" name="gestion_id" required>
                                        @foreach ($clientes as $cli)
                                        <option value="{{ $cli->id }}">{{ $cli->razon_social }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label for="monto">Monto</label>
                                    <input type="number" class="form-control inputSoloNumeros" name="monto" required>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label for="divisa">Tipo de divisa</label>
                                    <select class="form-control" name="divisa_id" required>
                                        <option value="" disable selected>Escoja una divisa</option>
                                        @foreach ($divisa as $divisas)
                                        <option value="{{ $divisas->id }}">{{ $divisas->nombre_divisa }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label for="cantidad_productos">Cantidad de Productos</label>
                                    <input type="number" class="form-control inputSoloNumeros" name="cantidad_productos"
                                        required>
                                </div>
                            </div>
                            <div class="col-12 col-md-8">
                                <div class="form-group">
                                    <label for="cotizacion">Cotizacion (csv,txt,xlx,xls,xlsx,pdf / max:2mb)</label>
                                    <input type="file" class="form-control inputDireccion" name="cotizacion" required>
                                </div>
                            </div>

                            <div class="col-12 col-md-12">
                                <div class="form-group float-right">
                                    <button type="submit" class="btn btn-primary">Aceptar</button>
                                    <a href="{{ url('cotizacion') }}"><button type="button" name="button"
                                            class="btn btn-danger">Regresar</button></a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>

    </div>

</div>
@endsection
