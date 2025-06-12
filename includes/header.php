<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($page_title) ? $page_title : 'Secretaria da Igreja'; ?></title>

    <link rel="stylesheet" href="css/style.css">
    <?php if(isset($additional_css) && is_array($additional_css)): ?>
        <?php foreach($additional_css as $css): ?>
            <link rel="stylesheet" href="<?php echo $css; ?>">
        <?php endforeach; ?>
    <?php endif; ?>
    
    <link rel="icon" type="image/png" href="img/igreja.png">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="top-header">
        <div class="contact-info">
            <i class="ri-mail-line"></i> contact@example.com
            <i class="ri-phone-line"></i> +1 5589 55488 55
        </div>
        <div class="social-icons">
            <i class="ri-twitter-fill"></i>
            <i class="ri-facebook-fill"></i>
            <i class="ri-instagram-line"></i>
            <i class="ri-linkedin-fill"></i>
        </div>
    </div>

    <header class="navbar">
        <div class="logo">Paróquia</div>

        <!-- Botão do menu hambúrguer -->
        <div class="hamburger" id="hamburger">
            <i class="ri-menu-line"></i>
        </div>

        <ul class="nav-links" id="nav-links">
            <li><a href="index.php" <?php echo (!isset($_GET['page']) || $_GET['page'] == 'home') ? 'class="active"' : ''; ?>>Home</a></li>
            <li><a href="agendamente.php" <?php echo (isset($_GET['page']) && $_GET['page'] == 'agendamento') ? 'class="active"' : ''; ?>>Agendamentos</a></li>
            <li><a href="?page=dizimo" <?php echo (isset($_GET['page']) && $_GET['page'] == 'dizimo') ? 'class="active"' : ''; ?>>Dízimo</a></li>
            <li><a href="eventos.php" <?php echo (isset($_GET['page']) && $_GET['page'] == 'eventos') ? 'class="active"' : ''; ?>>Eventos</a></li>
           

            <li class="dropdown">
                <button class="btn-btn-secondary-dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Saiba mais sobre
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="santos.php">Santos</a></li>
                    <li><a class="dropdown-item" href="oracoes.php">Orações</a></li>
                 
                    <li><a class="dropdown-item" href="servicos.php">Serviços</a></li>
                  
                    <li><a class="dropdown-item" href="perguntas.php">Perguntas</a></li>
                </ul>
            </li>
            <li><a href="contato.php" <?php echo (isset($_GET['page']) && $_GET['page'] == 'contato') ? 'class="active"' : ''; ?>>Contato</a></li>
        </ul>
    </header>

    <hr class="tt">

    <script>
        document.getElementById('hamburger').addEventListener('click', function () {
            document.getElementById('nav-links').classList.toggle('active');
        });
    </script>