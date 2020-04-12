<div class="container">
    @foreach($films as $film)
    <h4>Titre : <a href="/MVC_PiePHP/film/{{$film['id']}}">{{$film['name']}}</a></h4>
    <p>Description : {{$film['description']}}</p>
    @endforeach
</div>