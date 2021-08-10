/**
 * Hash Scroll Animation
 */

import { scrollToElement } from "../plugins/hash-scroll-helper";

document.querySelector("html").style.scrollBehavior = "unset";

/** If in url is # */
if (window.location.hash) {
    setTimeout(() => {
        window.scrollTo(0, 0);
    }, 1);
}

window.addEventListener("load", () => {
    const encoded = decodeURI(window.location.hash);

    if (encoded) {
        const destination = document.querySelector(encoded);

        scrollToElement(destination, 500, "easeInOutQuad", 25);
    }
});

const ScrollTriggers = document.querySelectorAll(".js-scroll-to");

/** Foreach selector */
[...ScrollTriggers].forEach((item) => {
    item.addEventListener("click", () => {
        // eslint-disable-next-line no-nested-ternary
        const selectClosestA = item.querySelector("a") || null;

        if (!selectClosestA) {
            return;
        }

        const selectItemFromClosestA = item.closest("a") || item;

        const dest = document.querySelector(selectItemFromClosestA.getAttribute("href"));

        scrollToElement(dest, 500, "easeInOutQuad", 25);
    });
});
