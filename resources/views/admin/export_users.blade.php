<table>
    <thead>
    <tr>
        <th>DNI</th>
        <th>Historia CLI</th>
        <th>Nombres y apellidos</th>
        <th>Seguro</th>
        <th>Fecha de nacimiento</th>
        <th>Edad</th>
        <th>Estado conyugal</th>
        <th>Escolaridad</th>
        <th>Direccion</th>
        <th>Telefono fijo</th>
        <th>Celular</th>
        <th>Email</th>
        <th>Peso anterior al embarazo(Kg)</th>
        <th>Talla</th>
        <th>IMC</th>
    </tr>
    </thead>
    <tbody>
    @foreach($users as $use)
        <tr>
            <td>{{ $use->dni }}</td>
            <td>{{ $use->historial_code }}</td>
            <td>{{ $use->name }} {{ $use->last_name }}</td>
            <td>{{ $use->secure_code }}</td>
            <td>{{ $use->born_date }}</td>
            <td>{{ $use->age }}</td>
            <td>
                {{ $use->civil_status == 1 ? 'Soltero' : '' }} 
                {{ $use->civil_status == 2 ? 'Casado' : '' }} 
                {{ $use->civil_status == 3 ? 'Viudo' : '' }}
            </td>
            <td>
                {{ $use->scholarship == 1 ? 'Ninguna' : '' }} 
                {{ $use->scholarship == 2 ? 'Primaria' : '' }} 
                {{ $use->scholarship == 3 ? 'Secundaria' : '' }}
                {{ $use->scholarship == 4 ? 'Tecnico' : '' }}
                {{ $use->scholarship == 5 ? 'Universitaria' : '' }}
                {{ $use->scholarship == 6 ? 'Postgrado' : '' }}
            </td>
            <td>{{ $use->address }}</td>
            <td>{{ $use->phone }}</td>
            <td>{{ $use->movil }}</td>
            <td>{{ $use->email }}</td>
            <td>{{ $use->weight_bp }}</td>
            <td>{{ $use->size_bp }}</td>
            <td>{{ $use->imc }}</td>
        </tr>
    @endforeach
    </tbody>
</table>