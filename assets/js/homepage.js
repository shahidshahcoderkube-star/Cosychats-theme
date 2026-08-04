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

    // Scroll smoothly to response area
    responseArea.scrollIntoView({ behavior: 'smooth', block: 'nearest' });

    // Send search query to AI Search Engine Endpoint
    const formData = new FormData();
    formData.append('action', 'cosy_ai_search');
    formData.append('query', input);

    fetch(window.cosyAjax.ajaxurl, {
        method: 'POST',
        body: formData
    })
    .then(res => res.json())
    .then(data => {
        typingIndicator.style.display = 'none';

        if (data.success && data.data && data.data.html && data.data.html.trim() !== '') {
            // Render exact service-provider-grid-template.php HTML cards from plugin
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
            // Fallback if no matching profiles found
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
 * Ultra-Smooth Typewriter Rotating Search Placeholder
 */
document.addEventListener('DOMContentLoaded', function () {
    const inputEl = document.getElementById('ai-query-input');
    if (!inputEl) return;

    const topics = [
        'Teenagers',
        'ADHD',
        'Sleep',
        'IVF',
        'Autism',
        'Blended Family',
        'Baby Loss'
    ];

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

    typeEffect();

    inputEl.addEventListener('focus', function () {
        isPaused = true;
        if (timeoutId) clearTimeout(timeoutId);
    });

    inputEl.addEventListener('blur', function () {
        if (!inputEl.value) {
            isPaused = false;
            typeEffect();
        }
    });

    inputEl.addEventListener('input', function () {
        if (inputEl.value) {
            isPaused = true;
            if (timeoutId) clearTimeout(timeoutId);
        }
    });
});
