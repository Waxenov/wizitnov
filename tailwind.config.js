import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        darkMode: 'class',
        screens: {
            minimal: '320px',
            mobile: '375px',
            tablet: '768px',
            laptop: '1024px',
            desktop: '1440px',
        },
        colors: {
            'transparent': 'transparent',
            'hipnymph': '#FAEEDD',
            'oldpaper': '#E0C9A6',
            'brownpaper': '#B59B7C',
            'milano': '#9E3332',
            'crimson': '#990000',
            'coffee': '#442D25',
            'darkout': '#332211',
        },
        extend: {
            fontFamily: {
                pix: ['Snowstorm'],
                big: ['InvolveBold'],
                base: ['InvolveMedium'],
            },
            backgroundImage: {
                'texture': "url('/resources/img/texture.svg')",
            },
        },
    },

    plugins: [forms, typography],
};