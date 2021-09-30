/**
 * Main Scripts
 */

/** GSap */
import "./plugins/gsap";

/** Match Auto Height */
// import "./plugins/match-height";

/** GLightbox */
// import "./plugins/glightbox";

/** Lazysizes */
import "lazysizes";
import "lazysizes/plugins/unveilhooks/ls.unveilhooks";

/** WebFontLoader */
import "webfontloader";

/** Custom Functions */
import "helpers/add-rel-atribute";
import "helpers/remove-empty-p-tags";
// import "helpers/visible-element-after-scroll";
// import "helpers/hash-scroll-animation";

/** Template Parts */
// import "partials/cookie-notice/index";
import "partials/screen-reader-shortcut-header/index";

/** Safari smooth scroll polyfill */
import smoothscroll from "smoothscroll-polyfill";

/** Object Fit IE Polyfill */
import objectFitImages from "object-fit-images";

smoothscroll.polyfill();

objectFitImages();
