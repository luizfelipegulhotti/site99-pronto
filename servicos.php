<?php
// Configurações da página
$pageTitle = "Serviços - Secretaria da Igreja";
$currentPage = "servicos";
include 'includes/header.php';
?>
<link rel="stylesheet" href="css/servicos.css">
    <main class="container-servicos">
        <section class="intro">
            <h2>Bem-vindo ao Sistema de Agendamento</h2>
            <p>Este sistema permite que você solicite e agende diversos serviços religiosos com padres e ministros da eucaristia de nossa paróquia.</p>
        </section>
        
        <section id="servicos" class="services">
            <h2>Nossos Serviços</h2>
            <div class="service-grid">
                <div class="service-card">
                    <h3>Missa Dominical</h3>
                    <p>Reserva de espaço para participação nas missas dominicais, com horários flexíveis.</p>
                    <a href="#agendamento" class="btn-1" onclick="preencherServico('Missa Dominical')">Agendar</a>
                </div>
                
                <div class="service-card">
                    <h3>Confissão</h3>
                    <p>Agendamento de confissão individual com os padres da paróquia.</p>
                    <a href="#agendamento" class="btn-1" onclick="preencherServico('Confissão')">Agendar</a>
                </div>
                
                <div class="service-card">
                    <h3>Comunhão para Enfermos</h3>
                    <p>Solicite a visita de um ministro da eucaristia para levar a comunhão a pessoas enfermas ou idosas.</p>
                    <a href="#agendamento" class="btn-1" onclick="preencherServico('Comunhão para Enfermos')">Agendar</a>
                </div>
                
                <div class="service-card">
                    <h3>Batismo</h3>
                    <p>Agendamento para realização de batismos e cadastro para preparação dos pais e padrinhos.</p>
                    <a href="#agendamento" class="btn-1" onclick="preencherServico('Batismo')">Agendar</a>
                </div>
                
                <div class="service-card">
                    <h3>Casamento</h3>
                    <p>Agendamento e orientação para realização de matrimônios na igreja.</p>
                    <a href="#agendamento" class="btn-1" onclick="preencherServico('Casamento')">Agendar</a>
                </div>
                
                <div class="service-card">
                    <h3>Bênção de Casa</h3>
                    <p>Solicite a visita de um padre para abençoar sua residência ou local de trabalho.</p>
                    <a href="#agendamento" class="btn-1" onclick="preencherServico('Bênção de Casa')">Agendar</a>
                </div>
            </div>
        </section>
        
        <section id="agendamento" class="form-section">
            <h2>Formulário de Agendamento</h2>
            
            <?php
            // Processar formulário se foi enviado
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Aqui você pode processar os dados do formulário
                // Por exemplo, salvar no banco de dados, enviar email, etc.
                
                $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
                $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
                $telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING);
                $servico = filter_input(INPUT_POST, 'servico', FILTER_SANITIZE_STRING);
                $data = filter_input(INPUT_POST, 'data', FILTER_SANITIZE_STRING);
                $horario = filter_input(INPUT_POST, 'horario', FILTER_SANITIZE_STRING);
                $observacoes = filter_input(INPUT_POST, 'observacoes', FILTER_SANITIZE_STRING);
                
                // Validação básica
                if ($nome && $email && $telefone && $servico && $data && $horario) {
                    // Aqui você processaria os dados (salvar no banco, enviar email, etc.)
                    echo '<div class="alert alert-success">Solicitação enviada com sucesso! Em breve entraremos em contato para confirmar o agendamento.</div>';
                    
                    // Limpar variáveis para não preencher o formulário novamente
                    $nome = $email = $telefone = $servico = $data = $horario = $observacoes = '';
                } else {
                    echo '<div class="alert alert-danger">Por favor, preencha todos os campos obrigatórios.</div>';
                }
            }
            ?>
            
            <form id="servicoForm" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <div class="form-row">
                    <label for="nome">Nome Completo:</label>
                    <input type="text" id="nome" name="nome" value="<?php echo isset($nome) ? htmlspecialchars($nome) : ''; ?>" required>
                </div>
                
                <div class="form-row">
                    <label for="email">E-mail:</label>
                    <input type="email" id="email" name="email" value="<?php echo isset($email) ? htmlspecialchars($email) : ''; ?>" required>
                </div>
                
                <div class="form-row">
                    <label for="telefone">Telefone:</label>
                    <input type="tel" id="telefone" name="telefone" value="<?php echo isset($telefone) ? htmlspecialchars($telefone) : ''; ?>" required>
                </div>
                
                <div class="form-row">
                    <label for="servico">Tipo de Serviço:</label>
                    <select id="servico" name="servico" onchange="mostrarCamposAdicionais()" required>
                        <option value="">Selecione um serviço</option>
                        <option value="Missa Dominical" <?php echo (isset($servico) && $servico == 'Missa Dominical') ? 'selected' : ''; ?>>Missa Dominical</option>
                        <option value="Confissão" <?php echo (isset($servico) && $servico == 'Confissão') ? 'selected' : ''; ?>>Confissão</option>
                        <option value="Comunhão para Enfermos" <?php echo (isset($servico) && $servico == 'Comunhão para Enfermos') ? 'selected' : ''; ?>>Comunhão para Enfermos</option>
                        <option value="Batismo" <?php echo (isset($servico) && $servico == 'Batismo') ? 'selected' : ''; ?>>Batismo</option>
                        <option value="Casamento" <?php echo (isset($servico) && $servico == 'Casamento') ? 'selected' : ''; ?>>Casamento</option>
                        <option value="Bênção de Casa" <?php echo (isset($servico) && $servico == 'Bênção de Casa') ? 'selected' : ''; ?>>Bênção de Casa</option>
                    </select>
                </div>
                
                <div class="form-row">
                    <label for="data">Data Preferencial:</label>
                    <input type="date" id="data" name="data" value="<?php echo isset($data) ? htmlspecialchars($data) : ''; ?>" required>
                </div>
                
                <div class="form-row">
                    <label for="horario">Horário Preferencial:</label>
                    <input type="time" id="horario" name="horario" value="<?php echo isset($horario) ? htmlspecialchars($horario) : ''; ?>" required>
                </div>
                
                <!-- Campos específicos para Comunhão de Enfermos -->
                <div id="camposEnfermos" class="hidden">
                    <div class="form-row">
                        <label for="enderecoEnfermo">Endereço do Enfermo:</label>
                        <input type="text" id="enderecoEnfermo" name="enderecoEnfermo">
                    </div>
                    
                    <div class="form-row">
                        <label for="nomeEnfermo">Nome do Enfermo:</label>
                        <input type="text" id="nomeEnfermo" name="nomeEnfermo">
                    </div>
                </div>
                
                <!-- Campos específicos para Batismo -->
                <div id="camposBatismo" class="hidden">
                    <div class="form-row">
                        <label for="nomeCrianca">Nome da Criança:</label>
                        <input type="text" id="nomeCrianca" name="nomeCrianca">
                    </div>
                    
                    <div class="form-row">
                        <label for="dataNascimento">Data de Nascimento:</label>
                        <input type="date" id="dataNascimento" name="dataNascimento">
                    </div>
                </div>
                
                <!-- Campos específicos para Casamento -->
                <div id="camposCasamento" class="hidden">
                    <div class="form-row">
                        <label for="nomeNoiva">Nome da Noiva:</label>
                        <input type="text" id="nomeNoiva" name="nomeNoiva">
                    </div>
                    
                    <div class="form-row">
                        <label for="nomeNoivo">Nome do Noivo:</label>
                        <input type="text" id="nomeNoivo" name="nomeNoivo">
                    </div>
                </div>
                
                <!-- Campos específicos para Bênção de Casa -->
                <div id="camposBencao" class="hidden">
                    <div class="form-row">
                        <label for="enderecoBencao">Endereço Completo:</label>
                        <input type="text" id="enderecoBencao" name="enderecoBencao">
                    </div>
                    
                    <div class="form-row">
                        <label for="tipoLocal">Tipo de Local:</label>
                        <select id="tipoLocal" name="tipoLocal">
                            <option value="Residência">Residência</option>
                            <option value="Comércio">Comércio</option>
                            <option value="Outro">Outro</option>
                        </select>
                    </div>
                </div>
                
                <div class="form-row">
                    <label for="observacoes">Observações Adicionais:</label>
                    <textarea id="observacoes" name="observacoes"><?php echo isset($observacoes) ? htmlspecialchars($observacoes) : ''; ?></textarea>
                </div>
                
                <div class="form-row">
                    <button type="submit" class="btn-1">Enviar Solicitação</button>
                </div>
            </form>
        </section>
    </main>

    <script>
        function preencherServico(servico) {
            document.getElementById('servico').value = servico;
            mostrarCamposAdicionais();
        }
        
        function mostrarCamposAdicionais() {
            // Esconde todos os campos específicos
            document.getElementById('camposEnfermos').classList.add('hidden');
            document.getElementById('camposBatismo').classList.add('hidden');
            document.getElementById('camposCasamento').classList.add('hidden');
            document.getElementById('camposBencao').classList.add('hidden');
            
            // Mostra apenas os campos do serviço selecionado
            const servico = document.getElementById('servico').value;
            
            switch(servico) {
                case 'Comunhão para Enfermos':
                    document.getElementById('camposEnfermos').classList.remove('hidden');
                    break;
                case 'Batismo':
                    document.getElementById('camposBatismo').classList.remove('hidden');
                    break;
                case 'Casamento':
                    document.getElementById('camposCasamento').classList.remove('hidden');
                    break;
                case 'Bênção de Casa':
                    document.getElementById('camposBencao').classList.remove('hidden');
                    break;
            }
        }
        
        // Definir a data mínima como o dia atual
        const today = new Date().toISOString().split('T')[0];
        document.getElementById('data').min = today;
        
        // Mostrar campos adicionais se já houver um serviço selecionado (após submit com erro)
        window.onload = function() {
            mostrarCamposAdicionais();
        }
    </script>

<?php
include 'includes/footer.php';
?>