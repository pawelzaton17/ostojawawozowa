/**
 * ACF Block Hero Template Part Scripts
 *
 */

/** Tiny Slider */
// eslint-disable-next-line import/no-extraneous-dependencies
import "tiny-slider/dist/tiny-slider.css";
// eslint-disable-next-line import/no-extraneous-dependencies
import { tns } from "tiny-slider/src/tiny-slider";

/** Init Tiny Slider with dots and custom controls */

const blockHeroSlider = () => {
    const commonCarouselWrapper = document.querySelectorAll(".js-tiny-slider-hero");

    [...commonCarouselWrapper].forEach((sliderWrapper) => {
        const slider = sliderWrapper.querySelector(".js-tiny-slider-row");
        const controlsContainer = sliderWrapper.querySelector(".crunch-tiny-slider__controls");
        const tnsSlider = tns({
            container: slider,
            items: 1,
            autoplay: true,
            mouseDrag: true,
            lazyload: true,
            nav: true,
            autoplayButtonOutput: false,
            navPosition: "bottom",
            loop: true,
            controls: true,
            mode: "gallery",
            animateDelay: 300,
            responsive: {
                992: {
                    mouseDrag: false,
                },
            },
            controlsText: [
                "<svg class='tns-controls__icon' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 253.21 442.83'><title>icon__chevron-regular-left--black-color</title><path d='M229.9,439.31l19.8-19.79a12,12,0,0,0,0-17L69,221.41,249.7,40.28a12,12,0,0,0,0-17L229.9,3.51a12,12,0,0,0-17,0L3.51,212.93a12,12,0,0,0,0,17L212.93,439.31A12,12,0,0,0,229.9,439.31Z'/></svg>",
                "<svg class='tns-controls__icon' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 253.21 442.83'><title>icon__chevron-regular-right--black-color</title><path d='M23.31,3.52,3.51,23.31a12,12,0,0,0,0,17l180.7,181.13L3.51,402.54a12,12,0,0,0,0,17l19.8,19.79a12,12,0,0,0,17,0L249.7,229.9a12,12,0,0,0,0-17L40.28,3.52A12,12,0,0,0,23.31,3.52Z'/></svg>",
            ],
            controlsContainer,
        });
        // Slider counter
        let sliderInfo = tnsSlider.getInfo();
        sliderWrapper.querySelector(".slider-info-print").innerHTML = `${sliderInfo.index + 1} / ${
            sliderInfo.slideCount
        }`;

        tnsSlider.events.on("indexChanged", () => {
            sliderInfo = tnsSlider.getInfo();
            sliderWrapper.querySelector(
                ".slider-info-print"
            ).innerHTML = `${sliderInfo.displayIndex} / ${sliderInfo.slideCount}`;
        });
    });
};

if (document.querySelector(".js-tiny-slider")) {
    blockHeroSlider();
}
