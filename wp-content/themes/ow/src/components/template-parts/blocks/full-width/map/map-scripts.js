/**
 * ACF Block Map Template Part Scripts
 *
 */

import "bootstrap/scss/_accordion.scss";
import "bootstrap/scss/_transitions.scss";
import "bootstrap/js/dist/collapse";

document.querySelectorAll(".js-acf-block-map__heading-wrapper").forEach((el) => {
    el.addEventListener("click", () => {
        const elTarget = el.dataset.tabimage;

        document.querySelectorAll(".js-acf-block-map__figure").forEach((tabFigure) => {
            tabFigure.classList.remove("acf-block-map__figure--active");

            if (tabFigure.classList.contains(elTarget)) {
                tabFigure.classList.add("acf-block-map__figure--active");
            }
        });
    });
});
