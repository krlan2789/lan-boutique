/** @type {import('tailwindcss').Config} */
const defaultTheme = require('tailwindcss/defaultTheme')

export default {
    darkMode: 'class',
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                primary: "#181818", // Eerie Black
                secondary: "#79678F", // French Lilac
                tertiary: "#FFFFFF", // White
                quaternary: "#F0F3FF", // Alice Blue
                dark: "#020617", // Rich Black
                danger: "#C62E2E", // Persian Red
                success: "#379777", // Illuminating Emerald
            },
            fontFamily: {
                sans: ['InterVariable', ...defaultTheme.fontFamily.sans],
            },
        },
    },
    plugins: [],
}

