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
        const datetimeWrapper = formCard.querySelector('.datetime-wrapper');
        const datetimeRow = formCard.querySelector('.datetime-row');
        const pageCounter = formCard.querySelector('.page-counter');
        const serviceType = formCard.querySelector('input[name="service_type"]');
        const dateInput = formCard.querySelector('input[name="exam_date"]');
        const timeInput = formCard.querySelector('select[name="exam_time"]');
        const pagesInput = formCard.querySelector('.pages-input');

        if (!formTitle || !formBadges || !submitBtn || !serviceType) return;

        if (tab === 'proctored') {
            formTitle.textContent = 'Get Expert Exam Preparation Support';

            formBadges.innerHTML = buildBadges([
                'Study Support',
                'Practice Guidance',
                '24/7 Support'
            ]);

            submitBtn.textContent = 'Request Exam Prep Quote';

            if (datetimeWrapper) {
                datetimeWrapper.style.display = '';
            }

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

            if (pagesInput) {
                pagesInput.value = '1';
            }

            serviceType.value = 'proctored';
        }

        if (tab === 'classes') {
            formTitle.textContent = 'Online Class/Course Support by Experts';

            formBadges.innerHTML = buildBadges([
                'Weekly Support',
                'Deadline Help',
                'No Stress'
            ]);

            submitBtn.textContent = 'Request Class Support Quote';

            if (datetimeWrapper) {
                datetimeWrapper.style.display = 'none';
            }

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

            if (pagesInput) {
                pagesInput.value = '1';
            }

            serviceType.value = 'classes';
        }

        if (tab === 'assignments') {
            formTitle.textContent = 'Assignment Guidance from Real Experts';

            formBadges.innerHTML = buildBadges([
                'Writing Support',
                'Clear Guidance',
                '24/7 Support'
            ]);

            submitBtn.textContent = 'Request Assignment Quote';

            if (datetimeWrapper) {
                datetimeWrapper.style.display = 'none';
            }

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

                const form = this.closest('form');
                const countEl = counter.querySelector('.page-count');
                const wordsEl = counter.querySelector('.page-words');
                const pagesInput = form?.querySelector('.pages-input');

                if (!countEl) return;

                let count = parseInt(countEl.textContent, 10) || 1;

                count = isIncrement ? count + 1 : Math.max(1, count - 1);

                countEl.textContent = count;

                if (wordsEl) {
                    wordsEl.textContent = (count * 250) + ' words';
                }

                if (pagesInput) {
                    pagesInput.value = count;
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
        document.querySelectorAll('.quote-form').forEach(form => {
            let fileInput = form.querySelector('input[type="file"]');

            if (!fileInput) {
                fileInput = document.createElement('input');
                fileInput.type = 'file';
                fileInput.name = 'attachment';
                fileInput.hidden = true;
                fileInput.className = 'quote-file-input generated-file-input';
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
        document.querySelectorAll('.quote-form[noindex], form[noindex].quote-form').forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault();

                if (!this.checkValidity()) {
                    this.reportValidity();
                    return;
                }

                const submitBtn = this.querySelector('.btn-submit');
                const originalBtnText = submitBtn ? submitBtn.textContent : 'Submit';

                if (submitBtn) {
                    submitBtn.disabled = true;
                    submitBtn.textContent = 'Submitting...';
                }

                const formCard = this.closest('.form-card');
                const activeTab = formCard?.querySelector('.tab-btn.active');
                const service = activeTab?.textContent?.trim() || 'Quote Request';

                const pageCount = this.querySelector('.page-count')?.textContent || '1';
                const pagesInput = this.querySelector('.pages-input');

                if (pagesInput) {
                    pagesInput.value = pageCount;
                }

                const formData = new FormData(this);
                formData.set('pages', pageCount);
                formData.set('service_label', service);

                const getValue = name => formData.get(name) || '';

                const attachment = this.querySelector('input[type="file"]');
                const attachmentText = attachment && attachment.files && attachment.files.length > 0
                    ? `\n📎 *Attachment:* ${attachment.files[0].name}`
                    : '';

                const message = `
🎓 *New Quote Request*

*Email:* ${getValue('email') || 'N/A'}
*Phone:* ${getValue('country_code') || ''} ${getValue('phone') || ''}
*Subject/Course:* ${getValue('subject') || 'N/A'}
*Platform:* ${getValue('platform') || 'N/A'}
*Date:* ${getValue('exam_date') || 'N/A'}
*Time:* ${getValue('exam_time') || 'N/A'}
*Description:* ${getValue('description') || 'N/A'}
*Pages:* ${pageCount} (≈${parseInt(pageCount, 10) * 250 || 250} words)
*T&C Accepted:* ${getValue('terms') ? 'Yes' : 'No'}
*Service:* ${service}${attachmentText}
                `.trim();

                const encodedMessage = encodeURIComponent(message);
                const whatsappNumber = '15512615124';
                const whatsappURL = `https://wa.me/${whatsappNumber}?text=${encodedMessage}`;

                const newWindow = window.open(whatsappURL, '_blank');

                if (!newWindow || newWindow.closed || typeof newWindow.closed === 'undefined') {
                    window.location.href = whatsappURL;
                }

                fetch(this.action || '/quote', {
                    method: 'POST',
                    headers: {
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || ''
                    },
                    body: formData
                })
                    .then(async response => {
                        const responseData = await response.json().catch(() => ({}));

                        if (!response.ok) {
                            throw responseData;
                        }

                        console.log('✅ Quote saved, email handled by backend:', responseData);

                        alert('✅ Thank you. Your request has been received.');

                        this.reset();

                        const selectedFileName = this.querySelector('.selected-file-name');
                        const pageCountEl = this.querySelector('.page-count');
                        const pageWordsEl = this.querySelector('.page-words');

                        if (selectedFileName) selectedFileName.textContent = '';
                        if (pageCountEl) pageCountEl.textContent = '1';
                        if (pageWordsEl) pageWordsEl.textContent = '250 words';
                        if (pagesInput) pagesInput.value = '1';

                        const activeTabAfterReset = formCard?.querySelector('.tab-btn.active');
                        if (activeTabAfterReset) {
                            updateFormContent(activeTabAfterReset.getAttribute('data-tab'), formCard);
                        }
                    })
                    .catch(error => {
                        console.error('❌ Submission error:', error);

                        let message = 'Something went wrong. Please try again.';

                        if (error && error.message) {
                            message = error.message;
                        }

                        if (error && error.errors) {
                            const firstError = Object.values(error.errors)[0];

                            if (Array.isArray(firstError) && firstError.length > 0) {
                                message = firstError[0];
                            }
                        }

                        alert('❌ ' + message);
                    })
                    .finally(() => {
                        if (submitBtn) {
                            submitBtn.disabled = false;
                            submitBtn.textContent = originalBtnText;
                        }
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