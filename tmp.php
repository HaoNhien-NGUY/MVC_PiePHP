<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>my_cinema</title>
    <meta name="description" content="Vous allez aimer le Ciné" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- <link href="./webroot/css/reset.css" type="text/css" rel="stylesheet"> -->
    <link href="./webroot/css/style.css" type="text/css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light mb-5">
            <a class="navbar-brand" href="/MVC_PiePHP/">My_cinema</a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item ">
                        <a class="nav-link" href="/MVC_PiePHP/">Home<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="/MVC_PiePHP/film">Films</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="/MVC_PiePHP/genre">Genres</a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto mr-3 my-0">
                    <?php if(isset($email)): ?>
                    <li class="nav-item mr-4">
                        <a class="nav-link" href="/MVC_PiePHP/user/profile/<?=htmlentities($_SESSION['id']); ?>"><?=htmlentities($email); ?></a>
                    </li>
                    <li class="nav-item">
                        <form action="/MVC_PiePHP/" method="post">
                            <input type="hidden" name="logout">
                            <button class="btn btn-outline-danger" type="submit">Logout</button>
                        </form>
                    </li>
                    <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/MVC_PiePHP/user/login">
                            <button class="btn btn-outline-secondary">Login</button>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/MVC_PiePHP/user/register">
                            <button class="btn btn-outline-primary">Register</button>
                        </a>
                    </li>
                    <?php endif; ?>
                </ul>
            </div>
        </nav>
    </header>

    <div class="container">
    <?php foreach($films as $film): ?>
    <h4>Titre : <a href="/MVC_PiePHP/film/<?=htmlentities($film['id']); ?>"><?=htmlentities($film['name']); ?></a></h4>
    <p>Description : <?=htmlentities($film['description']); ?></p>
    <?php endforeach; ?>
</div>
</body>

</html>