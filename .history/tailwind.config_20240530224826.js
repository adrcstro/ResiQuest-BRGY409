/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./src/Frontend/*.{html,js,php}"],
  theme: {
    extend: {
      colors: {
        primary: '#083BB0',
        btnDark: '#012577',
        secondary: '#fefffe'
      },
    },
  },
  plugins: [require("daisyui")],
}

