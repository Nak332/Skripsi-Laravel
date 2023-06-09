const colors = require('tailwindcss/colors')
/** @type {import('tailwindcss').Config} */
module.exports = {
  // darkMode: "class",
  presets: [
    // require("./vendor/wireui/wireui/tailwind.config.js"),
    require("./vendor/power-components/livewire-powergrid/tailwind.config.js"),
  ],
  content: [    
  "./resources/**/*.blade.php",
  "./resources/**/*.js",
  "./resources/**/*.vue",
  './vendor/rappasoft/laravel-livewire-tables/resources/views/**/*.blade.php',
  './vendor/livewire-ui/modal/resources/***/**/*.blade.php'
  
  ],
  
  
  theme: {
    extend: {
      colors: {
        "pg-primary": colors.white,
        
    },
    },
  },
  plugins: [],
  safelist: [
    {
       pattern: /max-w-(sm|md|lg|xl|2xl|3xl|4xl|5xl|6xl|7xl)/,
       variants: ['sm', 'md', 'lg', 'xl', '2xl'],
    },
 ],
}

