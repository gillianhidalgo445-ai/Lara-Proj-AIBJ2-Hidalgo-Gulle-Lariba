/* =========================================================
   about.js: Read More / Read Less + animated number counters
   ========================================================= */

/* ---------- 1. Read More / Read Less ---------- */
const moreText      = document.querySelector("#moreText");
const readMoreBtn   = document.querySelector("#readMoreBtn");

readMoreBtn.addEventListener("click", () => {
    // toggle returns true if the class was added, false if it was removed
    const isOpen = moreText.classList.toggle("expanded");

    readMoreBtn.textContent = isOpen ? "Read Less" : "Read More";
    readMoreBtn.setAttribute("aria-expanded", isOpen);
});


/* ---------- 2. Animated counters ---------- */
const counters = document.querySelectorAll(".stat-number");

function runCounter(counter) {
    const target = Number(counter.dataset.target);   // data-target="50" in the HTML
    const steps = 60;                                // how many small jumps
    const increment = target / steps;
    let value = 0;

    const timer = setInterval(() => {
        value += increment;

        if (value >= target) {
            value = target;
            clearInterval(timer);                    // stop when we reach the target
        }
        counter.textContent = Math.round(value);
    }, 25);
}

// Start each counter only when it scrolls into view
const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
        if (entry.isIntersecting) {
            runCounter(entry.target);
            observer.unobserve(entry.target);        // run only once
        }
    });
});

counters.forEach((counter) => observer.observe(counter));
