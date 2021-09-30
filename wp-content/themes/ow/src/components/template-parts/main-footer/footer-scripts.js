/**
 * Footer Template Part Scripts
 */

const stickyFooter = () => {
    /** Define footer */
    const footer = document.querySelector(".js-main-footer-wrapper");

    /** Define footer position */
    const pos = footer.offsetTop;

    /** Define wp admin bar */
    const wpAdminBar = document.querySelector("#wpadminbar");

    /** Define height of window */
    let height = window.innerHeight - pos - footer.clientHeight;

    /** Change height if wp admin bar lenght */
    if (wpAdminBar != null) {
        height -= wpAdminBar.clientHeight;
    }

    /** Add margin top for margin top */
    if (height > 0) {
        footer.style.marginTop = `${height}px`;
    }
};

const modalButtons = document.querySelectorAll(".main-footer__buttons-item");

document.addEventListener("DOMContentLoaded", () => {
    if (modalButtons) {
        modalButtons.forEach((el) => {
            el.addEventListener("mouseover", () => {
                const textItem = el.querySelector(".js-main-footer-buttons-text");

                textItem.classList.add("is-visible");
            });
            el.addEventListener("mouseout", () => {
                const textItem = el.querySelector(".js-main-footer-buttons-text");

                textItem.classList.remove("is-visible");
            });
        });
    }
});

window.addEventListener("load", () => {
    stickyFooter();
});

window.addEventListener("resize", () => {
    stickyFooter();
});

window.addEventListener("orientationchange", () => {
    stickyFooter();
});
