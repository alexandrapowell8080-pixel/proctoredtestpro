@extends('layouts.app')

@section('content')

@include('partials.header')

<main class="main-content">
    <section class="hero-section" id="hero">
        <div class="hero-video-container">
            <video autoplay loop playsinline class="hero-video" poster="">
                <source src="https://media.base44.com/videos/public/69f9b1df2c5090f8250e77fc/f67b11296_generated_video.mp4" type="video/mp4">
            </video>
            <div class="hero-overlay"></div>
        </div>
        
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
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"></path>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"></path>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"></path>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"></path>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"></path>
                                </svg>
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
                            <h3 class="form-title">Expert Help to Ace Any Proctored Exam</h3>
                            
                            <div class="form-badges">
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
                                <button class="tab-btn active" type="button">
                                    <span class="tab-indicator"></span>
                                    <span class="tab-text">Proctored Tests</span>
                                </button>
                                <button class="tab-btn" type="button">
                                    <span class="tab-indicator"></span>
                                    <span class="tab-text">Online Classes</span>
                                </button>
                                <button class="tab-btn" type="button">
                                    <span class="tab-indicator"></span>
                                    <span class="tab-text">Assignments</span>
                                </button>
                            </div>
                            
                            <form class="quote-form" method="POST" action="/quote" noindex>
                                <meta name="robots" content="noindex, nofollow">
                                
                                <div class="form-row">
                                    <input type="email" class="form-input" placeholder="Email" required>
                                    <div class="phone-input">
                                        <select class="country-select">
                                            <option value="ke" selected>KE(+254)</option>
                                            <option value="us">US(+1)</option>
                                            <option value="uk">UK(+44)</option>
                                            <option value="in">IN(+91)</option>
                                            <option value="ng">NG(+234)</option>
                                        </select>
                                        <input type="tel" class="form-input" placeholder="Phone no." required>
                                    </div>
                                </div>
                                
                                <div class="form-row">
                                    <input type="text" class="form-input" placeholder="Subject/Course Code" required>
                                    <select class="form-select" required>
                                        <option value="" disabled selected>Proctoring Platform</option>
                                        <option value="proctoru">ProctorU</option>
                                        <option value="examity">Examity</option>
                                        <option value="proctorio">Proctorio</option>
                                        <option value="respondus">Respondus</option>
                                        <option value="honorlock">Honorlock</option>
                                        <option value="pearson">Pearson VUE</option>
                                        <option value="other">Other</option>
                                    </select>
                                    <div class="datetime-row">
                                        <input type="date" class="form-input" required>
                                        <select class="time-select">
                                            <option value="12:00 AM">12:00 AM</option>
                                            <option value="6:00 AM">6:00 AM</option>
                                            <option value="12:00 PM">12:00 PM</option>
                                            <option value="6:00 PM">6:00 PM</option>
                                            <option value="11:59 PM">11:59 PM</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <textarea class="form-textarea" placeholder="Description (Write/Attach)" rows="4"></textarea>
                                    <button type="button" class="attach-btn">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M13.234 20.252 21 12.3"></path>
                                            <path d="m16 6-8.414 8.586a2 2 0 0 0 0 2.828 2 2 0 0 0 2.828 0l8.414-8.586a4 4 0 0 0 0-5.656 4 4 0 0 0-5.656 0l-8.415 8.585a6 6 0 1 0 8.486 8.486"></path>
                                        </svg>
                                        Attach file
                                    </button>
                                </div>
                                
                                <div class="form-checkbox">
                                    <input type="checkbox" id="terms" required checked>
                                    <label for="terms">I accept the T&C, agree to receive offers & updates</label>
                                </div>
                                
                                <button type="submit" class="btn-submit">Ace My Exam</button>
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
    
    <div class="decorative-blobs">
        <div class="blob blob-1"></div>
        <div class="blob blob-2"></div>
    </div>
    
    <section class="reviews-section" id="reviews">
        <div class="container">
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
                    <p class="review-text">"I used Proctoredtestpor to prepare for my chemistry final. The mock questions and tutor review helped me walk in confident."</p>
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
    
    <section class="coverage-section">
        <div class="container">
            <div class="section-header">
                <span class="section-label">Full Coverage</span>
                <h2 class="section-title">We Cover It All</h2>
                <p class="section-description">No matter the platform, subject, or level — we've got you covered.</p>
            </div>
            
            <div class="coverage-grid">
                <div class="coverage-card">
                    <div class="coverage-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect width="20" height="14" x="2" y="3" rx="2"></rect>
                            <line x1="8" x2="16" y1="21" y2="21"></line>
                            <line x1="12" x2="12" y1="17" y2="21"></line>
                        </svg>
                    </div>
                    <h3 class="coverage-title">Every Proctoring System</h3>
                    <ul class="coverage-list">
                        <li><span class="bullet"></span>AI-based (Proctorio, Respondus)</li>
                        <li><span class="bullet"></span>Live proctors (ProctorU, Examity)</li>
                        <li><span class="bullet"></span>Lockdown browsers</li>
                        <li><span class="bullet"></span>Hybrid platforms</li>
                    </ul>
                </div>
                
                <div class="coverage-card">
                    <div class="coverage-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M21.42 10.922a1 1 0 0 0-.019-1.838L12.83 5.18a2 2 0 0 0-1.66 0L2.6 9.08a1 1 0 0 0 0 1.832l8.57 3.908a2 2 0 0 0 1.66 0z"></path>
                            <path d="M22 10v6"></path>
                            <path d="M6 12.5V16a6 3 0 0 0 12 0v-3.5"></path>
                        </svg>
                    </div>
                    <h3 class="coverage-title">Every Academic Discipline</h3>
                    <ul class="coverage-list">
                        <li><span class="bullet"></span>STEM (Math, Physics, Coding, Engineering)</li>
                        <li><span class="bullet"></span>Humanities (Literature, History, Philosophy)</li>
                        <li><span class="bullet"></span>Business (Accounting, Finance, Economics)</li>
                        <li><span class="bullet"></span>Healthcare (Nursing, Medical Boards)</li>
                    </ul>
                </div>
                
                <div class="coverage-card">
                    <div class="coverage-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M3 3v16a2 2 0 0 0 2 2h16"></path>
                            <path d="M18 17V9"></path>
                            <path d="M13 17V5"></path>
                            <path d="M8 17v-3"></path>
                        </svg>
                    </div>
                    <h3 class="coverage-title">Every Level</h3>
                    <ul class="coverage-list">
                        <li><span class="bullet"></span>High school</li>
                        <li><span class="bullet"></span>College & University</li>
                        <li><span class="bullet"></span>Graduate programs</li>
                        <li><span class="bullet"></span>Professional certifications (CPA, CFA, Bar, NCLEX, USMLE)</li>
                    </ul>
                </div>
                
                <div class="coverage-card">
                    <div class="coverage-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10"></circle>
                            <path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20"></path>
                            <path d="M2 12h20"></path>
                        </svg>
                    </div>
                    <h3 class="coverage-title">Global Reach</h3>
                    <ul class="coverage-list">
                        <li><span class="bullet"></span>Students worldwide</li>
                        <li><span class="bullet"></span>Regional requirements</li>
                        <li><span class="bullet"></span>Institutional compliance</li>
                        <li><span class="bullet"></span>Multi-language support</li>
                    </ul>
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
                
                <div class="quote-form-wrapper">
                    <form class="quote-form-alt" method="POST" action="/quote" noindex>
                        <meta name="robots" content="noindex, nofollow">
                        <h3 class="form-alt-title">Request Your Free Quote</h3>
                        <p class="form-alt-subtitle">Fill in your details and we'll craft a custom plan for you.</p>
                        
                        <div class="form-group">
                            <label class="form-label">Service Type *</label>
                            <select class="form-select-alt" required>
                                <option value="" disabled selected>Select a service</option>
                                <option value="proctored_exams">Proctored Exams</option>
                                <option value="online_classes">Online Classes</option>
                                <option value="assignment_assistance">Assignment Assistance</option>
                            </select>
                        </div>
                        
                        <div class="form-row-alt">
                            <div class="form-group">
                                <label class="form-label">Full Name *</label>
                                <input type="text" class="form-input-alt" placeholder="Your name" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Email *</label>
                                <input type="email" class="form-input-alt" placeholder="your@email.com" required>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label">Preferred Contact Method</label>
                            <select class="form-select-alt">
                                <option value="email">Email</option>
                                <option value="whatsapp">WhatsApp</option>
                                <option value="telegram">Telegram</option>
                                <option value="discord">Discord</option>
                            </select>
                        </div>
                        
                        <div class="form-checkbox-alt">
                            <input type="checkbox" id="consent-alt" required>
                            <label for="consent-alt">I agree to the Privacy Policy and consent to Proctored Test Pro processing my information to provide the requested service.</label>
                        </div>
                        
                        <button type="submit" class="btn-submit-alt">Get My Personalized Quote</button>
                        
                        <p class="form-note">We respond within 2 hours. 100% confidential.</p>
                        
                        <div class="form-trust">
                            <div class="trust-item">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"></path>
                                </svg>
                                <span>SSL Secure</span>
                            </div>
                            <div class="trust-item">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <polyline points="12 6 12 12 16 14"></polyline>
                                </svg>
                                <span>24/7 Support</span>
                            </div>
                            <div class="trust-item">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="m15.477 12.89 1.515 8.526a.5.5 0 0 1-.81.47l-3.58-2.687a1 1 0 0 0-1.197 0l-3.586 2.686a.5.5 0 0 1-.81-.469l1.514-8.526"></path>
                                    <circle cx="12" cy="8" r="6"></circle>
                                </svg>
                                <span>A+ Guarantee</span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>

@include('partials.footer')

@endsection