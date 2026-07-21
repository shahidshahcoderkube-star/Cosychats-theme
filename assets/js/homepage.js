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
