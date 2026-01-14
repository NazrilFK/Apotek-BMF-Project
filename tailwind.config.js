export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            /* FONT */
            fontFamily: {
                apotek: ['Pacifico', 'cursive'],
            },

            /* COLOR */
            colors: {
                aqua: '#22d3ee',
            },

            /* ANIMATION KEYFRAMES */
            keyframes: {
                fadeUp: {
                    '0%': { opacity: '0', transform: 'translateY(40px)' },
                    '100%': { opacity: '1', transform: 'translateY(0)' },
                },
                slideLeft: {
                    '0%': { opacity: '0', transform: 'translateX(-50px)' },
                    '100%': { opacity: '1', transform: 'translateX(0)' },
                },
                slideRight: {
                    '0%': { opacity: '0', transform: 'translateX(50px)' },
                    '100%': { opacity: '1', transform: 'translateX(0)' },
                },
                float: {
                    '0%, 100%': { transform: 'translateY(0)' },
                    '50%': { transform: 'translateY(-8px)' },
                },

                /* 🔥 GRADIENT MOVE (BARU) */
                gradientMove: {
                    '0%': { backgroundPosition: '0% 50%' },
                    '100%': { backgroundPosition: '100% 50%' },
                },
            },

            /* ANIMATION UTILITIES */
            animation: {
                'fade-up': 'fadeUp 0.9s ease-out both',
                'slide-left': 'slideLeft 0.9s ease-out both',
                'slide-right': 'slideRight 0.9s ease-out both',
                'float': 'float 6s ease-in-out infinite',

                /* 🔥 GRADIENT MOVE (OPSIONAL UTIL) */
                'gradient-move': 'gradientMove 6s linear infinite',
            },
        },
    },
    plugins: [],
}
