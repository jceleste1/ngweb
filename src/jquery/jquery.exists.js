/**
 * Verify if a object exits.
 *
 * Example:
 * if ($(selector).exists()) {
 *     // Do something
 * }
 *
 * @link http://stackoverflow.com/questions/31044/is-there-an-exists-function-for-jquery
 */
jQuery.fn.exists = function(){return jQuery(this).length>0;}