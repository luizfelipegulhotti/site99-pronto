<?php
// eventos.php

 include 'includes/header.php'; 

require_once 'classes/EventManager.php';


$eventManager = new EventManager();
$events = $eventManager->getAllEvents();
// Filtros
$searchTerm = $_GET['search'] ?? '';
$filterType = $_GET['filter'] ?? 'all';
$currentMonth = $_GET['month'] ?? 5; // Maio como padrão
$currentYear = $_GET['year'] ?? 2025;

if (!empty($searchTerm) || $filterType !== 'all') {
    $events = $eventManager->filterEvents($searchTerm, $filterType);
}

$monthNames = [
    1 => 'Janeiro', 2 => 'Fevereiro', 3 => 'Março', 4 => 'Abril',
    5 => 'Maio', 6 => 'Junho', 7 => 'Julho', 8 => 'Agosto',
    9 => 'Setembro', 10 => 'Outubro', 11 => 'Novembro', 12 => 'Dezembro'
];
?>
<link rel="stylesheet" href="css/eventos.css">
<body>

 

    <div class="container-eve">
        <div class="month-nav">
            <div class="month-title">
                <?php echo $monthNames[$currentMonth] . ' ' . $currentYear; ?>
            </div>
            <div class="month-buttons">
                <a href="?month=<?php echo ($currentMonth == 1) ? 12 : $currentMonth - 1; ?>&year=<?php echo ($currentMonth == 1) ? $currentYear - 1 : $currentYear; ?>" class="month-btn">&lt;</a>
                <a href="?month=<?php echo ($currentMonth == 12) ? 1 : $currentMonth + 1; ?>&year=<?php echo ($currentMonth == 12) ? $currentYear + 1 : $currentYear; ?>" class="month-btn">&gt;</a>
            </div>
        </div>

        <div class="controls-2">
            <form method="GET" class="search-filter">
                <input type="text" name="search" placeholder="Pesquisar eventos..." value="<?php echo htmlspecialchars($searchTerm); ?>">
                <select name="filter">
                    <option value="all" <?php echo $filterType === 'all' ? 'selected' : ''; ?>>Todos os tipos</option>
                    <option value="missa" <?php echo $filterType === 'missa' ? 'selected' : ''; ?>>Missas</option>
                    <option value="formacao" <?php echo $filterType === 'formacao' ? 'selected' : ''; ?>>Formação</option>
                    <option value="caridade" <?php echo $filterType === 'caridade' ? 'selected' : ''; ?>>Caridade</option>
                    <option value="retiro" <?php echo $filterType === 'retiro' ? 'selected' : ''; ?>>Retiros</option>
                    <option value="festa" <?php echo $filterType === 'festa' ? 'selected' : ''; ?>>Festas</option>
                </select>
                <button type="submit" class="btn-search">Buscar</button>
                <input type="hidden" name="month" value="<?php echo $currentMonth; ?>">
                <input type="hidden" name="year" value="<?php echo $currentYear; ?>">
            </form>
            
            <a href="calendario.php" id="btn-view-calendar" class="btn btn-primary">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                </svg>
                Ver Calendário Completo
            </a>
        </div>

        <div class="event-grid" id="events-container">
            <?php if (empty($events)): ?>
                <div class="empty-state">
                    <h3>Nenhum evento encontrado</h3>
                    <p>Tente modificar sua pesquisa ou filtros.</p>
                </div>
            <?php else: ?>
                <?php foreach ($events as $event): ?>
                    <?php
                    $date = new DateTime($event['date']);
                    $formattedDate = $date->format('d/m/Y');
                    ?>
                    <div class="event-card">
                        <div class="event-header <?php echo $event['type']; ?>-header">
                            <span class="badge badge-<?php echo $event['type']; ?>">
                                <?php echo $eventManager->getTypeLabel($event['type']); ?>
                            </span>
                        </div>
                        <div class="event-body">
                            <h3 class="event-title"><?php echo htmlspecialchars($event['title']); ?></h3>
                            <div class="event-details">
                                <div class="event-detail">
                                    <span class="event-icon">📅</span>
                                    <span><?php echo $formattedDate; ?></span>
                                </div>
                                <div class="event-detail">
                                    <span class="event-icon">⏰</span>
                                    <span><?php echo $event['time'] . ' (' . $event['duration'] . ')'; ?></span>
                                </div>
                                <div class="event-detail">
                                    <span class="event-icon">📍</span>
                                    <span><?php echo htmlspecialchars($event['location']); ?></span>
                                </div>
                                
                                <?php if (!empty($event['priest'])): ?>
                                    <div class="event-detail">
                                        <span class="event-icon">👨‍🦱</span>
                                        <span>Celebrante: <?php echo htmlspecialchars($event['priest']); ?></span>
                                    </div>
                                <?php elseif (!empty($event['coordinator'])): ?>
                                    <div class="event-detail">
                                        <span class="event-icon">👨‍👩‍👧‍👦</span>
                                        <span>Coordenação: <?php echo htmlspecialchars($event['coordinator']); ?></span>
                                    </div>
                                <?php elseif (!empty($event['preacher'])): ?>
                                    <div class="event-detail">
                                        <span class="event-icon">🎤</span>
                                        <span>Pregador: <?php echo htmlspecialchars($event['preacher']); ?></span>
                                    </div>
                                <?php elseif (!empty($event['attractions'])): ?>
                                    <div class="event-detail">
                                        <span class="event-icon">🎉</span>
                                        <span>Atrações: <?php echo htmlspecialchars($event['attractions']); ?></span>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <p class="event-description"><?php echo htmlspecialchars($event['description']); ?></p>
                        </div>
                        <div class="event-footer">
                            <a href="add-calendar.php?id=<?php echo $event['id']; ?>" class="btn-calendar">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                </svg>
                                Adicionar ao Calendário
                            </a>
                            <a href="event-details.php?id=<?php echo $event['id']; ?>" class="btn-details">Ver Detalhes</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>


<?php include 'includes/footer.php'; ?>