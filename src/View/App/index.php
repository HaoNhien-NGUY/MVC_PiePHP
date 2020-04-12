<div class="container">


    @isset($email)
    <h1 class="text-primary text-center">WELCOME {{$email}}</h1>
    @endisset

    @if ($test2 == 'can i chain??')
    <h4>it works</h4>
    @else
    <h4>else works</h4>
    @endif

    @if(1)
    <h3>deuxieme if</h3>
    @endif

    @isset($test)
    <p>isset test</p>
    @endisset

    @isset($test2)
    <p>isset 2 test</p>
    @endisset
    <p>{{$test}}</p>
    <h1>{{$test2}}</h1>

    @foreach ($testarr as $words)
    <h1>{{$words}}</h1>
    @endforeach

    @foreach ($testarr as $words)
    <h1>{{$words}}</h1>
    @endforeach
</div>