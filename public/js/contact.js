/* =========================================================
   contact.js: client-side form validation
   ========================================================= */

// 1. Select the elements
const form    = document.querySelector("#contactForm");
const success = document.querySelector("#successMessage");

const fields = {
    name:    document.querySelector("#name"),
    email:   document.querySelector("#email"),
    subject: document.querySelector("#subject"),
    message: document.querySelector("#message"),
};

// A simple email pattern: text, an @, text, a dot, text (no spaces)
const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

// 2. Show or clear an error for one field
function setError(name, text) {
    document.querySelector("#" + name + "Error").textContent = text;
    fields[name].classList.toggle("invalid", text !== "");
}

// 3. Check every field. Returns true only if all are valid.
function validate() {
    let valid = true;

    const name    = fields.name.value.trim();
    const email   = fields.email.value.trim();
    const subject = fields.subject.value.trim();
    const message = fields.message.value.trim();

    if (name === "") {
        setError("name", "Please enter your name.");
        valid = false;
    } else {
        setError("name", "");
    }

    if (email === "") {
        setError("email", "Please enter your email.");
        valid = false;
    } else if (!emailPattern.test(email)) {
        setError("email", "Please enter a valid email address.");
        valid = false;
    } else {
        setError("email", "");
    }

    if (subject === "") {
        setError("subject", "Please enter a subject.");
        valid = false;
    } else {
        setError("subject", "");
    }

    if (message === "") {
        setError("message", "Please enter your message.");
        valid = false;
    } else if (message.length < 10) {
        setError("message", "Your message should be at least 10 characters.");
        valid = false;
    } else {
        setError("message", "");
    }

    return valid;
}

// 4. On submit: stop the page reload, then validate
form.addEventListener("submit", (event) => {
    event.preventDefault();
    success.classList.remove("show");

    if (validate()) {
        // textContent (not innerHTML) so typed text can never run as code
        success.textContent = "Thank you, " + fields.name.value.trim() + "! Your message has been sent.";
        success.classList.add("show");
        form.reset();
    }
});

// 5. Clear a field's error as soon as the user starts fixing it
Object.keys(fields).forEach((name) => {
    fields[name].addEventListener("input", () => setError(name, ""));
});
