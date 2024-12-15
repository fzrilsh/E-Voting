import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        fontFamily: {
            "open-sans": ["'Open Sans'", 'sans-serif'],
            "inter": ['"Inter"', 'sans-serif'],
            "roboto": ['"Roboto"', 'sans-serif'],
            "inria-sans": ['"Inria Sans"', 'sans-serif']
        },
        extend: {
            colors: {
                "red-telkom": "#9f1521",
                "red-telkom-hover": "#5f0d14",
                'carmine': {
                    '50': '#fff1f2',
                    '100': '#ffe1e4',
                    '200': '#ffc8cd',
                    '300': '#ffa1a9',
                    '400': '#fe6b78',
                    '500': '#f73c4c',
                    '600': '#e51d2e',
                    '700': '#c01524',
                    '800': '#9f1521',
                    '900': '#841821',
                    '950': '#48070d',
                },
            }
        },
    },
    plugins: [],
};