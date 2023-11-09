/** @type {import('tailwindcss').Config} config */
const config = {
    content: ['./index.php', './app/**/*.php', './resources/**/*.{php,vue,js}'],
    theme: {
        extend: {
            colors: {
                clifford: '#da373d',
            }
        },
        fontFamily: {
            'sans': 'Barlow, Helvetica, Arial, sans-serif',
            'display': 'Unbounded, cursive',
            'mono': 'Roboto Mono, monospace',
        }
    },
    plugins: [
      require('@tailwindcss/typography'),
    ],
};

export default config;
