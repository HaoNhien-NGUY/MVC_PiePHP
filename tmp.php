<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PiePHP</title>
</head>
<body>
    <form id="registerform" method="post" enctype="multipart/form-data" action="/MVC_PiePHP/user/register">
    <div><label for="email">email</label><input type="text" name="email" id="email" autocomplete="off" /></div>
    <div><label for="password">password</label><input type="password" name="password" id="password" autocomplete="off" /></div>
    <button id="registerbtn">Register</button>
</form>


<?php if ($test2 == 'can i chain?')
: ?><h4>it works</h4>
<?php elseif (1)
: ?><h4>elseif</h4>
<?php endif; ?>

<?php if(1)
: ?><h3>deuxieme if</h3>
<?php endif; ?>

<?php if(isset($test)
): ?><p>isset test</p>
<?php endif; ?>

<?php if(isset($test2)
): ?><p>isset 2 test</p>
<?php endif; ?>
<p><?=htmlentities($test); ?></p>
<h1><?=htmlentities($test2); ?></h1></body>
</html><?php echo 'yooooo' ?>