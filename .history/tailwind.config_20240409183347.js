/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./src/Frontend/*.{html,js,php}"],
  theme: {
    extend: {},
  },
  plugins: [require("daisyui")],
}

