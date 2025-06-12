<?php 
// Configurações da página
$pageTitle = "Nosso Blog - Secretaria da Igreja";
$pageDescription = "Reflexões, notícias e eventos da nossa comunidade paroquial";
$currentPage = "blog";

// Incluir o header
include 'includes/header.php'; 
?>
<link rel="stylesheet" href="css/blog.css">
<!-- Banner da página -->
<div class="page-banner">
    <div class="container-1">
        <h1>Nosso Blog</h1>
        <p>Reflexões, notícias e eventos da nossa comunidade paroquial</p>
    </div>
</div>

<div class="container">
    <div class="row">
        <!-- Conteúdo Principal -->
        <div class="col-lg-8">
            <!-- Post em Destaque -->
            <div class="featured-post">
                <span class="featured-badge">Destaque</span>
                <div class="featured-post-content">
                    <div class="featured-post-meta">
                        <span><i class="ri-calendar-line"></i> 12 Abr, 2025</span>
                        <span><i class="ri-user-line"></i> Padre José</span>
                    </div>
                    <h3><a href="#">Reflexão de Páscoa: O Significado da Ressurreição para os Cristãos Hoje</a></h3>
                    <a href="#" class="read-more">Ler mais <i class="ri-arrow-right-line"></i></a>
                </div>
            </div>

            <!-- Posts do Blog -->
            <div class="blog-post">
                <div class="blog-post-img">
                    <img src="/api/placeholder/800/400" alt="Imagem do Post">
                </div>
                <div class="blog-post-content">
                    <a href="#" class="blog-post-category">Liturgia</a>
                    <h3><a href="#">O Significado dos Símbolos na Celebração Eucarística</a></h3>
                    <div class="blog-post-meta">
                        <span><i class="ri-calendar-line"></i> 5 Maio, 2025</span>
                        <span><i class="ri-user-line"></i> Diácono Paulo</span>
                        <span><i class="ri-chat-1-line"></i> 12 Comentários</span>
                    </div>
                    <p>A celebração eucarística está repleta de símbolos ricos em significado. Neste artigo, exploramos os principais elementos e gestos da Santa Missa e o que eles representam para nossa fé católica...</p>
                    <a href="#" class="read-more">Continuar lendo <i class="ri-arrow-right-line"></i></a>
                </div>
            </div>

            <div class="blog-post">
                <div class="blog-post-img">
                    <img src="/api/placeholder/800/400" alt="Imagem do Post">
                </div>
                <div class="blog-post-content">
                    <a href="#" class="blog-post-category">Catequese</a>
                    <h3><a href="#">Como Preparar Seu Filho para a Primeira Eucaristia</a></h3>
                    <div class="blog-post-meta">
                        <span><i class="ri-calendar-line"></i> 28 Abril, 2025</span>
                        <span><i class="ri-user-line"></i> Maria Santos</span>
                        <span><i class="ri-chat-1-line"></i> 8 Comentários</span>
                    </div>
                    <p>A Primeira Eucaristia é um momento importante na vida de fé das crianças católicas. Descubra como os pais podem ajudar seus filhos a se prepararem espiritualmente para este sacramento...</p>
                    <a href="#" class="read-more">Continuar lendo <i class="ri-arrow-right-line"></i></a>
                </div>
            </div>

            <div class="blog-post">
                <div class="blog-post-img">
                    <img src="/api/placeholder/800/400" alt="Imagem do Post">
                </div>
                <div class="blog-post-content">
                    <a href="#" class="blog-post-category">Eventos</a>
                    <h3><a href="#">Programação da Festa do Padroeiro 2025: Participe das Celebrações!</a></h3>
                    <div class="blog-post-meta">
                        <span><i class="ri-calendar-line"></i> 20 Abril, 2025</span>
                        <span><i class="ri-user-line"></i> Equipe Pastoral</span>
                        <span><i class="ri-chat-1-line"></i> 5 Comentários</span>
                    </div>
                    <p>Nossa paróquia se prepara para celebrar a festa de seu padroeiro com uma programação especial que inclui novena, procissão, quermesse e muito mais. Confira os detalhes e participe!</p>
                    <a href="#" class="read-more">Continuar lendo <i class="ri-arrow-right-line"></i></a>
                </div>
            </div>

            <div class="blog-post">
                <div class="blog-post-img">
                    <img src="/api/placeholder/800/400" alt="Imagem do Post">
                </div>
                <div class="blog-post-content">
                    <a href="#" class="blog-post-category">Vida de Santos</a>
                    <h3><a href="#">Santa Teresinha do Menino Jesus: O Caminho da Pequenez</a></h3>
                    <div class="blog-post-meta">
                        <span><i class="ri-calendar-line"></i> 15 Abril, 2025</span>
                        <span><i class="ri-user-line"></i> Irmã Clara</span>
                        <span><i class="ri-chat-1-line"></i> 10 Comentários</span>
                    </div>
                    <p>Conheça mais sobre a vida e espiritualidade de Santa Teresinha do Menino Jesus, a carmelita francesa que nos ensinou o "pequeno caminho" da santidade através das ações simples do cotidiano...</p>
                    <a href="#" class="read-more">Continuar lendo <i class="ri-arrow-right-line"></i></a>
                </div>
            </div>

            <!-- Paginação -->
            <nav aria-label="Navegação da página">
                <ul class="pagination">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" aria-label="Anterior">
                            <i class="ri-arrow-left-s-line"></i>
                        </a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Próximo">
                            <i class="ri-arrow-right-s-line"></i>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>

        <!-- Sidebar -->
        <div class="col-lg-4 blog-sidebar">
            <!-- Busca -->
            <div class="blog-search">
                <form class="search-form" method="GET" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <input type="text" name="search" placeholder="Buscar no blog..." value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
                    <button type="submit"><i class="ri-search-line"></i></button>
                </form>
            </div>

            <!-- Categorias -->
            <div class="blog-categories">
                <h4>Categorias</h4>
                <ul class="category-list">
                    <li><a href="?categoria=liturgia">Liturgia <span>15</span></a></li>
                    <li><a href="?categoria=catequese">Catequese <span>12</span></a></li>
                    <li><a href="?categoria=eventos">Eventos <span>8</span></a></li>
                    <li><a href="?categoria=vida-santos">Vida de Santos <span>10</span></a></li>
                    <li><a href="?categoria=espiritualidade">Espiritualidade <span>14</span></a></li>
                    <li><a href="?categoria=familia">Família <span>7</span></a></li>
                    <li><a href="?categoria=pastoral">Pastoral <span>5</span></a></li>
                </ul>
            </div>

            <!-- Posts Recentes -->
            <div class="recent-posts">
                <h4>Posts Recentes</h4>
                <div class="recent-post-item">
                    <div class="recent-post-img">
                        <img src="/api/placeholder/70/70" alt="Post Recente">
                    </div>
                    <div class="recent-post-info">
                        <h6><a href="#">Como Viver o Tempo da Quaresma em Família</a></h6>
                        <p>10 Abril, 2025</p>
                    </div>
                </div>
                <div class="recent-post-item">
                    <div class="recent-post-img">
                        <img src="/api/placeholder/70/70" alt="Post Recente">
                    </div>
                    <div class="recent-post-info">
                        <h6><a href="#">A Importância da Adoração Eucarística</a></h6>
                        <p>5 Abril, 2025</p>
                    </div>
                </div>
                <div class="recent-post-item">
                    <div class="recent-post-img">
                        <img src="/api/placeholder/70/70" alt="Post Recente">
                    </div>
                    <div class="recent-post-info">
                        <h6><a href="#">Novena a Nossa Senhora das Graças</a></h6>
                        <p>1 Abril, 2025</p>
                    </div>
                </div>
                <div class="recent-post-item">
                    <div class="recent-post-img">
                        <img src="/api/placeholder/70/70" alt="Post Recente">
                    </div>
                    <div class="recent-post-info">
                        <h6><a href="#">Como Rezar o Terço da Misericórdia</a></h6>
                        <p>28 Março, 2025</p>
                    </div>
                </div>
            </div>

            <!-- Tags -->
            <div class="tag-cloud">
                <h4>Tags</h4>
                <div class="tags">
                    <a href="?tag=missa" class="tag">Missa</a>
                    <a href="?tag=oracao" class="tag">Oração</a>
                    <a href="?tag=evangelho" class="tag">Evangelho</a>
                    <a href="?tag=papa-francisco" class="tag">Papa Francisco</a>
                    <a href="?tag=maria" class="tag">Maria</a>
                    <a href="?tag=santos" class="tag">Santos</a>
                    <a href="?tag=sacramentos" class="tag">Sacramentos</a>
                    <a href="?tag=biblia" class="tag">Bíblia</a>
                    <a href="?tag=catequese" class="tag">Catequese</a>
                    <a href="?tag=juventude" class="tag">Juventude</a>
                    <a href="?tag=familia" class="tag">Família</a>
                    <a href="?tag=quaresma" class="tag">Quaresma</a>
                </div>
            </div>

            <!-- Newsletter -->
            <div class="subscribe-section">
                <h4>Receba Nossas Atualizações</h4>
                <p>Inscreva-se para receber as últimas notícias e reflexões da nossa paróquia.</p>
                <form method="POST" action="newsletter.php" class="newsletter-form">
                    <input type="email" name="email" placeholder="Seu e-mail" required>
                    <button type="submit" class="btn btn-primary">Inscrever-se</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php 
// Incluir o footer
include 'includes/footer.php'; 
?>