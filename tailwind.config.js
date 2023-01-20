/** @type {import('tailwindcss').Config} */

const colors = require('tailwindcss/colors');

module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./node_modules/flowbite/**/*.js",
    './vendor/filament/**/*.blade.php'
  ],
  darkMode: 'class',
  theme: {
    fontFamily:{
      'logo-text':['Manrope', 'sans-serif'],
      'nav-text':['Inter', 'sans-serif'],
      'bold-text':['Archivo', 'sans-serif'],
      'paragraph-text':['Quicksand', 'san-serif'],
      'title-text':['Poppins', 'sans-serif']
    },

    colors: { 
      danger: colors.rose,
      primary: colors.blue,
      success: colors.green,
      warning: colors.yellow,
  }, 

    extend: {},
  },
  plugins: [
    require('flowbite/plugin'),
    
  ],
}