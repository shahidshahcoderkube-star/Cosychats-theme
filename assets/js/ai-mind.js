/**
 * CosyChats AI Mind - Knowledge Base & Logic
 * This contains the core contextual information about CosyChats.
 */

window.cosyAIMind = {
    // The core knowledge base extracted from cosychats.com
    knowledgeBase: {
        about: "CosyChats connects people who have had similar experiences for private, judgement-free, one-to-one conversations. It is built around conversation, not advice, therapy or support services.",
        topics: {
            "adhd": "ADHD & ASD",
            "autism": "ADHD & ASD",
            "asd": "ADHD & ASD",
            "teen": "Parents of Teenagers",
            "newborn": "Baby & Toddler",
            "toddler": "Baby & Toddler",
            "baby": "Baby & Toddler",
            "divorce": "Divorce & Separation",
            "separation": "Divorce & Separation",
            "adoption": "IVF & Adoption",
            "ivf": "IVF & Adoption",
            "loss": "Baby Loss / Grief",
            "grief": "Baby Loss / Grief",
            "anxiety": "Child Anxiety",
            "school": "School-Age Kids",
            "young": "Young Mums",
            "blended": "Blended Families",
            "best": "General Recommendations"
        },
        providers: {
            "Amanda": { role: "Mum of 1", expertise: "ADHD, ASD, Kids", link: "/service/kids/provider/439/" },
            "Michelle": { role: "Mum at 19", expertise: "Young Mums, Teenagers", link: "/service/teenagers/provider/557/" },
            "Sarah M.": { role: "ADHD / ASD Mum Guide", expertise: "School support, behaviour strategies", link: "/service-provider/?search=ADHD" },
            "Marcus K.": { role: "Teenager Dad Guide", expertise: "Screens, boundaries, school exam anxiety", link: "/service-provider/?search=teen" }
        }
    },

    /**
     * Generate an answer based on user query
     */
    ask: function(query) {
        const lowerQuery = query.toLowerCase();
        let topicFound = null;
        let matchedKeyword = null;

        // Search knowledge base for matching topics
        for (const [keyword, category] of Object.entries(this.knowledgeBase.topics)) {
            if (lowerQuery.includes(keyword)) {
                topicFound = category;
                matchedKeyword = keyword;
                break;
            }
        }

        let responseHTML = "";

        if (topicFound) {
            
            // Custom empathy logic & deep details based on keyword
            if (['adhd', 'autism', 'asd'].includes(matchedKeyword)) {
                responseHTML += `<p><strong>Cosy AI:</strong> Navigating an ADHD or ASD diagnosis can be incredibly overwhelming. Many parents go through a steep learning curve regarding school support plans (like EHCPs), behaviour strategies, and emotional regulation.</p>`;
                responseHTML += `<p>At CosyChats, you don't have to figure it out alone. I highly recommend speaking with <strong>Amanda (Mum of 1)</strong> or <strong>Sarah M.</strong> who have successfully navigated school support systems for their autistic children. They offer practical advice and a judgment-free listening ear.</p>`;
                responseHTML += `<a href="${window.cosyAjax.siteUrl}/service-provider/?search=ADHD" class="ai-book-btn">View ADHD/ASD Parent Guides &rarr;</a>`;
            
            } else if (['loss', 'grief'].includes(matchedKeyword)) {
                responseHTML += `<p><strong>Cosy AI:</strong> I am so deeply sorry you are going through this. Experiencing baby loss or intense grief is a deeply emotional and often very lonely journey.</p>`;
                responseHTML += `<p>While friends and family try their best, sometimes the only person who truly understands is someone who has lived through that exact same heartbreak. CosyChats offers a completely confidential, safe space where you can connect one-to-one with another parent who has also experienced loss.</p>`;
                responseHTML += `<p>There is no pressure to talk in a certain way—just a supportive, equal peer-to-peer conversation.</p>`;
                responseHTML += `<a href="${window.cosyAjax.siteUrl}/service-provider/?search=loss" class="ai-book-btn">Find a Peer Support Guide &rarr;</a>`;
            
            } else if (['divorce', 'separation'].includes(matchedKeyword)) {
                responseHTML += `<p><strong>Cosy AI:</strong> Going through a separation while co-parenting is incredibly tough. It's completely normal to feel stressed about custody arrangements, the emotional impact on the kids, and finding a new normal.</p>`;
                responseHTML += `<p>Speaking to a parent who has successfully navigated divorce and blended family life can give you immense clarity and comfort. We have verified guides who specialize in co-parenting challenges.</p>`;
                responseHTML += `<a href="${window.cosyAjax.siteUrl}/service-provider/?search=divorce" class="ai-book-btn">View Co-Parenting Guides &rarr;</a>`;
            
            } else if (['teen', 'school'].includes(matchedKeyword)) {
                responseHTML += `<p><strong>Cosy AI:</strong> Teenagers pulling away, dealing with school anxiety, or spending too much time on screens are some of the most common challenges parents face today. Establishing boundaries without causing a daily battle is tricky.</p>`;
                responseHTML += `<p>I recommend checking out <strong>Marcus K. (Teenager Dad Guide)</strong>. He has great experience handling screen time and boundary setups with two teenagers.</p>`;
                responseHTML += `<a href="${window.cosyAjax.siteUrl}/service-provider/?search=teen" class="ai-book-btn">View Teenager Parent Guides &rarr;</a>`;
            
            } else if (['young'].includes(matchedKeyword)) {
                responseHTML += `<p><strong>Cosy AI:</strong> Being a young mum comes with its own unique set of challenges and societal pressures. It helps to talk to someone who understands exactly how that feels.</p>`;
                responseHTML += `<p>I recommend connecting with <strong>Michelle (Mum at 19)</strong>. She’s an experienced guide on CosyChats who can share her personal journey and offer a completely judgment-free space.</p>`;
                responseHTML += `<a href="${window.cosyAjax.siteUrl}/service/teenagers/provider/557/" class="ai-book-btn">Chat with Michelle &rarr;</a>`;
            
            } else if (matchedKeyword === 'best') {
                responseHTML += `<p><strong>Cosy AI:</strong> The "best" provider really depends on what you are going through right now! We have amazing guides for various situations:</p>`;
                responseHTML += `<ul>
                    <li><strong>Amanda</strong> - Expert for Kids with ADHD & ASD.</li>
                    <li><strong>Marcus K.</strong> - Great for navigating Teenage boundaries and screen time.</li>
                    <li><strong>Michelle</strong> - Understands the unique challenges of being a Young Mum.</li>
                </ul>`;
                responseHTML += `<p>Could you tell me a little bit more about what you are currently dealing with? (e.g., toddler tantrums, newborn sleep, divorce)</p>`;
            
            } else {
                responseHTML += `<p><strong>Cosy AI:</strong> I see you are asking about <strong>${topicFound}</strong>. At CosyChats, we believe there is immense comfort in knowing someone else has been there.</p>`;
                responseHTML += `<p>Sometimes it just helps to talk. We can connect you with a parent who understands this from their own experience for a private, 1-on-1 chat.</p>`;
                responseHTML += `<a href="${window.cosyAjax.siteUrl}/service-provider/?search=${encodeURIComponent(matchedKeyword)}" class="ai-book-btn">View Guides for ${topicFound} &rarr;</a>`;
            }

        } else {
            // General fallback response
            responseHTML = `
                <p><strong>Cosy AI:</strong> Thank you for sharing that with me.</p>
                <p>CosyChats connects you with parents who have walked in your shoes for private, judgement-free, one-to-one conversations. We are built around shared experiences, not formal therapy.</p>
                <p>Whether you're dealing with school anxiety, navigating a new baby, going through IVF, or just need a listening ear, we can help you find a peer guide.</p>
                <a href="${window.cosyAjax.siteUrl}/service-provider/?search=${encodeURIComponent(query)}" class="ai-book-btn">Search All Parent Guides &rarr;</a>
            `;
        }

        return responseHTML;
    }
};
