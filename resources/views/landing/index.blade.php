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
                        We help students bypass all major proctoring software with <strong>100% success rate</strong>. Get the grades you deserve without the stress.
                    </p>
                    
                    <div class="hero-features">
                        <div class="feature-tag">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"></path>
                            </svg>
                            <span>Undetectable</span>
                        </div>
                        <div class="feature-tag">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M4 14a1 1 0 0 1-.78-1.63l9.9-10.2a.5.5 0 0 1 .86.46l-1.92 6.02A1 1 0 0 0 13 10h7a1 1 0 0 1 .78 1.63l-9.9 10.2a.5.5 0 0 1-.86-.46l1.92-6.02A1 1 0 0 0 11 14z"></path>
                            </svg>
                            <span>Lightning Fast</span>
                        </div>
                        <div class="feature-tag">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="m15.477 12.89 1.515 8.526a.5.5 0 0 1-.81.47l-3.58-2.687a1 1 0 0 0-1.197 0l-3.586 2.686a.5.5 0 0 1-.81-.469l1.514-8.526"></path>
                                <circle cx="12" cy="8" r="6"></circle>
                            </svg>
                            <span>Grade Guarantee</span>
                        </div>
                    </div>
                    
                    <div class="hero-stats">
                        <div class="stat">
                            <div class="stat-value">15,000+</div>
                            <div class="stat-label">Exams Aced</div>
                        </div>
                        <div class="stat">
                            <div class="stat-value">100%</div>
                            <div class="stat-label">Success Rate</div>
                        </div>
                        <div class="stat">
                            <div class="stat-value">50+</div>
                            <div class="stat-label">Platforms</div>
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
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"></path></svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"></path></svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"></path></svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"></path></svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"></path></svg>
                            </div>
                            <p class="rating-text">Trusted by <strong>15,000+</strong> students</p>
                        </div>
                    </div>
                </div>
                
                <div class="hero-form-wrapper" id="hero-form">
                    <div class="form-card">
                        <div class="form-glow"></div>
                        <div class="form-header-accent"></div>
                        
                        <div class="form-content">
                            <h3 class="form-title" id="form-title">Expert Help to Ace Any Proctored Exam</h3>
                            
                            <div class="form-badges" id="form-badges">
                                <span class="form-badge">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <path d="m9 12 2 2 4-4"></path>
                                    </svg>
                                    Guaranteed Grade or Refund
                                </span>
                                <span class="form-badge">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <path d="m9 12 2 2 4-4"></path>
                                    </svg>
                                    Undetectable
                                </span>
                                <span class="form-badge">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <path d="m9 12 2 2 4-4"></path>
                                    </svg>
                                    24/7 Support
                                </span>
                            </div>
                            
                            <div class="form-tabs">
                                <button class="tab-btn active" type="button" data-tab="proctored">
                                    <span class="tab-indicator"></span>
                                    <span class="tab-text">Proctored Tests</span>
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
                            
                            <form class="quote-form" method="POST" action="/quote" noindex>
                                <meta name="robots" content="noindex, nofollow">
                                <input type="hidden" name="service_type" id="service_type" value="proctored">
                                
                                <div class="form-row">
                                    <input type="email" id="email-hero" name="email" class="form-input" placeholder="Email" required autocomplete="email">
                                    <div class="phone-input">
                                        <select class="country-select" id="country-hero" name="country_code">
                                            <option value="us">US(+1)</option>
                                            <option value="uk">UK(+44)</option>
                                            <option value="in">IN(+91)</option>
                                        </select>
                                        <input type="tel" id="phone-hero" name="phone" class="form-input" placeholder="Phone no." required autocomplete="tel">
                                    </div>
                                </div>
                                
                                <div class="form-row">
                                    <input type="text" id="subject-hero" name="subject" class="form-input" placeholder="Subject/Course Code" required autocomplete="off">
                                    <div class="datetime-row" id="datetime-row">
                                        <input type="date" id="date-hero" name="exam_date" class="form-input" required autocomplete="off">
                                        <select class="time-select" id="time-hero" name="exam_time">
                                            <option value="12:00 AM">12:00 AM</option>
                                            <option value="6:00 AM">6:00 AM</option>
                                            <option value="12:00 PM">12:00 PM</option>
                                            <option value="6:00 PM">6:00 PM</option>
                                            <option value="11:59 PM">11:59 PM</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <textarea id="description-hero" name="description" class="form-textarea" placeholder="Description (Write/Attach)" rows="4" autocomplete="off"></textarea>
                                    <button type="button" class="attach-btn">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M13.234 20.252 21 12.3"></path>
                                            <path d="m16 6-8.414 8.586a2 2 0 0 0 0 2.828 2 2 0 0 0 2.828 0l8.414-8.586a4 4 0 0 0 0-5.656 4 4 0 0 0-5.656 0l-8.415 8.585a6 6 0 1 0 8.486 8.486"></path>
                                        </svg>
                                        Attach file
                                    </button>
                                </div>
                                
                                <div class="page-counter" id="page-counter" style="display: none;">
                                    <span class="page-label">Pages</span>
                                    <div class="page-controls">
                                        <button type="button" class="page-btn page-minus">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M5 12h14"></path>
                                            </svg>
                                        </button>
                                        <span class="page-count">1</span>
                                        <button type="button" class="page-btn page-plus">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M5 12h14"></path>
                                                <path d="M12 5v14"></path>
                                            </svg>
                                        </button>
                                    </div>
                                    <span class="page-words">250 words</span>
                                </div>
                                
                                <div class="form-checkbox">
                                    <input type="checkbox" id="terms" name="terms" required checked>
                                    <label for="terms">I accept the T&C, agree to receive offers & updates</label>
                                </div>
                                
                                <button type="submit" class="btn-submit" id="submit-btn">Ace My Exam</button>
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
                <h2 class="section-title">Why Proctored Test Pro Is Your Best Choice</h2>
                <p class="section-description">The ultimate destination for students seeking to dominate every proctored exam with ease and confidence.</p>
            </div>
            
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect width="20" height="14" x="2" y="3" rx="2"></rect>
                            <line x1="8" x2="16" y1="21" y2="21"></line>
                            <line x1="12" x2="12" y1="17" y2="21"></line>
                        </svg>
                    </div>
                    <h3 class="feature-title">Proctor Bypass Expertise</h3>
                    <p class="feature-text">We conquer every platform — ProctorU, Examity, Proctorio, Respondus, Honorlock, Pearson VUE, Kryterion, and more.</p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 7v14"></path>
                            <path d="M3 18a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h5a4 4 0 0 1 4 4 4 4 0 0 1 4-4h5a1 1 0 0 1 1 1v13a1 1 0 0 1-1 1h-6a3 3 0 0 0-3 3 3 3 0 0 0-3-3z"></path>
                        </svg>
                    </div>
                    <h3 class="feature-title">Every Exam Covered</h3>
                    <p class="feature-text">All subjects and levels — math, physics, chemistry, biology, literature, history, CS, business, law, medical boards, and beyond.</p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="m15.477 12.89 1.515 8.526a.5.5 0 0 1-.81.47l-3.58-2.687a1 1 0 0 0-1.197 0l-3.586 2.686a.5.5 0 0 1-.81-.469l1.514-8.526"></path>
                            <circle cx="12" cy="8" r="6"></circle>
                        </svg>
                    </div>
                    <h3 class="feature-title">Grade Guarantee</h3>
                    <p class="feature-text">We guarantee you'll score an A on any exam, or we'll refund your money. That's our promise to every student.</p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0"></path>
                            <circle cx="12" cy="12" r="3"></circle>
                        </svg>
                    </div>
                    <h3 class="feature-title">Undetectable Strategies</h3>
                    <p class="feature-text">Our cutting-edge methods navigate even the most sophisticated proctoring technologies — completely seamless and secure.</p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect width="18" height="11" x="3" y="11" rx="2" ry="2"></rect>
                            <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                        </svg>
                    </div>
                    <h3 class="feature-title">Ironclad Privacy</h3>
                    <p class="feature-text">Your identity and academic journey are protected with state-of-the-art confidentiality measures. Discretion is our promise.</p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
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
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M4.5 16.5c-1.5 1.26-2 5-2 5s3.74-.5 5-2c.71-.84.7-2.13-.09-2.91a2.18 2.18 0 0 0-2.91-.09z"></path>
                        <path d="m12 15-3-3a22 22 0 0 1 2-3.95A12.88 12.88 0 0 1 22 2c0 2.72-.78 7.5-6 11a22.35 22.35 0 0 1-4 2z"></path>
                        <path d="M9 12H4s.55-3.03 2-4c1.62-1.08 5 0 5 0"></path>
                        <path d="M12 15v5s3.03-.55 4-2c1.08-1.62 0-5 0-5"></path>
                    </svg>
                    HOW IT WORKS
                </span>
                <h2 class="section-title text-white">How We Guarantee <span class="highlight-white">Your Success</span></h2>
                <p class="section-description text-white-muted">Three simple steps to ace any proctored exam effortlessly.</p>
            </div>
            
            <div class="how-it-works-grid">
                <div class="how-step">
                    <div class="step-connector"></div>
                    <div class="step-content">
                        <div class="step-icon-wrapper">
                            <div class="step-icon step-icon-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                    <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                    <path d="M10 9H8"></path>
                                    <path d="M16 13H8"></path>
                                    <path d="M16 17H8"></path>
                                </svg>
                            </div>
                            <div class="step-number">01</div>
                        </div>
                        <h3 class="step-title text-white">Tell Us About Your Exam</h3>
                        <p class="step-description text-white-muted">Complete our secure form with your exam details, proctoring system, subject, and any special requirements.</p>
                    </div>
                </div>
                
                <div class="how-step">
                    <div class="step-connector"></div>
                    <div class="step-content">
                        <div class="step-icon-wrapper">
                            <div class="step-icon step-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M12 5a3 3 0 1 0-5.997.125 4 4 0 0 0-2.526 5.77 4 4 0 0 0 .556 6.588A4 4 0 1 0 12 18Z"></path>
                                    <path d="M12 5a3 3 0 1 1 5.997.125 4 4 0 0 1 2.526 5.77 4 4 0 0 1-.556 6.588A4 4 0 1 1 12 18Z"></path>
                                    <path d="M15 13a4.5 4.5 0 0 1-3-4 4.5 4.5 0 0 1-3 4"></path>
                                    <path d="M17.599 6.5a3 3 0 0 0 .399-1.375"></path>
                                    <path d="M6.003 5.125A3 3 0 0 0 6.401 6.5"></path>
                                    <path d="M3.477 10.896a4 4 0 0 1 .585-.396"></path>
                                    <path d="M19.938 10.5a4 4 0 0 1 .585.396"></path>
                                    <path d="M6 18a4 4 0 0 1-1.967-.516"></path>
                                    <path d="M19.967 17.484A4 4 0 0 1 18 18"></path>
                                </svg>
                            </div>
                            <div class="step-number">02</div>
                        </div>
                        <h3 class="step-title text-white">Get a Personalized Plan</h3>
                        <p class="step-description text-white-muted">Our experts analyze your needs and craft a custom strategy with a transparent quote within 12 hours.</p>
                    </div>
                </div>
                
                <div class="how-step">
                    <div class="step-content">
                        <div class="step-icon-wrapper">
                            <div class="step-icon step-icon-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M4.5 16.5c-1.5 1.26-2 5-2 5s3.74-.5 5-2c.71-.84.7-2.13-.09-2.91a2.18 2.18 0 0 0-2.91-.09z"></path>
                                    <path d="m12 15-3-3a22 22 0 0 1 2-3.95A12.88 12.88 0 0 1 22 2c0 2.72-.78 7.5-6 11a22.35 22.35 0 0 1-4 2z"></path>
                                    <path d="M9 12H4s.55-3.03 2-4c1.62-1.08 5 0 5 0"></path>
                                    <path d="M12 15v5s3.03-.55 4-2c1.08-1.62 0-5 0-5"></path>
                                </svg>
                            </div>
                            <div class="step-number">03</div>
                        </div>
                        <h3 class="step-title text-white">Ace Your Exam with Ease</h3>
                        <p class="step-description text-white-muted">Partner with our team to execute a flawless plan, bypassing proctoring hurdles and securing results.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section class="reviews-section" id="reviews">
        <div class="container1">
            <div class="section-header">
                <span class="section-label">Testimonials</span>
                <h2 class="section-title text-white">Real Students. Real Progress.</h2>
            </div>
            
            <div class="reviews-slider">
                <div class="review-card review-prev">
                    <div class="review-stars">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"></path></svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"></path></svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"></path></svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"></path></svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"></path></svg>
                    </div>
                    <p class="review-text">"Very private, professional, and fast. I got a study plan within hours."</p>
                    <div class="review-author">
                        <div class="author-avatar">E</div>
                        <div class="author-info">
                            <p class="author-name">Elena V.</p>
                            <p class="author-role">Biology Student</p>
                        </div>
                    </div>
                </div>
                
                <div class="review-card review-active">
                    <div class="review-stars">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"></path></svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"></path></svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"></path></svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"></path></svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"></path></svg>
                    </div>
                    <p class="review-text">"I used Proctoredtestpro to prepare for my chemistry final. The mock questions and tutor review helped me walk in confident."</p>
                    <div class="review-author">
                        <div class="author-avatar">A</div>
                        <div class="author-info">
                            <p class="author-name">Aisha M.</p>
                            <p class="author-role">Chemistry Student</p>
                        </div>
                    </div>
                </div>
                
                <div class="review-card review-next">
                    <div class="review-stars">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"></path></svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"></path></svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"></path></svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"></path></svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"></path></svg>
                    </div>
                    <p class="review-text">"The online class support kept me organized every week. I finally stopped missing deadlines."</p>
                    <div class="review-author">
                        <div class="author-avatar">D</div>
                        <div class="author-info">
                            <p class="author-name">Daniel K.</p>
                            <p class="author-role">Business Student</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="slider-controls">
                <button class="slider-btn slider-prev" aria-label="Previous review">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="m15 18-6-6 6-6"></path>
                    </svg>
                </button>
                <div class="slider-dots">
                    <button class="dot active" aria-label="Review 1"></button>
                    <button class="dot" aria-label="Review 2"></button>
                    <button class="dot" aria-label="Review 3"></button>
                    <button class="dot" aria-label="Review 4"></button>
                    <button class="dot" aria-label="Review 5"></button>
                    <button class="dot" aria-label="Review 6"></button>
                    <button class="dot" aria-label="Review 7"></button>
                </div>
                <button class="slider-btn slider-next" aria-label="Next review">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="m9 18 6-6-6-6"></path>
                    </svg>
                </button>
            </div>
            
            <div class="slider-progress">
                <div class="progress-bar" style="width: 76.22%;"></div>
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
            <button class="coverage-tab active" data-coverage="proctoring">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect width="20" height="14" x="2" y="3" rx="2"></rect>
                    <line x1="8" x2="16" y1="21" y2="21"></line>
                    <line x1="12" x2="12" y1="17" y2="21"></line>
                </svg>
                Every Proctoring System
            </button>
            <button class="coverage-tab" data-coverage="discipline">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M21.42 10.922a1 1 0 0 0-.019-1.838L12.83 5.18a2 2 0 0 0-1.66 0L2.6 9.08a1 1 0 0 0 0 1.832l8.57 3.908a2 2 0 0 0 1.66 0z"></path>
                    <path d="M22 10v6"></path>
                    <path d="M6 12.5V16a6 3 0 0 0 12 0v-3.5"></path>
                </svg>
                Every Academic Discipline
            </button>
            <button class="coverage-tab" data-coverage="level">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M3 3v16a2 2 0 0 0 2 2h16"></path>
                    <path d="M18 17V9"></path>
                    <path d="M13 17V5"></path>
                    <path d="M8 17v-3"></path>
                </svg>
                Every Level
            </button>
            <button class="coverage-tab" data-coverage="global">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="10"></circle>
                    <path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20"></path>
                    <path d="M2 12h20"></path>
                </svg>
                Global Reach
            </button>
        </div>
        
        <div class="coverage-content">
            <div class="coverage-panel active" data-panel="proctoring">
                <div class="coverage-panel-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect width="20" height="14" x="2" y="3" rx="2"></rect>
                        <line x1="8" x2="16" y1="21" y2="21"></line>
                        <line x1="12" x2="12" y1="17" y2="21"></line>
                    </svg>
                </div>
                <h3 class="coverage-panel-title text-white">Every Proctoring System</h3>
                <p class="coverage-panel-text text-white-muted">AI-based (Proctorio, Respondus), live proctors (ProctorU, Examity), lockdown browsers, and hybrid platforms.</p>
                <div class="coverage-tags">
                    <span class="coverage-tag-item">ProctorU</span>
                    <span class="coverage-tag-item">Examity</span>
                    <span class="coverage-tag-item">Proctorio</span>
                    <span class="coverage-tag-item">Respondus</span>
                    <span class="coverage-tag-item">Honorlock</span>
                    <span class="coverage-tag-item">Pearson VUE</span>
                    <span class="coverage-tag-item">Kryterion</span>
                </div>
            </div>
            
            <div class="coverage-panel" data-panel="discipline" hidden>
                <div class="coverage-panel-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M21.42 10.922a1 1 0 0 0-.019-1.838L12.83 5.18a2 2 0 0 0-1.66 0L2.6 9.08a1 1 0 0 0 0 1.832l8.57 3.908a2 2 0 0 0 1.66 0z"></path>
                        <path d="M22 10v6"></path>
                        <path d="M6 12.5V16a6 3 0 0 0 12 0v-3.5"></path>
                    </svg>
                </div>
                <h3 class="coverage-panel-title text-white">Every Academic Discipline</h3>
                <p class="coverage-panel-text text-white-muted">STEM (math, physics, coding, engineering), humanities (literature, history, philosophy), business (accounting, finance, economics), healthcare (nursing, medical boards), law, and more.</p>
                <div class="coverage-tags">
                    <span class="coverage-tag-item">Math</span>
                    <span class="coverage-tag-item">Physics</span>
                    <span class="coverage-tag-item">Engineering</span>
                    <span class="coverage-tag-item">Literature</span>
                    <span class="coverage-tag-item">Business</span>
                    <span class="coverage-tag-item">Nursing</span>
                    <span class="coverage-tag-item">Law</span>
                    <span class="coverage-tag-item">Computer Science</span>
                </div>
            </div>
            
            <div class="coverage-panel" data-panel="level" hidden>
                <div class="coverage-panel-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M3 3v16a2 2 0 0 0 2 2h16"></path>
                        <path d="M18 17V9"></path>
                        <path d="M13 17V5"></path>
                        <path d="M8 17v-3"></path>
                    </svg>
                </div>
                <h3 class="coverage-panel-title text-white">Every Level</h3>
                <p class="coverage-panel-text text-white-muted">High school, college, graduate programs, professional certifications (CPA, CFA, Bar Exam, NCLEX, USMLE, and others).</p>
                <div class="coverage-tags">
                    <span class="coverage-tag-item">High School</span>
                    <span class="coverage-tag-item">College</span>
                    <span class="coverage-tag-item">Graduate</span>
                    <span class="coverage-tag-item">CPA</span>
                    <span class="coverage-tag-item">CFA</span>
                    <span class="coverage-tag-item">Bar Exam</span>
                    <span class="coverage-tag-item">NCLEX</span>
                    <span class="coverage-tag-item">USMLE</span>
                </div>
            </div>
            
            <div class="coverage-panel" data-panel="global" hidden>
                <div class="coverage-panel-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"></circle>
                        <path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20"></path>
                        <path d="M2 12h20"></path>
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
                    <span class="coverage-tag-item">Middle East</span>
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
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"></circle>
                        <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"></path>
                        <path d="M12 17h.01"></path>
                    </svg>
                    FAQ
                </span>
                <h2 class="section-title">Frequently Asked <span class="highlight">Questions</span></h2>
            </div>
            
            <div class="accordion">
                <div class="accordion-item">
                    <button class="accordion-header" aria-expanded="false">
                        <span class="accordion-title">Is this service detectable by my school?</span>
                        <svg class="accordion-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="m6 9 6 6 6-6"></path>
                        </svg>
                    </button>
                    <div class="accordion-content" hidden>
                        <p class="accordion-text">Our methods are completely undetectable. We use advanced techniques that work within the system parameters without triggering any alerts.</p>
                    </div>
                </div>
                
                <div class="accordion-item">
                    <button class="accordion-header" aria-expanded="false">
                        <span class="accordion-title">How do you guarantee my grade?</span>
                        <svg class="accordion-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="m6 9 6 6 6-6"></path>
                        </svg>
                    </button>
                    <div class="accordion-content" hidden>
                        <p class="accordion-text">We have a 100% success rate backed by expert professionals. If you don't get an A, we refund your money. Simple as that.</p>
                    </div>
                </div>
                
                <div class="accordion-item">
                    <button class="accordion-header" aria-expanded="false">
                        <span class="accordion-title">What information do you need from me?</span>
                        <svg class="accordion-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="m6 9 6 6 6-6"></path>
                        </svg>
                    </button>
                    <div class="accordion-content" hidden>
                        <p class="accordion-text">We need your exam details, platform used, date/time, and course information. Everything is kept strictly confidential.</p>
                    </div>
                </div>
                
                <div class="accordion-item">
                    <button class="accordion-header" aria-expanded="false">
                        <span class="accordion-title">What if my exam is longer than 4 hours?</span>
                        <svg class="accordion-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="m6 9 6 6 6-6"></path>
                        </svg>
                    </button>
                    <div class="accordion-content" hidden>
                        <p class="accordion-text">No problem! We have teams available for extended exams. Just let us know the duration when you request a quote.</p>
                    </div>
                </div>
                
                <div class="accordion-item">
                    <button class="accordion-header" aria-expanded="false">
                        <span class="accordion-title">How do you bypass advanced proctoring like eye-tracking?</span>
                        <svg class="accordion-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="m6 9 6 6 6-6"></path>
                        </svg>
                    </button>
                    <div class="accordion-content" hidden>
                        <p class="accordion-text">We use sophisticated methods that work with all proctoring technologies including eye-tracking, screen recording, and AI monitoring.</p>
                    </div>
                </div>
                
                <div class="accordion-item">
                    <button class="accordion-header" aria-expanded="false">
                        <span class="accordion-title">What payment methods do you accept?</span>
                        <svg class="accordion-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="m6 9 6 6 6-6"></path>
                        </svg>
                    </button>
                    <div class="accordion-content" hidden>
                        <p class="accordion-text">We accept all major payment methods including credit cards, PayPal, cryptocurrency, and wire transfers for your convenience.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section class="quote-section" id="quote">
        <div class="container">
            <div class="quote-grid">
                <div class="quote-content">
                    <h2 class="quote-title">Request Your Free <span class="text-accent">Quote Today</span></h2>
                    <p class="quote-description">Don't let proctored exams stand in your way. Fill out the form below to unlock a personalized solution for your next test. Whether it's a last-minute quiz or a high-stakes final, we've got you covered.</p>
                    <div class="quote-benefits">
                        <div class="benefit">
                            <span class="benefit-dot"></span>
                            <span>Personalized strategy for your exam</span>
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
                
                <div class="hero-form-wrapper" id="hero-form">
                    <div class="form-card">
                        <div class="form-glow"></div>
                        <div class="form-header-accent"></div>
                        
                        <div class="form-content">
                            <h3 class="form-title" id="form-title">Expert Help to Ace Any Proctored Exam</h3>
                            
                            <div class="form-badges" id="form-badges">
                                <span class="form-badge">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <path d="m9 12 2 2 4-4"></path>
                                    </svg>
                                    Guaranteed Grade or Refund
                                </span>
                                <span class="form-badge">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <path d="m9 12 2 2 4-4"></path>
                                    </svg>
                                    Undetectable
                                </span>
                                <span class="form-badge">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <path d="m9 12 2 2 4-4"></path>
                                    </svg>
                                    24/7 Support
                                </span>
                            </div>
                            
                            <div class="form-tabs">
                                <button class="tab-btn active" type="button" data-tab="proctored">
                                    <span class="tab-indicator"></span>
                                    <span class="tab-text">Proctored Tests</span>
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
                            
                            <form class="quote-form" method="POST" action="/quote" noindex>
                                <meta name="robots" content="noindex, nofollow">
                                <input type="hidden" name="service_type" id="service_type" value="proctored">
                                
                                <div class="form-row">
                                    <input type="email" id="email-hero" name="email" class="form-input" placeholder="Email" required autocomplete="email">
                                    <div class="phone-input">
                                        <select class="country-select" id="country-hero" name="country_code">
                                            <option value="us">US(+1)</option>
                                            <option value="uk">UK(+44)</option>
                                            <option value="in">IN(+91)</option>
                                        </select>
                                        <input type="tel" id="phone-hero" name="phone" class="form-input" placeholder="Phone no." required autocomplete="tel">
                                    </div>
                                </div>
                                
                                <div class="form-row">
                                    <input type="text" id="subject-hero" name="subject" class="form-input" placeholder="Subject/Course Code" required autocomplete="off">
                                    <div class="datetime-row" id="datetime-row">
                                        <input type="date" id="date-hero" name="exam_date" class="form-input" required autocomplete="off">
                                        <select class="time-select" id="time-hero" name="exam_time">
                                            <option value="12:00 AM">12:00 AM</option>
                                            <option value="6:00 AM">6:00 AM</option>
                                            <option value="12:00 PM">12:00 PM</option>
                                            <option value="6:00 PM">6:00 PM</option>
                                            <option value="11:59 PM">11:59 PM</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <textarea id="description-hero" name="description" class="form-textarea" placeholder="Description (Write/Attach)" rows="4" autocomplete="off"></textarea>
                                    <button type="button" class="attach-btn">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M13.234 20.252 21 12.3"></path>
                                            <path d="m16 6-8.414 8.586a2 2 0 0 0 0 2.828 2 2 0 0 0 2.828 0l8.414-8.586a4 4 0 0 0 0-5.656 4 4 0 0 0-5.656 0l-8.415 8.585a6 6 0 1 0 8.486 8.486"></path>
                                        </svg>
                                        Attach file
                                    </button>
                                </div>
                                
                                <div class="page-counter" id="page-counter" style="display: none;">
                                    <span class="page-label">Pages</span>
                                    <div class="page-controls">
                                        <button type="button" class="page-btn page-minus">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M5 12h14"></path>
                                            </svg>
                                        </button>
                                        <span class="page-count">1</span>
                                        <button type="button" class="page-btn page-plus">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M5 12h14"></path>
                                                <path d="M12 5v14"></path>
                                            </svg>
                                        </button>
                                    </div>
                                    <span class="page-words">250 words</span>
                                </div>
                                
                                <div class="form-checkbox">
                                    <input type="checkbox" id="terms" name="terms" required checked>
                                    <label for="terms">I accept the T&C, agree to receive offers & updates</label>
                                </div>
                                
                                <button type="submit" class="btn-submit" id="submit-btn">Ace My Exam</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

@endsection