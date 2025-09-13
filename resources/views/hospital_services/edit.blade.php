
    <h1>Editar Servicio</h1>

    <form method="POST" action="{{ route('hospital-services.update', $hospitalService) }}">
        @csrf @method('PUT')
        @include('hospital_services.form', ['service' => $hospitalService])
    </form>
