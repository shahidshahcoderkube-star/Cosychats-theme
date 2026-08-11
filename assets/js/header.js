/**
 * CosyChats Header Navigation & Mobile Menu Script
 */
document.addEventListener('DOMContentLoaded', function() {
    var toggleBtn = document.querySelector('.mobile-menu-toggle');
    var navLinks = document.querySelector('.nav-links');
    
    if (toggleBtn && navLinks) {
        toggleBtn.addEventListener('click', function(e) {
            e.stopPropagation();
            toggleBtn.classList.toggle('active');
            navLinks.classList.toggle('active');
        });
    }

    // Toggle submenus on mobile when clicking dropdown toggle
    var dropdownToggles = document.querySelectorAll('.cosy-dropdown-toggle');
    dropdownToggles.forEach(function(toggle) {
        toggle.addEventListener('click', function(e) {
            var hamburger = document.querySelector('.mobile-menu-toggle');
            var isMobile = hamburger && (hamburger.offsetWidth > 0 || hamburger.offsetHeight > 0);
            
            if (isMobile) {
                e.preventDefault();
                e.stopPropagation();
                var parentLi = toggle.closest('.cosy-header-dropdown-wrapper');
                if (parentLi) {
                    parentLi.classList.toggle('open');
                    var submenu = parentLi.querySelector('.cosy-custom-submenu');
                    if (submenu) {
                        if (parentLi.classList.contains('open')) {
                            submenu.style.setProperty('display', 'block', 'important');
                        } else {
                            submenu.style.setProperty('display', 'none', 'important');
                        }
                        // Force repaint/reflow
                        submenu.offsetHeight;
                    }
                }
            }
        });
    });

    // Close menu when clicking outside
    document.addEventListener('click', function(e) {
        if (navLinks && navLinks.classList.contains('active')) {
            if (!navLinks.contains(e.target) && !toggleBtn.contains(e.target)) {
                toggleBtn.classList.remove('active');
                navLinks.classList.remove('active');
            }
        }
    });
});
