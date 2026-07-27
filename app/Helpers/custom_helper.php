<?php

use App\Models\AdminSettings;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

if(!function_exists('pageLink')){
    function pageLink($url = '/', $name = 'Home'){
        return '<nav class="mb-4 flex items-center gap-1 text-sm text-muted-foreground">
            <a href="' . $url . '" class="hover:text-foreground" wire:navigate>Home</a>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-right h-4 w-4" aria-hidden="true"><path d="m9 18 6-6-6-6"></path></svg>
            <span class="text-foreground">' . $name . '</span>
        </nav>';
    }
}


if(!function_exists('paymentMethodBadge')){
    function paymentMethodBadge($method = 'bkash'){
        $badges = [
            'bkash' => '<span class="inline-flex items-center gap-1 rounded-full px-2.5 py-1 text-[11px] font-semibold bg-pink-500/15 text-pink-400">
                        <i class="ri-verified-badge-line"></i>
                        bKash
                    </span>',
            'nagad' => '<span class="inline-flex items-center gap-1 rounded-full px-2.5 py-1 text-[11px] font-semibold bg-orange-500/15 text-orange-400">
                        <i class="ri-verified-badge-line"></i>
                        Nagad
                    </span>',
            'rocket' => '<span class="inline-flex items-center gap-1 rounded-full px-2.5 py-1 text-[11px] font-semibold bg-fuchsia-500/15 text-fuchsia-400">
                        <i class="ri-verified-badge-line"></i>
                        Rocket
                    </span>',
            'upay' => '<span class="inline-flex items-center gap-1 rounded-full px-2.5 py-1 text-[11px] font-semibold bg-cyan-500/15 text-cyan-400">
                        <i class="ri-verified-badge-line"></i>
                        Upay
                    </span>'
        ];

        return $badges[$method] ?? $method;
    }
}


if(!function_exists('statusBadge')){
    function statusBadge($status = 'pending'){
        $badges = [
            'pending' => '<label for="status-1" class="px-2 py-1 font-semibold text-xs tracking-wide rounded-sm bg-sky-500 dark:bg-sky-600 text-white shadow-sm shadow-sky-500/50 whitespace-nowrap">
                                                <i class="fa-solid fa-spinner"></i> Pending
                                            </label>',
            'accepted' => '<label for="status-1" class="px-2 py-1 font-semibold text-xs tracking-wide rounded-sm bg-cyan-500 dark:bg-cyan-600 text-white shadow-sm shadow-cyan-500/50 whitespace-nowrap">
                        <i class="fa-solid fa-check"></i> Accepted
                    </label>',
            'delivered' => '<label for="status-1" class="px-2 py-1 font-semibold text-xs tracking-wide rounded-sm bg-emerald-500 dark:bg-emerald-600 text-white shadow-sm shadow-emerald-500/50 whitespace-nowrap">
                        <i class="fa-solid fa-check"></i> Delivered
                    </label>',
            'approved' => '<label for="status-1" class="px-2 py-1 font-semibold text-xs tracking-wide rounded-sm bg-emerald-500 dark:bg-emerald-600 text-white shadow-sm shadow-emerald-500/50 whitespace-nowrap">
                        <i class="fa-solid fa-check"></i> Approved
                    </label>',
            'success' => '<label for="status-1" class="px-2 py-1 font-semibold text-xs tracking-wide rounded-sm bg-emerald-500 dark:bg-emerald-600 text-white shadow-sm shadow-emerald-500/50 whitespace-nowrap">
                        <i class="fa-solid fa-check"></i> Success
                    </label>',
            'rejected' => '<label for="status-1" class="px-2 py-1 font-semibold text-xs tracking-wide rounded-sm bg-red-500 dark:bg-red-600 text-white shadow-sm shadow-red-500/50 whitespace-nowrap">
                        <i class="fa-solid fa-xmark"></i>
                        Rejected
                    </label>',
            'failed' => '<label for="status-1" class="px-2 py-1 font-semibold text-xs tracking-wide rounded-sm bg-red-500 dark:bg-red-600 text-white shadow-sm shadow-red-500/50 whitespace-nowrap">
                        <i class="fa-solid fa-xmark"></i>
                        Failed
                    </label>'
        ];

        return $badges[$status] ?? $status;
    }
}



if(!function_exists('_logoutIcon')){
    function _logoutIcon(){
        return '<svg class="fill-destructive" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M15.1007 19.247C14.6865 19.247 14.3507 18.9112 14.3507 18.497L14.3507 14.245H12.8507V18.497C12.8507 19.7396 13.8581 20.747 15.1007 20.747H18.5007C19.7434 20.747 20.7507 19.7396 20.7507 18.497L20.7507 5.49609C20.7507 4.25345 19.7433 3.24609 18.5007 3.24609H15.1007C13.8581 3.24609 12.8507 4.25345 12.8507 5.49609V9.74501L14.3507 9.74501V5.49609C14.3507 5.08188 14.6865 4.74609 15.1007 4.74609L18.5007 4.74609C18.9149 4.74609 19.2507 5.08188 19.2507 5.49609L19.2507 18.497C19.2507 18.9112 18.9149 19.247 18.5007 19.247H15.1007ZM3.25073 11.9984C3.25073 12.2144 3.34204 12.4091 3.48817 12.546L8.09483 17.1556C8.38763 17.4485 8.86251 17.4487 9.15549 17.1559C9.44848 16.8631 9.44863 16.3882 9.15583 16.0952L5.81116 12.7484L16.0007 12.7484C16.4149 12.7484 16.7507 12.4127 16.7507 11.9984C16.7507 11.5842 16.4149 11.2484 16.0007 11.2484L5.81528 11.2484L9.15585 7.90554C9.44864 7.61255 9.44847 7.13767 9.15547 6.84488C8.86248 6.55209 8.3876 6.55226 8.09481 6.84525L3.52309 11.4202C3.35673 11.5577 3.25073 11.7657 3.25073 11.9984Z"fill=""></path>
                </svg>';
    }
}


if(!function_exists('_usersIcon')){
    function _usersIcon($color = "#ffffff"){
        return '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="'.$color.'" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-users-group">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M10 13a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
            <path d="M8 21v-1a2 2 0 0 1 2 -2h4a2 2 0 0 1 2 2v1" />
            <path d="M15 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
            <path d="M17 10h2a2 2 0 0 1 2 2v1" />
            <path d="M5 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
            <path d="M3 13v-1a2 2 0 0 1 2 -2h2" />
        </svg>';
    }
}


if(!function_exists('_auth')){
    function _auth(){
        return Auth::user();
    }
}


if(!function_exists('_getByUsername')){
    function _getByUsername($username = ''){
        if($username == '') return null;
        $user = User::query()->where('username', $username)->select(['id', 'name', 'email', 'phone'])->first();

        if($user){
            return $user;
        }else{
            return null;
        }
    }
}


if(!function_exists('_adminSettingById')){
    function _adminSettingById($id){
        return AdminSettings::findOrFail($id);
    }
}