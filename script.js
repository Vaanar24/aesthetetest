/* script.js */
document.addEventListener('DOMContentLoaded', () => {
    
    // Initial Fade In
    const home = document.getElementById('home');
    if(home) {
        setTimeout(() => {
            home.classList.add('visible');
        }, 100);
    }

    // Navigation Logic
    function navigate(targetId) {
        const current = document.querySelector('section.active');
        const next = document.getElementById(targetId);

        if(!next || current === next) return;

        // 1. Fade out current
        current.classList.remove('visible');

        // 2. Wait for fade out (600ms)
        setTimeout(() => {
            current.classList.remove('active');
            
            // 3. Prep next section
            next.classList.add('active');
            window.scrollTo(0,0);

            // 4. Fade in next
            setTimeout(() => {
                next.classList.add('visible');
            }, 50);

        }, 600); 

        // Update Nav State
        document.querySelectorAll('.nav-link').forEach(link => {
            link.classList.remove('active');
            if(link.getAttribute('data-target') === targetId) {
                link.classList.add('active');
            }
        });
    }

    // Event Listeners for Nav Links
    document.querySelectorAll('.nav-link').forEach(link => {
        link.addEventListener('click', (e) => {
            e.preventDefault();
            navigate(link.getAttribute('data-target'));
        });
    });

    // Event Listeners for CTA Buttons
    document.querySelectorAll('.nav-trigger').forEach(btn => {
        btn.addEventListener('click', (e) => {
            e.preventDefault();
            navigate(btn.getAttribute('data-target'));
        });
    });
});