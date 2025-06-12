<?php include 'includes/header.php'; ?>

<!-- CSS específico para agendamento -->
<link rel="stylesheet" href="css/agendamento.css">
hdctgx
<div class="container-agem">
    <div class="intro">
        <h2>Solicite uma Reunião com Nossos Padres</h2>
        <p>Estamos aqui para auxiliá-lo em suas necessidades espirituais e pastorais. Nossos padres estão disponíveis para aconselhamento espiritual, confissões, direção espiritual, bênçãos especiais, preparação para sacramentos, ou quaisquer outras necessidades pastorais.</p>
        
        <p>Para agendar um encontro, preencha o formulário abaixo com suas informações e motivo da visita. Nossa secretaria entrará em contato para confirmar sua solicitação no prazo de até 24 horas úteis.</p>
    </div>
    
    <h2>Nossos Sacerdotes</h2>
    <div class="padres-grid">
        <div class="padre-card">
            <div class="padre-img">
                <img src="img/milton-gregory-greco-12-02-2024-08-08-45 copy.jpg" alt="">
            </div>
            <div class="padre-info">
                <h3 class="padre-nome">Tio gregy</h3>
                <p><strong>Pároco</strong></p>
                <p>Deve ter uns 40 e poucos, carinha do balaco baco kkkkkk</p>
                
                <div class="disponibilidade">
                    <h4>Disponibilidade:</h4>
                    <ul>
                        <li>Terças e quintas: 9h às 12h</li>
                        <li>Quartas: 14h às 17h</li>
                        <li>Sábados: 9h às 11h (confissões)</li>
                    </ul>
                </div>
            </div>
        </div>
        
        <div class="padre-card">
            <div class="padre-img">
               <img src="img/valdecir-liss-13-02-2020-13-49-08.jpg" alt="">
            </div>
            <div class="padre-info">
                <h3 class="padre-nome">Padre Valdecir</h3>
                <p><strong>Vigário Paroquial</strong></p>
                <p>Padre que faz coisas de padre, deve ter uns 30</p>
                
                <div class="disponibilidade">
                    <h4>Disponibilidade:</h4>
                    <ul>
                        <li>Segundas e sextas: 14h às 18h</li>
                        <li>Quartas: 9h às 12h</li>
                        <li>Sábados: 14h às 16h (grupos de jovens)</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    
    <div class="instrucoes">
        <h3>Como funciona o atendimento:</h3>
        <ol>
            <li>Preencha o formulário com suas informações e necessidade pastoral.</li>
            <li>Nossa secretaria entrará em contato para confirmar a disponibilidade do padre solicitado.</li>
            <li>Você receberá uma confirmação com data e horário do atendimento.</li>
            <li>Em caso de urgência, mencione no formulário ou entre em contato por telefone: (00) 0000-0000.</li>
        </ol>
    </div>
    
    <div class="form-container">
        <h2>Formulário de Agendamento</h2>
        
        <?php
        // Verificar se o formulário foi enviado
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['enviar_agendamento'])) {
            // Capturar os dados do formulário
            $nome = $_POST['nome'] ?? '';
            $telefone = $_POST['telefone'] ?? '';
            $email = $_POST['email'] ?? '';
            $padre = $_POST['padre'] ?? '';
            $tipo_atendimento = $_POST['tipo-atendimento'] ?? '';
            $data_preferencial = $_POST['data-preferencial'] ?? '';
            $horario_preferencial = $_POST['horario-preferencial'] ?? '';
            $alternativa = $_POST['alternativa'] ?? '';
            $motivo = $_POST['motivo'] ?? '';
            $urgencia = $_POST['urgencia'] ?? '';
            $outro_tipo = $_POST['outro-tipo'] ?? '';
            
            // Aqui você pode processar os dados (salvar no banco, enviar email, etc.)
            // Exemplo simples de validação
            if (!empty($nome) && !empty($telefone) && !empty($email) && !empty($padre) && !empty($tipo_atendimento)) {
                // Processar o agendamento
                // Você pode adicionar aqui: inserir no banco de dados, enviar email, etc.
                
                echo '<div class="success-message" id="success-message">
                        <h3>Solicitação Enviada com Sucesso!</h3>
                        <p>Agradecemos seu contato, <strong>' . htmlspecialchars($nome) . '</strong>. Nossa secretaria entrará em contato em até 24 horas úteis para confirmar seu agendamento.</p>
                      </div>';
            } else {
                echo '<div class="alert alert-danger">
                        <p>Por favor, preencha todos os campos obrigatórios.</p>
                      </div>';
            }
        }
        ?>
        
        <form id="agendamento-form" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="form-grid">
                <div class="form-group">
                    <label for="nome">Nome Completo:</label>
                    <input type="text" id="nome" name="nome" class="form-control" required>
                </div>
                
                <div class="form-group">
                    <label for="telefone">Telefone:</label>
                    <input type="tel" id="telefone" name="telefone" class="form-control" required>
                </div>
                
                <div class="form-group">
                    <label for="email">E-mail:</label>
                    <input type="email" id="email" name="email" class="form-control" required>
                </div>
                
                <div class="form-group">
                    <label for="padre">Padre Solicitado:</label>
                    <select id="padre" name="padre" class="form-control" required>
                        <option value="">Selecione um padre</option>
                        <option value="Tio gregy">Tio gregy</option>
                        <option value="Padre valdecir">Padre valdecir</option>
                        <option value="qualquer">Qualquer um disponível</option>
                    </select>
                </div>
            </div>
            
            <div class="form-group">
                <label for="tipo-atendimento">Tipo de Atendimento:</label>
                <select id="tipo-atendimento" name="tipo-atendimento" class="form-control" required>
                    <option value="">Selecione o tipo de atendimento</option>
                    <option value="Confissão">Confissão</option>
                    <option value="Aconselhamento Espiritual">Aconselhamento Espiritual</option>
                    <option value="Direção Espiritual">Direção Espiritual</option>
                    <option value="Bênção Especial">Bênção Especial</option>
                    <option value="Preparação Sacramental">Preparação Sacramental</option>
                    <option value="Outro">Outro (especifique)</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="data-preferencial">Data Preferencial:</label>
                <input type="date" id="data-preferencial" name="data-preferencial" class="form-control" required>
            </div>
            
            <div class="form-grid">
                <div class="form-group">
                    <label for="horario-preferencial">Horário Preferencial:</label>
                    <select id="horario-preferencial" name="horario-preferencial" class="form-control" required>
                        <option value="">Selecione um horário</option>
                        <option value="09:00">09:00</option>
                        <option value="10:00">10:00</option>
                        <option value="11:00">11:00</option>
                        <option value="14:00">14:00</option>
                        <option value="15:00">15:00</option>
                        <option value="16:00">16:00</option>
                        <option value="17:00">17:00</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="alternativa">Data/Horário Alternativo:</label>
                    <input type="text" id="alternativa" name="alternativa" class="form-control" placeholder="Ex: Terça-feira à tarde">
                </div>
            </div>
            
            <div class="form-group">
                <label for="motivo">Motivo da Reunião (breve descrição):</label>
                <textarea id="motivo" name="motivo" class="form-control" placeholder="Descreva brevemente o motivo da reunião para melhor prepararmos o atendimento..." required></textarea>
            </div>
            
            <div class="form-group">
                <label for="urgencia">É uma situação urgente?</label>
                <select id="urgencia" name="urgencia" class="form-control">
                    <option value="Não">Não</option>
                    <option value="Sim">Sim, preciso de atendimento o mais rápido possível</option>
                </select>
            </div>
            
            <div class="info-box">
                <p><strong>Nota:</strong> Para confissões nos horários regulares, não é necessário agendamento. Confira os horários de confissão na igreja:</p>
                <ul>
                    <li>Quartas-feiras: 16h às 18h</li>
                    <li>Sábados: 9h às 11h</li>
                </ul>
            </div>
            
            <button type="submit" name="enviar_agendamento" class="btn" id="submit-btn">Solicitar Agendamento</button>
        </form>
    </div>
