<?php include 'includes/header.php'; ?>
<link rel="stylesheet" href="css/santos.css">

    <div class="main-layout">
  
        <div class="circles-section">
            <div class="content-wrapper">
                <div class="container">
                    <div class="main-circle">
                        <img src="img/Sao-Bento-e-a-Medalha.jpeg" alt="Imagem Principal" class="main-image" id="mainImage">
                    </div>

                    <div class="orbital-system" id="orbitalSystem"></div>

                    <div class="controls">
                        <div class="arrow arrow-left" id="prevBtn"></div>
                        <div class="arrow arrow-right" id="nextBtn"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- SEÇÃO DO TEXTO - LADO DIREITO -->
        <div class="text-section">
            <div class="saobento" data-aos="fade-up">
                <h1 id="nome">Santo Antônio</h1>
                <hr>
                <p id="texto">Selecione um santo no círculo ao lado para ver sua história...</p>
            </div>
        </div>
    </div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
 
        const items = [
            {
                id: 1,
                smallImage: "img/santoantoniomenor.png",
               
                bgImage: "img/santoantonio_1920x1920.png",
                text: "Santo António de Pádua, também conhecido como Santo António de Lisboa, é um dos santos católicos mais venerados e populares, particularmente no Brasil e em Portugal. É celebrado em 13 de junho. É muito conhecido por interceder por quem deseja encontrar o amor, resolver problemas amorosos ou ter um casamento feliz.   ",
                nome: "Santo Antônio"
                
            },
            {
                id: 2,
                smallImage: "img/santaterezinha.png",
                
                bgImage: "img/santaterezinha_1920x1920.png",
                text: "Santa Teresa de Lisieux, também conhecida como Santa Teresinha do Menino Jesus, foi uma freira carmelita francesa (1873-1897), canonizada pela Igreja Católica. Destacou-se por sua vida de grande humildade, simplicidade e confiança em Deus, e por sua espiritualidade da infância espiritual, que consiste em confiar em Deus como uma criança confia em seu pai. Os Milagres Atribuídos a Santa Terezinha - Um dos casos mais famosos é o da Irmã Louise de Jesus, que sofria de tuberculose em estado avançado. Depois de pedir a intercessão de Santa Terezinha, Irmã Louise teve uma visão da Santa segurando um crucifixo, e logo em seguida, sua doença desapareceu completamente. ",
                nome: "Santa Terezinha"
            },
            {
                id: 3,
                smallImage: "img/saojosemenor.jpg",
              
                bgImage: "img/saojose_1920x1920.jpg",
                text:"São José é uma figura central na religião católica, considerado esposo de Maria e pai adotivo de Jesus. Ele é celebrado no dia 19 de março e é venerado como padroeiro dos trabalhadores, das famílias e do estado do Ceará. São José é também patrono universal da Igreja Católica. ão José é o esposo da Virgem Maria e o pai adotivo de Jesus, desempenhando um papel crucial na história da salvação. Era um carpinteiro, uma profissão que representa o trabalho e a dedicação. Foi declarado patrono universal da Igreja pelo Papa Pio IX. É comemorado em 19 de março, dia em que a Igreja Católica celebra a festa de São José. Milagre da fonte -Um jovem pastor, obedecendo à instrução de mover a rocha, encontrou uma fonte de água pura sob ela, um milagre discreto mas com grande significado, segundo Regina Fidei. ",
                nome:"São José"
            },
            {
                id: 4,
                smallImage: "img/carlomenor.png",
              
                bgImage: "img/carlodefundo.png",
                text:"Carlo Acutis foi um adolescente italiano, beatificado pela Igreja Católica em 2020, conhecido por sua paixão pela tecnologia e sua fé. Ele morreu de leucemia em 2006, aos 15 anos, mas seu legado perdura. Era um gênio da informática e usava seu conhecimento para criar sites e divulgar a fé, sendo apelidado de influenciador de Deus.  Desenvolveu um site para catalogar milagres eucarísticos, mostrando seu amor por Jesus na Eucaristia. Foi beatificado em 2020 devido a um milagre atribuído a ele, a cura de um menino no Brasil com uma doença congênita. Um segundo milagre foi reconhecido, envolvendo a cura de uma jovem estudante universitária italiana que sofreu um traumatismo craniano, segundo a BBC. ",
                nome:"Beato Carlos Acutis"
            },
            {
                id: 5,
                smallImage: "img/saojoaopaulomenor.png",
               
                bgImage: "img/saojoaopaulo_1920x1920.jpg",
                text:"São João Paulo II é padroeiro dos jovens, das famílias, da Jornada Mundial da Juventude e também co-padroeiro da Europa. Ele também é considerado o Papa da Juventude e Papa Peregrino, devido à sua dedicação à Igreja e às suas viagens ao redor do mundo. João Paulo II foi canonizado, tornando-se santo, devido à sua vida de grande fé, virtudes cristãs e milagres atribuídos à sua intercessão. A Igreja Católica reconheceu que João Paulo II vivia uma vida virtuosa, com um profundo relacionamento com Deus, e que sua morte foi seguida de milagres, como a cura de uma freira francesa que sofria de mal de Parkinson.  ",
                nome:"São João Paulo II"
            },
            {
                id: 6,
                smallImage: "img/medalha.jpg",
               
                bgImage: "img/saodentodefundo.png",
                text:"São Bento é o santo padroeiro da Europa, dos arquitetos e é comumente invocado como protetor contra o mal, incluindo a inveja, o olho gordo, sequestros, assaltos e brigas em família. Além disso, a tradição popular também o considera protetor contra a picada de cobras. São Bento representa um conjunto de valores e símbolos que o tornam uma figura central na cultura cristã, particularmente na cultura católica. É o santo padroeiro da Europa e da Alemanha, e é reverenciado como protetor contra o mal, tentações, influências malignas e perigos espirituais. A sua história e os ensinamentos que inspiraram a fundação da Ordem dos Beneditinos são fontes de inspiração e devoção para muitos cristãos. São Bento mostrou com seus milagres possuir muitos dons. Ele tinha o dom da profecia, o poder da bilocação, enxergava o demônio, ensinou conscientemente através de sonhos, exorcizou, curou, operou ressurreições e, sobretudo, realizou muitos milagres por meio de uma oração e de uma benção extremamente poderosas.",
                nome:"São Bento"
            }
        ];

        const orbitalSystem = document.getElementById('orbitalSystem');
        const mainImage = document.getElementById('mainImage');
        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');
        const text = document.getElementById('texto');
        const nome = document.getElementById('nome');
        let currentIndex = 0;
        let rotationDegree = 0;
        const totalItems = items.length;

        // Função para posicionar os círculos pequenos ao redor do círculo principal
        function createOrbitalItems() {
            const orbitalWidth = orbitalSystem.offsetWidth;
            const orbitalHeight = orbitalSystem.offsetHeight;
            const centerX = orbitalWidth / 2;
            const centerY = orbitalHeight / 2;
            const radius = orbitalWidth / 2 - 50; // Raio da órbita (metade da largura do sistema orbital menos a metade do tamanho do círculo)

            items.forEach((item, index) => {
                // Calcular ângulo para posicionamento uniforme
                const angle = (360 / totalItems) * index;
                const radians = angle * (Math.PI / 180);

                // Calcular posição X e Y no círculo de forma centralizada
                const x = centerX + Math.cos(radians) * radius;
                const y = centerY + Math.sin(radians) * radius;

                // Criar o círculo pequeno
                const smallCircle = document.createElement('div');
                smallCircle.className = 'small-circle';
                smallCircle.style.left = `${x}px`;
                smallCircle.style.top = `${y}px`;
                smallCircle.style.transform = `translate(-50%, -50%) rotate(${-rotationDegree}deg)`; // Manter imagem na orientação correta
                smallCircle.setAttribute('data-index', index);

                // Adicionar imagem ao círculo pequeno
                const img = document.createElement('img');
                img.src = item.smallImage;
                img.alt = `Miniatura ${index + 1}`;
                smallCircle.appendChild(img);

                // Adicionar evento de clique
                smallCircle.addEventListener('click', function () {
                    setActiveItem(index);
                });

                orbitalSystem.appendChild(smallCircle);
            });

            // Definir item inicial
            setActiveItem(0, false);
        }

        // Função para atualizar o item ativo
        function setActiveItem(index, animate = true) {
            currentIndex = index;

            // Atualizar classes ativas
            document.querySelectorAll('.small-circle').forEach((circle, i) => {
                // Remover a classe active de todos os círculos
                if (i !== index && circle.classList.contains('active')) {
                    circle.classList.remove('active');
                }

                // Adicionar classe active apenas ao círculo selecionado
                if (i === index && !circle.classList.contains('active')) {
                    circle.classList.add('active');
                }
            });

            // Atualizar imagem principal com fade
            mainImage.style.opacity = '0';
            setTimeout(() => {
                mainImage.src = items[index].largeImage;
                mainImage.style.opacity = '1';
            }, 300);

            // Atualizar imagem de fundo
            document.body.style.backgroundImage = `url(${items[index].bgImage})`;


               document.getElementById('texto').textContent = items[index].text;
            document.getElementById('nome').textContent = items[index].nome;
            // Girar o sistema orbital para posicionar o item selecionado no topo
            if (animate) {
                const targetRotation = 360 - ((360 / totalItems) * index);
                rotateToPosition(targetRotation);
            }
        }

        // Função para girar o sistema orbital para uma posição específica
        function rotateToPosition(targetDegree) {
            // Calcular o caminho mais curto para girar
            let diff = (targetDegree - rotationDegree) % 360;
            if (diff < -180) diff += 360;
            if (diff > 180) diff -= 360;

            // Atualizar a rotação
            rotationDegree = (rotationDegree + diff) % 360;

            // Manter a orientação das imagens nos círculos pequenos
            document.querySelectorAll('.small-circle').forEach(circle => {
                circle.style.transform = `translate(-50%, -50%) rotate(${-rotationDegree}deg)`;
            });

            // Atualizar a transformação do sistema orbital considerando sua centralização
            orbitalSystem.style.transform = `translate(-50%, -50%) rotate(${rotationDegree}deg)`;
        }

        // Navegar para o próximo item
        function goToNext() {
            const nextIndex = (currentIndex + 1) % totalItems;
            setActiveItem(nextIndex);
        }

        // Navegar para o item anterior
        function goToPrev() {
            const prevIndex = (currentIndex - 1 + totalItems) % totalItems;
            setActiveItem(prevIndex);
        }

        // Event listeners para os botões de navegação
        nextBtn.addEventListener('click', goToNext);
        prevBtn.addEventListener('click', goToPrev);

        // Teclas de seta para navegação
        document.addEventListener('keydown', function (e) {
            if (e.key === 'ArrowRight') {
                goToNext();
            } else if (e.key === 'ArrowLeft') {
                goToPrev();
            }
        });

        // Inicializar o sistema orbital
        createOrbitalItems();
    });
</script>

<?php include 'includes/footer.php'; ?>