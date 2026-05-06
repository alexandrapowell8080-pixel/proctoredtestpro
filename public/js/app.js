(function() {
    'use strict';

    console.log('🚀 ProctoredTestPro JS initialized');

    function init() {
        console.log('📦 DOM loaded, initializing features...');

        initMobileMenu();
        initAccordion();
        initFormTabs();
        initCoverageTabs();
        initPageCounters();
        initAttachButtons();
        initReviewsSlider();
        initFormSubmissions();

        console.log('✨ All features initialized');
    }

    function initMobileMenu() {
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
    }

    function initAccordion() {
        const accordionHeaders = document.querySelectorAll('.accordion-header');

        if (accordionHeaders.length > 0) {
            console.log('✅ Found', accordionHeaders.length, 'accordion items');

            accordionHeaders.forEach(header => {
                header.addEventListener('click', function() {
                    const expanded = this.getAttribute('aria-expanded') === 'true';
                    const content = this.nextElementSibling;

                    accordionHeaders.forEach(h => {
                        h.setAttribute('aria-expanded', 'false');

                        const item = h.closest('.accordion-item');
                        if (item) {
                            item.setAttribute('data-state', 'closed');
                        }

                        if (h.nextElementSibling) {
                            h.nextElementSibling.hidden = true;
                        }
                    });

                    if (!expanded && content) {
                        this.setAttribute('aria-expanded', 'true');
                        content.hidden = false;

                        const item = this.closest('.accordion-item');
                        if (item) {
                            item.setAttribute('data-state', 'open');
                        }
                    }
                });
            });
        }
    }

    function initFormTabs() {
        const tabBtns = document.querySelectorAll('.tab-btn');

        if (tabBtns.length > 0) {
            console.log('✅ Found', tabBtns.length, 'tab buttons');

            tabBtns.forEach(btn => {
                btn.addEventListener('click', function() {
                    const formCard = this.closest('.form-card');
                    const parentTabs = this.closest('.form-tabs');

                    if (!formCard || !parentTabs) return;

                    parentTabs.querySelectorAll('.tab-btn').forEach(b => {
                        b.classList.remove('active');
                    });

                    this.classList.add('active');

                    updateFormContent(this.getAttribute('data-tab'), formCard);

                    console.log('🔄 Tab switched to:', this.textContent.trim());
                });
            });

            document.querySelectorAll('.form-card').forEach(card => {
                const activeTab = card.querySelector('.tab-btn.active');
                if (activeTab) {
                    updateFormContent(activeTab.getAttribute('data-tab'), card);
                }
            });
        }
    }

    function getCheckBadgeIcon() {
        return `
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="12" r="10"></circle>
                <path d="m9 12 2 2 4-4"></path>
            </svg>
        `;
    }

    function buildBadges(labels) {
        return labels.map(label => {
            return `
                <span class="form-badge">
                    ${getCheckBadgeIcon()}
                    ${label}
                </span>
            `;
        }).join('');
    }

    function updateFormContent(tab, formCard) {
        if (!formCard) return;

        const formTitle = formCard.querySelector('.form-title');
        const formBadges = formCard.querySelector('.form-badges');
        const submitBtn = formCard.querySelector('.btn-submit');
        const datetimeRow = formCard.querySelector('.datetime-row');
        const pageCounter = formCard.querySelector('.page-counter');
        const serviceType = formCard.querySelector('input[name="service_type"]');
        const dateInput = formCard.querySelector('input[name="exam_date"]');
        const timeInput = formCard.querySelector('select[name="exam_time"]');

        if (!formTitle || !formBadges || !submitBtn || !serviceType) return;

        if (tab === 'proctored') {
            formTitle.textContent = 'Expert Help to Ace Any Proctored Exam';

            formBadges.innerHTML = buildBadges([
                'Guaranteed Grade or Refund',
                'Undetectable',
                '24/7 Support'
            ]);

            submitBtn.textContent = 'Ace My Exam';

            if (datetimeRow) {
                datetimeRow.style.display = 'flex';
            }

            if (pageCounter) {
                pageCounter.style.display = 'none';
            }

            if (dateInput) {
                dateInput.disabled = false;
                dateInput.required = true;
            }

            if (timeInput) {
                timeInput.disabled = false;
            }

            serviceType.value = 'proctored';
        }

        if (tab === 'classes') {
            formTitle.textContent = 'Online Class/Course Help by PhD Experts';

            formBadges.innerHTML = buildBadges([
                'Guaranteed A or B Grade',
                'Easy Installments',
                'No Stress'
            ]);

            submitBtn.textContent = 'Do My Online Class';

            if (datetimeRow) {
                datetimeRow.style.display = 'none';
            }

            if (pageCounter) {
                pageCounter.style.display = 'none';
            }

            if (dateInput) {
                dateInput.disabled = true;
                dateInput.required = false;
            }

            if (timeInput) {
                timeInput.disabled = true;
            }

            serviceType.value = 'classes';
        }

        if (tab === 'assignments') {
            formTitle.textContent = 'AI-Free Assignment Help from Real Experts';

            formBadges.innerHTML = buildBadges([
                'Guaranteed Grade or Refund',
                'No AI',
                '24/7 Support'
            ]);

            submitBtn.textContent = 'Do My Assignment';

            if (datetimeRow) {
                datetimeRow.style.display = 'none';
            }

            if (pageCounter) {
                pageCounter.style.display = 'flex';
            }

            if (dateInput) {
                dateInput.disabled = true;
                dateInput.required = false;
            }

            if (timeInput) {
                timeInput.disabled = true;
            }

            serviceType.value = 'assignments';
        }
    }

    function initCoverageTabs() {
        const coverageTabs = document.querySelectorAll('.coverage-tab');
        const coveragePanels = document.querySelectorAll('.coverage-panel');

        if (coverageTabs.length > 0 && coveragePanels.length > 0) {
            console.log('✅ Coverage tabs initialized');

            coverageTabs.forEach(tab => {
                tab.addEventListener('click', function() {
                    const target = this.getAttribute('data-coverage');

                    console.log('🎯 Coverage tab clicked:', target);

                    coverageTabs.forEach(t => {
                        t.classList.remove('active');
                    });

                    this.classList.add('active');

                    coveragePanels.forEach(panel => {
                        const isTarget = panel.getAttribute('data-panel') === target;

                        panel.classList.toggle('active', isTarget);
                        panel.hidden = !isTarget;

                        if (isTarget) {
                            console.log('📦 Panel shown:', target);
                        }
                    });
                });
            });
        }
    }

    function initPageCounters() {
        const setupPageCounter = (btn, isIncrement) => {
            btn.addEventListener('click', function() {
                const counter = this.closest('.page-counter');
                if (!counter) return;

                const countEl = counter.querySelector('.page-count');
                const wordsEl = counter.querySelector('.page-words');

                if (!countEl) return;

                let count = parseInt(countEl.textContent, 10) || 1;

                count = isIncrement ? count + 1 : Math.max(1, count - 1);

                countEl.textContent = count;

                if (wordsEl) {
                    wordsEl.textContent = (count * 250) + ' words';
                }

                console.log('📄 Page count:', count);
            });
        };

        document.querySelectorAll('.page-minus').forEach(btn => {
            setupPageCounter(btn, false);
        });

        document.querySelectorAll('.page-plus').forEach(btn => {
            setupPageCounter(btn, true);
        });
    }

    function initAttachButtons() {
        document.querySelectorAll('.quote-form').forEach((form, index) => {
            let fileInput = form.querySelector('input[type="file"]');

            if (!fileInput) {
                fileInput = document.createElement('input');
                fileInput.type = 'file';
                fileInput.name = 'attachment';
                fileInput.style.display = 'none';
                fileInput.className = 'generated-file-input';
                form.appendChild(fileInput);
            }

            let fileName = form.querySelector('.selected-file-name');

            if (!fileName) {
                fileName = document.createElement('span');
                fileName.className = 'selected-file-name';

                const attachBtn = form.querySelector('.attach-btn');

                if (attachBtn && attachBtn.parentNode) {
                    attachBtn.parentNode.insertBefore(fileName, attachBtn.nextSibling);
                }
            }

            const attachBtn = form.querySelector('.attach-btn');

            if (attachBtn) {
                attachBtn.addEventListener('click', function(e) {
                    e.preventDefault();
                    fileInput.click();
                });
            }

            fileInput.addEventListener('change', function() {
                if (this.files && this.files.length > 0) {
                    fileName.textContent = this.files[0].name;
                } else {
                    fileName.textContent = '';
                }
            });
        });
    }

    function initReviewsSlider() {
        const sliderPrev = document.querySelector('.slider-prev');
        const sliderNext = document.querySelector('.slider-next');
        const dots = document.querySelectorAll('.dot');
        const reviews = document.querySelectorAll('.review-card');

        if (reviews.length > 0) {
            console.log('✅ Reviews slider initialized with', reviews.length, 'items');

            let currentSlide = reviews.length > 1 ? 1 : 0;
            const totalSlides = reviews.length;

            function getPrevIndex() {
                return currentSlide > 0 ? currentSlide - 1 : totalSlides - 1;
            }

            function getNextIndex() {
                return currentSlide < totalSlides - 1 ? currentSlide + 1 : 0;
            }

            function updateSlider() {
                reviews.forEach((review, index) => {
                    review.classList.remove('review-prev', 'review-active', 'review-next');

                    if (index === currentSlide) {
                        review.classList.add('review-active');
                    } else if (index === getPrevIndex()) {
                        review.classList.add('review-prev');
                    } else if (index === getNextIndex()) {
                        review.classList.add('review-next');
                    }
                });

                dots.forEach((dot, index) => {
                    dot.classList.toggle('active', index === currentSlide);
                    dot.style.display = index < totalSlides ? '' : 'none';
                });

                const progressBar = document.querySelector('.progress-bar');

                if (progressBar) {
                    progressBar.style.width = ((currentSlide + 1) / totalSlides * 100) + '%';
                }
            }

            if (sliderPrev) {
                sliderPrev.addEventListener('click', () => {
                    currentSlide = getPrevIndex();
                    updateSlider();
                });
            }

            if (sliderNext) {
                sliderNext.addEventListener('click', () => {
                    currentSlide = getNextIndex();
                    updateSlider();
                });
            }

            dots.forEach((dot, index) => {
                dot.addEventListener('click', () => {
                    if (index >= totalSlides) return;

                    currentSlide = index;
                    updateSlider();
                });
            });

            updateSlider();
        }
    }

    function initFormSubmissions() {
        document.querySelectorAll('form[noindex]').forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault();

                if (!this.checkValidity()) {
                    this.reportValidity();
                    return;
                }

                console.log('📤 Form submitted - sending to WhatsApp');

                const data = {};

                this.querySelectorAll('input, select, textarea').forEach(field => {
                    if (!field.name) return;

                    if (field.type === 'checkbox') {
                        data[field.name] = field.checked ? 'Yes' : 'No';
                        return;
                    }

                    if (field.type === 'file') {
                        if (field.files && field.files.length > 0) {
                            data.attachment = field.files[0].name;
                        }
                        return;
                    }

                    if (!field.disabled && field.value) {
                        data[field.name] = field.value;
                    }
                });

                const termsInput = this.querySelector('input[name="terms"]');
                data.terms = termsInput && termsInput.checked ? 'Yes' : 'No';

                const pageCount = this.querySelector('.page-count')?.textContent || '1';
                data.pages = pageCount;

                const activeTab = this.closest('.form-card')?.querySelector('.tab-btn.active');
                const service = activeTab?.textContent?.trim() || 'Proctored Tests';

                const attachmentText = data.attachment
                    ? `\n📎 *Attachment:* ${data.attachment}`
                    : '';

                const message = `
🎓 *New Exam Request*

📧 *Email:* ${data.email || 'N/A'}
📱 *Phone:* ${data.country_code || ''} ${data.phone || ''}
📚 *Subject:* ${data.subject || 'N/A'}
💻 *Platform:* ${data.platform || 'N/A'}
📅 *Exam Date:* ${data.exam_date || 'N/A'}
⏰ *Exam Time:* ${data.exam_time || 'N/A'}
📝 *Description:* ${data.description || 'N/A'}
📄 *Pages:* ${data.pages || '1'} (≈${parseInt(data.pages, 10) * 250 || 250} words)
✅ *T&C Accepted:* ${data.terms}
🔹 *Service:* ${service}${attachmentText}
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

                fetch('/quote', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || ''
                    },
                    body: JSON.stringify(data)
                })
                    .then(response => {
                        const contentType = response.headers.get('content-type') || '';

                        if (contentType.includes('application/json')) {
                            return response.json();
                        }

                        return response.text();
                    })
                    .then(responseData => {
                        console.log('✅ Data saved to database:', responseData);
                    })
                    .catch(error => {
                        console.error('❌ Error saving to database:', error);
                    });
            });
        });
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
        console.log('⏳ Waiting for DOMContentLoaded');
    } else {
        init();
        console.log('⚡ DOM already ready, initializing immediately');
    }

})();