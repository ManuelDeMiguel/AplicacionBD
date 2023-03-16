@extends ("layout")
@section("menu")
    <h1 class="text-2xl text-green-600">Probando</h1>
    <x-layout.menu class="justify-start">
        <x-form.a_href href="{{route('facturas.create')}}" class="mx-2">Crear factura</x-form.a_href>
        <x-form.a_href href="{{route('main')}}" class="mx-2">Volver</x-form.a_href>
    </x-layout.menu>
@endsection
@section("contenido")
    <tabla consulta ="facturas" filas_serializadas='@json($filas)' campos_serializados='@json($campos)' nombre_tabla="Clientes">
    </tabla>
@endsection
