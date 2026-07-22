import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Jost', ...defaultTheme.fontFamily.sans],
                display: ['"Cormorant Garamond"', 'serif'],
            },
            colors: {
                jade: {
                    50: '#EFF5F1',
                    100: '#DCEBE1',
                    200: '#B7D6C4',
                    300: '#8FBFA6',
                    400: '#5F9E82',
                    500: '#3D7D63',
                    600: '#2A6350',
                    700: '#1F4E3F',
                    800: '#153629',
                    900: '#0D261C',
                    950: '#081A13',
                },
                gold: {
                    50: '#FBF6EA',
                    100: '#F5EAC9',
                    200: '#EAD79A',
                    300: '#DEC176',
                    400: '#CDA75A',
                    500: '#BC934A',
                    600: '#9C7838',
                    700: '#7A5E2C',
                    800: '#5C4621',
                    900: '#3E2F17',
                },
                ivory: {
                    50: '#FFFEFC',
                    100: '#FBF8F1',
                    200: '#F5EFE1',
                    300: '#EDE4CE',
                },
            },
            boxShadow: {
                'luxury': '0 20px 40px -12px rgba(8, 26, 19, 0.25)',
            },
        },
    },

    plugins: [forms],
};
