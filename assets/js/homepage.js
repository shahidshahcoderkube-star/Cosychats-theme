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
            answerContent.innerHTML = data.data.html;
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
