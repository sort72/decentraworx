const colors = require("tailwindcss/colors");

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./vendor/filament/**/*.blade.php",
    ],
    theme: {
        extend: {
            colors: {
                danger: colors.rose,
                primary: {
                    100: "#ebdef0",
                    200: "#d7bde2",
                    300: "#c39bd3",
                    400: "#af7ac5",
                    500: "#9b59b6",
                    600: "#7c4792",
                    700: "#5d356d",
                    800: "#3e2449",
                    900: "#1f1224",
                },
                success: colors.green,
                warning: colors.yellow,
            },
        },
    },
    safelist: [
        "bg-green-200",
        "text-green-800",
        "bg-blue-200",
        "text-blue-800",
        "bg-orange-200",
        "text-orange-800",
    ],
    plugins: [
        require("@tailwindcss/forms"),
        require("@tailwindcss/typography"),
    ],
};
