@extends ("layout");
@section("menu")
    <x-layout.menu class="justify-start">
        <x-form.a_href href="{{route('facturas.create')}}" class="mx-2">Crear factura</x-form.a_href>
        <x-form.a_href href="{{route('main')}}" class="mx-2">Volver</x-form.a_href>

    </x-layout.menu>
@endsection
@section("contenido")
    <tabla  consulta="clientes" filas_serializadas='@json($filas)' campos_serializados='@json($campos)' nombre_tabla="Facturas">
    </tabla>
@endsection
