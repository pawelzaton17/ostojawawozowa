/**
 * Remove Empty "<p>" Tags
 */

window.addEventListener("load", () => {
    const paragraphTags = document.querySelectorAll("p");

    [...paragraphTags].forEach((p) => {
        if (p.innerHTML.replace(/\s|&nbsp;/g, "").length === 0) {
            p.parentNode.removeChild(p);
        }
    });
});
