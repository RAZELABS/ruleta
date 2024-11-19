<table id="{{ $idTable }}" class="table table-striped">
    <thead>
        <tr>
            @foreach ($columns as $column)
                <th>{{ $column }}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @php $i=0 @endphp
        @foreach ($datos as $row)
            <tr>
                @foreach ($row as $cell)
                    <td class="{{ $columnsClass[$i] }}">{{ $cell }}</td>
                @endforeach
            </tr>
            @php $i++ @endphp
        @endforeach
    </tbody>
</table>
<p>
    {{ $columnsClass[$i] }}
</p>
