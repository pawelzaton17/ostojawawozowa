/**
 * Responsive Auto Height 
 * Match height elements in row by attr
 */

import ResponsiveAutoHeight from "responsive-auto-height";

function matchHeightByAttr() {
    const mhAttributesContainers = document.querySelectorAll("[data-mh]");

    if (mhAttributesContainers) {
        /** Create array with attribute[data-mh] values */
        const attributesArr = [];

        [...mhAttributesContainers].map(block => {
            attributesArr.push(block.getAttribute("data-mh"));
        });

        /** Remove duplicates of attribute [data-mh] values */
        const attributes = attributesArr.filter((x, i, a) => a.indexOf(x) == i);

        attributes.forEach(value => {
            new ResponsiveAutoHeight("[data-mh="+value+"]");
        });
    }
}

/** Match height elements in row by class */
function matchHeightElementByClass() {
    /** Define selectors */
    const matchHeightElements = document.querySelectorAll(".js-match-height-by-class");

    /** Define array with elements height */
    const heightArray = [...matchHeightElements].map(element => {
        return element.offsetHeight;
    });

    /** Define the highest element */
    const heightElement = Math.max(...heightArray);

    /** Return the height for each element */
    [...matchHeightElements].forEach((element) => {
        element.style.height = `${heightElement}px`;
    });
}

document.addEventListener("DOMContentLoaded", () => {
    matchHeightByAttr();
    matchHeightElementByClass();
});
