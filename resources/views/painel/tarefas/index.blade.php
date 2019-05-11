
@extends('layouts.app')

@section('content')

<h1>Listagens dos Posts</h1>

@forelse($posts as $v)
<a href="{{route('tarefas.show', $v->id)}}">
    {{$v->title}}({{$v->coments->count()}})

</a>
<hr>
@empty
<p>Nenhum post cadastrado</p>
@endforelse


@endsection
