<!-- ===== Sidebar Start ===== -->
<aside :class="sidebarToggle ? 'translate-x-0' : '-translate-x-full'" @click.outside="sidebarToggle = false"
    class="sidebar fixed left-0 top-0 z-999 flex h-screen w-[300px] flex-col overflow-y-hidden border-r border-border bg-sidebar px-5 lg:static lg:translate-x-0 -translate-x-full transition-all duration-300">
    <!-- SIDEBAR HEADER -->
    <div class="flex items-center gap-2 sidebar-header pt-3.5 pb-3.5 border-b border-border">
        <a href="{{ route('admin.dashboard') }}" class="h-9 w-9 shrink-0 flex items-center justify-center">
            <img src="{{ asset('assets/images/logo.png') }}" alt="logo" class="w-full h-full object-contain">
        </a>
        <span class="font-extrabold text-lg gradient-text">Offer Zone</span>
    </div>
    <!-- SIDEBAR HEADER -->

    <div class="flex flex-col overflow-y-auto duration-300 ease-linear no-scrollbar pt-5">
        <!-- Sidebar Menu -->
        <nav>
            <!-- Menu Group -->
            <div>
                <h3 class="mb-2">
                    <span class="font-extrabold text-sidebar-accent-foreground/70 tracking-wider text-xs">MENU</span>
                </h3>

                <ul class="flex flex-col gap-1 mb-6">
                    <!-- Menu Item Dashboard -->
                    <li>
                        <a href="{{ route('admin.dashboard') }}"
                            class="{{ isset($title) && $title == 'Dashboard' ? 'menu-item-active' : 'menu-item' }} ">
                            <div class="flex items-center gap-1.5">
                                <span class="flex items-center justify-center w-7 text-xl shrink-0">
                                    <i class="ri-dashboard-horizontal-fill"></i></span>
                                <span class="text-sm tracking-wider">
                                    Dashboard
                                </span>
                            </div>
                        </a>
                    </li>


                    <!-- Orders -->
                    <li>
                        <a href="{{ route('admin.orders') }}"
                            class="{{ isset($page) && $page == 'order' ? 'menu-item-active' : 'menu-item' }}">
                            <div class="flex items-center gap-1.5">
                                <span class="flex items-center justify-center w-7 shrink-0 text-xl">
                                    <i class="ri-shopping-bag-3-line"></i>
                                </span>
                                <span class="text-sm tracking-wider">
                                    Orders
                                </span>
                            </div>
                        </a>
                    </li>

                    <!-- Sim Offers -->
                    <li>
                        <a href="{{ route('admin.sim-package') }}"
                            class="{{ isset($page) && $page == 'offer' ? 'menu-item-active' : 'menu-item' }}">
                            <div class="flex items-center gap-1.5">
                                <span class="flex items-center justify-center w-7 text-xl">
                                    <i class="ri-box-3-line"></i>
                                </span>
                                <span class="text-sm tracking-wider">
                                    Sim Packages
                                </span>
                            </div>
                        </a>
                    </li>

                    <!-- Free fire -->
                    <li>
                        <a href="{{ route('admin.free-fire-diamond') }}"
                            class="{{ isset($page) && $page == 'free-fire-diamond' ? 'menu-item-active py-3!' : 'menu-item py-3!' }}">
                            <div class="flex items-center gap-1.5">
                                <span class="flex items-center justify-center w-7 text-lg">
                                    <i class="fa-regular fa-gem"></i>
                                </span>
                                <span class="text-sm tracking-wider">
                                    Free Fire Diamond
                                </span>
                            </div>
                        </a>
                    </li>

                    <!-- Customer List -->
                    <li>
                        <a href="{{ route('admin.customers') }}"
                            class="{{ isset($title) && $title == 'Customer List' ? 'menu-item-active' : 'menu-item' }}">
                            <div class="flex items-center gap-1.5">
                                <span class="flex items-center justify-center w-7 text-xl">
                                    <i class="ri-user-community-line"></i>
                                </span>
                                <span class="text-sm tracking-wider">
                                    Customer List
                                </span>
                            </div>
                        </a>
                    </li>

                    <!-- Recharge -->
                    <li x-data="{ expanded: {{ isset($page) && $page == 'recharge' ? 'true' : 'false' }} }">
                        <a @click="expanded = ! expanded" href="javascript:;"
                            :class="expanded ? 'bg-primary/10 text-primary' : ''" class="menu-item">
                            <div class="flex items-center gap-1.5">
                                <span class="flex items-center justify-center w-7 text-xl">
                                    <i class="ri-secure-payment-line"></i>
                                </span>
                                <span class="text-sm tracking-wider">
                                    Recharge Panel
                                </span>
                            </div>
                            <span
                                :class="expanded ? 'rotate-0 transition-all duration-300' :
                                    'rotate-180 transition-all duration-300'">
                                <i class="ri-arrow-up-s-line"></i>
                            </span>
                        </a>

                        <!-- Dropdown Menu -->
                        <ul x-show="expanded" x-collapse.duration.500ms x-cloak
                            class="px-3 mt-2 bg-accent/50 rounded border border-border/50 space-y-1">
                            <li class="mt-2">
                                <a href="{{ route('admin.add-balance') }}"
                                    class="px-3 py-2 text-sm w-full flex items-center font-semibold rounded {{ isset($title) && $title == 'Add Balance Requests' ? 'text-primary' : 'text-sidebar-foreground hover:bg-primary/10' }}">
                                    <i class="ri-arrow-right-double-line font-black text-sm"></i>&nbsp; Add Balance
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.mobile-recharge-request') }}"
                                    class="px-3 py-2 text-sm w-full flex items-center font-semibold rounded {{ isset($title) && $title == 'Mobile Recharge' ? 'text-primary' : 'text-sidebar-foreground hover:bg-primary/10' }}">
                                    <i class="ri-arrow-right-double-line font-black text-sm"></i>&nbsp; Mobile Recharge
                                </a>
                            </li>
                            <li class="mb-2">
                                <a href="{{ route('admin.brilliant-recharge-request') }}"
                                    class="px-3 py-2 text-sm w-full flex items-center font-semibold rounded {{ isset($title) && $title == 'Brilliant Recharge' ? 'text-primary' : 'text-sidebar-foreground hover:bg-primary/10' }}">
                                    <i class="ri-arrow-right-double-line font-black text-sm"></i>&nbsp; Brilliant
                                    Recharge
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- Bill Pay -->
                    <li x-data="{ expanded: {{ isset($page) && $page == 'bill-pay' ? 'true' : 'false' }} }">
                        <a @click="expanded = ! expanded" href="javascript:;"
                            :class="expanded ? 'bg-primary/10 text-primary' : ''" class="menu-item">
                            <div class="flex items-center gap-1.5">
                                <span class="flex items-center justify-center w-7 text-xl">
                                    <i class="ri-wallet-line"></i>
                                </span>
                                <span class="text-sm tracking-wider">
                                    Pill Payment
                                </span>
                            </div>
                            <span
                                :class="expanded ? 'rotate-0 transition-all duration-300' :
                                    'rotate-180 transition-all duration-300'">
                                <i class="ri-arrow-up-s-line"></i>
                            </span>
                        </a>

                        <!-- Dropdown Menu -->
                        <ul x-show="expanded" x-collapse.duration.500ms x-cloak
                            class="px-3 mt-2 bg-accent/50 rounded border border-border/50 space-y-1">
                            <li class="mt-2">
                                <a href="{{ route('admin.bill-operator') }}"
                                    class="px-3 py-2 text-sm w-full flex items-center font-semibold rounded {{ isset($title) && $title == 'Bill Operator' ? 'text-primary' : 'text-sidebar-foreground hover:bg-primary/10' }}">
                                    <i class="ri-arrow-right-double-line font-black text-sm"></i>&nbsp; Bill Operator
                                </a>
                            </li>
                            <li class="mb-2">
                                <a href="{{ route('admin.bill-payment-request') }}"
                                    class="px-3 py-2 text-sm w-full flex items-center font-semibold rounded {{ isset($title) && $title == 'Bill Payment Request' ? 'text-primary' : 'text-sidebar-foreground hover:bg-primary/10' }}">
                                    <i class="ri-arrow-right-double-line font-black text-sm"></i>&nbsp; Bill Payment
                                    Request
                                </a>
                            </li>
                        </ul>
                    </li>


                    <!-- Table Dropdown -->
                    <li x-data="{ expanded: {{ isset($page) && $page == 'settings' ? 'true' : 'false' }} }">
                        <a @click="expanded = ! expanded" href="javascript:;"
                            :class="expanded ? 'bg-primary/10 text-primary' : ''" class="menu-item">
                            <div class="flex items-center gap-1.5">
                                <span class="flex items-center justify-center w-7 text-xl">
                                    <i class="ri-settings-2-line"></i>
                                </span>
                                <span class="text-sm tracking-wider">
                                    Site Settings
                                </span>
                            </div>
                            <span
                                :class="expanded ? 'rotate-0 transition-all duration-300' :
                                    'rotate-180 transition-all duration-300'">
                                <i class="ri-arrow-up-s-line"></i>
                            </span>
                        </a>

                        <!-- Dropdown Menu -->
                        <ul x-show="expanded" x-collapse.duration.500ms x-cloak
                            class="px-3 mt-2 bg-accent/50 rounded border border-border/50 space-y-1">
                            <li class="mt-2">
                                <a href="{{ route('admin.payment_methods') }}"
                                    class="px-3 py-2 text-sm w-full flex items-center font-semibold rounded {{ isset($title) && $title == 'Payment Methods' ? 'text-primary' : 'text-sidebar-foreground hover:bg-primary/10' }}">
                                    <i class="ri-arrow-right-double-line font-black text-sm"></i>&nbsp; Payment Methods
                                </a>
                            </li>
                            <li class="mb-2">
                                <a href="{{ route('admin.contact') }}"
                                    class="px-3 py-2 text-sm w-full flex items-center font-semibold rounded {{ isset($title) && $title == 'Conact Us' ? 'text-primary' : 'text-sidebar-foreground hover:bg-primary/10' }}">
                                    <i class="ri-arrow-right-double-line font-black text-sm"></i>&nbsp; Contact US
                                </a>
                            </li>
                        </ul>
                    </li>


                </ul>
            </div>
        </nav>
    </div>
</aside>

<!-- ===== Sidebar End ===== -->
