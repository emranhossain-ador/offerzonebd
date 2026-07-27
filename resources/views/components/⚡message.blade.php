<?php

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;

new class extends Component {
    #[On('deleteData')]
    public function deleteData($id, $table)
    {
        DB::table($table)->where('id', $id)->delete();
        $this->dispatch('refresh-table');
    }
};
?>

<div>


    @if (session()->has('success'))
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                _msg('success', @js(session('success')));
            });
        </script>
    @endif

    @if (session()->has('error'))
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                _msg('error', @js(session('error')));
            });
        </script>
    @endif




    <script>
        // Livewire Alert show function
        window.addEventListener('success-toast', (event) => {
            _msg(event.detail.status, event.detail.title);
        });


        function _msg(status, message) {
            // console.log(status, message);

            let icon = status == 'success' ?
                `<i class="ri-checkbox-circle-line text-white text-3xl md:text-4xl"></i>` :
                `<i class="ri-prohibited-line text-white text-3xl font-black! md:text-4xl"></i>`;

            // console.log(icon);

            let classColor = status === 'success' ? 'bg-emerald-500' : 'bg-red-500';

            let toast = document.createElement('div');
            toast.className =
                'fixed top-3 md:top-6 right-[50%] md:right-5 translate-x-[120%] opacity-0 z-50 transition-all duration-500 ease-in-out w-[95%] md:w-sm h-fit ' +
                classColor + ' backdrop-blur-sm border-b text-white rounded-md shadow-lg shadow-md border-' + classColor
                .replace('bg-', '') + ' flex items-start justify-between overflow-hidden';
            toast.innerHTML = `
                <div class="flex items-center gap-2 w-full md:w-lg h-full pl-3.5 py-3 md:pl-4 md:py-3.5 text-base md:text-lg pb-4">
                    <span>
                        ${icon}
                    </span>
                    <span>${message}</span>
                </div>
                <span class="cursor-pointer font-black text-xl text-white p-1 m-1 hover:text-white/80 transition-all closeToast"><i class="ri-close-fill"></i></span>
                <div class="absolute bottom-0 left-0 h-1.5 inline-block w-full bg-white/60">
                    <div class="h-full bg-white rounded-full progress-bar"></div>
                </div>
            `;

            document.body.appendChild(toast);

            setTimeout(() => {
                toast.classList.remove('translate-x-[120%]', 'opacity-0');
                toast.classList.add('translate-x-[50%]', 'md:translate-x-0', 'opacity-100');
            }, 100);

            setTimeout(() => {
                toast.classList.add('translate-x-[120%]', 'opacity-0');
                toast.classList.remove('translate-x-[50%]', 'md:translate-x-0', 'opacity-100');
                setTimeout(() => {
                    toast.remove();
                }, 500);
            }, 5000);



            $('.closeToast').on('click', function() {
                toast.classList.add('translate-x-[120%]', 'opacity-0');
                toast.classList.remove('translate-x-0', 'opacity-100');
                setTimeout(() => {
                    toast.remove();
                }, 500);
            })
        }
    </script>

</div>
