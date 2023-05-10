#!/bin/bash

# Start artisan serve
php artisan serve &

# Start npm watch
npm run dev &

npx mix watch