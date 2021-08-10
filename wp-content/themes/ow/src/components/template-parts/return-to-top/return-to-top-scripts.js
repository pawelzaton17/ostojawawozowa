/**
 * Return To Top Part Scripts
 */

import visibleElementAfterScroll from "helpers/visible-element-after-scroll";

window.addEventListener("scroll", () => {
    /** Visibilty return to top */
    const returnToTop = document.querySelector(".js-return-to-top");

    visibleElementAfterScroll(returnToTop, 100, "return-to-top--is-visible");
});
