<?php
// classes/EventManager.php
class EventManager {
    private $events;
    
    public function __construct() {
        $this->loadEvents();
    }
    
    private function loadEvents() {
        // Em uma aplicação real, estes dados viriam de um banco de dados
        $this->events = [
            [
                'id' => 1,
                'title' => 'Missa Domingo',
                'type' => 'missa',
                'date' => '2025-05-11',
                'time' => '08:00',
                'duration' => '1 hora',
                'location' => 'Igreja Matriz',
                'description' => 'Missa dominical com celebração da Santa Eucaristia. Venha participar deste momento de fé e comunhão.',
                'priest' => 'Pe. João Paulo',
                'coordinator' => '',
                'preacher' => '',
                'attractions' => ''
            ],
            [
                'id' => 2,
                'title' => 'Missa Domingo',
                'type' => 'missa',
                'date' => '2025-05-11',
                'time' => '19:00',
                'duration' => '1 hora',
                'location' => 'Igreja Matriz',
                'description' => 'Missa dominical com celebração da Santa Eucaristia no período noturno.',
                'priest' => 'Pe. Antônio Carlos',
                'coordinator' => '',
                'preacher' => '',
                'attractions' => ''
            ],
            [
                'id' => 3,
                'title' => 'Catequese para Primeira Eucaristia',
                'type' => 'formacao',
                'date' => '2025-05-10',
                'time' => '14:00',
                'duration' => '2 horas',
                'location' => 'Salão Paroquial',
                'description' => 'Encontro formativo para crianças que se preparam para receber a Primeira Eucaristia.',
                'priest' => '',
                'coordinator' => 'Maria Auxiliadora',
                'preacher' => '',
                'attractions' => ''
            ],
            [
                'id' => 4,
                'title' => 'Campanha do Agasalho',
                'type' => 'caridade',
                'date' => '2025-05-15',
                'time' => '09:00',
                'duration' => '4 horas',
                'location' => 'Centro Comunitário',
                'description' => 'Arrecadação e distribuição de agasalhos para famílias carentes em preparação para o inverno.',
                'priest' => '',
                'coordinator' => 'Pastoral da Caridade',
                'preacher' => '',
                'attractions' => ''
            ],
            [
                'id' => 5,
                'title' => 'Retiro para Jovens',
                'type' => 'retiro',
                'date' => '2025-05-24',
                'time' => '08:00',
                'duration' => '2 dias',
                'location' => 'Casa de Retiros São José',
                'description' => 'Retiro espiritual para jovens com o tema "Chamados à Santidade". Inscrições abertas na secretaria paroquial.',
                'priest' => '',
                'coordinator' => '',
                'preacher' => 'Pe. Lucas Silva',
                'attractions' => ''
            ],
            [
                'id' => 6,
                'title' => 'Festa de Nossa Senhora',
                'type' => 'festa',
                'date' => '2025-05-24',
                'time' => '19:00',
                'duration' => '5 horas',
                'location' => 'Pátio da Igreja',
                'description' => 'Celebração festiva em honra à padroeira da paróquia, com missa solene, procissão e quermesse beneficente.',
                'priest' => '',
                'coordinator' => '',
                'preacher' => '',
                'attractions' => 'Missa, Procissão, Quermesse, Apresentações musicais'
            ],
            [
                'id' => 7,
                'title' => 'Formação para Ministros da Eucaristia',
                'type' => 'formacao',
                'date' => '2025-05-17',
                'time' => '15:00',
                'duration' => '3 horas',
                'location' => 'Sala Dom Bosco',
                'description' => 'Encontro de formação para ministros extraordinários da Sagrada Comunhão.',
                'priest' => '',
                'coordinator' => 'Diácono Paulo Roberto',
                'preacher' => '',
                'attractions' => ''
            ],
            [
                'id' => 8,
                'title' => 'Missa de Nossa Senhora',
                'type' => 'missa',
                'date' => '2025-05-24',
                'time' => '10:00',
                'duration' => '1h30',
                'location' => 'Igreja Matriz',
                'description' => 'Missa solene em comemoração ao dia de Nossa Senhora Auxiliadora, padroeira da nossa paróquia.',
                'priest' => 'Dom Pedro Almeida (Bispo Diocesano)',
                'coordinator' => '',
                'preacher' => '',
                'attractions' => ''
            ],
            [
                'id' => 9,
                'title' => 'Visita aos Enfermos',
                'type' => 'caridade',
                'date' => '2025-05-14',
                'time' => '14:00',
                'duration' => '3 horas',
                'location' => 'Hospital Municipal',
                'description' => 'Visita aos enfermos para levar conforto espiritual e a Santa Comunhão.',
                'priest' => '',
                'coordinator' => 'Pastoral da Saúde',
                'preacher' => '',
                'attractions' => ''
            ]
        ];
    }
    
