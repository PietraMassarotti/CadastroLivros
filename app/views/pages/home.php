<?php 
$title = 'Home - Sistema Biblioteca'; 
$page = 'home';
$basePath = '/biblioteca'; 
$publicPath = $basePath . '/public';

?>

<link rel="stylesheet" type="text/css" href="<?=$publicPath . '/css/form.css'?>" media="screen" />
<h1>Bem-vindo!</h1>
<form action="<?php echo $basePath; ?>/login" method="GET">
    <button type="submit">Login</button>
</form>
<br>
<form action="<?php echo $basePath; ?>/cadastro" method="GET">
    <button type="submit">Cadastro</button>
</form>

