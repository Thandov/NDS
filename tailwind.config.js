/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './css/tailwindstyle.css', // Your Tailwind CSS file
    './css/frontend.css', // Add any other custom CSS files that might have Tailwind classes
    './includes/**/*.php', // PHP files in the includes directory
    './**/*.php', // All PHP files within the project if needed
  ],
  theme: {
    extend: {},
  },
  plugins: [],
}
