<div class="container">
    <h1 class="text-center pb-5">Login to My_Cinema</h1>
    @isset($error)
    <h3 class="text-center text-danger">{{$error}}</h3>
    @endisset
    <form class="mx-5" id="registerform" method="post" enctype="multipart/form-data" action="/MVC_PiePHP/user/login">
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" id="email" name="email" autocomplete="off" aria-describedby="emailHelp" placeholder="Enter email">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" autocomplete="off" aria-describedby="emailHelp" placeholder="Password">
        </div>
        <button class="btn btn-primary" id="registerbtn">Login</button>
    </form>
</div>