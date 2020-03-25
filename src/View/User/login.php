<!DOCTYPE html>

<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>myMeat</title>
    <meta name="description" content="Vous allez aimer le Ciné" />
    <link href="./style/haoFramework.css" type="text/css" rel="stylesheet">
    <link href="./style/style.css" type="text/css" rel="stylesheet">
</head>
<script src="./javascript/login.js"></script>

<body>
    <main>
        <form id="loginform" method="post" enctype="multipart/form-data" action="/MVC_PiePHP/index.php">
            <div><label for="email">email</label><input type="text" name="email" id="email" autocomplete="off" /></div>
            <div><label for="password">password</label><input type="password" name="password" id="password" autocomplete="off" /></div>
            <button id="loginbtn">login</button>
        </form>
    </main>
</body>

</html>