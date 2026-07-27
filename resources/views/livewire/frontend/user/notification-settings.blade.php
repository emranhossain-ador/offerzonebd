<div class="main-content relative">

    <div class="relative overflow-hidden rounded-b-3xl bg-linear-to-r from-violet-600 via-indigo-600 to-cyan-500 p-5 shadow-2xl">
        <!-- Blur Circles -->
        <div class="absolute -right-5 -top-12 w-30 h-30 bg-white/20 rounded-full">
        </div>
        <div class="absolute right-5 -bottom-10 w-24 h-24 bg-white/10 rounded-full">
        </div>
        <!-- Content -->
        <div class="flex items-center gap-4">
            <!-- Icon -->
            <a href="{{ route('user.settings', 'emran') }}" class="w-14 h-14 shrink-0 rounded-xl bg-white/10 border border-white/20 transition-all hover:bg-white/20 backdrop-blur-xl flex items-center justify-center shadow-lg" wire:navigate="">

                <div class="w-9 h-9 shrink-0 rounded-full bg-white/20 flex items-center justify-center text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-left h-5 w-5" aria-hidden="true" data-tsd-source="/src/components/app/PageHero.tsx:15:13"><path d="m12 19-7-7 7-7"></path><path d="M19 12H5"></path></svg>
                </div>
            </a>

            <!-- Text -->
            <div>
                <h2 class="text-white text-lg font-bold">
                    Support
                </h2>
                <p class="text-white/80 text-sm">
                    Get help anytime
                </p>
            </div>
        </div>
        <!-- Dotted Decoration -->
        <div class="absolute right-30 top-4 grid grid-cols-4 gap-2 opacity-30">

            <span class="w-1 h-1 rounded-full bg-white"></span>
            <span class="w-1 h-1 rounded-full bg-white"></span>
            <span class="w-1 h-1 rounded-full bg-white"></span>
            <span class="w-1 h-1 rounded-full bg-white"></span>

            <span class="w-1 h-1 rounded-full bg-white"></span>
            <span class="w-1 h-1 rounded-full bg-white"></span>
            <span class="w-1 h-1 rounded-full bg-white"></span>
            <span class="w-1 h-1 rounded-full bg-white"></span>

            <span class="w-1 h-1 rounded-full bg-white"></span>
            <span class="w-1 h-1 rounded-full bg-white"></span>
            <span class="w-1 h-1 rounded-full bg-white"></span>
            <span class="w-1 h-1 rounded-full bg-white"></span>

            <span class="w-1 h-1 rounded-full bg-white"></span>
            <span class="w-1 h-1 rounded-full bg-white"></span>
            <span class="w-1 h-1 rounded-full bg-white"></span>
            <span class="w-1 h-1 rounded-full bg-white"></span>

        </div>
    </div>



    <main class="px-1.5 md:px-3.5 py-4">
        <div class="divide-y divide-border bg-card rounded-2xl border border-border">
            <div class="flex items-center gap-3 px-4 py-3.5">

                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-blue-50 dark:bg-blue-900/20">
                    <svg
                        stroke="currentColor"
                        fill="currentColor"
                        stroke-width="0"
                        viewBox="0 0 448 512"
                        class="text-lg text-blue-600 dark:text-blue-400"
                        height="1em"
                        width="1em"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                            d="M224 512c35.32 0 63.97-28.65 63.97-64H160.03c0 35.35 28.65 64 63.97 64zm215.39-149.71c-19.32-20.76-55.47-51.99-55.47-154.29 0-77.7-54.48-139.9-127.94-155.16V32c0-17.67-14.32-32-31.98-32s-31.98 14.33-31.98 32v20.84C118.56 68.1 64.08 130.3 64.08 208c0 102.3-36.15 133.53-55.47 154.29-6 6.45-8.66 14.16-8.61 21.71.11 16.4 12.98 32 32.1 32h383.8c19.12 0 32-15.6 32.1-32 .05-7.55-2.61-15.27-8.61-21.71z"
                        ></path>
                    </svg>
                </div>

                <div class="min-w-0 flex-1">
                    <p class="text-sm font-semibold text-gray-800 dark:text-gray-100">App Notification</p>
                    <p class="text-xs text-gray-500 dark:text-gray-400">Receive notifications in browser and app</p>
                </div>
                <div class="flex shrink-0 items-center gap-2">
                    <div x-data="{ checked:false }" class="relative cursor-pointer" @click="checked = !checked">
                        <div :class="checked ? 'bg-primary':'' " class="w-11 h-6 flex shrink-0 bg-muted-foreground/80 rounded-full shadow-md"></div>

                        <div :class="checked ? 'translate-x-full bg-white':'' " class="absolute left-0.5 top-1/2 -translate-y-1/2 shrink-0 w-5 h-5 bg-background rounded-full shadow-md transition-all"></div>
                    </div>
                </div>
            </div>

            <div class="flex items-center gap-3 px-4 py-3.5">
                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-green-50 dark:bg-green-900/20">
                    <svg
                        stroke="currentColor"
                        fill="currentColor"
                        stroke-width="0"
                        viewBox="0 0 448 512"
                        class="text-lg text-green-600 dark:text-green-400"
                        height="1em"
                        width="1em"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                            d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7.9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"
                        ></path>
                    </svg>
                </div>

                <div class="min-w-0 flex-1">
                    <p class="text-sm font-semibold text-foreground">WhatsApp Notification</p>
                    <p class="text-xs text-foreground/70">Receive notifications on WhatsApp</p>
                </div>

                <div class="flex shrink-0 items-center gap-2">
                    <button type="button" command="show-modal" commandfor="addWhatsappNumber" class="flex h-8 w-8 items-center justify-center rounded-lg text-foreground/80 transition-all cursor-pointer hover:bg-gray-200 dark:hover:bg-gray-700/50">
                        <i class="ri-settings-4-fill text-lg"></i>
                    </button>

                    <div x-data="{ checked:false }" class="relative cursor-pointer" @click="checked = !checked;">
                        <div :class="checked ? 'bg-primary':'' " class="w-11 h-6 flex shrink-0 bg-muted-foreground/80 rounded-full shadow-md"></div>

                        <div :class="checked ? 'translate-x-full bg-white':'' " class="absolute left-0.5 top-1/2 -translate-y-1/2 shrink-0 w-5 h-5 bg-background rounded-full shadow-md transition-all"></div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Modal Area -->
        <el-dialog>
            <dialog id="addWhatsappNumber" aria-labelledby="dialog-title" class="fixed inset-0 size-auto max-h-none max-w-none overflow-y-auto bg-transparent backdrop:bg-transparent">
                <el-dialog-backdrop class="fixed inset-0 bg-gray-900/50  backdrop-blur-md transition-opacity data-closed:opacity-0 data-enter:duration-300 data-enter:ease-out data-leave:duration-200 data-leave:ease-in"></el-dialog-backdrop>

                <div tabindex="0" class="flex min-h-full w-full items-end justify-center p-4 text-center focus:outline-none sm:items-center sm:p-0">

                    <el-dialog-panel class="relative transform overflow-hidden rounded-lg bg-card text-left shadow-xl outline -outline-offset-1 outline-white/10 transition-all data-closed:translate-y-4 data-closed:opacity-0 data-enter:duration-300 data-enter:ease-out data-leave:duration-200 data-leave:ease-in sm:my-8 sm:w-full sm:max-w-lg data-closed:sm:translate-y-0 data-closed:sm:scale-95">

                        <!-- Header -->
                        <div class="w-full px-4 py-4 border-b border-border flex items-center justify-between">
                            <h4 class="text-base font-semibold text-foreground">
                                WhatsApp Number
                            </h4>

                            <button type="button" command="close" commandfor="addWhatsappNumber" class="w-8 h-8 shrink-0 rounded border border-border text-foreground/80 transition-all hover:text-red-500 hover:border-red-500/50 cursor-pointer"><i class="ri-close-fill font-black text-lg"></i></button>
                        </div>

                        <div class="block  px-4 py-4">
                            <span class="mb-1.5 text-sm pl-1.5 block font-normal text-muted-foreground">
                                Your WhatsApp Number
                            </span>
                            <input type="text" class="input text-foreground" wire:model="email" >
                            <span class="text-xs tracking-wider font-normal text-orange-500"><i class="ri-error-warning-line"></i> Notifications will be sent to this number</span>
                        </div>

                        <!-- Bottom Btn -->
                        <div class="px-4 py-3 ">
                            <button type="submit" wire:loading.attr="disabled" wire:target="changePassword" class="flex items-center justify-center gap-2 w-full rounded-md gradient-bg px-5 py-3 text-sm font-bold text-primary-foreground shadow-md hover:scale-[1.02] transition-transform cursor-pointer">
                                <span wire:loading.remove="" wire:target="changePassword" class="flex items-center justify-center gap-1.5">
                                    <i class="ri-save-line"></i>
                                    Save Change
                                </span>

                                <span wire:loading="" wire:target="changePassword" class="flex items-center gap-2">
                                    <svg class="h-5 w-5 animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>

                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                    </svg>
                                </span>
                            </button>
                        </div>

                    </el-dialog-panel>
                </div>
            </dialog>
        </el-dialog>


    </main>


</div>
