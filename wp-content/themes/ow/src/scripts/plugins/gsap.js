/**
 * GSAP
 */

import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";

gsap.registerPlugin(ScrollTrigger);

document.addEventListener("DOMContentLoaded", () => {
    gsap.utils.toArray("[data-anim=fade-up]").forEach((box) => {
        gsap.fromTo(
            box,
            {
                autoAlpha: 0,
                y: 50,
            },
            {
                scrollTrigger: {
                    trigger: box,
                    scrub: false,
                    toggleActions: "play pause resume reverse",
                    start: "30px 97.5%",
                },
                duration: 1,
                autoAlpha: 1,
                y: 0,
            }
        );
    });

    gsap.utils.toArray("[data-anim=fade-up-long]").forEach((box) => {
        gsap.fromTo(
            box,
            {
                autoAlpha: 0,
                y: 100,
            },
            {
                scrollTrigger: {
                    trigger: box,
                    scrub: false,
                    toggleActions: "play pause resume reverse",
                    start: "30px 97.5%",
                },
                duration: 1,
                autoAlpha: 1,
                y: 0,
            }
        );
    });

    gsap.utils.toArray("[data-anim=fade-in]").forEach((box) => {
        gsap.fromTo(
            box,
            {
                autoAlpha: 0,
            },
            {
                scrollTrigger: {
                    trigger: box,
                    scrub: false,
                    toggleActions: "play pause resume reverse",
                    start: "100px 97.5%",
                },
                duration: ".5",
                autoAlpha: 1,
            }
        );
    });
});
