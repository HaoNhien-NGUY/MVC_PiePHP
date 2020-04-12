<form id="registerform" method="post" enctype="multipart/form-data" action="/MVC_PiePHP/user/register">
    <div><label for="email">email</label><input type="text" name="email" id="email" autocomplete="off" /></div>
    <div><label for="password">password</label><input type="password" name="password" id="password" autocomplete="off" /></div>
    <button id="registerbtn">Register</button>
</form>


@if ($test2 == 'can i chain?')
<h4>it works</h4>
@elseif (1)
<h4>elseif</h4>
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