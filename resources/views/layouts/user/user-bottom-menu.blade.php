<nav class="fixed bottom-0 px-0 md:px-4 w-full h-16 z-30 border-t border-border bg-background/70 backdrop-blur-xl">
    <div class="w-full h-full md:max-w-115 lg:max-w-140 mx-auto relative rounded-none md:rounded-2xl bg-card">
        <div class="flex items-center w-full h-full justify-evenly px-0 md:px-2 py-1">

            <a class="flex flex-col items-center text-[11px] group"
                href="{{ route('user.home', ['username' => _auth()->username]) }}" wire:navigate>
                @if (request()->routeIs('user.home'))
                    <i class="fa-solid fa-house text-primary-glow text-xl! "></i>
                @else
                    <i class="fa-regular fa-house text-xl!  text-muted-foreground group-hover:text-primary-glow"></i>
                @endif
                <span
                    class="transition-all duration-200 {{ request()->routeIs('user.home') ? 'text-primary-glow' : 'text-muted-foreground group-hover:text-primary-glow' }}">Home</span>
            </a>

            <a href="{{ route('transactions', ['username' => _auth()->username]) }}"
                class="flex flex-col items-center text-[11px] group" wire:navigate>
                @if (request()->routeIs('transactions'))
                    <i class="fa-solid fa-wallet text-xl! text-primary-glow"></i>
                @else
                    <i class="fa-solid fa-wallet text-xl! text-muted-foreground group-hover:text-primary-glow"></i>
                @endif

                <span
                    class="transition-all duration-200 {{ request()->routeIs('transactions') ? 'text-primary-glow' : 'text-muted-foreground group-hover:text-primary-glow' }}">Transactions</span>
            </a>

            <a href="{{ route('my-orders', ['username' => _auth()->username]) }}"
                class="flex flex-col items-center text-[11px] group" wire:navigate>

                @if (request()->routeIs('my-orders'))
                    <i class="fa-solid fa-bookmark text-xl! text-primary-glow"></i>
                @else
                    <i class="fa-regular fa-bookmark text-xl! text-muted-foreground group-hover:text-primary-glow"></i>
                @endif

                <span
                    class="transition-all duration-200 {{ request()->routeIs('my-orders') ? 'text-primary-glow' : 'text-muted-foreground group-hover:text-primary-glow' }}">My
                    Orders
                </span>
            </a>

            <a href="{{ route('user.profile', ['username' => _auth()->username]) }}"
                class="flex flex-col items-center text-[11px] group" wire:navigate>
                @if (request()->routeIs('user.profile'))
                    <i class="fa-solid fa-user text-xl! text-primary-glow"></i>
                @else
                    <i class="fa-regular fa-user text-xl! text-muted-foreground group-hover:text-primary-glow"></i>
                @endif

                <span
                    class="transition-all duration-200 {{ request()->routeIs('user.profile') ? 'text-primary-glow' : 'text-muted-foreground group-hover:text-primary-glow' }}">Profile</span>
            </a>

            <a href="{{ route('user.settings', ['username' => _auth()->username]) }}"
                class="flex flex-col items-center text-[11px] group" wire:navigate>

                @if (request()->routeIs('user.settings'))
                    <i class="fa-solid fa-gear text-xl! text-primary-glow"></i>
                @else
                    <i class="fa-solid fa-gear text-xl! text-muted-foreground group-hover:text-primary-glow"></i>
                @endif

                <span
                    class="transition-all duration-200 {{ request()->routeIs('user.settings') ? 'text-primary-glow' : 'text-muted-foreground group-hover:text-primary-glow' }}">Settings</span>
            </a>

        </div>
    </div>
</nav>
