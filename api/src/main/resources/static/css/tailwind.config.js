/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./src/main/resources/templates/**/*.{html,js,thymeleaf}",
    "./src/main/resources/static/**/*.{html,js}",  
  ],
  theme: {
    extend: {
      backgroundImage: {
        'dots': 'radial-gradient(circle, rgba(0, 0, 0, 0.1) 1px, transparent 1px)',
      },
      backgroundSize: {
        'dots': '20px 20px', // Adjust the dot size
      },
      backgroundColor: {
        'light-gray': '#f3f4f6',
      },
    },
  },
  plugins: [
               require("@tailwindcss/typography"),
               Unfonts.default.vite({
                 custom: {
                   families: [
                     {
                       name: "Oswald",
                       local: "Oswald",
                       src: "./fonts/Inter-Regular.ttf",
                     },
                   ],
                 },
               }),
             ],
           };
}

