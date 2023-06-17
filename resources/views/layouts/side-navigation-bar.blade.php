<div x-data="{ expanded: false }" class="bg-gray-800 text-white w-16 flex-none" :class="{ 'w-32': expanded }" @mouseenter="expanded = true" @mouseleave="expanded = false">
    <!-- Logo -->
    <div class="flex items-center justify-center h-16">
        <span class="text-xl">Logo</span>
    </div>
    <!-- Navigation Links -->
    <nav class="mt-6">
        <ul>
            <li>
                <a href="#" class="flex items-center justify-center h-12 hover:bg-gray-700">
                    <svg class="h-6 w-6 fill-current" viewBox="0 0 24 24">
                        <path d="M0 0h24v24H0z" fill="none" />
                        <path d="M3 4h2V2H3c-.552 0-1 .448-1 1v2h2V4zm0 16v-2H2v2c0 .552.448 1 1 1h2v-2H3zM7 4h2V2H7c-.552 0-1 .448-1 1v2h2V4zm0 16v-2H6v2c0 .552.448 1 1 1h2v-2H7zM11 4h2V2h-2c-.552 0-1 .448-1 1v2h2V4zm0 16v-2h-2v2c0 .552.448 1 1 1h2v-2h-2zM3 8h2V6H3v2zm0 4h2v-2H3v2zm0 4h2v-2H3v2zm0 4h2v-2H3v2zm4-12h14V4H7v2zm0 4h14V8H7v2zm0 4h14v-2H7v2zm0 4h14v-2H7v2zm0 4h14v-2H7v2z" />
                    </svg>
                    <span class="ml-2" x-show="expanded" x-transition:enter="transition duration-300 ease-out" x-transition:enter-start="opacity-0 transform -translate-x-2" x-transition:enter-end="opacity-100 transform translate-x-0" x-transition:leave="transition duration-200 ease-in" x-transition:leave-start="opacity-100 transform translate-x-0" x-transition:leave-end="opacity-0 transform -translate-x-2">Menu 1</span>
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center justify-center h-12 hover:bg-gray-700">
                    <svg class="h-6 w-6 fill-current" viewBox="0 0 24 24">
                        <path d="M0 0h24v24H0z" fill="none" />
                        <path d="M20.994 12.47a1 1 0 0 0 .006-.47c-.037-.334-.196-.64-.437-.88l-4.587-4.586a6.978 6.978 0 0 0-9.867 0L3.938 8.063a2.993 2.993 0 0 0 0 4.244l5.657 5.657a2.997 2.997 0 0 0 4.244 0l7.779-7.778zm-9.192 1.414L8.081 9.88l3.536-3.536 3.536 3.536-3.536 3.536z" />
                    </svg>
                    <span class="ml-2" x-show="expanded" x-transition:enter="transition duration-300 ease-out" x-transition:enter-start="opacity-0 transform -translate-x-2" x-transition:enter-end="opacity-100 transform translate-x-0" x-transition:leave="transition duration-200 ease-in" x-transition:leave-start="opacity-100 transform translate-x-0" x-transition:leave-end="opacity-0 transform -translate-x-2">Menu 2</span>
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center justify-center h-12 hover:bg-gray-700">
                    <svg class="h-6 w-6 fill-current" viewBox="0 0 24 24">
                        <path d="M0 0h24v24H0z" fill="none" />
                        <path d="M20.4 12c0 5.5-4.5 10-10 10S0.4 17.5 0.4 12 4.9 2 10.4 2s10 4.5 10 10zM10 4c-4.4 0-8 3.6-8 8s3.6 8 8 8 8-3.6 8-8-3.6-8-8-8zm0 14c-3.3 0-6-2.7-6-6s2.7-6 6-6 6 2.7 6 6-2.7 6-6 6zm2-6h-2V7h-2v5H8v2h2v5h2v-5h2v-2z" />
                    </svg>
                    <span class="ml-2" x-show="expanded" x-transition:enter="transition duration-300 ease-out" x-transition:enter-start="opacity-0 transform -translate-x-2" x-transition:enter-end="opacity-100 transform translate-x-0" x-transition:leave="transition duration-200 ease-in" x-transition:leave-start="opacity-100 transform translate-x-0" x-transition:leave-end="opacity-0 transform -translate-x-2">Menu 3</span>
                </a>
            </li>
        </ul>
    </nav>
</div>
