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
