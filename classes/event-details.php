<?php
// event-details.php
require_once 'includes/head.php';
require_once 'classes/EventManager.php';

$eventManager = new EventManager();
$eventId = $_GET['id'] ?? null;

if (!$eventId) {
    header('Location: eventos.php');
    exit;
}

$event = $eventManager->getEventById($eventId);

if (!$event) {
    header('Location: eventos.php?error=evento_nao_encontrado');
    exit;
}

$date = new DateTime($event['date']);
$formattedDate = $date->format('d/m/Y');
$dayOfWeek = $date->format('w');
$daysOfWeek = ['Domingo', 'Segunda-feira', 'Terça-feira', 'Quarta-feira', 'Quinta-feira', 'Sexta-feira', 'Sábado'];
?>

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
        <div class="logo">
            <!-- Logo pode ser colocado aqui -->
        </div>
        <ul class="nav-links">
            <li><a href="index.php">Home</a></li>
            <li><a href="agendamento.php">Agendamentos</a></li>
            <li><a href="dizimo.php">Dizimo</a></li>
            <li><a href="eventos.php">Eventos</a></li>
            <li><a href="horarios.php">Horarios</a></li>
            
            <li class="dropdown">
                <button class="btn-btn-secondary-dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Saiba mais sobre
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="santos.php">Santos</a></li>
                    <li><a class="dropdown-item" href="oracoes.php">Orações</a></li>
                    <li><a class="dropdown-item" href="acao-solidaria.php">Ação Solidária</a></li>
                    <li><a class="dropdown-item" href="servicos.php">Serviços</a></li>
                    <li><a class="dropdown-item" href="blog.php">Blog</a></li>
                    <li><a class="dropdown-item" href="perguntas.php">Perguntas</a></li>
                </ul>
            </li>
            
            <li><a href="contato.php">Contato</a></li>
        </ul>
    </header>

    <div class="container mt-4">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item"><a href="eventos.php">Eventos</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo htmlspecialchars($event['title']); ?></li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8">
                <div class="event-detail-card">
                    <div class="event-header-detail <?php echo $event['type']; ?>-header">
                        <span class="badge badge-<?php echo $event['type']; ?> mb-3">
                            <?php echo $eventManager->getTypeLabel($event['type']); ?>
                        </span>
                        <h1 class="event-title-detail"><?php echo htmlspecialchars($event['title']); ?></h1>
                    </div>

                    <div class="event-info-grid">
                        <div class="info-item">
                            <div class="info-icon">📅</div>
                            <div class="info-content">
                                <strong>Data</strong>
                                <p><?php echo $daysOfWeek[$dayOfWeek] . ', ' . $formattedDate; ?></p>
                            </div>
                        </div>

                        <div class="info-item">
                            <div class="info-icon">⏰</div>
                            <div class="info-content">
                                <strong>Horário</strong>
                                <p><?php echo $event['time'] . ' - Duração: ' . $event['duration']; ?></p>
                            </div>
                        </div>

                        <div class="info-item">
                            <div class="info-icon">📍</div>
                            <div class="info-content">
                                <strong>Local</strong>
                                <p><?php echo htmlspecialchars($event['location']); ?></p>
                            </div>
                        </div>

                        <?php if (!empty($event['priest'])): ?>
                            <div class="info-item">
                                <div class="info-icon">👨‍🦱</div>
                                <div class="info-content">
                                    <strong>Celebrante</strong>
                                    <p><?php echo htmlspecialchars($event['priest']); ?></p>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if (!empty($event['coordinator'])): ?>
                            <div class="info-item">
                                <div class="info-icon">👨‍👩‍👧‍👦</div>
                                <div class="info-content">
                                    <strong>Coordenação</strong>
                                    <p><?php echo htmlspecialchars($event['coordinator']); ?></p>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if (!empty($event['preacher'])): ?>
                            <div class="info-item">
                                <div class="info-icon">🎤</div>
                                <div class="info-content">
                                    <strong>Pregador</strong>
                                    <p><?php echo htmlspecialchars($event['preacher']); ?></p>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if (!empty($event['attractions'])): ?>
                            <div class="info-item">
                                <div class="info-icon">🎉</div>
                                <div class="info-content">
                                    <strong>Atrações</strong>
                                    <p><?php echo htmlspecialchars($event['attractions']); ?></p>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="event-description-detail">
                        <h3>Sobre o evento</h3>
                        <p><?php echo nl2br(htmlspecialchars($event['description'])); ?></p>
                    </div>

                    <div class="event-actions">
                        <a href="add-calendar.php?id=<?php echo $event['id']; ?>" class="btn btn-primary">
                            <i class="ri-calendar-event-line"></i>
                            Adicionar ao Calendário
                        </a>
                        <button onclick="shareEvent()" class="btn btn-outline-primary">