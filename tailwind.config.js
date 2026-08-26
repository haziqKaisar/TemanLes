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
                display: ['Fraunces', 'ui-serif', 'serif'],
                body: ['"Plus Jakarta Sans"', 'ui-sans-serif', 'system-ui', 'sans-serif'],
            },
            colors: {
                paper: '#F4F8F9',
                'paper-alt': '#E6EFF1',
                ink: '#093C5D',
                'ink-muted': '#5C7385',
                board: '#3B7597',
                'board-light': '#2A6183',
                'board-dark': '#093C5D',
                chalk: '#5DF8D8',
                mark: '#093C5D',
                success: '#187A63',
                line: '#D6E3E7',
                teal: '#6FD1D7',
            },
        },
    },
    plugins: [],
};
