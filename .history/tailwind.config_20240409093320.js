/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./src/Frontend/*.{html,js}"],
  theme: {
    extend: {},
  },
  plugins: [require("daisyui")],
}

