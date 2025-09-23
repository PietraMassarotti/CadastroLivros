<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?? 'Sistema MVC'; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php $basePath = '/biblioteca'; ?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="<?php echo $basePath; ?>/">Sistema MVC</a>
            <div class="navbar-nav">
                <a class="nav-link <?php echo ($page ?? '') === 'home' ? 'active' : ''; ?>" href="<?php echo $basePath; ?>/">Home</a>
                <a class="nav-link <?php echo ($page ?? '') === 'cadastro' ? 'active' : ''; ?>" href="<?php echo $basePath; ?>/cadastro">Cadastro</a>
                <a class="nav-link <?php echo ($page ?? '') === 'login' ? 'active' : ''; ?>" href="<?php echo $basePath; ?>/login">Login</a>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <?php echo $content ?? ''; ?>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>