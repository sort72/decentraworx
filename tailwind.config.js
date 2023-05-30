/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {},
    },
    safelist: [
        "bg-green-200",
        "text-green-800",
        "bg-blue-200",
        "text-blue-800",
        "bg-orange-200",
        "text-orange-800",
    ],
    plugins: [],
};