    public function getAllEvents() {
        // Ordenar eventos por data
        usort($this->events, function($a, $b) {
            return strtotime($a['date']) - strtotime($b['date']);
        });
        
        return $this->events;
    }
    
    public function getEventById($id) {
        foreach ($this->events as $event) {
            if ($event['id'] == $id) {
                return $event;
            }
        }
        return null;
    }
    
    public function filterEvents($searchTerm = '', $filterType = 'all') {
        $filteredEvents = [];
        
        foreach ($this->events as $event) {
            $matchesSearch = empty($searchTerm) || 
                           stripos($event['title'], $searchTerm) !== false ||
                           stripos($event['description'], $searchTerm) !== false ||
                           stripos($event['location'], $searchTerm) !== false;
            
            $matchesType = $filterType === 'all' || $event['type'] === $filterType;
            
            if ($matchesSearch && $matchesType) {
                $filteredEvents[] = $event;
            }
        }
        
        // Ordenar eventos filtrados por data
        usort($filteredEvents, function($a, $b) {
            return strtotime($a['date']) - strtotime($b['date']);
        });
        
        return $filteredEvents;
    }
    
    public function getEventsByMonth($month, $year) {
        $monthEvents = [];
        
        foreach ($this->events as $event) {
            $eventDate = new DateTime($event['date']);
            if ($eventDate->format('n') == $month && $eventDate->format('Y') == $year) {
                $monthEvents[] = $event;
            }
        }
        
        return $monthEvents;
    }
    
    public function getTypeLabel($type) {
        $labels = [
            'missa' => 'Missa',
            'formacao' => 'Formação',
            'caridade' => 'Caridade',
            'retiro' => 'Retiro',
            'festa' => 'Festa'
        ];
        
        return $labels[$type] ?? ucfirst($type);
    }
    
    public function getUpcomingEvents($limit = 5) {
        $today = date('Y-m-d');
        $upcomingEvents = [];
        
        foreach ($this->events as $event) {
            if ($event['date'] >= $today) {
                $upcomingEvents[] = $event;
            }
        }
        
        // Ordenar por data
        usort($upcomingEvents, function($a, $b) {
            return strtotime($a['date']) - strtotime($b['date']);
        });
        
        return array_slice($upcomingEvents, 0, $limit);
    }
    
    // Método para adicionar evento (para futuras implementações)
    public function addEvent($eventData) {
        $eventData['id'] = $this->getNextId();
        $this->events[] = $eventData;
        return $eventData['id'];
    }
    
    // Método para atualizar evento
    public function updateEvent($id, $eventData) {
        foreach ($this->events as $key => $event) {
            if ($event['id'] == $id) {
                $this->events[$key] = array_merge($event, $eventData);
                return true;
            }
        }
        return false;
    }
    
    // Método para deletar evento
    public function deleteEvent($id) {
        foreach ($this->events as $key => $event) {
            if ($event['id'] == $id) {
                unset($this->events[$key]);
                $this->events = array_values($this->events); // Reindexar array
                return true;
            }
        }
        return false;
    }
    
    private function getNextId() {
        $maxId = 0;
        foreach ($this->events as $event) {
            if ($event['id'] > $maxId) {
                $maxId = $event['id'];
            }
        }
        return $maxId + 1;
    }
}