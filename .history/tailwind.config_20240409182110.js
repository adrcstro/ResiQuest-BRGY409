/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./src/Frontend/**/*.{html,js,php}", // Include HTML, JS, and PHP files in Frontend folder
    "./src/Frontend/**/*.css", // Include CSS files in Frontend folder
    "./src/**/*.{html,js,php}", // Include HTML, JS, and PHP files in all other folders
    "./src/**/*.css", // Include CSS files in all other folders
  ],
  theme: {
    extend: {},
  },
  plugins: [require("daisyui")],
};
