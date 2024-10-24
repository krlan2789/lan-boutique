<div class="relative" x-data="{ isNavbarOpen: false }">
    <button type="button" @click="isNavbarOpen = !isNavbarOpen"
        class="inline-flex items-center text-sm font-semibold leading-6 text-primary gap-x-1" aria-expanded="false">
        <span>Solutions</span>
        <svg class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
            <path fill-rule="evenodd"
                d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z"
                clip-rule="evenodd" />
        </svg>
    </button>

    {{--
        Flyout menu, show/hide based on flyout menu state.
            Entering: "transition ease-out duration-200"
            From: "opacity-0 translate-y-1"
            To: "opacity-100 translate-y-0"
            Leaving: "transition ease-in duration-150"
            From: "opacity-100 translate-y-0"
            To: "opacity-0 translate-y-1"
    --}}

    <div x-show="isNavbarOpen ?? false" @click.outside="isNavbarOpen = false"
        x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 translate-y-1"
        x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 translate-y-1"
        class="absolute z-10 flex w-screen px-4 mt-5 -translate-x-1/2 left-1/2 max-w-max">
        <div
            class="flex-auto w-screen max-w-md overflow-hidden text-sm leading-6 shadow-lg bg-tertiary rounded-3xl ring-1 ring-primary/5">
            <div class="p-4">
                <div class="relative flex p-4 rounded-lg group gap-x-6 hover:bg-quaternary">
                    <div
                        class="flex items-center justify-center flex-none mt-1 rounded-lg h-11 w-11 bg-quaternary group-hover:bg-tertiary">
                        <svg class="w-6 h-6 text-dark group-hover:text-primary" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M10.5 6a7.5 7.5 0 1 0 7.5 7.5h-7.5V6Z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M13.5 10.5H21A7.5 7.5 0 0 0 13.5 3v7.5Z" />
                        </svg>
                    </div>
                    <div>
                        <a href="#" class="font-semibold text-primary">
                            Analytics
                            <span class="absolute inset-0"></span>
                        </a>
                        <p class="mt-1 text-dark">Get a better understanding of your traffic</p>
                    </div>
                </div>
                <div class="relative flex p-4 rounded-lg group gap-x-6 hover:bg-quaternary">
                    <div
                        class="flex items-center justify-center flex-none mt-1 rounded-lg h-11 w-11 bg-quaternary group-hover:bg-tertiary">
                        <svg class="w-6 h-6 text-dark group-hover:text-primary" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15.042 21.672 13.684 16.6m0 0-2.51 2.225.569-9.47 5.227 7.917-3.286-.672ZM12 2.25V4.5m5.834.166-1.591 1.591M20.25 10.5H18M7.757 14.743l-1.59 1.59M6 10.5H3.75m4.007-4.243-1.59-1.59" />
                        </svg>
                    </div>
                    <div>
                        <a href="#" class="font-semibold text-primary">
                            Engagement
                            <span class="absolute inset-0"></span>
                        </a>
                        <p class="mt-1 text-dark">Speak directly to your customers</p>
                    </div>
                </div>
                <div class="relative flex p-4 rounded-lg group gap-x-6 hover:bg-quaternary">
                    <div
                        class="flex items-center justify-center flex-none mt-1 rounded-lg h-11 w-11 bg-quaternary group-hover:bg-tertiary">
                        <svg class="w-6 h-6 text-dark group-hover:text-primary" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M7.864 4.243A7.5 7.5 0 0 1 19.5 10.5c0 2.92-.556 5.709-1.568 8.268M5.742 6.364A7.465 7.465 0 0 0 4.5 10.5a7.464 7.464 0 0 1-1.15 3.993m1.989 3.559A11.209 11.209 0 0 0 8.25 10.5a3.75 3.75 0 1 1 7.5 0c0 .527-.021 1.049-.064 1.565M12 10.5a14.94 14.94 0 0 1-3.6 9.75m6.633-4.596a18.666 18.666 0 0 1-2.485 5.33" />
                        </svg>
                    </div>
                    <div>
                        <a href="#" class="font-semibold text-primary">
                            Security
                            <span class="absolute inset-0"></span>
                        </a>
                        <p class="mt-1 text-dark">Your customers&#039; data will be safe and secure</p>
                    </div>
                </div>
                <div class="relative flex p-4 rounded-lg group gap-x-6 hover:bg-quaternary">
                    <div
                        class="flex items-center justify-center flex-none mt-1 rounded-lg h-11 w-11 bg-quaternary group-hover:bg-tertiary">
                        <svg class="w-6 h-6 text-dark group-hover:text-primary" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M13.5 16.875h3.375m0 0h3.375m-3.375 0V13.5m0 3.375v3.375M6 10.5h2.25a2.25 2.25 0 0 0 2.25-2.25V6a2.25 2.25 0 0 0-2.25-2.25H6A2.25 2.25 0 0 0 3.75 6v2.25A2.25 2.25 0 0 0 6 10.5Zm0 9.75h2.25A2.25 2.25 0 0 0 10.5 18v-2.25a2.25 2.25 0 0 0-2.25-2.25H6a2.25 2.25 0 0 0-2.25 2.25V18A2.25 2.25 0 0 0 6 20.25Zm9.75-9.75H18a2.25 2.25 0 0 0 2.25-2.25V6A2.25 2.25 0 0 0 18 3.75h-2.25A2.25 2.25 0 0 0 13.5 6v2.25a2.25 2.25 0 0 0 2.25 2.25Z" />
                        </svg>
                    </div>
                    <div>
                        <a href="#" class="font-semibold text-primary">
                            Integrations
                            <span class="absolute inset-0"></span>
                        </a>
                        <p class="mt-1 text-dark">Connect with third-party tools</p>
                    </div>
                </div>
                <div class="relative flex p-4 rounded-lg group gap-x-6 hover:bg-quaternary">
                    <div
                        class="flex items-center justify-center flex-none mt-1 rounded-lg h-11 w-11 bg-quaternary group-hover:bg-tertiary">
                        <svg class="w-6 h-6 text-dark group-hover:text-primary" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
                        </svg>
                    </div>
                    <div>
                        <a href="#" class="font-semibold text-primary">
                            Automations
                            <span class="absolute inset-0"></span>
                        </a>
                        <p class="mt-1 text-dark">Build strategic funnels that will convert</p>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-2 divide-x divide-primary/5 bg-quaternary">
                <a href="#"
                    class="flex items-center justify-center gap-x-2.5 p-3 font-semibold text-primary hover:bg-quaternary">
                    <svg class="flex-none w-5 h-5 text-primary" viewBox="0 0 20 20" fill="currentColor"
                        aria-hidden="true" data-slot="icon">
                        <path fill-rule="evenodd"
                            d="M2 10a8 8 0 1 1 16 0 8 8 0 0 1-16 0Zm6.39-2.908a.75.75 0 0 1 .766.027l3.5 2.25a.75.75 0 0 1 0 1.262l-3.5 2.25A.75.75 0 0 1 8 12.25v-4.5a.75.75 0 0 1 .39-.658Z"
                            clip-rule="evenodd" />
                    </svg>
                    Watch demo
                </a>
                <a href="#"
                    class="flex items-center justify-center gap-x-2.5 p-3 font-semibold text-primary hover:bg-quaternary">
                    <svg class="flex-none w-5 h-5 text-primary" viewBox="0 0 20 20" fill="currentColor"
                        aria-hidden="true" data-slot="icon">
                        <path fill-rule="evenodd"
                            d="M2 3.5A1.5 1.5 0 0 1 3.5 2h1.148a1.5 1.5 0 0 1 1.465 1.175l.716 3.223a1.5 1.5 0 0 1-1.052 1.767l-.933.267c-.41.117-.643.555-.48.95a11.542 11.542 0 0 0 6.254 6.254c.395.163.833-.07.95-.48l.267-.933a1.5 1.5 0 0 1 1.767-1.052l3.223.716A1.5 1.5 0 0 1 18 15.352V16.5a1.5 1.5 0 0 1-1.5 1.5H15c-1.149 0-2.263-.15-3.326-.43A13.022 13.022 0 0 1 2.43 8.326 13.019 13.019 0 0 1 2 5V3.5Z"
                            clip-rule="evenodd" />
                    </svg>
                    Contact sales
                </a>
            </div>
        </div>
    </div>
</div>
