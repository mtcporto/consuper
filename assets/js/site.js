/* Optimized combined JS for better performance */

// Wait for document ready
document.addEventListener('DOMContentLoaded', function() {
    // Initialize features when document is ready
    initCookieConsent();
    improvePageLoad();
    setupFormHandlers();
    
    // Initialize YouTube backgrounds if jQuery is available
    if (window.jQuery) {
        jQuery('[data-youtube], [data-vbg]').youtube_background();
    }
});

// Handle cookie consent notice
function initCookieConsent() {
    const cookieConsent = document.getElementById('cookieConsent');
    const acceptCookies = document.getElementById('acceptCookies');
    
    if (cookieConsent && acceptCookies) {
        if (localStorage.getItem('cookieConsent') !== 'true') {
            cookieConsent.style.display = 'block';
        }
        
        acceptCookies.addEventListener('click', function() {
            localStorage.setItem('cookieConsent', 'true');
            cookieConsent.style.display = 'none';
        });
    }
}

// Improve page loading performance
function improvePageLoad() {
    // Hide preloader once page is loaded
    window.addEventListener('load', function() {
        const preloader = document.querySelector('.preloader');
        if (preloader) {
            preloader.classList.add('hide');
            setTimeout(function() {
                preloader.style.display = 'none';
            }, 500);
        }
    });
    
    // Lazy load images that are offscreen
    if ('loading' in HTMLImageElement.prototype) {
        const images = document.querySelectorAll('img[data-src]');
        images.forEach(img => {
            img.src = img.dataset.src;
        });
    } else {
        // Fallback for browsers that don't support native lazy loading
        const script = document.createElement('script');
        script.src = 'assets/js/lazysizes.min.js';
        document.body.appendChild(script);
    }
}

// Handle form validation and submission
function setupFormHandlers() {
    const form = document.getElementById('inscricao-form');
    
    if (form) {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Basic validation
            let isValid = true;
            const nome = document.getElementById('nome').value;
            const email = document.getElementById('email').value;
            const cpf = document.getElementById('cpf').value;
            const telefone = document.getElementById('telefone').value;
            const aceite = document.getElementById('aceite').checked;
            
            // Check required fields
            if (!nome || !email || !cpf || !telefone || !aceite) {
                isValid = false;
                alert('Por favor, preencha todos os campos obrigatórios.');
            }
            
            // Basic email validation
            if (isValid && !validateEmail(email)) {
                isValid = false;
                alert('Por favor, insira um email válido.');
            }
            
            // If valid, handle form submission
            if (isValid) {
                // Store data in localStorage for demo purposes
                const formData = {
                    nome: nome,
                    email: email,
                    cpf: cpf,
                    telefone: telefone,
                    empresa: document.getElementById('empresa').value,
                    cargo: document.getElementById('cargo').value,
                    setor: document.getElementById('setor').value,
                    data: new Date().toISOString()
                };
                
                // Save data and redirect to success page
                localStorage.setItem('inscricao', JSON.stringify(formData));
                window.location.href = 'sucesso.html';
            }
        });
        
        // Add input masks if jQuery and jQuery.mask are available
        if (window.jQuery && jQuery.fn.mask) {
            jQuery('#cpf').mask('000.000.000-00');
            jQuery('#telefone').mask('(00) 00000-0000');
        } else {
            // Simple masking fallback
            setupInputMasks();
        }
    }
    
    // Initialize success page if we're on it
    const successContent = document.querySelector('.success-content');
    if (successContent) {
        const inscricaoData = localStorage.getItem('inscricao');
        if (inscricaoData) {
            const data = JSON.parse(inscricaoData);
            // Personalize success page with user data
            const userElement = document.createElement('p');
            userElement.textContent = `Nome: ${data.nome} | Email: ${data.email}`;
            successContent.querySelector('.success-message').prepend(userElement);
        }
    }
}

// Helper functions
function validateEmail(email) {
    return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
}

function setupInputMasks() {
    // Simple input masking for CPF
    const cpfInput = document.getElementById('cpf');
    if (cpfInput) {
        cpfInput.addEventListener('input', function() {
            let value = this.value.replace(/\D/g, '');
            if (value.length > 11) value = value.slice(0, 11);
            
            if (value.length <= 3) {
                this.value = value;
            } else if (value.length <= 6) {
                this.value = value.slice(0, 3) + '.' + value.slice(3);
            } else if (value.length <= 9) {
                this.value = value.slice(0, 3) + '.' + value.slice(3, 6) + '.' + value.slice(6);
            } else {
                this.value = value.slice(0, 3) + '.' + value.slice(3, 6) + '.' + value.slice(6, 9) + '-' + value.slice(9);
            }
        });
    }
    
    // Simple input masking for phone
    const telefoneInput = document.getElementById('telefone');
    if (telefoneInput) {
        telefoneInput.addEventListener('input', function() {
            let value = this.value.replace(/\D/g, '');
            if (value.length > 11) value = value.slice(0, 11);
            
            if (value.length <= 2) {
                this.value = '(' + value;
            } else if (value.length <= 7) {
                this.value = '(' + value.slice(0, 2) + ') ' + value.slice(2);
            } else {
                this.value = '(' + value.slice(0, 2) + ') ' + value.slice(2, 7) + '-' + value.slice(7);
            }
        });
    }
}