/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./src/Frontend/*.{html,js,php,php#}"],
  theme: {
    extend: {},
  },
  plugins: [require("daisyui")],
}

