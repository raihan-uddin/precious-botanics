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
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            // fontFamily: {
            //     dosis: ["dosis", "sans-serif"],
            // },
            colors: {
                'primary': '#9FD62E',
                'secondary': '#1F232E',
                'secondary-light': '#222222',
            },
        },
        container: {
            center: true,
            padding: {
                default: '1rem',
                sm: '2rem',
                lg: '3rem',
                xl: '4rem',
            },
        },
    },

    plugins: [forms],
};
