/**
 * Jarallax Plugin Template Part Scripts
 */

/**  Uncomment other parts of code if you need to use it */
import {
    jarallax,
    // jarallaxElement,
    // jarallaxVideo
} from "jarallax";

// jarallaxVideo();
// jarallaxElement();

const temp = [];
const jarallaxContainers = document.querySelectorAll("[id^='jarallax-container-']");

if(jarallaxContainers.length > 0) {
    [...jarallaxContainers].forEach((item) => {
        const parts = item.attributes[0].nodeValue.split("-");

        temp.push(parseInt(parts[2]));
    });
}

const nextId = Math.max.apply(Math, temp) + 1;

const jsJarallax = document.querySelectorAll(".js-jarallax");

if(jsJarallax.length > 0) {
   jarallax(document.querySelectorAll(".js-jarallax"), {
       speed: 0.2,
       onInit: function() {
           this.image.$container.attributes[0].nodeValue = "jarallax-container-" + nextId;
       }
   });
}

// const jarallaxElementY75 = document.querySelectorAll(".js-jarallax-element-y-75");

// if (jarallaxElementY75.length > 0) {
//     [...jarallaxElementY75].forEach((jarallaxElementY75single) => {
//         jarallax(jarallaxElementY75single, {
//             type: "element",
//             speed: "75 0",
//             onInit: function(){
//                 this.image.$container.attributes[0].nodeValue = "jarallax-container-"+nextId;
//             }
//         });
//     });
// }
