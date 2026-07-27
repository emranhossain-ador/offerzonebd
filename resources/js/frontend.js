import { Livewire, Alpine } from '../../vendor/livewire/livewire/dist/livewire.esm';
import Clipboard from '@ryangjchandler/alpine-clipboard'
import collapse from '@alpinejs/collapse'
import Swal from 'sweetalert2'


window.Alpine = Alpine
// or via CommonJS
const swal = Swal;

Alpine.plugin(collapse)
Alpine.plugin(Clipboard)


// Handle copy button
$(document).on('click', '.copyBtn', function () {
    let text = this.getAttribute('data-copy');
    // alert(text);

    let temp = $('<input>');
    $('body').append(temp);
    temp.val(text).select();
    document.execCommand('copy');
    temp.remove();
    alert('Copied!');
});


// Handle delete confirmation
window.confirmDelete = function (id, table) {
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't to delete this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            Livewire.dispatch('deleteData', { id: id, table: table });
        }
    });
}


// Handle save success
window.addEventListener('save-success', (event) => {
    Swal.fire({
        title: event.detail.title,
        text: event.detail.text,
        icon: 'success',
        timer: 3000,
        showConfirmButton: false
    });

    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
});



Livewire.on('home-success-alert', ({ title }) => {
    Swal.fire({
        toast: true,
        position: 'top',
        icon: 'success',
        title: title,
        showConfirmButton: false,
        timer: 4000,
        timerProgressBar: true,
        customClass: {
            popup: 'my-success-toast'
        }
    });
});







Livewire.start()


// Redirect after toast message
Livewire.on('redirect-after', ({ url }) => {
    setTimeout(() => {
        Livewire.navigate(url); // or window.location.href = url;
    }, 5000);
});

