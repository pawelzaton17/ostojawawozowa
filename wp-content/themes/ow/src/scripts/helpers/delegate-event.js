/**
 * Helper to keep listeners on elements after ajax reload DOM Elements.
 * In easy way you can bind event's always listen on inputs or
 * elements using delefate events function
 *
 * delegateEvent("keyup","selector", () => { ... }
 *
 * You can pass, more events separating space:
 * delegateEvent("keyup paste","selector", () => { ... }
 */

/**
 * Function will match target to element and run callback;
 * @param {String} event
 * @param {String} element
 * @param {Function} callback
 */
const matchEventsWithTarget = (event, element, callback) => {
    if (event.target && event.target.matches(element)) {
        callback();
    }
};

/**
 * Delegate event in case when content is reladed by fetching data or ajax calls
 * @param {String} event
 * @param {String} element
 * @param {Function} callback
 */
export const delegateEvent = (event, element, callback) => {
    /** If you pass multiply events to delegate */
    if (event.includes(" ")) {
        const singleEventType = event.split(" ");

        /** Looking for events for match element in DOM */
        singleEventType.forEach((item) => {
            document.addEventListener(
                item,
                (singleEvent) => {
                    /** Match events with targets */
                    matchEventsWithTarget(singleEvent, element, callback);
                },
                false
            );
        });
    } else {
        document.addEventListener(
            event,
            (singleEvent) => {
                /** Match events with targets */
                matchEventsWithTarget(singleEvent, element, callback);
            },
            false
        );
    }
};
