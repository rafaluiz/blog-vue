
<hr>
@if (auth()->check())
@if(session('success'))
<div calss="alert alert-success">
{{session('success')}}
</div>
@endif

@if($errors->any())
<div class="alert alert-danger">
<ul>
@foreach($errors->all() as $error)
<li>{{$error}}</li>
@endforeach
</ul>
</div>
@endif


<form action="{{route('comment.store')}}" method="post" class="form">
    @csrf
    <input type="hidden" name="post_id" value="{{$posts->id}}">
    <div class="form-group">
        <input type="text" name="title" placeholder="Titulo" class="form-control">
    </div>
    <div class="form-group">
        <textarea name="body" cols="30" rows="10" placeholder="Comentario" class="form-control"></textarea>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary"> Enviar</button>
    </div>

</form>

@else
<p>Precisa estar logado para fazer o comentario.<a href="{{ route('login') }}">Clique aqui para logar</a> </p>
@endif

<h3>
<h3>Coméntarios ({{$posts->coments->count()}})</h3>
@forelse($posts->coments as $c)
<p>
<b>{{$c->user->name}} Comentou:</b>
{{$c->title}} - {{$c->body}}
</p>

<hr>
@empty
@endforelse
