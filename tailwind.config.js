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
  './vendor/rappasoft/laravel-livewire-tables/resources/views/**/*.blade.php'
  ],
  
  
  theme: {
    extend: {
      colors: {
        "pg-primary": colors.white,
        
    },
    },
  },
  plugins: [],
}

