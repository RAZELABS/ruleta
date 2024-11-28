@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="p-4 col-12 bg-white">
                {{-- {{ $usersData }} --}}
                <div class="p-4">
                    <x-data-table idTable='TABLE_1' :columns="['ID', 'Flag', 'Valor', 'Descripcion']" :columnsClass="['', '', '', '']" :datos=$parametrosData />
                </div>
            </div>

        </div>
    </div>
@endsection
@push('scripts')
    <script>
        var routeConfigurations = {
            'TABLE_1': {
                'botones': 'Bfrtip',
                // 'ordenar': [0, "asc"],
            },
        }
    </script>
@endpush
@push('scripts')
    <script src="{{ asset('plugins/datatables/datatables-config.js') }}"></script>
@endpush

