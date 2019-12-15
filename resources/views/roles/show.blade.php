<h1>{{$rol->name}} </h1>
<a>{{$rol->description}} </a>
@foreach ($rol->permissions as $permiso)
    <h3>{{$permiso->name}}</h1>
    <a>{{$permiso->description}}</a>
@endforeach