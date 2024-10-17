<?php 
    if($error) :
    echo $error;
    endif
?>

<form action="login" method="post">
    Email: <input type="email" name="email" id="email" required>
    Contraseña: <input type="password" name="contrasenia" id="contrasenia" required>
    <button type="submit">Login</button>
</form>