</div>

<script>
    // Definir a data mínima para amanhã
    const tomorrow = new Date();
    tomorrow.setDate(tomorrow.getDate() + 1);
    const tomorrowFormatted = tomorrow.toISOString().split('T')[0];
    document.getElementById('data-preferencial').setAttribute('min', tomorrowFormatted);
    
    // Mostrar campo adicional quando "Outro" é selecionado
    document.getElementById('tipo-atendimento').addEventListener('change', function() {
        if (this.value === 'Outro') {
            // Criar campo se não existir
            if (!document.getElementById('outro-tipo')) {
                const div = document.createElement('div');
                div.className = 'form-group';
                div.id = 'outro-tipo-container';
                
                const label = document.createElement('label');
                label.htmlFor = 'outro-tipo';
                label.textContent = 'Especifique o tipo de atendimento:';
                
                const input = document.createElement('input');
                input.type = 'text';
                input.id = 'outro-tipo';
                input.name = 'outro-tipo';
                input.className = 'form-control';
                input.required = true;
                
                div.appendChild(label);
                div.appendChild(input);
                
                this.parentNode.insertAdjacentElement('afterend', div);
            }
        } else {
            // Remover campo se existir
            const outroTipo = document.getElementById('outro-tipo-container');
            if (outroTipo) {
                outroTipo.remove();
            }
        }
    });
</script>


<?php include 'includes/footer.php'; ?>
