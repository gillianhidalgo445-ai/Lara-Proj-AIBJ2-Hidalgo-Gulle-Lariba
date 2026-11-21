/* =========================================================
   app.js: shared script (runs on every page)
   Light / dark mode toggle that remembers your choice.
   The site is dark by default; the "light" class switches it.
   ========================================================= */

// 1. Select the elements
const themeToggle = document.querySelector("#themeToggle");

// 2. Show the right label on the button
function updateButton() {
    const isLight = document.body.classList.contains("light");
    themeToggle.textContent = isLight ? "Dark mode" : "Light mode";
}

// 3. When the page loads, restore the saved theme
if (localStorage.getItem("theme") === "light") {
    document.body.classList.add("light");
}
updateButton();

// 4. When the button is clicked, switch themes and save the choice
themeToggle.addEventListener("click", () => {
    document.body.classList.toggle("light");
    localStorage.setItem("theme", document.body.classList.contains("light") ? "light" : "dark");
    updateButton();
});
