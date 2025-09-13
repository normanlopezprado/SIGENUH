
    <h1>Nuevo Servicio</h1>

    <form method="POST" action="{{ route('hospital-services.store') }}">
        @csrf
        @include('hospital_services.form', ['service' => new \App\Models\HospitalService()])
    </form>

