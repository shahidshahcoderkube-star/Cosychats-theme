<?php
/**
 * Template Name:home
 *
 * @package Cosychats
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

get_header();
?>

<div class="cosy-home-container">
    <!-- HERO SECTION WITH GLOW EFFECTS -->
    <section class="cosy-hero">
        <div class="cosy-hero-glow-1"></div>
        <div class="cosy-hero-glow-2"></div>
        
        <div class="cosy-hero-content">
            <div class="cosy-hero-left">
                <div class="cosy-badge-wrap">
                    <span class="cosy-badge-pulse"></span>
                    <span class="cosy-badge-text">Private 1-on-1 Parent Chat Space</span>
                </div>
                <h1 class="cosy-hero-title">Parenting is hard.<br><span class="gradient-text">You don't have to navigate it alone.</span></h1>
                <p class="cosy-hero-text">Connect in a confidential, judgment-free conversation with an experienced parent who has lived through the exact same experience.</p>
                
                <div class="cosy-hero-actions">
                    <a href="<?php echo esc_url(site_url('/service-provider')); ?>" class="cosy-btn cosy-btn-primary">
                        Find a Parent Guide
                        <svg class="btn-arrow" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                    </a>
                    <a href="#how-it-works" class="cosy-btn cosy-btn-secondary">How it Works</a>
                </div>

                <div class="cosy-hero-trust">
                    <div class="cosy-trust-item">
                        <svg class="trust-icon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><path d="M20 6L9 17l-5-5"/></svg>
                        100% Confidential
                    </div>
                    <div class="cosy-trust-item">
                        <svg class="trust-icon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><path d="M20 6L9 17l-5-5"/></svg>
                        Verified Peer Guides
                    </div>
                    <div class="cosy-trust-item">
                        <svg class="trust-icon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><path d="M20 6L9 17l-5-5"/></svg>
                        Zero Judgments
                    </div>
                </div>
            </div>
            
            <div class="cosy-hero-right">
                <!-- PREMIUM INTERACTIVE INTERFACE WORKSPACE MOCKUPS -->
                <div class="cosy-app-preview">
                    <!-- Guide Card 1 -->
                    <div class="preview-card card-1">
                        <div class="card-header">
                            <div class="user-meta">
                                <img src="https://i.pravatar.cc/150?img=32" alt="Sarah">
                                <div>
                                    <h4>Sarah M.</h4>
                                    <span class="user-role">ADHD / ASD Mum Guide</span>
                                </div>
                            </div>
                            <span class="status-indicator online">Online</span>
                        </div>
                        <p class="card-bio">"I navigated the school support system and behaviour strategies for my autistic son. Let's chat."</p>
                        <div class="card-tags">
                            <span class="card-tag">ADHD</span>
                            <span class="card-tag">School Plans</span>
                        </div>
                        <div class="card-footer">
                            <span class="rating">⭐️ 5.0 (42 reviews)</span>
                            <span class="price-badge">£15 / hr</span>
                        </div>
                    </div>

                    <!-- Guide Card 2 -->
                    <div class="preview-card card-2">
                        <div class="card-header">
                            <div class="user-meta">
                                <img src="https://i.pravatar.cc/150?img=11" alt="Marcus">
                                <div>
                                    <h4>Marcus K.</h4>
                                    <span class="user-role">Teenager Dad Guide</span>
                                </div>
                            </div>
                            <span class="status-indicator busy">Busy</span>
                        </div>
                        <p class="card-bio">"Handling screens, boundary setups, and school exam anxiety with two teenagers. Chat anytime."</p>
                        <div class="card-tags">
                            <span class="card-tag">Teenagers</span>
                            <span class="card-tag">Boundaries</span>
                        </div>
                        <div class="card-footer">
                            <span class="rating">⭐️ 4.9 (31 reviews)</span>
                            <span class="price-badge">£18 / hr</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== LOOP STRIP / MARQUEE TICKER ===== -->
    <div class="cosy-ticker-strip" role="marquee" aria-label="Popular conversation topics">
        <span class="cosy-ticker-label">🗣️ Topics</span>
        <div class="cosy-ticker-track">
            <div class="cosy-ticker-inner">
                <!-- Set 1 -->
                <a href="<?php echo esc_url(site_url('/service-provider/?search=chat')); ?>" class="cosy-ticker-item"><span class="ticker-dot"></span> Just a Chat</a>
                <a href="<?php echo esc_url(site_url('/service-provider/?search=ADHD')); ?>" class="cosy-ticker-item"><span class="ticker-dot"></span> ADHD &amp; ASD</a>
                <a href="<?php echo esc_url(site_url('/service-provider/?search=teen')); ?>" class="cosy-ticker-item"><span class="ticker-dot"></span> Parents of Teenagers</a>
                <a href="<?php echo esc_url(site_url('/service-provider/?search=newborn')); ?>" class="cosy-ticker-item"><span class="ticker-dot"></span> Baby &amp; Toddler</a>
                <a href="<?php echo esc_url(site_url('/service-provider/?search=divorce')); ?>" class="cosy-ticker-item"><span class="ticker-dot"></span> Divorce &amp; Separation</a>
                <a href="<?php echo esc_url(site_url('/service-provider/?search=adoption')); ?>" class="cosy-ticker-item"><span class="ticker-dot"></span> IVF &amp; Adoption</a>
                <a href="<?php echo esc_url(site_url('/service-provider/?search=young')); ?>" class="cosy-ticker-item"><span class="ticker-dot"></span> Young Mums</a>
                <a href="<?php echo esc_url(site_url('/service-provider/?search=school')); ?>" class="cosy-ticker-item"><span class="ticker-dot"></span> School-Age Kids</a>
                <a href="<?php echo esc_url(site_url('/service-provider/?search=loss')); ?>" class="cosy-ticker-item"><span class="ticker-dot"></span> Loss &amp; Grief</a>
                <a href="<?php echo esc_url(site_url('/service-provider/?search=new parents')); ?>" class="cosy-ticker-item"><span class="ticker-dot"></span> New Parents</a>
                <a href="<?php echo esc_url(site_url('/service-provider/?search=blended')); ?>" class="cosy-ticker-item"><span class="ticker-dot"></span> Blended Families</a>
                <a href="<?php echo esc_url(site_url('/service-provider/?search=anxiety')); ?>" class="cosy-ticker-item"><span class="ticker-dot"></span> Child Anxiety</a>
                <a href="<?php echo esc_url(site_url('/service-provider/?search=search')); ?>" class="cosy-ticker-item"><span class="ticker-dot"></span> Use Keyword Search</a>
                <!-- Set 2 (duplicate for seamless loop) -->
                <a href="<?php echo esc_url(site_url('/service-provider/?search=chat')); ?>" class="cosy-ticker-item"><span class="ticker-dot"></span> Just a Chat</a>
                <a href="<?php echo esc_url(site_url('/service-provider/?search=ADHD')); ?>" class="cosy-ticker-item"><span class="ticker-dot"></span> ADHD &amp; ASD</a>
                <a href="<?php echo esc_url(site_url('/service-provider/?search=teen')); ?>" class="cosy-ticker-item"><span class="ticker-dot"></span> Parents of Teenagers</a>
                <a href="<?php echo esc_url(site_url('/service-provider/?search=newborn')); ?>" class="cosy-ticker-item"><span class="ticker-dot"></span> Baby &amp; Toddler</a>
                <a href="<?php echo esc_url(site_url('/service-provider/?search=divorce')); ?>" class="cosy-ticker-item"><span class="ticker-dot"></span> Divorce &amp; Separation</a>
                <a href="<?php echo esc_url(site_url('/service-provider/?search=adoption')); ?>" class="cosy-ticker-item"><span class="ticker-dot"></span> IVF &amp; Adoption</a>
                <a href="<?php echo esc_url(site_url('/service-provider/?search=young')); ?>" class="cosy-ticker-item"><span class="ticker-dot"></span> Young Mums</a>
                <a href="<?php echo esc_url(site_url('/service-provider/?search=school')); ?>" class="cosy-ticker-item"><span class="ticker-dot"></span> School-Age Kids</a>
                <a href="<?php echo esc_url(site_url('/service-provider/?search=loss')); ?>" class="cosy-ticker-item"><span class="ticker-dot"></span> Loss &amp; Grief</a>
                <a href="<?php echo esc_url(site_url('/service-provider/?search=new parents')); ?>" class="cosy-ticker-item"><span class="ticker-dot"></span> New Parents</a>
                <a href="<?php echo esc_url(site_url('/service-provider/?search=blended')); ?>" class="cosy-ticker-item"><span class="ticker-dot"></span> Blended Families</a>
                <a href="<?php echo esc_url(site_url('/service-provider/?search=anxiety')); ?>" class="cosy-ticker-item"><span class="ticker-dot"></span> Child Anxiety</a>
                <a href="<?php echo esc_url(site_url('/service-provider/?search=search')); ?>" class="cosy-ticker-item"><span class="ticker-dot"></span> Use Keyword Search</a>
            </div>
        </div>
    </div>
    <!-- ===== END LOOP STRIP ===== -->

    <!-- SEARCH & KEYWORDS -->
    <section class="cosy-search-section">
        <div class="cosy-search-card">
            <h3 class="cosy-search-heading">Tell Cosy AI what you're going through...</h3>
            <div class="cosy-ai-container">
                <form id="cosy-ai-form" class="cosy-search-form" onsubmit="event.preventDefault(); simulateCosyAI();">
                    <div class="search-input-wrapper">
                        <!-- AI Sparkle Icon -->
                        <svg class="search-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="var(--cosy-primary)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 2v20M2 12h20M12 12c-4-4-10-4-10-4s6 0 10 4zM12 12c4-4 10-4 10-4s-6 0-10 4zM12 12c-4 4-10 4-10 4s6 0 10-4zM12 12c4 4 10 4 10 4s-6 0-10-4z"/>
                        </svg>
                        <input type="text" id="ai-query-input" placeholder="E.g., I'm struggling with my teenager's screen time..." required autocomplete="off">
                    </div>
                    <button type="submit" class="cosy-search-btn" id="ai-submit-btn">
                        <span>Ask AI</span>
                    </button>
                </form>
                
                <!-- Simulated AI Response Area -->
                <div id="ai-response-area" class="ai-response-hidden">
                    <div class="ai-typing-indicator" id="ai-typing" style="display: none;">
                        <span class="ai-dot"></span><span class="ai-dot"></span><span class="ai-dot"></span>
                        <span class="ai-typing-text">Cosy AI is typing...</span>
                    </div>
                    <div class="ai-answer-content" id="ai-answer"></div>
                </div>
            </div>
            
            <div class="cosy-popular-tags" style="margin-top: 20px;">
                <span class="tag-label">Try asking:</span>
                <button type="button" class="pop-tag ai-prompt-btn" onclick="document.getElementById('ai-query-input').value=this.innerText; simulateCosyAI();">My child was just diagnosed with ADHD</button>
                <button type="button" class="pop-tag ai-prompt-btn" onclick="document.getElementById('ai-query-input').value=this.innerText; simulateCosyAI();">Going through a difficult divorce</button>
                <button type="button" class="pop-tag ai-prompt-btn" onclick="document.getElementById('ai-query-input').value=this.innerText; simulateCosyAI();">Newborn sleep regression help</button>
            </div>
        </div>
    </section>

    <!-- ================================================
         WHAT IS COSYCHATS — Premium Illustrated Cards
         ================================================ -->
    <section class="cosy-what-is">
        <div class="section-header">
            <span class="section-tag">About the Platform</span>
            <h2 class="section-title">What is CosyChats?</h2>
            <p class="section-desc">We connect you with real parents who understand your journey — because they've lived through it themselves.</p>
        </div>
        <div class="cosy-illus-grid">

            <div class="illus-card illus-card--chat">
                <div class="illus-card__visual">
                    <div class="illus-icon-wrap">
                        <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
                    </div>
                    <div class="illus-bubbles">
                        <div class="bubble b1">How did you cope?</div>
                        <div class="bubble b2">I've been there too...</div>
                        <div class="bubble b3">You're not alone ❤️</div>
                    </div>
                </div>
                <div class="illus-card__body">
                    <h4>Real Conversations</h4>
                    <p>Sometimes it just helps to talk. CosyChats makes it easy to connect with another parent for a simple, one-to-one conversation.</p>
                </div>
            </div>

            <div class="illus-card illus-card--shield">
                <div class="illus-card__visual">
                    <div class="illus-icon-wrap">
                        <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                    </div>
                    <div class="illus-stat-row">
                        <div class="illus-stat"><span class="stat-num">500+</span><span class="stat-label">Guides</span></div>
                        <div class="illus-stat"><span class="stat-num">4.9★</span><span class="stat-label">Avg Rating</span></div>
                        <div class="illus-stat"><span class="stat-num">100%</span><span class="stat-label">Verified</span></div>
                    </div>
                </div>
                <div class="illus-card__body">
                    <h4>Shared Experience</h4>
                    <p>There's comfort in knowing someone else has been there. Talk to a parent who understands from their own lived experience.</p>
                </div>
            </div>

            <div class="illus-card illus-card--peer">
                <div class="illus-card__visual">
                    <div class="illus-icon-wrap">
                        <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                    </div>
                    <div class="illus-avatars-row">
                        <div class="illus-avatar av1">S</div>
                        <div class="illus-connect-line"></div>
                        <div class="illus-avatar av2">M</div>
                    </div>
                </div>
                <div class="illus-card__body">
                    <h4>Peer-to-Peer</h4>
                    <p>No pressure, no expectations — just two parents talking as equals. No medical advice, no judgment, just genuine connection.</p>
                </div>
            </div>

            <div class="illus-card illus-card--lock">
                <div class="illus-card__visual">
                    <div class="illus-icon-wrap">
                        <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                    </div>
                    <div class="illus-tags-cluster">
                        <span class="illus-tag">Private</span>
                        <span class="illus-tag">Secure</span>
                        <span class="illus-tag">Your Pace</span>
                    </div>
                </div>
                <div class="illus-card__body">
                    <h4>Your Safe Space</h4>
                    <p>Choose who you talk to and what you share. Every conversation is fully private and happens entirely at your pace.</p>
                </div>
            </div>

        </div>
    </section>

    <!-- ================================================
         WHY COSYCHATS — Dark Glass Feature Row
         ================================================ -->
    <section class="cosy-why-us">
        <div class="section-header section-header--light">
            <span class="section-tag section-tag--light">Why Us</span>
            <h2 class="section-title section-title--light">Why CosyChats?</h2>
            <p class="section-desc section-desc--light">Built differently. Designed around real people, not services.</p>
        </div>
        <div class="cosy-why-grid">

            <div class="why-card">
                <div class="why-card__icon">🔒</div>
                <div class="why-card__line"></div>
                <h4>Clear Boundaries</h4>
                <p>CosyChats is built around conversation — not advice, not services. Just real people talking about their own experiences.</p>
            </div>

            <div class="why-card">
                <div class="why-card__icon">👤</div>
                <div class="why-card__line"></div>
                <h4>Real Parents</h4>
                <p>Every person you speak to is a parent sharing what they've been through — nothing more, nothing less.</p>
            </div>

            <div class="why-card">
                <div class="why-card__icon">🕐</div>
                <div class="why-card__line"></div>
                <h4>Your Choice</h4>
                <p>You choose who to talk to, based on what feels relevant to you and your situation. No assignment, no waiting lists.</p>
            </div>

            <div class="why-card">
                <div class="why-card__icon">🧡</div>
                <div class="why-card__line"></div>
                <h4>Simple &amp; Equal</h4>
                <p>Every conversation is one-to-one, informal, and shaped by real life — no expectations, just a natural exchange.</p>
            </div>

        </div>
    </section>

    <!-- ================================================
         START YOUR CONVERSATION — Category Topic Grid
         ================================================ -->
    <section class="cosy-start-conversation">
        <div class="section-header">
            <span class="section-tag">Find Your Guide</span>
            <h2 class="section-title">Start Your Conversation</h2>
            <p class="section-desc">Choose a topic that resonates with your parenting journey and find a guide who truly understands.</p>
        </div>
        <div class="cosy-topic-grid">

            <a href="<?php echo esc_url(site_url('/service-provider/?search=chat')); ?>" class="topic-card topic--purple">
                <div class="topic-emoji">💬</div>
                <div class="topic-info">
                    <strong>Just a Chat</strong>
                    <span>No specific topic — just connect</span>
                </div>
                <svg class="topic-arrow" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </a>

            <a href="<?php echo esc_url(site_url('/service-provider/?search=baby')); ?>" class="topic-card topic--rose">
                <div class="topic-emoji">🍼</div>
                <div class="topic-info">
                    <strong>Baby &amp; Toddler</strong>
                    <span>Sleep, feeding &amp; early years</span>
                </div>
                <svg class="topic-arrow" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </a>

            <a href="<?php echo esc_url(site_url('/service-provider/?search=IVF')); ?>" class="topic-card topic--teal">
                <div class="topic-emoji">🏡</div>
                <div class="topic-info">
                    <strong>IVF &amp; Adoption</strong>
                    <span>Navigating the journey together</span>
                </div>
                <svg class="topic-arrow" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </a>

            <a href="<?php echo esc_url(site_url('/service-provider/?search=children')); ?>" class="topic-card topic--amber">
                <div class="topic-emoji">🎒</div>
                <div class="topic-info">
                    <strong>Children</strong>
                    <span>School-age challenges &amp; growth</span>
                </div>
                <svg class="topic-arrow" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </a>

            <a href="<?php echo esc_url(site_url('/service-provider/?search=teen')); ?>" class="topic-card topic--indigo">
                <div class="topic-emoji">🎓</div>
                <div class="topic-info">
                    <strong>Teenagers</strong>
                    <span>Boundaries, anxiety &amp; identity</span>
                </div>
                <svg class="topic-arrow" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </a>

            <a href="<?php echo esc_url(site_url('/service-provider/?search=loss')); ?>" class="topic-card topic--mauve">
                <div class="topic-emoji">💔</div>
                <div class="topic-info">
                    <strong>Loss &amp; Divorce</strong>
                    <span>Co-parenting &amp; rebuilding</span>
                </div>
                <svg class="topic-arrow" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </a>

        </div>
        <div class="topic-cta-row">
            <a href="<?php echo esc_url(site_url('/service-provider')); ?>" class="cosy-btn cosy-btn-primary">
                Browse All Guides
                <svg class="btn-arrow" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </a>
        </div>
    </section>



    <!-- HOW IT WORKS -->
    <section id="how-it-works" class="cosy-how-it-works">
        <div class="section-header">
            <span class="section-tag">Simple 3-Step Process</span>
            <h2 class="section-title">How CosyChats Works</h2>
            <p class="section-desc">Connecting with a supportive peer guide is quick, secure, and completely private.</p>
        </div>
        <div class="steps-container">
            <div class="step-item">
                <div class="step-icon-num">1</div>
                <h3>Find Your Guide</h3>
                <p>Browse registered profiles. Filter by category, read their personal stories, and check their availability slots.</p>
            </div>
            <div class="step-item">
                <div class="step-icon-num">2</div>
                <h3>Book a Secure Slot</h3>
                <p>Choose a convenient time that fits your schedule. Confirm your booking securely with simple checkout payment options.</p>
            </div>
            <div class="step-item">
                <div class="step-icon-num">3</div>
                <h3>Connect & Talk</h3>
                <p>Access your private chat session via phone or browser. Share, listen, and gain reassurance from a peer who truly gets it.</p>
            </div>
        </div>
    </section>

    <!-- SUPPORT CIRCLES -->
    <section class="cosy-support-circles">
        <div class="section-header">
            <span class="section-tag">Explore Topics</span>
            <h2 class="section-title">Our Support Circles</h2>
            <p class="section-desc">Whatever parenting phase or challenge you are navigating, there is a circle of understanding ready for you.</p>
        </div>
        <div class="circles-grid">
            <a href="<?php echo esc_url(site_url('/service-provider')); ?>" class="circle-card">
                <div class="circle-emoji-wrap">🍼</div>
                <h4>Baby & Toddler</h4>
                <p>Sleep deprivation, feeding, tantrums, and adapting to early parenthood.</p>
                <div class="circle-card-footer">
                    <span class="circle-link">Explore Guides</span>
                    <svg class="footer-arrow" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                </div>
            </a>
            <a href="<?php echo esc_url(site_url('/service-provider')); ?>" class="circle-card">
                <div class="circle-emoji-wrap">🎒</div>
                <h4>School-Age Kids</h4>
                <p>Primary school transitions, homework struggles, and building friendships.</p>
                <div class="circle-card-footer">
                    <span class="circle-link">Explore Guides</span>
                    <svg class="footer-arrow" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                </div>
            </a>
            <a href="<?php echo esc_url(site_url('/service-provider')); ?>" class="circle-card">
                <div class="circle-emoji-wrap">🧬</div>
                <h4>ADHD & Neurodivergence</h4>
                <p>Navigating school support plans, behavioural strategies, and parental self-care.</p>
                <div class="circle-card-footer">
                    <span class="circle-link">Explore Guides</span>
                    <svg class="footer-arrow" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                </div>
            </a>
            <a href="<?php echo esc_url(site_url('/service-provider')); ?>" class="circle-card">
                <div class="circle-emoji-wrap">🎓</div>
                <h4>Teenagers</h4>
                <p>Managing boundaries, social media pressures, mental health, and exam anxiety.</p>
                <div class="circle-card-footer">
                    <span class="circle-link">Explore Guides</span>
                    <svg class="footer-arrow" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                </div>
            </a>
            <a href="<?php echo esc_url(site_url('/service-provider')); ?>" class="circle-card">
                <div class="circle-emoji-wrap">💔</div>
                <h4>Divorce & Separation</h4>
                <p>Co-parenting boundaries, legal stresses, and rebuilding a stable home environment.</p>
                <div class="circle-card-footer">
                    <span class="circle-link">Explore Guides</span>
                    <svg class="footer-arrow" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                </div>
            </a>
            <a href="<?php echo esc_url(site_url('/service-provider')); ?>" class="circle-card">
                <div class="circle-emoji-wrap">🏡</div>
                <h4>IVF & Adoption</h4>
                <p>Patience, emotional fatigue, navigating adoption processes, and matching.</p>
                <div class="circle-card-footer">
                    <span class="circle-link">Explore Guides</span>
                    <svg class="footer-arrow" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                </div>
            </a>
        </div>
    </section>

    <!-- TESTIMONIALS -->
    <section class="cosy-testimonials">
        <div class="section-header">
            <span class="section-tag">Real Feedback</span>
            <h2 class="section-title">Shared Relief & Comfort</h2>
            <p class="section-desc">Here is what other parents have said after finding a listening ear on CosyChats.</p>
        </div>
        <div class="testimonials-slider">
            <div class="testimonial-card">
                <div class="card-stars">⭐️⭐️⭐️⭐️⭐️</div>
                <p class="quote">"Talking to Elena felt like a huge weight lifted off my shoulders. I was so exhausted by the constant tantrums, and just hearing that her child did the same thing and turned out fine gave me the strength to keep going."</p>
                <div class="author-meta">
                    <div class="author-details">
                        <h5>Seeker</h5>
                        <span>Mother of a 3-year-old</span>
                    </div>
                </div>
            </div>
            <div class="testimonial-card">
                <div class="card-stars">⭐️⭐️⭐️⭐️⭐️</div>
                <p class="quote">"I didn't need medical advice; I needed another dad to tell me how he handled his teenager shutting him out. Marcus was fantastic. No judgment, just pure experience."</p>
                <div class="author-meta">
                    <div class="author-details">
                        <h5>Seeker</h5>
                        <span>Father of a 15-year-old</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CALL TO ACTION -->
    <section class="cosy-cta-banner">
        <div class="cta-glow"></div>
        <div class="cta-content">
            <h2>Ready to talk to a parent who gets it?</h2>
            <p>Select from our verified guides today. Booking is fast, secure, and fully confidential.</p>
            <a href="<?php echo esc_url(site_url('/service-provider')); ?>" class="cosy-btn cosy-btn-light">
                Browse Parent Guides
                <svg class="btn-arrow" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </a>
        </div>
    </section>
</div>

<script>
function simulateCosyAI() {
    const input = document.getElementById('ai-query-input').value.trim();
    if (!input) return;

    const responseArea = document.getElementById('ai-response-area');
    const typingIndicator = document.getElementById('ai-typing');
    const answerContent = document.getElementById('ai-answer');

    // Show response area and typing indicator
    responseArea.classList.remove('ai-response-hidden');
    responseArea.style.display = 'block';
    typingIndicator.style.display = 'flex';
    answerContent.innerHTML = '';

    // Scroll to the response area
    responseArea.scrollIntoView({ behavior: 'smooth', block: 'nearest' });

    // Send query to backend to save in the log file
    const formData = new FormData();
    formData.append('action', 'cosy_save_ai_query');
    formData.append('query', input);
    formData.append('nonce', window.cosyAjax.nonce);
    
    fetch(window.cosyAjax.ajaxurl, {
        method: 'POST',
        body: formData
    }).catch(error => console.error('Error saving query:', error));

    // Simulate network delay for thinking
    setTimeout(() => {
        typingIndicator.style.display = 'none';
        
        // Use the centralized AI Mind knowledge base to generate the answer
        let responseHTML = window.cosyAIMind.ask(input);
        
        // Simulate typing out the response
        answerContent.innerHTML = responseHTML;
        
    }, 1500); // 1.5 seconds thinking time
}
</script>

<?php get_footer(); ?>
