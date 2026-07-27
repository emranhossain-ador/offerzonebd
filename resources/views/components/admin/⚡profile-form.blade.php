<?php

use Livewire\Component;
use Illuminate\Validation\Rule;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\WithFileUploads;

new class extends Component
{
    use WithFileUploads;

    public $name = '';
    public $username = '';
    public $email = '';
    public $phone = '';
    public $existingImage = '';
    public $photo;

    public $current_password = '';
    public $new_password = '';
    public $confirm_password = '';

    public $msg;

    public function mount()
    {
        $this->name = _auth()->name;
        $this->username = _auth()->username;
        $this->email = _auth()->email;
        $this->phone = _auth()->phone;
        $this->existingImage = _auth()->images ?? '';
    }





    public function profileUpdate()
    {
        $this->validate([
            'name' => 'required',
            'username' => ['required', Rule::unique('users', 'username')->ignore(_auth()->id)],
            'email' => ['required', Rule::unique('users', 'email')->ignore(_auth()->id)],
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp',
        ]);

        $data = [
            'name' => $this->name,
            'username' => $this->username,
            'email' => $this->email,
            'phone' => $this->phone,
        ];

        if ($this->photo) {
            $imgPath = $this->photo->store('avatar', 'public');
            $data['images'] = $imgPath;
        }

        User::where('id', _auth()->id)->update($data);

        _auth()->refresh();

        if (isset($data['images'])) {
            $this->existingImage = $data['images'];
        }

        $this->msg = 'Profile updated successful';

        $this->dispatch('save-success');
    }


    public function changePassword(){
        $this->validate([
            'current_password' => 'required|string|min:6',
            'new_password' => 'required|string|min:6',
            'confirm_password' => 'required|string|min:6|same:new_password',
        ]);

        $user = User::where('id', Auth::id())->first();

        if(!Hash::check($this->current_password, $user->password)){
            return $this->addError('current_password', 'Please enter the current password!!');
        }

        $user->update([
            'password' => Hash::make($this->new_password)
        ]);

        $this->reset();

        $this->msg = 'Password changed successful';

        $this->dispatch('pass-change');
    }
};
?>

