(function() {
    'use strict';
    
    console.log('🚀 ProctoredTestPro JS initialized');
    
    function init() {
        console.log('📦 DOM loaded, initializing features...');
        
        // Mobile menu toggle
        const mobileMenuToggle = document.getElementById('mobileMenuToggle');
        const mainNav = document.getElementById('mainNav');
        
        if (mobileMenuToggle && mainNav) {
            console.log('✅ Mobile menu found');
            mobileMenuToggle.addEventListener('click', function(e) {
                e.preventDefault();
                mainNav.classList.toggle('active');
                console.log('📱 Mobile menu toggled');
            });
        } else {
            console.warn('⚠️ Mobile menu elements not found');
        }
        
        // Accordion functionality
        const accordionHeaders = document.querySelectorAll('.accordion-header');
        if (accordionHeaders.length > 0) {
            console.log('✅ Found', accordionHeaders.length, 'accordion items');
            accordionHeaders.forEach(header => {
                header.addEventListener('click', function() {
                    const expanded = this.getAttribute('aria-expanded') === 'true';
                    const content = this.nextElementSibling;
                    
                    accordionHeaders.forEach(h => {
                        h.setAttribute('aria-expanded', 'false');
                        if (h.nextElementSibling) h.nextElementSibling.hidden = true;
                    });
                    
                    if (!expanded && content) {
                        this.setAttribute('aria-expanded', 'true');
                        content.hidden = false;
                    }
                });
            });
        }
        
        // Form tabs (scoped to parent)
        const tabBtns = document.querySelectorAll('.tab-btn');
        if (tabBtns.length > 0) {
            console.log('✅ Found', tabBtns.length, 'tab buttons');
            tabBtns.forEach(btn => {
                btn.addEventListener('click', function() {
                    const parent = this.closest('.form-tabs');
                    if (parent) {
                        parent.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
                        this.classList.add('active');
                        console.log('🔄 Tab switched to:', this.textContent.trim());
                    }
                });
            });
        }
        
        // Coverage section tabs
        const coverageTabs = document.querySelectorAll('.coverage-tab');
        const coveragePanels = document.querySelectorAll('.coverage-panel');
        
        if (coverageTabs.length > 0 && coveragePanels.length > 0) {
            console.log('✅ Coverage tabs initialized');
            coverageTabs.forEach(tab => {
                tab.addEventListener('click', function() {
                    const target = this.getAttribute('data-coverage');
                    console.log('🎯 Coverage tab clicked:', target);
                    
                    coverageTabs.forEach(t => t.classList.remove('active'));
                    this.classList.add('active');
                    
                    coveragePanels.forEach(panel => {
                        panel.classList.remove('active');
                        if (panel.getAttribute('data-panel') === target) {
                            panel.classList.add('active');
                            console.log('📦 Panel shown:', target);
                        }
                    });
                });
            });
        }
        
        // Page counter functionality
        const setupPageCounter = (btn, isIncrement) => {
            btn.addEventListener('click', function() {
                const counter = this.closest('.page-counter');
                if (!counter) return;
                
                const countEl = counter.querySelector('.page-count');
                const wordsEl = counter.querySelector('.page-words');
                if (!countEl) return;
                
                let count = parseInt(countEl.textContent) || 1;
                count = isIncrement ? count + 1 : Math.max(1, count - 1);
                
                countEl.textContent = count;
                if (wordsEl) {
                    wordsEl.textContent = (count * 250) + ' words';
                }
                console.log('📄 Page count:', count);
            });
        };
        
        document.querySelectorAll('.page-minus').forEach(btn => setupPageCounter(btn, false));
        document.querySelectorAll('.page-plus').forEach(btn => setupPageCounter(btn, true));
        
        // Reviews slider
        const sliderPrev = document.querySelector('.slider-prev');
        const sliderNext = document.querySelector('.slider-next');
        const dots = document.querySelectorAll('.dot');
        const reviews = document.querySelectorAll('.review-card');
        
        if (reviews.length > 0) {
            console.log('✅ Reviews slider initialized with', reviews.length, 'items');
            
            let currentSlide = 1;
            const totalSlides = reviews.length;
            
            function updateSlider() {
                reviews.forEach((review, index) => {
                    review.classList.remove('review-prev', 'review-active', 'review-next');
                    if (index === currentSlide) review.classList.add('review-active');
                    else if (index === currentSlide - 1) review.classList.add('review-prev');
                    else if (index === currentSlide + 1) review.classList.add('review-next');
                });
                
                dots.forEach((dot, index) => {
                    dot.classList.toggle('active', index === currentSlide);
                });
                
                const progressBar = document.querySelector('.progress-bar');
                if (progressBar) {
                    progressBar.style.width = ((currentSlide + 1) / totalSlides * 100) + '%';
                }
            }
            
            if (sliderPrev) sliderPrev.addEventListener('click', () => {
                currentSlide = currentSlide > 0 ? currentSlide - 1 : totalSlides - 1;
                updateSlider();
            });
            
            if (sliderNext) sliderNext.addEventListener('click', () => {
                currentSlide = currentSlide < totalSlides - 1 ? currentSlide + 1 : 0;
                updateSlider();
            });
            
            dots.forEach((dot, index) => {
                dot.addEventListener('click', () => {
                    currentSlide = index;
                    updateSlider();
                });
            });
            
            updateSlider();
        }
        
  
document.querySelectorAll('form[noindex]').forEach(form => {
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        
        console.log('📤 Form submitted - sending to WhatsApp');
        
      
        const formData = new FormData(this);
        const data = {};
        
        
        this.querySelectorAll('input, select, textarea').forEach(field => {
            if (field.name && field.value) {
                data[field.name] = field.value;
            }
        });
        
       
        const terms = document.getElementById('terms')?.checked || document.getElementById('terms-alt')?.checked;
        data.terms = terms ? 'Yes' : 'No';
        
       
        const pageCount = this.querySelector('.page-count')?.textContent || '1';
        data.pages = pageCount;
        
     
        const message = `
🎓 *New Exam Request*

📧 *Email:* ${data.email || 'N/A'}
📱 *Phone:* ${data.country_code || ''} ${data.phone || ''}
📚 *Subject:* ${data.subject || 'N/A'}
💻 *Platform:* ${data.platform || 'N/A'}
📅 *Exam Date:* ${data.exam_date || 'N/A'}
⏰ *Exam Time:* ${data.exam_time || 'N/A'}
📝 *Description:* ${data.description || 'N/A'}
📄 *Pages:* ${data.pages || '1'} (≈${parseInt(data.pages) * 250 || 250} words)
✅ *T&C Accepted:* ${data.terms}

🔹 *Service:* ${this.closest('.form-card')?.querySelector('.tab-btn.active')?.textContent?.trim() || 'Proctored Tests'}
        `.trim();
      
        const encodedMessage = encodeURIComponent(message);
   
        const whatsappNumber = '15512615124';
      
        const whatsappURL = `https://wa.me/${whatsappNumber}?text=${encodedMessage}`;
        
        const newWindow = window.open(whatsappURL, '_blank');
        
        if (!newWindow || newWindow.closed || typeof newWindow.closed === 'undefined') {
         
            alert('📱 Please allow popups to open WhatsApp, or click below:');
            window.location.href = whatsappURL;
        } else {
        
            alert('✅ Opening WhatsApp... Please send the message to complete your request.');
        }
      
    });
});
        
        console.log('✨ All features initialized');
    }
    
    // Initialize when DOM is ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
        console.log('⏳ Waiting for DOMContentLoaded');
    } else {
        init();
        console.log('⚡ DOM already ready, initializing immediately');
    }
    
})();