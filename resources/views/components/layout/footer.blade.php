<!-- component -->
<footer class="bg-tertiary dark:bg-primary">
    <div class="container px-6 py-12 mx-auto">
        <hr class="mb-8 border-dark/15 md:mb-12 dark:border-dark">

        <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 sm:gap-y-10 lg:grid-cols-4">
            <div class="sm:col-span-2">
                <h1 class="max-w-lg text-xl font-normal tracking-tight text-dark xl:text-2xl dark:text-tertiary">
                    Subscribe our newsletter to get update.</h1>

                <div class="flex flex-col mx-auto mt-6 md:flex-row">
                    <input id="email" type="email" class="md:w-full md:max-w-[300px] input-main"
                        placeholder="example@example.com">

                    <button class="md:ml-1 btn-main">Subscribe</button>
                </div>
            </div>

            <div>
                <p class="text-xl font-normal text-dark dark:text-tertiary">Our Information</p>
                <div class="mt-2 border-b-[2px] border-dark/50"></div>
                <div class="flex flex-col items-start mt-4 space-y-2">
                    <a href="/about" class="simple-link">About Us</a>
                    <a href="/contact" class="simple-link">Contact Us</a>
                    <a href="/privacy-policy" class="simple-link">Privacy Policy</a>
                    <a href="/term-of-use" class="simple-link">Term of Use</a>
                </div>
            </div>

            <div>
                <p class="text-xl font-normal text-dark dark:text-tertiary">Explore</p>
                <div class="mt-2 border-b-[2px] border-dark/50"></div>
                <div class="flex flex-col items-start mt-4 space-y-2">
                    <a href="/our-philosophy" class="simple-link">Our Philosophy</a>
                    <a href="/retail" class="simple-link">Retail</a>
                    <a href="/blog" class="simple-link">Blog</a>
                </div>
            </div>
        </div>

        <hr class="my-8 border-dark/15 md:my-12 dark:border-dark">

        <div class="flex flex-col items-center justify-between gap-6 md:gap-2 md:flex-row">
            <a href="/" class="flex flex-row gap-2 align-middle brand-name">
                <img class="size-8" src="/img/logo/Logo_only.webp" alt="LAN Technology">
                <span class="text-2xl">{{ env('APP_NAME') }}</span>
            </a>

            <span class="pt-1 text-xs text-dark">© 2024 | <span
                    class="font-semibold text-primary">{{ env('APP_NAME') }}</span>. All
                rights
                reserved.</span>

            <div class="flex -mx-2">
                <a href="#"
                    class="mx-2 transition-colors duration-300 text-primary dark:text-quaternary hover:text-primary dark:hover:text-dark"
                    aria-label="Instagram">
                    <svg role="img" width="100%" class="fill-current size-5 md:size-6" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <title>Instagram</title>
                        <path
                            d="M12 0C8.74 0 8.333.015 7.053.072 5.775.132 4.905.333 4.14.63c-.789.306-1.459.717-2.126 1.384S.935 3.35.63 4.14C.333 4.905.131 5.775.072 7.053.012 8.333 0 8.74 0 12s.015 3.667.072 4.947c.06 1.277.261 2.148.558 2.913.306.788.717 1.459 1.384 2.126.667.666 1.336 1.079 2.126 1.384.766.296 1.636.499 2.913.558C8.333 23.988 8.74 24 12 24s3.667-.015 4.947-.072c1.277-.06 2.148-.262 2.913-.558.788-.306 1.459-.718 2.126-1.384.666-.667 1.079-1.335 1.384-2.126.296-.765.499-1.636.558-2.913.06-1.28.072-1.687.072-4.947s-.015-3.667-.072-4.947c-.06-1.277-.262-2.149-.558-2.913-.306-.789-.718-1.459-1.384-2.126C21.319 1.347 20.651.935 19.86.63c-.765-.297-1.636-.499-2.913-.558C15.667.012 15.26 0 12 0zm0 2.16c3.203 0 3.585.016 4.85.071 1.17.055 1.805.249 2.227.415.562.217.96.477 1.382.896.419.42.679.819.896 1.381.164.422.36 1.057.413 2.227.057 1.266.07 1.646.07 4.85s-.015 3.585-.074 4.85c-.061 1.17-.256 1.805-.421 2.227-.224.562-.479.96-.899 1.382-.419.419-.824.679-1.38.896-.42.164-1.065.36-2.235.413-1.274.057-1.649.07-4.859.07-3.211 0-3.586-.015-4.859-.074-1.171-.061-1.816-.256-2.236-.421-.569-.224-.96-.479-1.379-.899-.421-.419-.69-.824-.9-1.38-.165-.42-.359-1.065-.42-2.235-.045-1.26-.061-1.649-.061-4.844 0-3.196.016-3.586.061-4.861.061-1.17.255-1.814.42-2.234.21-.57.479-.96.9-1.381.419-.419.81-.689 1.379-.898.42-.166 1.051-.361 2.221-.421 1.275-.045 1.65-.06 4.859-.06l.045.03zm0 3.678c-3.405 0-6.162 2.76-6.162 6.162 0 3.405 2.76 6.162 6.162 6.162 3.405 0 6.162-2.76 6.162-6.162 0-3.405-2.76-6.162-6.162-6.162zM12 16c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm7.846-10.405c0 .795-.646 1.44-1.44 1.44-.795 0-1.44-.646-1.44-1.44 0-.794.646-1.439 1.44-1.439.793-.001 1.44.645 1.44 1.439z" />
                    </svg>
                </a>

                <a href="#"
                    class="mx-2 transition-colors duration-300 text-primary dark:text-quaternary hover:text-primary dark:hover:text-dark"
                    aria-label="Facebook">
                    <svg role="img" width="100%" class="fill-current size-5 md:size-6" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <title>Facebook</title>
                        <path
                            d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                    </svg>
                </a>

                <a href="#"
                    class="mx-2 transition-colors duration-300 text-primary dark:text-quaternary hover:text-primary dark:hover:text-dark"
                    aria-label="Github">
                    <svg role="img" width="100%" class="fill-current size-5 md:size-6" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <title>YouTube</title>
                        <path
                            d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z" />
                    </svg>
                </a>
            </div>
        </div>
    </div>
</footer>
