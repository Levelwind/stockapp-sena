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
            colors: {
                bento: {
                    base: '#08111f',
                    canvas: '#0d1729',
                    card: '#111c31',
                    cardHover: '#16233b',
                    border: '#24324a',
                    primary: '#0f766e',
                    primaryHover: '#115e59',
                    accent: '#d97706',
                    highlight: '#34d399',
                    muted: '#8fa2bf',
                },
            },
            fontFamily: {
                sans: ['"Plus Jakarta Sans"', ...defaultTheme.fontFamily.sans],
                display: ['Fraunces', 'Georgia', 'serif'],
            },
            animation: {
                'fade-up': 'fadeUp 0.7s cubic-bezier(0.16, 1, 0.3, 1) forwards',
                'fade-in': 'fadeIn 0.5s ease-out forwards',
                'float-soft': 'floatSoft 7s ease-in-out infinite',
                'pulse-soft': 'pulseSoft 4s ease-in-out infinite',
                drift: 'drift 16s linear infinite',
            },
            keyframes: {
                fadeUp: {
                    '0%': { opacity: '0', transform: 'translateY(26px)' },
                    '100%': { opacity: '1', transform: 'translateY(0)' },
                },
                fadeIn: {
                    '0%': { opacity: '0' },
                    '100%': { opacity: '1' },
                },
                floatSoft: {
                    '0%, 100%': { transform: 'translate3d(0, 0, 0)' },
                    '50%': { transform: 'translate3d(0, -10px, 0)' },
                },
                pulseSoft: {
                    '0%, 100%': { opacity: '0.6' },
                    '50%': { opacity: '1' },
                },
                drift: {
                    '0%': { transform: 'translateX(0)' },
                    '50%': { transform: 'translateX(18px)' },
                    '100%': { transform: 'translateX(0)' },
                },
            },
        },
    },

    plugins: [forms],
};