<div class="space-y-10">

    <div class="card">
        <!-- Message area -->
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
        <!-- Message area -->
        <div class="card-header">
            <h3 class="text-lg font-bold font-heading">My Profile</h3>
        </div>
        <form wire:submit="profileUpdate" class="card-body space-y-8">

            <div class="grid gap-5 sm:grid-cols-2">

                <div class="block">
                    <span class="mb-1.5 flex items-center gap-1.5 text-sm font-semibold text-muted-foreground">
                        <i class="ri-user-3-line"></i>
                        Full Name
                    </span>
                    <input type="text" class="default-input" wire:model="name">
                    @error('name')
                        <span class="text-red-500 text-xs"><i class="ri-alert-fill"></i> {{ $message }}</span>
                    @enderror
                </div>

                <div class="block">
                    <span class="mb-1.5 flex items-center gap-1.5 text-sm font-semibold text-muted-foreground">
                        <i class="fa-solid fa-user-secret"></i>
                        Username
                    </span>
                    <input type="text" class="default-input" wire:model="username">
                    @error('username')
                        <span class="text-red-500 text-xs"><i class="ri-alert-fill"></i> {{ $message }}</span>
                    @enderror
                </div>

                <div class="block">
                    <span class="mb-1.5 flex items-center gap-1.5 text-sm font-semibold text-muted-foreground">
                        <i class="ri-mail-line"></i>
                        Email
                    </span>
                    <input type="email" class="default-input" wire:model="email">
                    @error('email')
                        <span class="text-red-500 text-xs"><i class="ri-alert-fill"></i> {{ $message }}</span>
                    @enderror
                </div>

                <div class="block">
                    <span class="mb-1.5 flex items-center gap-1.5 text-sm font-semibold text-muted-foreground">
                        <i class="ri-phone-line"></i>
                        Phone
                    </span>
                    <input type="text" class="default-input" wire:model="phone">
                </div>

                <div class="block">
                    <span class="mb-2.5 flex items-center gap-1.5 text-sm font-semibold text-muted-foreground">
                        <i class="ri-image-line"></i>
                        Image
                    </span>

                    <input type="file" wire:model="photo" class="default-input flex items-center" accept="image/*,image/jpeg,image/png,image/jpg,image/gif,image/svg,image/webp">
                    <div wire:loading wire:target="photo" class="mt-2 text-xs text-orange-500">
                        Uploading image...
                    </div>

                    @error('photo')
                        <span class="text-red-500 text-xs"><i class="ri-alert-fill"></i> {{ $message }}</span>
                    @enderror

                    @if ($existingImage)
                        <div class="mt-1">
                            <img src="{{ Storage::url($existingImage) }}" alt="" class="w-20 h-20 rounded-full object-cover">
                        </div>
                    @endif
                </div>

            </div>

            <button type="submit" wire:loading.attr="disabled" wire:target="save" class="px-7 py-2.5 w-full text-base flex items-center justify-center gap-1.5 tracking-wider rounded transition-all cursor-pointer bg-primary text-white shadow-md shadow-primary/20 hover:bg-primary/80">
                <span wire:loading.remove="" wire:target="save" class="flex items-center justify-center gap-1.5">
                    <i class="fa-regular fa-floppy-disk"></i> Update Profile
                </span>
                <span wire:loading="" wire:target="save" class="flex items-center justify-center gap-2 text-sm font-semibold">
                    <i class="ri-loader-4-line animate-spin text-lg"></i>
                    Updating...
                </span>
            </button>
        </form>
    </div>

    <!------- ___________Password Change Area___________ ------->

    <div class="card max-w-lg">
        <!-- Message area -->
        <div x-data="{ showMsg: false }"
            x-on:pass-change.window="
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
        <!-- Message area -->

        <div class="card-header">
            <h3 class="text-lg font-bold font-heading">Password Change</h3>
        </div>

        <form wire:submit.prevent="changePassword">
            <div class="card-body space-y-3">

                <div class="block">
                    <span class="mb-1.5 block text-sm font-medium text-muted-foreground">Current Password</span>
                    <span x-data="{ showPassword: false }" class="flex items-center gap-2 rounded-xl border dark:border-gray-600/50 bg-white/10 px-3 py-2.5 focus-within:border-primary/50 focus-within:ring-1 focus-within:ring-primary/20 @error('current_password') border-red-500! @enderror">
                        <span class="text-muted-foreground">
                            <i class="ri-lock-password-line text-lg"></i>
                        </span>
                        <input :type="showPassword ? 'text' : 'password'" placeholder="••••••••" wire:model="current_password" class="w-full bg-transparent text-sm outline-none placeholder:text-muted-foreground/60">

                        <button type="button" class="text-muted-foreground hover:text-foreground cursor-pointer" aria-label="Toggle password" x-on:click="showPassword = !showPassword">
                            <i class="ri-eye-line" x-cloak x-show="showPassword"></i>
                            <i class="ri-eye-off-line" x-show="!showPassword"></i>
                        </button>
                    </span>
                    @error('current_password')
                        <span class="text-red-500 text-xs"><i class="ri-alert-fill"></i> {{ $message }}</span>
                    @enderror
                </div>

                <div class="block">
                    <span class="mb-1.5 block text-sm font-medium text-muted-foreground">New Password</span>
                    <span x-data="{ showPassword: false }" class="flex items-center gap-2 rounded-xl border dark:border-gray-600/50 bg-white/10 px-3 py-2.5 focus-within:border-primary/50 focus-within:ring-1 focus-within:ring-primary/20 @error('new_password') border-red-500! @enderror">
                        <span class="text-muted-foreground">
                            <i class="ri-lock-password-line text-lg"></i>
                        </span>
                        <input :type="showPassword ? 'text' : 'password'" placeholder="••••••••" wire:model="new_password" class="w-full bg-transparent text-sm outline-none placeholder:text-muted-foreground/60">

                        <button type="button" class="text-muted-foreground hover:text-foreground cursor-pointer" aria-label="Toggle password" x-on:click="showPassword = !showPassword">
                            <i class="ri-eye-line" x-cloak x-show="showPassword"></i>
                            <i class="ri-eye-off-line" x-show="!showPassword"></i>
                        </button>
                    </span>
                    @error('new_password')
                        <span class="text-red-500 text-xs"><i class="ri-alert-fill"></i> {{ $message }}</span>
                    @enderror
                </div>

                <div class="block">
                    <span class="mb-1.5 block text-sm font-medium text-muted-foreground">Confirm Password</span>
                    <span x-data="{ showPassword: false }" class="flex items-center gap-2 rounded-xl border dark:border-gray-600/50 bg-white/10 px-3 py-2.5 focus-within:border-primary/50 focus-within:ring-1 focus-within:ring-primary/20 @error('confirm_password') border-red-500! @enderror">
                        <span class="text-muted-foreground">
                            <i class="ri-lock-password-line text-lg"></i>
                        </span>
                        <input :type="showPassword ? 'text' : 'password'" placeholder="••••••••" wire:model="confirm_password" class="w-full bg-transparent text-sm outline-none placeholder:text-muted-foreground/60">

                        <button type="button" class="text-muted-foreground hover:text-foreground cursor-pointer" aria-label="Toggle password" x-on:click="showPassword = !showPassword">
                            <i class="ri-eye-line" x-cloak x-show="showPassword"></i>
                            <i class="ri-eye-off-line" x-show="!showPassword"></i>
                        </button>
                    </span>
                    @error('confirm_password')
                        <span class="text-red-500 text-xs"><i class="ri-alert-fill"></i> {{ $message }}</span>
                    @enderror
                </div>

                <div class="mt-6">
                    <button type="submit" wire:loading.attr="disabled" wire:target="changePassword" class="px-7 py-2.5 w-full text-base flex items-center justify-center gap-1.5 tracking-wider rounded transition-all cursor-pointer bg-primary text-white shadow-md shadow-primary/20 hover:bg-primary/80">
                        <span wire:loading.remove="" wire:target="changePassword" class="flex items-center justify-center gap-1.5">
                            <i class="fa-regular fa-floppy-disk"></i> Password Change
                        </span>
                        <span wire:loading="" wire:target="changePassword" class="flex items-center justify-center gap-2 text-sm font-semibold">
                            <i class="ri-loader-4-line animate-spin text-lg"></i>
                            Changing...
                        </span>
                    </button>
                </div>

            </div>

        </form>
    </div>

</div>
