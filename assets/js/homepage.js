/**
 * HOMEPAGE AI SEARCH & UI CONTROLLER
 * 
 * USE CASE:
 * Controls the interactive AI Natural Language Search on the Cosychats Homepage banner,
 * including typewriter placeholder animation and AJAX rendering of AI-matched provider cards.
 * 
 * HOW TO USE:
 * Loaded automatically on homepage rendering. `simulateCosyAI()` is triggered when user submits
 * a search query via search bar button or press of Enter key.
 * 
 * WHAT IT DOES INTERNALLY:
 * 1. `simulateCosyAI()`: Sends user input to `cosy_ai_search` AJAX endpoint, displays typing indicator,
 *    and dynamically injects semantic matching provider cards or fallback empty state.
 * 2. `typeEffect()`: Animates rotating typewriter search placeholder terms (e.g. Teenagers, IVF, ADHD).
 */

/**
 * EXECUTE HOMEPAGE AI SEARCH QUERY
 * 
 * USE CASE:
 * Fetches AI semantic search results from plugin backend when user types query on homepage.
 * 
 * HOW TO USE:
 * Triggered on click of "Ask AI" / Search button or form submission on homepage hero section.
 * 
 * WHAT IT DOES INTERNALLY:
 * 1. Validates and trims search query string from #ai-query-input.
 * 2. Unhides #ai-response-area container and shows typing indicator animation.
 * 3. Scrolls browser viewport smoothly to response container.
 * 4. Posts FormData with action 'cosy_ai_search' to WordPress AJAX endpoint.
 * 5. On success: Injects matching provider card HTML from plugin's SearchController.
 * 6. On empty/error: Shows friendly fallback banner with "Browse All Parent Guides" button.
 */
function simulateCosyAI() {
    const input = document.getElementById('ai-query-input').value.trim();
    if (!input) return;

    const responseArea = document.getElementById('ai-response-area');
    const typingIndicator = document.getElementById('ai-typing');
    const answerContent = document.getElementById('ai-answer');

    // 1. Display response wrapper and activate typing shimmer indicator
    responseArea.classList.remove('ai-response-hidden');
    responseArea.style.display = 'block';
    typingIndicator.style.display = 'flex';
    answerContent.innerHTML = '';

    // 2. Smoothly scroll browser window down to the AI answer section
    responseArea.scrollIntoView({ behavior: 'smooth', block: 'nearest' });

    // 3. Construct AJAX FormData payload for WordPress action 'cosy_ai_search'
    const formData = new FormData();
    formData.append('action', 'cosy_ai_search');
    formData.append('query', input);

    // 4. Send asynchronous request to WordPress AJAX endpoint (cosyAjax.ajaxurl)
    fetch(window.cosyAjax.ajaxurl, {
        method: 'POST',
        body: formData
    })
    .then(res => res.json())
    .then(data => {
        // Hide typing animation once server response returns
        typingIndicator.style.display = 'none';

        if (data.success && data.data && data.data.html && data.data.html.trim() !== '') {
            // 5. Render matching service provider cards returned by AI Search Engine
            let searchResultsHtml = data.data.html;
            searchResultsHtml += `
                <div class="cosy-browse-all-wrapper text-center my-4 w-100" style="display: flex; justify-content: center; width: 100%; margin-top: 36px; margin-bottom: 30px; grid-column: 1 / -1;">
                    <a href="${window.cosyAjax.siteUrl}/service-provider/" class="cosy-browse-all-parents-btn" style="display: inline-flex; align-items: center; justify-content: center; gap: 10px; background: linear-gradient(135deg, #a44390 0%, #6d2e67 100%); color: #ffffff; padding: 14px 34px; border-radius: 50px; font-weight: 700; font-size: 1rem; text-decoration: none; box-shadow: 0 4px 15px rgba(164, 67, 144, 0.3); transition: all 0.3s ease;">
                        Browse All Parents <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            `;
            answerContent.innerHTML = searchResultsHtml;
        } else {
            // 6. Display fallback notice if AI finds zero relevant providers matching query
            answerContent.innerHTML = `
                <div class="no-providers-found text-center py-5 w-100" style="background: #fdfdfd; border: 1px dashed #d1d5db; border-radius: 12px; padding: 30px;">
                    <i class="fas fa-search fa-3x mb-3" style="color: #9ca3af;"></i>
                    <h3 style="color: #4b5563; font-weight: 600; font-size: 1.25rem;">No Specific Guides Found</h3>
                    <p style="color: #6b7280; font-size: 0.95rem; margin-bottom: 16px;">Currently, there are no service providers matching "${input}".</p>
                    <a href="${window.cosyAjax.siteUrl}/service-provider" class="btn-premium btn-profile-v2" style="display: inline-block; padding: 10px 24px; text-decoration: none;">
                        Browse All Parent Guides &rarr;
                    </a>
                </div>
            `;
        }
    })
    .catch(err => {
        console.error('AI Search Error:', err);
        typingIndicator.style.display = 'none';
        answerContent.innerHTML = `
            <div style="background:#fff; border-radius:16px; padding:24px; border:1px solid #e5e7eb; text-align:center;">
                <p style="color:#ef4444; font-weight:600;">Unable to connect to AI Search engine. Please try again later.</p>
            </div>
        `;
    });
}

