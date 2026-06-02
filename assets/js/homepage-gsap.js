document.addEventListener("DOMContentLoaded", function () {
    // Register ScrollTrigger
    gsap.registerPlugin(ScrollTrigger);

    // 1. Hero Section Animations (Fades in immediately on load)
    const heroTimeline = gsap.timeline({ defaults: { ease: "power3.out" } });
    
    heroTimeline.fromTo(".cosy-hero-title", 
        { y: 30, opacity: 0 }, 
        { y: 0, opacity: 1, duration: 1 }
    )
    .fromTo(".cosy-hero-text", 
        { y: 20, opacity: 0 }, 
        { y: 0, opacity: 1, duration: 0.8 }, 
        "-=0.6"
    )
    .fromTo(".cosy-hero-actions .cosy-btn", 
        { y: 20, opacity: 0 }, 
        { y: 0, opacity: 1, duration: 0.6, stagger: 0.15 }, 
        "-=0.6"
    )
    .fromTo(".cosy-trust-item", 
        { opacity: 0, x: -10 }, 
        { opacity: 1, x: 0, duration: 0.6, stagger: 0.1 }, 
        "-=0.4"
    )
    .fromTo(".preview-card", 
        { x: 40, opacity: 0 }, 
        { x: 0, opacity: 1, duration: 0.8, stagger: 0.2 }, 
        "-=1"
    );

    // 2. Search Section (Floats in on scroll)
    gsap.fromTo(".cosy-search-card", 
        { y: 50, opacity: 0, scale: 0.95 },
        { 
            y: 0, 
            opacity: 1, 
            scale: 1,
            duration: 0.8, 
            ease: "back.out(1.2)",
            scrollTrigger: {
                trigger: ".cosy-search-section",
                start: "top 85%",
                toggleActions: "play none none none"
            }
        }
    );

    // 3. What is CosyChats (Illustrated Cards stagger in)
    gsap.fromTo(".illus-card", 
        { y: 40, opacity: 0 },
        {
            y: 0,
            opacity: 1,
            duration: 0.8,
            stagger: 0.15,
            ease: "power2.out",
            scrollTrigger: {
                trigger: ".cosy-what-is",
                start: "top 80%",
            }
        }
    );

    // 4. Why CosyChats (Glass Cards stagger in)
    gsap.fromTo(".why-card", 
        { y: 50, opacity: 0, scale: 0.9 },
        {
            y: 0,
            opacity: 1,
            scale: 1,
            duration: 0.7,
            stagger: 0.15,
            ease: "back.out(1.4)",
            scrollTrigger: {
                trigger: ".cosy-why-us",
                start: "top 80%",
            }
        }
    );

    // 5. Start Your Conversation (Topic Cards scale in)
    gsap.fromTo(".topic-card", 
        { opacity: 0, scale: 0.8, y: 20 },
        {
            opacity: 1,
            scale: 1,
            y: 0,
            duration: 0.6,
            stagger: 0.1,
            ease: "power3.out",
            scrollTrigger: {
                trigger: ".cosy-start-conversation",
                start: "top 75%",
            }
        }
    );

    // 6. How it Works (Steps slide in from right)
    gsap.fromTo(".step-item", 
        { x: 30, opacity: 0 },
        {
            x: 0,
            opacity: 1,
            duration: 0.7,
            stagger: 0.2,
            ease: "power2.out",
            scrollTrigger: {
                trigger: ".cosy-how-it-works",
                start: "top 75%",
            }
        }
    );

    // 7. Support Circles (Cards pop up)
    gsap.fromTo(".circle-card", 
        { y: 40, opacity: 0 },
        {
            y: 0,
            opacity: 1,
            duration: 0.6,
            stagger: 0.1,
            ease: "back.out(1.2)",
            scrollTrigger: {
                trigger: ".cosy-support-circles",
                start: "top 80%",
            }
        }
    );

    // 8. Testimonials (Cards slide in from opposite sides)
    const testimonials = document.querySelectorAll(".testimonial-card");
    if (testimonials.length >= 2) {
        gsap.fromTo(testimonials[0], 
            { x: -50, opacity: 0 },
            {
                x: 0,
                opacity: 1,
                duration: 0.8,
                ease: "power2.out",
                scrollTrigger: {
                    trigger: ".cosy-testimonials",
                    start: "top 80%",
                }
            }
        );
        gsap.fromTo(testimonials[1], 
            { x: 50, opacity: 0 },
            {
                x: 0,
                opacity: 1,
                duration: 0.8,
                ease: "power2.out",
                scrollTrigger: {
                    trigger: ".cosy-testimonials",
                    start: "top 80%",
                }
            }
        );
    }
    // 9. All Section Headers (Titles animate in)
    const sectionHeaders = document.querySelectorAll(".section-header");
    sectionHeaders.forEach((header) => {
        gsap.fromTo(header,
            { y: 30, opacity: 0 },
            {
                y: 0,
                opacity: 1,
                duration: 0.8,
                ease: "power2.out",
                scrollTrigger: {
                    trigger: header,
                    start: "top 85%",
                }
            }
        );
    });

    // 10. Loop Strip (Fades and slides down smoothly)
    gsap.fromTo(".cosy-ticker-strip",
        { y: -20, opacity: 0 },
        {
            y: 0,
            opacity: 1,
            duration: 0.8,
            ease: "power2.out",
            scrollTrigger: {
                trigger: ".cosy-ticker-strip",
                start: "top 90%",
            }
        }
    );

    // 11. CTA Banner (Scale and fade in at the bottom)
    gsap.fromTo(".cosy-cta-banner",
        { y: 50, opacity: 0, scale: 0.95 },
        {
            y: 0,
            opacity: 1,
            scale: 1,
            duration: 1,
            ease: "power3.out",
            scrollTrigger: {
                trigger: ".cosy-cta-banner",
                start: "top 85%",
            }
        }
    );
});
