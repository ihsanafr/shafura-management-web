<script>
    // Fungsi untuk toast notification

    document.addEventListener('DOMContentLoaded', function () {
        const alertElement = document.querySelector('.alert-data');
        if (alertElement) {
            const type = alertElement.dataset.type;
            const message = alertElement.dataset.message;

            Swal.fire({
                html: `
            <div style="
                background-color: #e6f7e6;
                color: #2e7d32;
                padding: 1.5px;
                width: 5rem;
                border-radius: 4px;
                margin-bottom: 4px;
                font-weight: bold;
                text-align: center;
            ">
                SUCCESS
            </div>
            <div style="margin-top: 4px;">
                {{ session('success') }}
            </div>
            `,
                icon: type,
                // title: message,
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });
        }
    });

    function showToast(icon, title) {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        });

        Toast.fire({
            icon: icon,
            title: title
        });
    }

    // Notifikasi dari session
    @if(session('success'))
    showToast('success', '{{ session('
        success ') }}');
    @endif

    @if(session('error'))
    showToast('error', '{{ session('
        error ') }}');
    @endif

    // Fungsi konfirmasi delete
    function confirmDelete(formId) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Data yang dihapus tidak dapat dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById(formId).submit();
            }
        });
    }

</script>
