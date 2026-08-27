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
				paper: '#FFFFFF',
				'paper-alt': '#F7FBFC',
				ink: '#093C5D',
				'ink-muted': '#3B7597',
				board: '#3B7597',
				'board-light': '#6FD1D7',
				'board-dark': '#093C5D',
				chalk: '#6FD1D7',
				mark: '#5DF8D8',
				success: '#5DF8D8',
				line: '#D9E8EE',
            },
        },
    },
    plugins: [],
};
