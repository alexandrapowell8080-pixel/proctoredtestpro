document.addEventListener('DOMContentLoaded', function() {
    const mobileMenuToggle = document.getElementById('mobileMenuToggle');
    const mainNav = document.getElementById('mainNav');
    
    if (mobileMenuToggle && mainNav) {
        mobileMenuToggle.addEventListener('click', function() {
            mainNav.classList.toggle('active');
        });
    }
    
    const accordionHeaders = document.querySelectorAll('.accordion-header');
    accordionHeaders.forEach(header => {
        header.addEventListener('click', function() {
            const expanded = this.getAttribute('aria-expanded') === 'true';
            const content = this.nextElementSibling;
            
            accordionHeaders.forEach(h => {
                h.setAttribute('aria-expanded', 'false');
                h.nextElementSibling.hidden = true;
            });
            
            if (!expanded) {
                this.setAttribute('aria-expanded', 'true');
                content.hidden = false;
            }
        });
    });
    
    const tabBtns = document.querySelectorAll('.tab-btn');
    tabBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            tabBtns.forEach(b => b.classList.remove('active'));
            this.classList.add('active');
        });
    });
    
    const sliderPrev = document.querySelector('.slider-prev');
    const sliderNext = document.querySelector('.slider-next');
    const dots = document.querySelectorAll('.dot');
    const reviews = document.querySelectorAll('.review-card');
    
    let currentSlide = 1;
    const totalSlides = reviews.length;
    
    function updateSlider() {
        reviews.forEach((review, index) => {
            review.classList.remove('review-prev', 'review-active', 'review-next');
            
            if (index === currentSlide) {
                review.classList.add('review-active');
            } else if (index === currentSlide - 1) {
                review.classList.add('review-prev');
            } else if (index === currentSlide + 1) {
                review.classList.add('review-next');
            }
        });
        
        dots.forEach((dot, index) => {
            dot.classList.toggle('active', index === currentSlide);
        });
        
        const progressBar = document.querySelector('.progress-bar');
        if (progressBar) {
            const progress = ((currentSlide + 1) / totalSlides) * 100;
            progressBar.style.width = progress + '%';
        }
    }
    
    if (sliderPrev) {
        sliderPrev.addEventListener('click', function() {
            currentSlide = currentSlide > 0 ? currentSlide - 1 : totalSlides - 1;
            updateSlider();
        });
    }
    
    if (sliderNext) {
        sliderNext.addEventListener('click', function() {
            currentSlide = currentSlide < totalSlides - 1 ? currentSlide + 1 : 0;
            updateSlider();
        });
    }
    
    dots.forEach((dot, index) => {
        dot.addEventListener('click', function() {
            currentSlide = index;
            updateSlider();
        });
    });
    
    updateSlider();
    
    const forms = document.querySelectorAll('form[noindex]');
    forms.forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            alert('Form submission would be handled here. Add your backend endpoint.');
        });
    });
});