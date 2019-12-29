@if (Auth::guest())
  <script>window.location = "/login";</script>
@else
@extends("../layout/plantilla")
@section("cabecera")
 @include("../cuentaUsuario/menu")
@endsection
@section("contenido")

      <h2 style="color: white;">Notificaciones</h2>
@endsection
@endif