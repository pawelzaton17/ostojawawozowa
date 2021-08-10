/**
 * Entry Content Template Part Scripts
 */
import GLightbox from "glightbox";

/** Custom Functions */
document.addEventListener("DOMContentLoaded", () => {
    /**
     * Make Table Responsive (Bootstrap)
     */
    const tables = document.querySelectorAll(".entry-content table");
    [...tables].forEach((table) => {
        // Create wrapper for responsive table
        const responsiveTable = document.createElement("div");

        // Add Bootrap Class for table responsive
        responsiveTable.classList.add("table-responsive");

        // Set table element to new container
        responsiveTable.innerHTML = table.outerHTML;

        // Inserts new container in front of original table
        table.parentNode.insertBefore(responsiveTable, table);

        // Remove original table
        table.remove();
    });

    /**
     * Margin top for image
     */
    const images = document.querySelectorAll(
        ".entry-content p > img, .entry-content p > .wp-caption"
    );

    [...images].forEach((image) => {
        if (image.parentNode.parentNode.nextSibling !== null) {
            image.classList.add("add-margin-bottom");
        }
    });

    /**
     * GLightbox
     */
    const glightboxImages = document.querySelectorAll(`
        .entry-content a[href*='.jpg'],
        .entry-content a[href*='.jpeg'],
        .entry-content a[href*='.png']`);

    [...glightboxImages].forEach((image) => {
        image.classList.add("glightbox");
    });

    // eslint-disable-next-line
    const glightbox = GLightbox({
        touchNavigation: true,
    });
});
