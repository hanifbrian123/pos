import Validator from "./validator";

document.addEventListener("submit", function (e) {
    e.preventDefault();

    const form = e.target;

    if (!form.matches("form")) {
        return;
    }

    let valid = true;

    form.querySelectorAll("[data-rule]").forEach((field) => {
        if (!Validator.validateField(field)) {
            valid = false;
        }
    });

    if (valid) {
        form.submit();
    }
});
