/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [    
  "./resources/**/*.blade.php",
  "./resources/**/*.js",
  "./resources/**/*.vue",
  './vendor/rappasoft/laravel-livewire-tables/resources/views/**/*.blade.php',
  './vendor/livewire-ui/modal/resources/***/**/*.blade.php'
  
  ],
  
  
  theme: {
    extend: {},
  },
  plugins: [],
  safelist: [
    {
       pattern: /max-w-(sm|md|lg|xl|2xl|3xl|4xl|5xl|6xl|7xl)/,
       variants: ['sm', 'md', 'lg', 'xl', '2xl'],
    },
 ],
}

