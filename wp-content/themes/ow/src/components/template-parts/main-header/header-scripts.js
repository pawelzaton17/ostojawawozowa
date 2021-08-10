/**
 * Header Template Part Scripts
 */

import visibleElementAfterScroll from "helpers/visible-element-after-scroll";
import debounce from "helpers/debounce";

/** Change state for header */
const header = document.querySelector(".js-main-header");

/** Add Class after scroll */
const debounceVisibleELementAfterScroll = debounce(() => {
    visibleElementAfterScroll(header, header.offsetHeight, "main-header--is-window-scrolled");
}, 20);

/**
 * Hide Header on Scroll Down & Show on Scroll Up
 */
const toggleHeader = (currentScroll, direction, previousDirection) => {
    if (direction === 2 && currentScroll > header.offsetHeight) {
        header.classList.add("main-header--hide");
        return direction;
    }

    if (direction === 1) {
        header.classList.remove("main-header--hide");
        return direction;
    }

    return previousDirection;
};

let previousScroll = window.scrollY || document.documentElement.scrollTop;

/**
 * Hide or show header after scroll
 */
const hideHeaderDebounce = debounce(() => {
    const currentScroll = window.scrollY || document.documentElement.scrollTop;
    let direction = 0;
    let previousDirection = 0;

    /*
     ** Find the direction of scroll
     ** 0 - initial, 1 - up, 2 - down
     */
    if (currentScroll > previousScroll) {
        /**
         * scrolled up
         */
        direction = 2;
    } else if (currentScroll < previousScroll) {
        /**
         * scrolled down
         */
        direction = 1;
    }

    previousDirection = toggleHeader(currentScroll, direction, previousDirection);

    if (direction !== previousDirection) {
        toggleHeader(direction, currentScroll);
    }

    previousScroll = currentScroll;
}, 15);

/**
 * Init Functions
 */
window.addEventListener("scroll", () => {
    debounceVisibleELementAfterScroll();
    hideHeaderDebounce();
});
