/**
 * ACF Block List Template Part Scripts
 *
 */

document.addEventListener("DOMContentLoaded", () => {
    const formTextarea = document.querySelector(".js-list-textarea");

    if (formTextarea) {
        const formTextareaElement = formTextarea.querySelector("textarea");

        document.querySelectorAll(".js-list-modal-trigger").forEach((el) => {
            el.addEventListener("click", () => {
                const elNameValue = el
                    .closest(".js-list-row")
                    .querySelector(".js-list-item-title").innerText;

                formTextareaElement.innerHTML = "";
                formTextareaElement.innerHTML = `Zainteresował mnie ${elNameValue} w Państwa inwestycji. Chcę poznać więcej szczegółów.`;
            });
        });
    }
});
