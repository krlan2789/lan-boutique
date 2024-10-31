/** @type {import('tailwindcss').Config} */
const defaultTheme = require('tailwindcss/defaultTheme')
// const aspectRatio = require('@tailwindcss/aspect-ratio')

export default {
    darkMode: 'class',
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        // './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    ],
    theme: {
        extend: {
            gridTemplateRows: {
                '[auto,auto,1fr]': 'auto auto 1fr',
            },
            colors: {
                primary: "#79678F", // French Lilac
                secondary: "#181818", // Eerie Black
                tertiary: "#FFFFFF", // White
                quaternary: "#F0F3FF", // Alice Blue
                dark: "#020617", // Rich Black
                danger: "#C62E2E", // Persian Red
                success: "#379777", // Illuminating Emerald
                warning: "#FFDD00", // Golden Yellow
            },
            fontFamily: {
                sans: ['InterVariable', ...defaultTheme.fontFamily.sans],
            },
            animation: {
                bounce1: 'bounce1 1s infinite',
                bounce2: 'bounce2 1s infinite 0.2s',
                bounce3: 'bounce3 1s infinite 0.4s',
            },
            keyframes: {
                bounce1: {
                    '0%, 20%, 100%': { transform: 'translateY(0)' },
                    '50%': { transform: 'translateY(-15px)' },
                },
                bounce2: {
                    '0%, 20%, 100%': { transform: 'translateY(0)' },
                    '50%': { transform: 'translateY(-15px)' },
                },
                bounce3: {
                    '0%, 20%, 100%': { transform: 'translateY(0)' },
                    '50%': { transform: 'translateY(-15px)' },
                },
            },
        },
    },
    plugins: [],
}

