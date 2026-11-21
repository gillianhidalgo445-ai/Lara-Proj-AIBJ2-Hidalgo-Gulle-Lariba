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


/* =================== PART 2: CLASS BOOKING =================== */

// 1. Select the elements
const START_CREDITS = 10;
const balanceText   = document.querySelector("#creditBalance");
const resetCredits  = document.querySelector("#resetCredits");
const toast         = document.querySelector("#toast");
const filterBtns    = document.querySelectorAll(".filter");
const classCards    = document.querySelectorAll(".class-card");

// 2. The balance. localStorage only stores strings, so we convert with Number()
let credits = START_CREDITS;
const savedCredits = localStorage.getItem("credits");
if (savedCredits !== null) {
    credits = Number(savedCredits);
}

function showBalance() {
    balanceText.textContent = credits;

    // dim the Book button of any class we cannot afford (it still shows a message when clicked)
    classCards.forEach((card) => {
        const cost = Number(card.dataset.cost);          // data-cost="2" in the HTML
        card.querySelector(".book-btn").classList.toggle("low", credits < cost);
    });
}

function showToast(message, isError) {
    toast.textContent = message;
    toast.classList.add("show");
    toast.classList.toggle("error", isError);
}

// 3. Filter pills: show only the classes that match the clicked pill
filterBtns.forEach((btn) => {
    btn.addEventListener("click", () => {
        const choice = btn.dataset.filter;               // "1", "2", "3" or "all"

        filterBtns.forEach((b) => b.classList.toggle("active", b === btn));

        classCards.forEach((card) => {
            const match = choice === "all" || card.dataset.cost === choice;
            card.classList.toggle("hidden", !match);
        });
    });
});

// 4. Each class card: Details toggles the extra text, Book spends the credits
classCards.forEach((card) => {
    const detailsBtn = card.querySelector(".details-btn");
    const bookBtn    = card.querySelector(".book-btn");
    const detailsTxt = card.querySelector(".details");
    const cost       = Number(card.dataset.cost);
    const name       = card.querySelector("h3").textContent;

    detailsBtn.addEventListener("click", () => {
        const open = detailsTxt.classList.toggle("open");
        detailsBtn.textContent = open ? "Hide" : "Details";
    });

    bookBtn.addEventListener("click", () => {
        if (credits >= cost) {
            credits -= cost;
            localStorage.setItem("credits", credits);
            showBalance();
            showToast("Booked: " + name, false);
        } else {
            showToast("Not enough credits. You need " + (cost - credits) + " more.", true);
        }
    });
});

// 5. Reset button (handy for the demo)
resetCredits.addEventListener("click", () => {
    credits = START_CREDITS;
    localStorage.setItem("credits", credits);
    showBalance();
    showToast("Credits reset to " + START_CREDITS + ".", false);
});

// 6. Start
showBalance();
