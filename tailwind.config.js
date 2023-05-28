/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      fontFamily: {
        poppins: ["Poppins", "sans-serif"],
        "open-sans": ["Open Sans", "sans-serif"],
      },
      boxShadow: {
        "dark-blue": "0px 0px 15px -2px rgba(8,47,73,0.75)",
        "dark-custom": "0px 0px 2px -1px rgba(0,0,0,1)",
      },
    },
  },
  plugins: [],
};
