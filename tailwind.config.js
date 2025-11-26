import forms from '@tailwindcss/forms';
const defaultTheme = require('tailwindcss/defaultTheme');

export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        extend: {
            screens: {
                '3xl': '2560px', //2K+
            },
            container: {
                padding: {
                    DEFAULT: '1rem',
                    sm: '2rem',
                    lg: '1rem',
                    xl: '1rem',
                    '3xl': '32rem', //2K+
                },
            },
            backgroundImage: {
                'auth': "linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('/assets/images/bg-auth.png')",
                'header': "linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('/assets/images/bg-header.png')",
                'info': "url('/assets/images/info.webp')",
                'starting': "linear-gradient(-90deg, rgba(26, 18, 99, 0.4) 100%, rgba(102, 102, 102, 0.8) 0%), url('/assets/images/starting-bg.webp')",
                'epic-navbar': "url('/assets/images/bg-navbar.png')",
                'epic-navbar-mobile': "url('/assets/images/bg-navbar-mobile.png')",
                'shop': "url('/assets/images/background-shop.svg')",
                'social': "linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('/assets/images/social.png')",
            },
            fontFamily: {
                sans: ['Open Sans', ...defaultTheme.fontFamily.sans],
                bebas: ['Bebas Neue', 'sans-serif'],
                barlow: ['Barlow Condensed', 'sans-serif'],
                sora: ['Sora', 'sans-serif'],
            },
        },
    },

    plugins: [forms],
};
