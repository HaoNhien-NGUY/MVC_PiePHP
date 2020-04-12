<div class="container">
    @isset($errormsg)
    <h1 class="text-danger">{{$errormsg}}</h1>
    @endisset

    <h1 class="text-info">Hi {{$email}} !</h1>
    <h3 class="my-4">Your promo : {{$promo}}</h3>
    <h3>You can delete your account by clicking this bouton, no question asked</h3>
    <a href="/MVC_PiePHP/user/delete">
        <button class="btn btn-danger">Delete account</button>
    </a>
</div>