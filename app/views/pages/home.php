<?php 
$title = 'Home - Sistema de Usuários'; 
$page = 'home';
$basePath = '/biblioteca'; 
$publicPath = $basePath . '/public';

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <title>Página Inicial</title>
     <link rel="stylesheet" type="text/css" href="<?=$publicPath . '/css/form.css'?>" media="screen" />
</head>

<body>

    <h1>Bem-vindo!</h1>
    <form action="<?php echo $basePath; ?>/login" method="GET">
    <button type="submit">Login</button>
</form>
    <br>
    <form action="<?php echo $basePath; ?>/cadastro" method="GET">
        <button type="submit">Cadastro</button>
    </form>

</body>

</html>
