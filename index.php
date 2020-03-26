<pre>

<?php

var_dump($_POST);
var_dump($_GET);
var_dump($_SERVER);

?>

</pre>

<?php
define('BASE_URI' , str_replace( '\\' , '/' , substr( __DIR__ , strlen($_SERVER['DOCUMENT_ROOT']))));
require_once(implode(DIRECTORY_SEPARATOR ,['Core' , 'autoload.php']) ) ;
use Model\UserModel;
$app = new Core\Core();
$app->run();

$usrmodel = new UserModel();
$usrmodel->run();