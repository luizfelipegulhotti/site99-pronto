<?php
// Configurações da página
$page_title = "Contato - Secretaria da Igreja";
$page_description = "Entre em contato conosco. Estamos à disposição para atendê-lo.";
$current_page = "contato";

// Include do header
include 'includes/header.php';
?>
<link rel="stylesheet" href="css/contato.css">

<main class="contato-page">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-11 col-md-12">
                <div class="form-container">
                    <div class="form-header">
                        <div class="floating-icons">
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                        <h2>Envie sua Mensagem</h2>
                        <p>Estamos à disposição para atendê-lo</p>
                        <svg class="wave" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                            <path fill="#ffffff" fill-opacity="1"
                                d="M0,192L48,181.3C96,171,192,149,288,154.7C384,160,480,192,576,202.7C672,213,768,203,864,181.3C960,160,1056,128,1152,117.3C1248,107,1344,117,1392,122.7L1440,128L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
                            </path>
                        </svg>
                    </div>

                    <div class="form-content">
                        <div class="row">
                            <div class="col-md-12">
                                <form id="contactForm" method="POST" action="processa_contato.php">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <div class="input-group">
                                                <input type="text" id="nome" name="nome" placeholder=" " required>
                                                <label for="nome">Nome Completo</label>
                                                <div class="field-error" id="nome-error">Por favor, insira seu nome</div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6 mb-3">
                                            <div class="input-group">
                                                <input type="email" id="email" name="email" placeholder=" " required>
                                                <label for="email">E-mail</label>
                                                <div class="field-error" id="email-error">Por favor, insira um e-mail válido</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <div class="input-group">
                                                <input type="tel" id="telefone" name="telefone" placeholder=" " required>
                                                <label for="telefone">Telefone</label>
                                                <div class="field-error" id="telefone-error">Por favor, insira um telefone válido</div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6 mb-3">
                                            <!-- Campo adicional ou espaço reservado -->
                                            <div class="input-group">
                                                <input type="text" id="assunto" name="assunto" placeholder=" ">
                                                <label for="assunto">Assunto (opcional)</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12 mb-3">
                                            <div class="input-group">
                                                <textarea id="mensagem" name="mensagem" placeholder=" " required rows="6"></textarea>
                                                <label for="mensagem">Mensagem</label>
                                                <div class="field-error" id="mensagem-error">Por favor, escreva sua mensagem</div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Campo oculto para verificação -->
                                    <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token'] ?? ''; ?>">
                                    
                                    <div class="text-center">
                                        <button type="submit" class="submit-btn" id="submitBtn">
                                            Enviar Mensagem
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Mensagens de sucesso e erro -->
                    <div class="success-message" id="successMessage" style="display: none;">
                        <div class="message-icon">✓</div>
                        <div class="message-text">Mensagem Enviada!</div>
                        <div class="message-subtext">Obrigado pelo contato. Responderemos em breve.</div>
                        <button class="close-message" id="closeSuccess">Fechar</button>
                    </div>

                    <div class="error-message" id="errorMessage" style="display: none;">
                        <div class="message-icon">✗</div>
                        <div class="message-text">Ops! Algo deu errado</div>
                        <div class="message-subtext">Por favor, verifique os campos e tente novamente.</div>
                        <button class="close-message" id="closeError">Tentar Novamente</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const contactForm = document.getElementById('contactForm');
    const successMessage = document.getElementById('successMessage');
    const errorMessage = document.getElementById('errorMessage');
    const closeSuccess = document.getElementById('closeSuccess');
    const closeError = document.getElementById('closeError');
    const submitBtn = document.getElementById('submitBtn');

    // Validação de email
    const validateEmail = (email) => {
        const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return regex.test(email);
    };

    // Validação de telefone
    const validatePhone = (phone) => {
        return phone.replace(/\D/g, '').length >= 10;
    };

    // Máscara para telefone
    const telefoneInput = document.getElementById('telefone');
    telefoneInput.addEventListener('input', function(e) {
        let value = e.target.value.replace(/\D/g, '');
        if (value.length > 0) {
            if (value.length <= 2) {
                value = `(${value}`;
            } else if (value.length <= 7) {
                value = `(${value.substring(0, 2)}) ${value.substring(2)}`;
            } else if (value.length <= 11) {
                value = `(${value.substring(0, 2)}) ${value.substring(2, 7)}-${value.substring(7)}`;
            } else {
                value = `(${value.substring(0, 2)}) ${value.substring(2, 7)}-${value.substring(7, 11)}`;
            }
        }
        e.target.value = value;
    });

    // Validação em tempo real
    const inputs = contactForm.querySelectorAll('input, textarea');
    inputs.forEach(input => {
        input.addEventListener('blur', function() {
            validateField(this);
        });
    });

    function validateField(field) {
        const fieldError = document.getElementById(`${field.id}-error`);
        
        if (!field.value.trim() && field.required) {
            if (fieldError) {
                fieldError.style.display = 'block';
                field.style.borderColor = '#ef4444';
            }
            return false;
        } else if (field.id === 'email' && !validateEmail(field.value)) {
            if (fieldError) {
                fieldError.style.display = 'block';
                field.style.borderColor = '#ef4444';
            }
            return false;
        } else if (field.id === 'telefone' && !validatePhone(field.value)) {
            if (fieldError) {
                fieldError.style.display = 'block';
                field.style.borderColor = '#ef4444';
            }
            return false;
        } else {
            if (fieldError) {
                fieldError.style.display = 'none';
            }
            field.style.borderColor = '#10b981';
            return true;
        }
    }

    // Manipular envio do formulário
    contactForm.addEventListener('submit', function(e) {
        e.preventDefault();
        
        let isFormValid = true;
        inputs.forEach(input => {
            if (!validateField(input)) {
                isFormValid = false;
            }
        });

        if (isFormValid) {
            // Envio via AJAX
            submitBtn.innerHTML = 'Enviando...';
            submitBtn.disabled = true;
            
            const formData = new FormData(contactForm);
            
            fetch('processa_contato.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                submitBtn.innerHTML = 'Enviar Mensagem';
                submitBtn.disabled = false;
                
                if (data.success) {
                    successMessage.style.display = 'flex';
                } else {
                    errorMessage.style.display = 'flex';
                    if (data.message) {
                        document.querySelector('#errorMessage .message-subtext').textContent = data.message;
                    }
                }
            })
            .catch(error => {
                console.error('Erro:', error);
                submitBtn.innerHTML = 'Enviar Mensagem';
                submitBtn.disabled = false;
                errorMessage.style.display = 'flex';
            });
        } else {
            errorMessage.style.display = 'flex';
        }
    });

    // Fechar mensagens
    closeSuccess.addEventListener('click', function() {
        successMessage.style.display = 'none';
        contactForm.reset();
        inputs.forEach(input => {
            input.style.borderColor = '#ddd';
        });
    });

    closeError.addEventListener('click', function() {
        errorMessage.style.display = 'none';
    });

    // Efeito de ondulação nos botões
    document.querySelectorAll('.submit-btn, .close-message').forEach(button => {
        button.addEventListener('click', function(e) {
            const x = e.clientX - e.target.getBoundingClientRect().left;
            const y = e.clientY - e.target.getBoundingClientRect().top;
            
            const ripple = document.createElement('span');
            ripple.style.position = 'absolute';
            ripple.style.background = 'rgba(255, 255, 255, 0.3)';
            ripple.style.borderRadius = '50%';
            ripple.style.width = '0px';
            ripple.style.height = '0px';
            ripple.style.transform = 'translate(-50%, -50%)';
            ripple.style.left = x + 'px';
            ripple.style.top = y + 'px';
            
            this.appendChild(ripple);
            
            setTimeout(() => {
                ripple.style.width = '300px';
                ripple.style.height = '300px';
                ripple.style.opacity = '0';
                
                setTimeout(() => {
                    this.removeChild(ripple);
                }, 600);
            }, 10);
        });
    });
});
</script>

<?php include 'includes/footer.php'; ?>