/**
 * TYPEWRITER ROTATING SEARCH PLACEHOLDER ANIMATION
 * 
 * USE CASE:
 * Animates realistic typing effect inside the homepage search bar placeholder to suggest search terms.
 * 
 * HOW TO USE:
 * Starts automatically on DOMContentLoaded event. Pauses when user focuses or types into search bar.
 * 
 * WHAT IT DOES INTERNALLY:
 * 1. Cycles through topics array (Teenagers, ADHD, Sleep, IVF, Autism, Blended Family, Baby Loss).
 * 2. Appends characters one-by-one with 65ms delay to create typing effect.
 * 3. Holds full word for 2000ms before deleting with 35ms backspace animation.
 */
document.addEventListener('DOMContentLoaded', function () {
    const inputEl = document.getElementById('ai-query-input');
    if (!inputEl) return;

    // Dynamically retrieve published service titles from WordPress database via cosyAjax
    const topics = (window.cosyAjax && Array.isArray(window.cosyAjax.topics)) ? window.cosyAjax.topics : [];

    // If no dynamic services exist in DB yet, display clean static placeholder and return
    if (topics.length === 0) {
        inputEl.setAttribute('placeholder', 'Try searching for guides or services...');
        return;
    }

    const prefix = 'Try searching: ';
    let topicIndex = 0;
    let charIndex = 0;
    let isDeleting = false;
    let isPaused = false;
    let timeoutId = null;

    function typeEffect() {
        if (isPaused || (inputEl.value && inputEl.value.trim() !== '')) {
            return;
        }

        const currentTopic = topics[topicIndex];

        if (isDeleting) {
            charIndex--;
        } else {
            charIndex++;
        }

        const displayedText = prefix + currentTopic.substring(0, charIndex);
        inputEl.setAttribute('placeholder', displayedText);

        let typeSpeed = isDeleting ? 35 : 65;

        if (!isDeleting && charIndex === currentTopic.length) {
            typeSpeed = 2000; // Hold full topic for 2 seconds
            isDeleting = true;
        } else if (isDeleting && charIndex === 0) {
            isDeleting = false;
            topicIndex = (topicIndex + 1) % topics.length;
            typeSpeed = 350;
        }

        timeoutId = setTimeout(typeEffect, typeSpeed);
    }

    // Start typewriter loop on load
    typeEffect();

    // Pause animation when user clicks/focuses inside the search input
    inputEl.addEventListener('focus', function () {
        isPaused = true;
        if (timeoutId) clearTimeout(timeoutId);
    });

    // Resume animation when user leaves input field empty
    inputEl.addEventListener('blur', function () {
        if (!inputEl.value) {
            isPaused = false;
            typeEffect();
        }
    });

    // Stop animation when user starts typing custom query text
    inputEl.addEventListener('input', function () {
        if (inputEl.value) {
            isPaused = true;
            if (timeoutId) clearTimeout(timeoutId);
        }
    });
});
