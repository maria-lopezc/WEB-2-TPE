<?php
require_once 'urls.php';

$base=baseurl();
 
    if($error) :
    echo $error;
    endif
?>

<form action="<?php echo $base?>signUp" method="post">
    Email: <input type="email" name="email" id="email" required>
    Contraseña: <input type="password" name="contrasenia" id="contrasenia" required>
    <button type="submit">Registrar</button>
</form>