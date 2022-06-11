<style>
    table {
        border-spacing: 0;
    }

    td,
    tr {
        text-align: center;
        border: 1px solid black;
    }

</style>

<body>
    <table width="100%" border="1px">
        <tr>
            <td>Nombre</td>
            <td>Edad</td>
            <td>Sucursal</td>
            <td>Salario</td>
        </tr>

        @foreach ($employees as $value)
            <tr>
                <td>{{ $value->id }}</td>
                <td>{{ $value->age }}</td>
                <td>{{ $value->branch_office_id }}</td>
                <td>{{ $value->salary }}</td>
            </tr>
        @endforeach
         
    </table>
</body>
