<div class="container">
@isset($film)
    <h1 class="text-primary">Titre : {{$film->name}}</h1>
    <h3>Description : {{$film->description}}</h3>
    <h5>Genre : {{$genre}}</h5>
    <a href="/MVC_PiePHP/film/remove/{{$film->id}}">
        <button class="btn btn-danger">Delete film</button>
    </a>
    @else
    <h1 class="text-danger">Film doesn't exists</h1>
    @endif
</div>