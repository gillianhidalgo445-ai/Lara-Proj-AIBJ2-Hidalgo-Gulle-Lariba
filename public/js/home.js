/* =========================================================
   home.js: slider + class booking for the Home page
   Part 1: slider (JavaScript requirement)
   Part 2: class booking (filter pills, Details, Book, saved credits)
   ========================================================= */


/* =================== PART 1: SLIDER =================== */

// 1. Select the elements
const slides  = document.querySelectorAll(".slide");
const prevBtn = document.querySelector("#prevBtn");
const nextBtn = document.querySelector("#nextBtn");
const dotBox  = document.querySelector("#dots");
const slider  = document.querySelector("#slider");

let current = 0;        // index of the slide that is showing
let timer;              // holds the autoplay timer

// 2. Create one dot per slide (JavaScript builds them, so the HTML stays short)
slides.forEach((slide, index) => {
    const dot = document.createElement("button");
    dot.type = "button";
    dot.className = "dot";
    dot.setAttribute("aria-label", "Go to slide " + (index + 1));
    dot.addEventListener("click", () => {
        showSlide(index);
        restartAutoplay();
    });
    dotBox.appendChild(dot);
});

const dots = document.querySelectorAll(".dot");

// 3. Show one slide: the "active" class is the only thing that changes
function showSlide(index) {
    // the % trick wraps around: after the last slide, go back to the first
    current = (index + slides.length) % slides.length;

    slides.forEach((slide, i) => slide.classList.toggle("active", i === current));
    dots.forEach((dot, i) => dot.classList.toggle("active", i === current));
}

// 4. Buttons
nextBtn.addEventListener("click", () => {
    showSlide(current + 1);
    restartAutoplay();
});

prevBtn.addEventListener("click", () => {
    showSlide(current - 1);
    restartAutoplay();
});

// 5. Autoplay every 5 seconds, paused while the mouse is on the slider
function startAutoplay() {
    timer = setInterval(() => showSlide(current + 1), 5000);
}

function restartAutoplay() {
    clearInterval(timer);
    startAutoplay();
}

slider.addEventListener("mouseenter", () => clearInterval(timer));
slider.addEventListener("mouseleave", startAutoplay);

// 6. Start
showSlide(0);
startAutoplay();

