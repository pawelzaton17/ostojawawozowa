/**
 * ACF Block List Template Part Scripts
 *
 */

document.addEventListener("DOMContentLoaded", () => {
    const formTextarea = document.querySelector(".js-list-textarea").querySelector("textarea");

    document.querySelectorAll(".js-list-modal-trigger").forEach((el) => {
        el.addEventListener("click", () => {
            const elNameValue = el
                .closest(".js-list-row")
                .querySelector(".js-list-item-title").innerText;

            formTextarea.innerHTML = "";
            formTextarea.innerHTML = `Zainteresował mnie ${elNameValue} w Państwa inwestycji. Chcę poznać więcej szczegółów.`;
        });
    });
});
