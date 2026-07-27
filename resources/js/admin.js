import { Livewire, Alpine } from '../../vendor/livewire/livewire/dist/livewire.esm';
import Clipboard from '@ryangjchandler/alpine-clipboard'
import collapse from '@alpinejs/collapse'
import Swal from 'sweetalert2'


window.Alpine = Alpine
// or via CommonJS
const swal = Swal;

Alpine.plugin(collapse)
Alpine.plugin(Clipboard)



Livewire.start()


// -------- Custom Js --------

// Confirm delete
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
};

// View screenshot
$(document).ready(function () {
    $('.view-screenshot').on('click', function () {
        var screenshot = $(this).closest('div').find('img').attr('src');
        $('.screenshot-modal').removeClass('hidden');
        $('.screenshot-modal').addClass('flex');
        $('.screenshot-modal img').attr('src', screenshot);
    });

    $('.close-screenshot').on('click', function () {
        $('.screenshot-modal').addClass('hidden');
        $('.screenshot-modal').removeClass('flex');
    });
});



// This page alert
Livewire.on('status-alert', (event) => {
    swal.fire({
        title: event.title,
        text: event.text,
        icon: event.icon,
        showConfirmButton: false,
        timer: 4000
    });

});



// Recharge approved
Livewire.on('recharge-approved', (event) => {
    swal.fire({
        title: 'Recharge approved!',
        text: 'The recharge has been approved successfully.',
        icon: 'success',
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'OK'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = event[0].url;
        }
    });

});


// Recharge rejected
Livewire.on('recharge-rejected', (event) => {
    swal.fire({
        title: 'Recharge rejected!',
        text: 'The recharge has been rejected successfully.',
        icon: 'error',
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'OK'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = event[0].url;
        }
    });
});

// Redirect after
Livewire.on('redirect-after', event => {
    setTimeout(() => {
        window.location.href = event.url;
    }, 3500);
});


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


// Handle Popup alert
Livewire.on('popup-alert', ({ title, icon = 'success' }) => {
    Swal.fire({
        toast: true,
        position: 'top',
        icon: icon,
        title: title,
        showConfirmButton: false,
        timer: 4000,
        timerProgressBar: true,
    });
});



