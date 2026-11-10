document.addEventListener("DOMContentLoaded", function () {
    const counters = document.querySelectorAll('.counter');
    
    if (counters.length === 0) return;

    const startCounter = (counter) => {
        const target = parseInt(counter.getAttribute('data-target'));
        const duration = 2000; // مدة العد (بالمللي ثانية)
        const stepTime = 20;
        const totalSteps = duration / stepTime;
        const increment = target / totalSteps;
        let current = 0;

        const timer = setInterval(() => {
            current += increment;
            if (current >= target) {
                counter.innerText = target;
                clearInterval(timer);
            } else {
                counter.innerText = Math.ceil(current);
            }
        }, stepTime);
    };

    const observer = new IntersectionObserver((entries, observerInstance) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                startCounter(entry.target);
                observerInstance.unobserve(entry.target);
            }
        });
    }, { threshold: 0.2 });

    counters.forEach(counter => observer.observe(counter));
});