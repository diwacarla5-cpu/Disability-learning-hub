// ===============================
// Learning Disabilities System
// script.js
// ===============================

// Welcome Message
window.addEventListener("load", function () {
    console.log("Learning Disabilities Learning System Loaded");
});

// Confirm Logout
function confirmLogout() {
    return confirm("Are you sure you want to logout?");
}

// Smooth Scroll
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener("click", function (e) {
        e.preventDefault();

        const target = document.querySelector(this.getAttribute("href"));

        if (target) {
            target.scrollIntoView({
                behavior: "smooth"
            });
        }
    });
});

// Form Validation
const forms = document.querySelectorAll("form");

forms.forEach(form => {

    form.addEventListener("submit", function (e) {

        const required = form.querySelectorAll("[required]");

        let valid = true;

        required.forEach(input => {

            if (input.value.trim() === "") {

                valid = false;

                input.style.border = "2px solid red";

            } else {

                input.style.border = "1px solid #ccc";

            }

        });

        if (!valid) {

            e.preventDefault();

            alert("Please fill in all required fields.");

        }

    });

});

// Button Hover Animation
const buttons = document.querySelectorAll(".btn");

buttons.forEach(btn => {

    btn.addEventListener("mouseenter", () => {

        btn.style.opacity = "0.9";

    });

    btn.addEventListener("mouseleave", () => {

        btn.style.opacity = "1";

    });

});