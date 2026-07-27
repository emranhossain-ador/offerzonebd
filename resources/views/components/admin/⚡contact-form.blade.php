<?php

use Livewire\Component;
use App\Models\Contact;

new class extends Component {
    public string $facebook;
    public $whatsapp;
    public $telegram;
    public $phone;
    public string $email;

    public int $contactId = 0;

    public string $msg = '';

    public function mount()
    {
        $contact = Contact::first();
        $this->contactId = $contact->id ?? 0;
        $this->facebook = $contact->facebook ?? '';
        $this->whatsapp = $contact->whatsapp ?? '';
        $this->telegram = $contact->telegram ?? '';
        $this->phone = $contact->phone ?? '';
        $this->email = $contact->email ?? '';
    }

    public function save()
    {
        // validate form
        $this->validate([
            'facebook' => 'nullable',
            'whatsapp' => 'nullable',
            'telegram' => 'nullable',
            'phone' => 'nullable',
            'email' => 'nullable',
        ]);

        $data = [
            'facebook' => $this->facebook,
            'whatsapp' => $this->whatsapp,
            'telegram' => $this->telegram,
            'phone' => $this->phone,
            'email' => $this->email,
        ];

        if ($this->contactId != 0) {
            Contact::where('id', $this->contactId)->update($data);
            $msg = 'Contact updated successfully!';
        } else {
            Contact::create($data);
            $msg = 'Contact created successfully!';
        }

        // flash message
        $this->msg = $msg;
        $this->dispatch('save-success');
    }
};
?>

<div class="space-y-4">

    <div x-data="{ showMsg: false }"
        x-on:save-success.window="
            showMsg = true;
            setTimeout(() => showMsg = false, 3000);
        ">
        <div x-show="showMsg" x-cloak x-collapse
            class="flex px-4 py-2.5 rounded shadow-md bg-emerald-500 items-center gap-4">
            <span class="text-white"><i class="ri-checkbox-circle-line text-3xl"></i></span>
            <div>
                <p class="text-lg text-white tracking-wide">{{ $this->msg }}</p>
            </div>
        </div>
    </div>

    <form wire:submit="save">
        <div class="card-body space-y-4">
            <div class="flex items-center w-full h-fit overflow-hidden">
                <span
                    class="w-12 h-11.25 flex items-center justify-center rounded-l-xs bg-[#3b5998] text-white text-lg"><i
                        class="fa-brands fa-facebook"></i></span>
                <input type="text" wire:model="facebook"
                    class="px-2 py-2 min-h-11.25 text-foreground/80 text-sm placeholder-foreground/50 rounded-r-xs focus:outline-none bg-input/10 border border-[#3b5998] w-full"
                    placeholder="https://www.facebook.com/">
            </div>
            <div class="flex items-center w-full h-fit overflow-hidden">
                <span
                    class="w-12 h-11.25 flex items-center justify-center rounded-l-xs bg-[#43d854] text-white text-xl"><i
                        class="fa-brands fa-whatsapp"></i></span>
                <input type="text" wire:model="whatsapp"
                    class="px-2 py-2 min-h-11.25 text-foreground/80 text-sm placeholder-foreground/50 rounded-r-xs focus:outline-none bg-input/10 border border-[#43d854] w-full"
                    placeholder="+8801XXXXXXXX">
            </div>
            <div class="flex items-center w-full h-fit overflow-hidden">
                <span
                    class="w-12 h-11.25 flex items-center justify-center rounded-l-xs bg-[#00405d] text-white text-xl"><i
                        class="fa-brands fa-telegram"></i></span>
                <input type="text" wire:model="telegram"
                    class="px-2 py-2 min-h-11.25 text-foreground/80 text-sm placeholder-foreground/50 rounded-r-xs focus:outline-none bg-input/10 border border-[#00405d] w-full"
                    placeholder="+8801XXXXXXXX">
            </div>
            <div class="flex items-center w-full h-fit overflow-hidden">
                <span
                    class="w-12 h-11.25 flex items-center justify-center rounded-l-xs bg-cyan-500 text-white text-lg"><i
                        class="fa fa-phone"></i></span>
                <input type="text" wire:model="phone"
                    class="px-2 py-2 min-h-11.25 text-foreground/80 text-sm placeholder-foreground/50 rounded-r-xs focus:outline-none bg-input/10 border border-cyan-500 w-full"
                    placeholder="+8801XXXXXXXX">
            </div>
            <div class="flex items-center w-full h-fit overflow-hidden">
                <span
                    class="w-12 h-11.25 flex items-center justify-center rounded-l-xs bg-amber-500 text-white text-lg"><i
                        class="fa-regular fa-envelope"></i></span>
                <input type="email" wire:model="email"
                    class="px-2 py-2 min-h-11.25 text-foreground/80 text-sm placeholder-foreground/50 rounded-r-xs focus:outline-none bg-input/10 border border-amber-500 w-full"
                    placeholder="example@gmail.com">
            </div>
        </div>
        <div class="card-footer ">
            <button type="submit" wire:loading.attr="disabled" wire:target="save"
                class="px-7 py-2.5 w-full text-base flex items-center justify-center gap-1.5 tracking-wider rounded transition-all cursor-pointer bg-primary text-white shadow-md shadow-primary/20 hover:bg-primary/80">
                <span wire:loading.remove wire:target="save" class="flex items-center justify-center gap-1.5">
                    <i class="fa-regular fa-floppy-disk"></i> Save Change
                </span>
                <span wire:loading wire:target="save"
                    class="flex flex-row items-center justify-center gap-2 text-sm font-semibold">
                    <span wire:loading wire:target="save"
                        class="flex items-center justify-center gap-2 text-sm font-semibold">
                        <svg class="h-4 w-4 animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                stroke-width="4"></circle>

                            <path class="opacity-75" fill="currentColor"
                                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                            </path>
                        </svg>
                    </span>
                    Saving...
                </span>

            </button>
        </div>
    </form>
</div>
