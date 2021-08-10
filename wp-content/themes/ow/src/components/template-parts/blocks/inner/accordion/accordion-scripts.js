/**
 * ACF Block Accordion Template Part Scripts
 *
 * Scroll after open collaspe
 */

window.addEventListener("DOMContentLoaded", () => {
    const collapses = document.querySelectorAll(".js-collapse");

    [...collapses].forEach((collapse) => {
        collapse.addEventListener(
            "shown.bs.collapse",
            () => {
                const elementOffsetTop = collapse.parentNode.offsetTop - 20;

                window.scroll({
                    top: elementOffsetTop,
                    left: 0,
                    behavior: "smooth",
                });
            },
            false
        );
    });
});
