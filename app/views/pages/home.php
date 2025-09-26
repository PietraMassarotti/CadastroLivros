<?php
$title = 'Home - Sistema Biblioteca';
$page = 'home';
$basePath = '/biblioteca/public';
?>

<h1>Bem-vindo!</h1>
<center><a>Este é o sistema Biblioteca no modelo de pastas MVC</a><center>
<form action="<?php echo $basePath; ?>/login" method="GET">
    <button type="submit">Login</button>
</form>
<br>
<form action="<?php echo $basePath; ?>/cadastro" method="GET">
    <button type="submit">Cadastro</button>
</form>