/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/views/*/*.blade.php",
    "./resources/views/dashboard.blade.php",
    "./resources/views/home.blade.php",
    "./resources/views/posts/index.blade.php",
    "./resources/js/*.js",
    "./resources/css/*.css",
    "./resources/*.{js,ts,jsx,tsx}",
  ],
  theme: {
    extend: {},
  },
  plugins: [],
}

