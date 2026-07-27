<div class="main-content">

    <div
        class="relative overflow-hidden rounded-b-3xl bg-linear-to-r from-violet-600 via-indigo-600 to-cyan-500 p-5 shadow-2xl">
        <!-- Blur Circles -->
        <div class="absolute -right-5 -top-12 w-30 h-30 bg-white/20 rounded-full">
        </div>
        <div class="absolute right-5 -bottom-10 w-24 h-24 bg-white/10 rounded-full">
        </div>
        <!-- Content -->
        <div class="flex items-center gap-4">
            <!-- Icon -->
            <a href="{{ route('contact', ['username' => $username]) }}"
                class="w-14 h-14 shrink-0 rounded-xl bg-white/10 border border-white/20 transition-all hover:bg-white/20 backdrop-blur-xl flex items-center justify-center shadow-lg"
                wire:navigate="">

                <div class="w-9 h-9 shrink-0 rounded-full bg-white/20 flex items-center justify-center text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-arrow-left h-5 w-5" aria-hidden="true"
                        data-tsd-source="/src/components/app/PageHero.tsx:15:13">
                        <path d="m12 19-7-7 7-7"></path>
                        <path d="M19 12H5"></path>
                    </svg>
                </div>
            </a>
            <!-- Text -->
            <div>
                <h2 class="text-white text-lg font-bold">
                    FAQ
                </h2>
                <p class="text-white/80 text-sm">
                    Frequently asked questions
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


    <main x-data="{ selected: '' }" class="px-1.5 md:px-3.5 py-4 space-y-3">

        <div>
            <!-- Button -->
            <button @click=" selected = selected === 'item1' ? '' : 'item1' "
                :class="selected == 'item1' ? ' border-primary/80 bg-primary/10' : 'border-border/90 hover:bg-primary/10'"
                class="px-3 py-2.5 bg-card border transition-colors duration-200 cursor-pointer w-full text-start rounded-md flex items-center justify-between">

                <div class="flex items-center gap-2">
                    <span
                        class="w-6 h-6 shrink-0 rounded-full bg-primary text-sm font-bold flex justify-center items-center text-white shadow-[0_3px_5px] shadow-primary/40">1</span>
                    <span :class="selected == 'item1' ? 'text-primary' : 'text-foreground/80'"
                        class="text-sm font-semibold transition-all">
                        মোবাইল রিচার্জ কীভাবে করব?
                    </span>
                </div>
                <span :class="selected == 'item1' ? 'rotate-180 text-primary' : 'rotate-0 text-foreground/80'"
                    class="text-lg transition-all duration-300"><i class="ri-arrow-down-s-line font-black!"></i></span>
            </button>

            <!-- Content -->
            <div x-show="selected === 'item1'" x-collapse x-cloak
                class="p-3 rounded bg-card border border-primary/80 mt-1">
                <p class="text-foreground/70 text-sm">
                    মোবাইল নম্বর, অপারেটর এবং পরিমাণ নির্বাচন করে রিচার্জ ফর্ম পূরণ করুন। তারপর রিচার্জ বাটন ক্লিক করুন
                    এবং কয়েক সেকেন্ডের মধ্যে রিচার্জ হয়ে যাবে।
                </p>
            </div>
        </div>

        <div>
            <!-- Button -->
            <button @click=" selected = selected === 'item2' ? '' : 'item2' "
                :class="selected == 'item2' ? ' border-primary/80 bg-primary/10' : 'border-border/90 hover:bg-primary/10'"
                class="px-3 py-2.5 bg-card border transition-colors duration-200 cursor-pointer w-full text-start rounded-md flex items-center justify-between">

                <div class="flex items-center gap-2">
                    <span
                        class="w-6 h-6 shrink-0 rounded-full bg-primary text-sm font-bold flex justify-center items-center text-white shadow-[0_3px_5px] shadow-primary/40">2</span>
                    <span :class="selected == 'item2' ? 'text-primary' : 'text-foreground/80'"
                        class="text-sm font-semibold transition-all">
                        কোন কোন অপারেটর সাপোর্ট করা হয়?
                    </span>
                </div>
                <span :class="selected == 'item2' ? 'rotate-180 text-primary' : 'rotate-0 text-foreground/80'"
                    class="text-lg transition-all duration-300"><i class="ri-arrow-down-s-line font-black!"></i></span>
            </button>

            <!-- Content -->
            <div x-show="selected === 'item2'" x-collapse x-cloak
                class="p-3 rounded bg-card border border-primary/80 mt-1">
                <p class="text-foreground/70 text-sm">
                    আমরা গ্রামীণফোন, রবি, এয়ারটেল, বাংলালিংক, টেলিটক এবং ব্রিলিয়ান্ট কানেক্ট - বাংলাদেশের
                    সমস্ত প্রধান অপারেটর সাপোর্ট করি।
                </p>
            </div>
        </div>

        <div>
            <!-- Button -->
            <button @click=" selected = selected === 'item3' ? '' : 'item3' "
                :class="selected == 'item3' ? ' border-primary/80 bg-primary/10' : 'border-border/90 hover:bg-primary/10'"
                class="px-3 py-2.5 bg-card border transition-colors duration-200 cursor-pointer w-full text-start rounded-md flex items-center justify-between">

                <div class="flex items-center gap-2">
                    <span
                        class="w-6 h-6 shrink-0 rounded-full bg-primary text-sm font-bold flex justify-center items-center text-white shadow-[0_3px_5px] shadow-primary/40">3</span>
                    <span :class="selected == 'item3' ? 'text-primary' : 'text-foreground/80'"
                        class="text-sm font-semibold transition-all">
                        রিচার্জ কত দ্রুত হবে?
                    </span>
                </div>
                <span :class="selected == 'item3' ? 'rotate-180 text-primary' : 'rotate-0 text-foreground/80'"
                    class="text-lg transition-all duration-300"><i class="ri-arrow-down-s-line font-black!"></i></span>
            </button>

            <!-- Content -->
            <div x-show="selected === 'item3'" x-collapse x-cloak
                class="p-3 rounded bg-card border border-primary/80 mt-1">
                <p class="text-foreground/70 text-sm">
                    আমাদের রিচার্জ পরিষেবা সম্পূর্ণ তাত্ক্ষণিক।রিচার্জ করার পর কয়েক সেকেন্ডের মধ্যে আপনার মোবাইল
                    ব্যালেন্স যোগ করা হবে।
                </p>
            </div>
        </div>

    </main>
</div>
