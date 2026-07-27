@php
    $contactInfo = \App\Models\Contact::query()->where('id', 1)->first() ?? null;
@endphp

<footer class="relative mt-24 border-t border-border bg-card/40 pb-14 lg:pb-0">
    <div
        class="mx-auto grid max-w-7xl gap-8 px-4 py-10 sm:grid-cols-2 sm:px-5 sm:py-14 md:grid-cols-3 lg:grid-cols-4 lg:gap-10">
        <div>
            <div class="flex items-center gap-2 flex-col lg:flex-row">
                <img src="{{ asset('assets/images/logo.png') }}" alt="logo" class="w-11 h-11 object-contain">
                <span class="font-display text-lg font-bold md:text-lg lg:text-2xl font-heading gradient-text ">
                    Offer Zone
                </span>
            </div>
            <p class="mt-3 text-sm text-muted-foreground">
                Bangladesh's all SIM offers and Free Fire diamonds - one place, in seconds.
            </p>
        </div>
        <div>
            <h4 class="mb-3 text-sm font-semibold">Quick Links</h4>
            <ul class="space-y-2 text-sm text-muted-foreground">
                <li><a href="{{ route('home') }}"
                        class="{{ request()->routeIs('home') ? 'text-primary' : 'hover:text-foreground' }}"
                        wire:navigate>Home</a></li>
                <li><a href="{{ route('aboutus') }}"
                        class="{{ request()->routeIs('aboutus') ? 'text-primary' : 'hover:text-foreground' }}"
                        wire:navigate>About Us</a></li>
                <li><a href="{{ route('privacy-policy') }}"
                        class="{{ request()->routeIs('privacy-policy') ? 'text-primary' : 'hover:text-foreground' }}"
                        wire:navigate>Privacy Policy</a></li>
                <li><a href="{{ route('refund-policy') }}"
                        class="{{ request()->routeIs('refund-policy') ? 'text-primary' : 'hover:text-foreground' }}"
                        wire:navigate>Refund Policy</a></li>
            </ul>
        </div>
        <div>
            <h4 class="mb-3 text-sm font-semibold">Operators</h4>
            <ul class="space-y-2 text-sm text-muted-foreground">
                <li>Grameenphone</li>
                <li>Robi · Airtel</li>
                <li>Banglalink</li>
                <li>Teletalk</li>
            </ul>
        </div>

        @if ($contactInfo != null)
            <div>
                <h4 class="mb-3 text-sm font-semibold">Contact Us</h4>
                <ul class="space-y-2 text-sm text-muted-foreground">
                    @if ($contactInfo->email)
                        <li class="flex gap-1.5">
                            <span
                                class="flex items-center justify-center w-9 h-9 shrink-0 rounded-md shadow-[0_5px_15px] shadow-primary/50 bg-primary text-primary-foreground">
                                <i class="ri-mail-line text-lg"></i>
                            </span>
                            <div class="flex flex-col items-start ml-3">
                                <p class="text-sm font-semibold">Email</p>
                                <span class="text-primary">{{ $contactInfo->email }}</span>
                            </div>
                        </li>
                    @endif
                    @if ($contactInfo->phone)
                        <li class="flex gap-1.5">
                            <span
                                class="flex items-center justify-center w-9 h-9 shrink-0 rounded-md shadow-[0_5px_15px] shadow-primary/50 bg-primary text-primary-foreground">
                                <i class="ri-phone-fill text-lg"></i>
                            </span>
                            <div class="flex flex-col items-start ml-3">
                                <p class="text-sm font-semibold">Phone</p>
                                <span class="text-primary">{{ $contactInfo->phone }}</span>
                            </div>
                        </li>
                    @endif
                </ul>
            </div>

        @endif

    </div>

    <div class="border-t border-border py-5 text-center text-xs text-muted-foreground">
        © 2026 Offer Zone BD. All rights reserved.
    </div>

</footer>

@if ($contactInfo != null)
    <a href="https://wa.me/{{ $contactInfo->whatsapp }}" target="_blank"
        class="fixed bottom-24 right-4 z-100 grid h-12 w-12 place-items-center rounded-full bg-green-500 text-white shadow-lg shadow-green-500/50 transition-all hover:scale-110">
        <i class="fa-brands fa-whatsapp text-2xl"></i>
    </a>
@endif
