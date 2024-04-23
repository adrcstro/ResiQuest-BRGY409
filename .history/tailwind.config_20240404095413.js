/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./src/Frontend/*.{html,js,php}"],
  theme: {
    extend: {},
  },
  module.exports = {
    //...
    plugins: [require("daisyui")],
  }
}

