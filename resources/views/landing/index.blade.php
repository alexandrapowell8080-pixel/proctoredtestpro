@extends('layouts.app')

@section('content')

<main class="main-content">
    <section class="hero-section" id="hero">
        <div class="hero-video-container" style="background: linear-gradient(135deg, #f5f5f5 0%, #e8e8e8 50%, #d4d4d4 100%);"></div>

        <div class="container">
            <div class="hero-grid">
                <div class="hero-content">
                    <div class="hero-badge">
                        <span class="badge-dot"></span>
                        24/7 Available — Experts Online Now
                    </div>

                    <h1 class="hero-title">
                        Bypass Any <span class="highlight">Proctored Exam</span>
                    </h1>

                    <p class="hero-description">
                        We help students bypass all major proctoring software with 100% success rate. Get the grades you deserve without the stress.
                    </p>

                    <div class="hero-features">
                        <div class="feature-tag">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                <path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"></path>
                            </svg>
                            <span>Private Support</span>
                        </div>

                        <div class="feature-tag">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                <path d="M4 14a1 1 0 0 1-.78-1.63l9.9-10.2a.5.5 0 0 1 .86.46l-1.92 6.02A1 1 0 0 0 13 10h7a1 1 0 0 1 .78 1.63l-9.9 10.2a.5.5 0 0 1-.86-.46l1.92-6.02A1 1 0 0 0 11 14z"></path>
                            </svg>
                            <span>Fast Response</span>
                        </div>

                        <div class="feature-tag">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                <path d="m15.477 12.89 1.515 8.526a.5.5 0 0 1-.81.47l-3.58-2.687a1 1 0 0 0-1.197 0l-3.586 2.686a.5.5 0 0 1-.81-.469l1.514-8.526"></path>
                                <circle cx="12" cy="8" r="6"></circle>
                            </svg>
                            <span>Expert Guidance</span>
                        </div>
                    </div>

                    <div class="hero-stats">
                        <div class="stat">
                            <div class="stat-value">15,000+</div>
                            <div class="stat-label">Students Helped</div>
                        </div>
                        <div class="stat">
                            <div class="stat-value">24/7</div>
                            <div class="stat-label">Availability</div>
                        </div>
                        <div class="stat">
                            <div class="stat-value">50+</div>
                            <div class="stat-label">Subjects</div>
                        </div>
                    </div>

                    <div class="hero-social-proof">
                        <div class="avatars">
                            <div class="avatar">A</div>
                            <div class="avatar">B</div>
                            <div class="avatar">C</div>
                            <div class="avatar">D</div>
                            <div class="avatar">E</div>
                        </div>

                        <div class="rating">
                            <div class="stars">
                                @for ($i = 0; $i < 5; $i++)
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"></path>
                                    </svg>
                                @endfor
                            </div>
                            <p class="rating-text">Trusted by <strong>15,000+</strong> students</p>
                        </div>
                    </div>
                </div>

                <div class="hero-form-wrapper" id="form">
                    <div class="form-card">
                        <div class="form-glow"></div>
                        <div class="form-header-accent"></div>

                        <div class="form-content">
                            <h3 class="form-title">Get Expert Academic Support</h3>

                            <div class="form-badges">
                                <span class="form-badge">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <path d="m9 12 2 2 4-4"></path>
                                    </svg>
                                    Study Support
                                </span>
                                <span class="form-badge">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <path d="m9 12 2 2 4-4"></path>
                                    </svg>
                                    Private Help
                                </span>
                                <span class="form-badge">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <path d="m9 12 2 2 4-4"></path>
                                    </svg>
                                    24/7 Support
                                </span>
                            </div>

                            <div class="form-tabs">
                                <button class="tab-btn active" type="button" data-tab="proctored">
                                    <span class="tab-indicator"></span>
                                    <span class="tab-text">Exam Prep</span>
                                </button>
                                <button class="tab-btn" type="button" data-tab="classes">
                                    <span class="tab-indicator"></span>
                                    <span class="tab-text">Online Classes</span>
                                </button>
                                <button class="tab-btn" type="button" data-tab="assignments">
                                    <span class="tab-indicator"></span>
                                    <span class="tab-text">Assignments</span>
                                </button>
                            </div>

                            <form class="quote-form" method="POST" action="{{ url('/quote') }}" enctype="multipart/form-data" noindex>
                                <meta name="robots" content="noindex, nofollow">
                                @csrf

                                <input type="hidden" name="service_type" value="proctored">
                                <input type="hidden" name="pages" class="pages-input" value="1">

                                <div class="form-row">
                                    <input type="email" name="email" class="form-input" placeholder="Email" required autocomplete="email">

                                    <div class="phone-input">
                                        <select class="country-select" name="country_code">
                                            <option value="+1">US(+1)</option>
                                            <option value="+44">UK(+44)</option>
                                            <option value="+91">IN(+91)</option>
                                            <option value="+61">AU(+61)</option>
                                            <option value="+1">CA(+1)</option>
                                        </select>

                                        <input type="tel" name="phone" class="form-input" placeholder="Phone no." required autocomplete="tel">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <input type="text" name="subject" class="form-input" placeholder="Subject/Course Code" required autocomplete="off">
                                    <input type="text" name="platform" class="form-input" placeholder="Platform / Website" autocomplete="off">
                                </div>

                                <div class="form-row datetime-wrapper">
                                    <div class="datetime-row">
                                        <input type="date" name="exam_date" class="form-input" required autocomplete="off">

                                        <select class="time-select" name="exam_time">
                                            <option value="">Select time</option>
                                            <option value="12:00 AM">12:00 AM</option>
                                            <option value="6:00 AM">6:00 AM</option>
                                            <option value="12:00 PM">12:00 PM</option>
                                            <option value="6:00 PM">6:00 PM</option>
                                            <option value="11:59 PM">11:59 PM</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <textarea name="description" class="form-textarea" placeholder="Describe what you need help with" rows="4" autocomplete="off"></textarea>

                                    <input type="file" name="attachment" class="quote-file-input" hidden>

                                    <button type="button" class="attach-btn">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                            <path d="M13.234 20.252 21 12.3"></path>
                                            <path d="m16 6-8.414 8.586a2 2 0 0 0 0 2.828 2 2 0 0 0 2.828 0l8.414-8.586a4 4 0 0 0 0-5.656 4 4 0 0 0-5.656 0l-8.415 8.585a6 6 0 1 0 8.486 8.486"></path>
                                        </svg>
                                        Attach file
                                    </button>

                                    <span class="selected-file-name"></span>
                                </div>

                                <div class="page-counter" style="display: none;">
                                    <span class="page-label">Pages</span>

                                    <div class="page-controls">
                                        <button type="button" class="page-btn page-minus">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                                <path d="M5 12h14"></path>
                                            </svg>
                                        </button>

                                        <span class="page-count">1</span>

                                        <button type="button" class="page-btn page-plus">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                                <path d="M5 12h14"></path>
                                                <path d="M12 5v14"></path>
                                            </svg>
                                        </button>
                                    </div>

                                    <span class="page-words">250 words</span>
                                </div>

                                <div class="form-checkbox">
                                    <input type="checkbox" id="terms-hero" name="terms" value="1" required checked>
                                    <label for="terms-hero">I accept the T&C, agree to receive offers & updates</label>
                                </div>

                                <button type="submit" class="btn-submit">Request Quote</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="features-section" id="services">
        <div class="container">
            <div class="section-header">
                <span class="section-label">What We Offer</span>
                <h2 class="section-title">Why Proctored Test Pro is Your Best Choice</h2>
                <p class="section-description">Get organized help for study planning, course support, assignments, exam preparation, and academic confidence.</p>
            </div>

            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                            <rect width="20" height="14" x="2" y="3" rx="2"></rect>
                            <line x1="8" x2="16" y1="21" y2="21"></line>
                            <line x1="12" x2="12" y1="17" y2="21"></line>
                        </svg>
                    </div>
                    <h3 class="feature-title">Unrivaled Proctor Bypass Expertise</h3>
                    <p class="feature-text">We conquer every proctoring platform, including ProctorU, Examity, Proctorio, Respondus, Honorlock, Pearson VUE, Kryterion, and more. No system can stop us.</p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                            <path d="M12 7v14"></path>
                            <path d="M3 18a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h5a4 4 0 0 1 4 4 4 4 0 0 1 4-4h5a1 1 0 0 1 1 1v13a1 1 0 0 1-1 1h-6a3 3 0 0 0-3 3 3 3 0 0 0-3-3z"></path>
                        </svg>
                    </div>
                    <h3 class="feature-title">Every Exam Covered</h3>
                    <p class="feature-text">We handle all subjects and levels math, physics, chemistry, biology, literature, history, computer science, business, law, medical boards, nursing, and beyond.</p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                            <path d="m15.477 12.89 1.515 8.526a.5.5 0 0 1-.81.47l-3.58-2.687a1 1 0 0 0-1.197 0l-3.586 2.686a.5.5 0 0 1-.81-.469l1.514-8.526"></path>
                            <circle cx="12" cy="8" r="6"></circle>
                        </svg>
                    </div>
                    <h3 class="feature-title">Grade Guarantee</h3>
                    <p class="feature-text">Your exam is handled by We guarantee you'll score an A on any exam, or we'll refund your money. That's our promise</p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                            <path d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0"></path>
                            <circle cx="12" cy="12" r="3"></circle>
                        </svg>
                    </div>
                    <h3 class="feature-title">Advanced, Undetectable Strategies</h3>
                    <p class="feature-text">Our cutting-edge methods navigate even the most sophisticated proctoring technologies, ensuring a seamless and secure exam experience.</p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                            <rect width="18" height="11" x="3" y="11" rx="2" ry="2"></rect>
                            <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                        </svg>
                    </div>
                    <h3 class="feature-title">Ironclad Privacy</h3>
                    <p class="feature-text">Your identity and academic journey are protected with state-of-the-art confidentiality measures. Discretion is our promise.</p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                            <path d="M3 14h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-7a9 9 0 0 1 18 0v7a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h3"></path>
                        </svg>
                    </div>
                    <h3 class="feature-title">Lightning-Fast Support</h3>
                    <p class="feature-text">Need help ASAP? Our team delivers tailored solutions within hours, with 24/7 availability to meet your deadlines.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="how-it-works" class="how-it-works-section">
        <div class="decorative-blobs">
            <div class="blob blob-how-1"></div>
            <div class="blob blob-how-2"></div>
        </div>

        <div class="container">
            <div class="section-header">
                <span class="section-badge">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                        <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                    </svg>
                    HOW IT WORKS
                </span>

                <h2 class="section-title text-white">How We Guarantee <span class="highlight-white">Your Success</span></h2>
                <p class="section-description text-white-muted">Three simple steps to request help and get a personalized quote.</p>
            </div>

            <div class="how-it-works-grid">
                <div class="how-step">
                    <div class="step-connector"></div>
                    <div class="step-content">
                        <div class="step-icon-wrapper">
                            <div class="step-icon step-icon-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                    <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                </svg>
                            </div>
                            <div class="step-number">01</div>
                        </div>
                        <h3 class="step-title text-white">Tell Us About Your Exam</h3>
                        <p class="step-description text-white-muted">Complete our secure, user-friendly form below with details about your proctored exam, proctoring system, subject, and any special requirements.</p>
                    </div>
                </div>

                <div class="how-step">
                    <div class="step-connector"></div>
                    <div class="step-content">
                        <div class="step-icon-wrapper">
                            <div class="step-icon step-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                    <path d="M12 5a3 3 0 1 0-5.997.125 4 4 0 0 0-2.526 5.77 4 4 0 0 0 .556 6.588A4 4 0 1 0 12 18Z"></path>
                                    <path d="M12 5a3 3 0 1 1 5.997.125 4 4 0 0 1 2.526 5.77 4 4 0 0 1-.556 6.588A4 4 0 1 1 12 18Z"></path>
                                </svg>
                            </div>
                            <div class="step-number">02</div>
                        </div>
                        <h3 class="step-title text-white">Get a Personalized Plan</h3>
                        <p class="step-description text-white-muted">Our experts analyze your needs and craft a custom strategy, complete with a transparent, no-obligation quote delivered within 12 hours.</p>
                    </div>
                </div>

                <div class="how-step">
                    <div class="step-content">
                        <div class="step-icon-wrapper">
                            <div class="step-icon step-icon-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                    <path d="M4.5 16.5c-1.5 1.26-2 5-2 5s3.74-.5 5-2c.71-.84.7-2.13-.09-2.91a2.18 2.18 0 0 0-2.91-.09z"></path>
                                    <path d="m12 15-3-3a22 22 0 0 1 2-3.95A12.88 12.88 0 0 1 22 2c0 2.72-.78 7.5-6 11a22.35 22.35 0 0 1-4 2z"></path>
                                </svg>
                            </div>
                            <div class="step-number">03</div>
                        </div>
                        <h3 class="step-title text-white">Ace Your Exam with Ease</h3>
                        <p class="step-description text-white-muted">Partner with our team to execute a flawless plan, bypassing proctoring hurdles and securing the results you need.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @php
        $reviews = [
            [
                'testimonial' => 'I was panicking about my Proctorio-monitored chemistry final. Proctored Test Pro delivered a perfect solution, and I scored a 92%! They’re legit lifesavers.',
                'name' => 'Aisha M.',
                'major' => 'Chemistry Major',
            ],
            [
                'testimonial' => 'My law school exam used a live proctor and AI monitoring. Proctored Test Pro handled it flawlessly. I’m recommending them to everyone!',
                'name' => 'Daniel K.',
                'major' => 'Law Student',
            ],
            [
                'testimonial' => 'From my nursing certification to my MBA finals, they covered every exam with precision. I couldn’t have graduated without them.',
                'name' => 'Priya S.',
                'major' => 'MBA Graduate',
            ],
            [
                'testimonial' => 'Struggling with my engineering midterms on Respondus? Proctored Test Pro turned it around in no time. Got an A+ and zero stress!',
                'name' => 'Carlos R.',
                'major' => 'Engineering Student',
            ],
            [
                'testimonial' => 'Their team bypassed my Honorlock proctored history exam effortlessly. Professional, quick, and reliable—best decision ever.',
                'name' => 'Sophia L.',
                'major' => 'History Major',
            ],
            [
                'testimonial' => 'I had a tight deadline for my computer science certification with Pearson VUE. Proctored Test Pro delivered top-notch results right on time.',
                'name' => 'Jamal T.',
                'major' => 'CS Professional',
            ],
            [
                'testimonial' => 'No more worries about AI proctors in my biology tests. Proctored Test Pro made it simple and effective. Highly recommended!',
                'name' => 'Elena V.',
                'major' => 'Biology Student',
            ],
        ];
    @endphp

    <section class="reviews-section" id="reviews">
        <div class="container1">
            <div class="section-header">
                <span class="section-label">Testimonials</span>
                <h2 class="section-title text-white">Real Students. Real Progress.</h2>
            </div>

            <div class="reviews-slider">
                @foreach (array_slice($reviews, 0, 3) as $index => $review)
                    <div class="review-card {{ $index === 0 ? 'review-prev' : ($index === 1 ? 'review-active' : 'review-next') }}">
                        <div class="review-stars">
                            @for ($i = 0; $i < 5; $i++)
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"></path>
                                </svg>
                            @endfor
                        </div>
                        <p class="review-text">"{{ $review['testimonial'] }}"</p>
                        <div class="review-author">
                            <div class="author-avatar">{{ strtoupper(substr($review['name'], 0, 1)) }}</div>
                            <div class="author-info">
                                <p class="author-name">{{ $review['name'] }}</p>
                                <p class="author-role">{{ $review['major'] }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="slider-controls">
                <button class="slider-btn slider-prev" aria-label="Previous review">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                        <path d="m15 18-6-6 6-6"></path>
                    </svg>
                </button>

                <div class="slider-dots">
                    <button class="dot active" aria-label="Review 1"></button>
                    <button class="dot" aria-label="Review 2"></button>
                    <button class="dot" aria-label="Review 3"></button>
                </div>

                <button class="slider-btn slider-next" aria-label="Next review">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                        <path d="m9 18 6-6-6-6"></path>
                    </svg>
                </button>
            </div>

            <div class="slider-progress">
                <div class="progress-bar" style="width: 33.33%;"></div>
            </div>
        </div>
    </section>

    <section id="coverage" class="coverage-section">
        <div class="coverage-dot-pattern"></div>

        <div class="container">
            <div class="section-header">
                <h2 class="section-title text-white">We Cover <span class="text-secondary">It All</span></h2>
            </div>

            <div class="coverage-tabs">
                <button class="coverage-tab active" type="button" data-coverage="proctoring">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                        <rect width="20" height="14" x="2" y="3" rx="2"></rect>
                    </svg>
                    Every Proctoring System
                </button>

                <button class="coverage-tab" type="button" data-coverage="discipline">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                        <path d="M21.42 10.922a1 1 0 0 0-.019-1.838L12.83 5.18a2 2 0 0 0-1.66 0L2.6 9.08a1 1 0 0 0 0 1.832l8.57 3.908a2 2 0 0 0 1.66 0z"></path>
                    </svg>
                    Every Academic Discipline
                </button>

                <button class="coverage-tab" type="button" data-coverage="level">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                        <path d="M3 3v16a2 2 0 0 0 2 2h16"></path>
                    </svg>
                    Every Level
                </button>

                <button class="coverage-tab" type="button" data-coverage="global">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                        <circle cx="12" cy="12" r="10"></circle>
                    </svg>
                    Global Reach
                </button>
            </div>

            <div class="coverage-content">
                <div class="coverage-panel active" data-panel="proctoring">
                    <div class="coverage-panel-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                            <rect width="20" height="14" x="2" y="3" rx="2"></rect>
                        </svg>
                    </div>
                    <h3 class="coverage-panel-title text-white">Every Proctoring System</h3>
                    <p class="coverage-panel-text text-white-muted"> AI-based (Proctorio, Respondus), live proctors (ProctorU, Examity), lockdown browsers, and hybrid platforms.</p>
                     
                </div>

                <div class="coverage-panel" data-panel="discipline" hidden>
                    <div class="coverage-panel-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                            <path d="M21.42 10.922a1 1 0 0 0-.019-1.838L12.83 5.18a2 2 0 0 0-1.66 0L2.6 9.08a1 1 0 0 0 0 1.832l8.57 3.908a2 2 0 0 0 1.66 0z"></path>
                        </svg>
                    </div>
                    <h3 class="coverage-panel-title text-white">Every  Academic Disciplines</h3>
                    <p class="coverage-panel-text text-white-muted">STEM (math, physics, coding, engineering), humanities (literature, history, philosophy), business (accounting, finance, economics), healthcare (nursing, medical boards), law, and more.</p>
                     
                </div>

                <div class="coverage-panel" data-panel="level" hidden>
                    <div class="coverage-panel-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                            <path d="M3 3v16a2 2 0 0 0 2 2h16"></path>
                        </svg>
                    </div>
                    <h3 class="coverage-panel-title text-white">Every Level</h3>
                    <p class="coverage-panel-text text-white-muted">High school, college, graduate programs, professional certifications (CPA, CFA, Bar Exam, NCLEX, USMLE, and others).</p>
                     
                </div>

                <div class="coverage-panel" data-panel="global" hidden>
                    <div class="coverage-panel-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                            <circle cx="12" cy="12" r="10"></circle>
                        </svg>
                    </div>
                    <h3 class="coverage-panel-title text-white">Global Reach</h3>
                    <p class="coverage-panel-text text-white-muted">Supporting students worldwide, with solutions tailored to regional and institutional requirements.</p>
                    <div class="coverage-tags">
                        <span class="coverage-tag-item">USA</span>
                        <span class="coverage-tag-item">UK</span>
                        <span class="coverage-tag-item">Canada</span>
                        <span class="coverage-tag-item">Australia</span>
                        <span class="coverage-tag-item">Europe</span>
                        <span class="coverage-tag-item">Asia</span>
                        <span class="coverage-tag-item">Africa</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="faq-section" id="faq">
        <div class="container">
            <div class="section-header">
                <span class="section-badge">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                        <circle cx="12" cy="12" r="10"></circle>
                        <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"></path>
                        <path d="M12 17h.01"></path>
                    </svg>
                    FAQ
                </span>

                <h2 class="section-title">Frequently Asked <span class="highlight">Questions</span></h2>
            </div>

            @php
                $faqs = [
                    [
                        'question' => 'Is this service detectable by my school?',
                        'answer' => "No. Our methods are completely undetectable by any proctoring software. We've successfully helped thousands of students without a single detection.",
                    ],
                    [
                        'question' => 'How do you guarantee my grade?',
                        'answer' => "We have subject matter experts for every discipline. If for any reason you don't achieve at least a B+, we'll refund your money - though this has never happened.",
                    ],
                    [
                        'question' => 'What information do you need from me?',
                        'answer' => "Just your exam details (course, platform, date/time) and login credentials for the exam platform. We don't need or store any personal academic records.",
                    ],
                    [
                        'question' => 'What if my exam is longer than 4 hours?',
                        'answer' => 'We accommodate exams of any length. Contact us for a custom quote based on your specific exam duration and requirements.',
                    ],
                    [
                        'question' => 'How do you bypass advanced proctoring like eye-tracking?',
                        'answer' => 'Our proprietary technology mimics natural test-taking behavior perfectly, including eye movements, typing patterns, and mouse movements. The details are confidential for security reasons.',
                    ],
                    [
                        'question' => 'What payment methods do you accept?',
                        'answer' => 'We accept all major cryptocurrencies for maximum anonymity, as well as PayPal and credit cards for your convenience.',
                    ],
                ];
            @endphp

            <div class="accordion">
                @foreach ($faqs as $faq)
                    <div class="accordion-item">
                        <button class="accordion-header" type="button" aria-expanded="false">
                            <span class="accordion-title">{{ $faq['question'] }}</span>
                            <svg class="accordion-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                <path d="m6 9 6 6 6-6"></path>
                            </svg>
                        </button>
                        <div class="accordion-content" hidden>
                            <p class="accordion-text">{{ $faq['answer'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="quote-section" id="quote">
        <div class="container">
            <div class="quote-grid">
                <div class="quote-content">
                    <h2 class="quote-title">Request Your Free <span class="text-accent">Quote Today</span></h2>
                    <p class="quote-description">Don’t let proctored exams stand in your way. Fill out the form below to unlock a personalized solution for your next test. Whether it’s a last-minute quiz or a high-stakes final, we’ve got you covered.</p>

                    <div class="quote-benefits">
                        <div class="benefit">
                            <span class="benefit-dot"></span>
                            <span>Personalized academic support</span>
                        </div>
                        <div class="benefit">
                            <span class="benefit-dot"></span>
                            <span>Transparent, no-obligation quote</span>
                        </div>
                        <div class="benefit">
                            <span class="benefit-dot"></span>
                            <span>Response within 2 hours</span>
                        </div>
                    </div>
                </div>

                <div class="hero-form-wrapper">
                    <div class="form-card">
                        <div class="form-glow"></div>
                        <div class="form-header-accent"></div>

                        <div class="form-content">
                            <h3 class="form-title">Request Academic Support</h3>

                            <div class="form-badges">
                                <span class="form-badge">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <path d="m9 12 2 2 4-4"></path>
                                    </svg>
                                    Study Support
                                </span>
                                <span class="form-badge">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <path d="m9 12 2 2 4-4"></path>
                                    </svg>
                                    Private Help
                                </span>
                                <span class="form-badge">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <path d="m9 12 2 2 4-4"></path>
                                    </svg>
                                    24/7 Support
                                </span>
                            </div>

                            <div class="form-tabs">
                                <button class="tab-btn active" type="button" data-tab="proctored">
                                    <span class="tab-indicator"></span>
                                    <span class="tab-text">Exam Prep</span>
                                </button>
                                <button class="tab-btn" type="button" data-tab="classes">
                                    <span class="tab-indicator"></span>
                                    <span class="tab-text">Online Classes</span>
                                </button>
                                <button class="tab-btn" type="button" data-tab="assignments">
                                    <span class="tab-indicator"></span>
                                    <span class="tab-text">Assignments</span>
                                </button>
                            </div>

                            <form class="quote-form" method="POST" action="{{ url('/quote') }}" enctype="multipart/form-data" noindex>
                                <meta name="robots" content="noindex, nofollow">
                                @csrf

                                <input type="hidden" name="service_type" value="proctored">
                                <input type="hidden" name="pages" class="pages-input" value="1">

                                <div class="form-row">
                                    <input type="email" name="email" class="form-input" placeholder="Email" required autocomplete="email">

                                    <div class="phone-input">
                                        <select class="country-select" name="country_code">
                                            <option value="+1">US(+1)</option>
                                            <option value="+44">UK(+44)</option>
                                            <option value="+91">IN(+91)</option>
                                            <option value="+61">AU(+61)</option>
                                            <option value="+1">CA(+1)</option>
                                        </select>

                                        <input type="tel" name="phone" class="form-input" placeholder="Phone no." required autocomplete="tel">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <input type="text" name="subject" class="form-input" placeholder="Subject/Course Code" required autocomplete="off">
                                    <input type="text" name="platform" class="form-input" placeholder="Platform / Website" autocomplete="off">
                                </div>

                                <div class="form-row datetime-wrapper">
                                    <div class="datetime-row">
                                        <input type="date" name="exam_date" class="form-input" required autocomplete="off">

                                        <select class="time-select" name="exam_time">
                                            <option value="">Select time</option>
                                            <option value="12:00 AM">12:00 AM</option>
                                            <option value="6:00 AM">6:00 AM</option>
                                            <option value="12:00 PM">12:00 PM</option>
                                            <option value="6:00 PM">6:00 PM</option>
                                            <option value="11:59 PM">11:59 PM</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <textarea name="description" class="form-textarea" placeholder="Describe what you need help with" rows="4" autocomplete="off"></textarea>

                                    <input type="file" name="attachment" class="quote-file-input" hidden>

                                    <button type="button" class="attach-btn">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                            <path d="M13.234 20.252 21 12.3"></path>
                                            <path d="m16 6-8.414 8.586a2 2 0 0 0 0 2.828 2 2 0 0 0 2.828 0l8.414-8.586a4 4 0 0 0 0-5.656 4 4 0 0 0-5.656 0l-8.415 8.585a6 6 0 1 0 8.486 8.486"></path>
                                        </svg>
                                        Attach file
                                    </button>

                                    <span class="selected-file-name"></span>
                                </div>

                                <div class="page-counter" style="display: none;">
                                    <span class="page-label">Pages</span>

                                    <div class="page-controls">
                                        <button type="button" class="page-btn page-minus">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                                <path d="M5 12h14"></path>
                                            </svg>
                                        </button>

                                        <span class="page-count">1</span>

                                        <button type="button" class="page-btn page-plus">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                                <path d="M5 12h14"></path>
                                                <path d="M12 5v14"></path>
                                            </svg>
                                        </button>
                                    </div>

                                    <span class="page-words">250 words</span>
                                </div>

                                <div class="form-checkbox">
                                    <input type="checkbox" id="terms-quote" name="terms" value="1" required checked>
                                    <label for="terms-quote">I accept the T&C, agree to receive offers & updates</label>
                                </div>

                                <button type="submit" class="btn-submit">Request Quote</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

@endsection