/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./src/Frontend/*.{html,js,php}","./node_modules/preline/dist/*.js"], 
  theme: {
    extend: {},
  },
  plugins: [
    // require('@tailwindcss/forms'),
    require('preline/plugin'),
  ],
}



