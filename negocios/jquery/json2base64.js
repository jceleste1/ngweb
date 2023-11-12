/**
 * Convert from Object to Base64.
 */
if (typeof JSON.toBase64 !== 'function') {
    JSON.toBase64 = function (data) {
        data = JSON.stringify(data);
        data = Base64.encode(data);
        return data;
    };
}

/**
 * Convert from Base64 to Object.
 */
if (typeof JSON.fromBase64 !== 'function') {
    JSON.fromBase64 = function (data) {
        data = Base64.decode(data);
        data = JSON.parse(data);
        return data;
    };
}