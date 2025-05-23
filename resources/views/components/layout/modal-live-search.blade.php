<script>
    function getLiveSearchData() {
        return {
            timeoutId: null,
            pvsResults: [],
            keywords: '',
            async liveSearch(query) {
                if (query) {
                    try {
                        // await delay(500);
                        let params = new URLSearchParams({
                            keyword: query,
                            // limit: 12,
                        });
                        let response = await fetch(`/pv/search?${params.toString()}`);
                        let html = await response.text();
                        console.log(`Search product ${query} done!`);
                        console.log(html);
                        return html.length > 8 ? html : null;
                    } catch (error) {
                        console.log(error);
                        return null;
                    }
                }
                return null;
            },
            delay(ms) {
                return new Promise(resolve => setTimeout(resolve, ms));
            },
            async debouncedFunction(query, delayMs) {
                if (this.timeoutId) {
                    clearTimeout(this.timeoutId);
                }

                return new Promise((resolve, reject) => {
                    this.timeoutId = setTimeout(async () => {
                        try {
                            const result = await this.liveSearch(query);
                            resolve(result);
                        } catch (error) {
                            reject(error);
                        }
                    }, delayMs);
                });
            },
        };
    }
</script>

<div x-cloak x-show="isLiveSearchShow ?? false" x-transition:enter="transition origin-top ease-out duration-300 transform"
    x-transition:enter-start="opacity-0 scale-y-95" x-transition:enter-end="opacity-100 scale-y-100"
    x-transition:leave="transition origin-top ease-in duration-150 transform"
    x-transition:leave-start="opacity-100 scale-y-100" x-transition:leave-end="opacity-0 scale-y-95"
    class="fixed top-0 bottom-0 left-0 right-0 z-50 bg-dark/80">
    <div x-data="getLiveSearchData()"
        class="container flex flex-col items-center justify-start h-full md:h-4/5 mx-auto my-0 max-lg:max-w-screen-lg md:my-16 bg-tertiary">
        {{-- x-effect="pvsResults = await debouncedFunction(keywords, 500)" --}}
        <div class="relative w-full">
            <span
                class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none top-2 size-12 text-primary">
                <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" class="fill-current"
                    viewBox="0 0 24 24" style="transform: ;msFilter:;">
                    <path
                        d="M10 18a7.952 7.952 0 0 0 4.897-1.688l4.396 4.396 1.414-1.414-4.396-4.396A7.952 7.952 0 0 0 18 10c0-4.411-3.589-8-8-8s-8 3.589-8 8 3.589 8 8 8zm0-14c3.309 0 6 2.691 6 6s-2.691 6-6 6-6-2.691-6-6 2.691-6 6-6z">
                    </path>
                    <path
                        d="M11.412 8.586c.379.38.588.882.588 1.414h2a3.977 3.977 0 0 0-1.174-2.828c-1.514-1.512-4.139-1.512-5.652 0l1.412 1.416c.76-.758 2.07-.756 2.826-.002z">
                    </path>
                </svg>
            </span>
            <input type="search" name="search" id="search" placeholder="Search" x-model="keywords"
                @input="pvsResults = await debouncedFunction(keywords, 500)"
                class="w-full h-16 px-16 py-3 md:pl-16 md:pr-4 input-main" />
        </div>

        <div x-show="pvsResults" id="search-results" class="overflow-y-auto py-16" x-html="pvsResults"></div>
        <div x-show="pvsResults == null" class="flex items-center justify-center flex-1 px-6 text-xl text-dark">
            No products found
        </div>

        <button class="fixed z-50 top-2 right-2 md:top-6 md:right-6 size-12 text-primary md:text-tertiary"
            @click="isLiveSearchShow = false">
            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" class="fill-current"
                viewBox="0 0 24 24" style="transform: ;msFilter:;">
                <path
                    d="m16.192 6.344-4.243 4.242-4.242-4.242-1.414 1.414L10.535 12l-4.242 4.242 1.414 1.414 4.242-4.242 4.243 4.242 1.414-1.414L13.364 12l4.242-4.242z">
                </path>
            </svg>
        </button>
    </div>
</div>
