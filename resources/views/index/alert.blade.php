<div id="toastContainer" class="fixed top-6 right-6 z-[9999] space-y-3"></div>

<script>
    function showToast(
        type = 'success',
        title = '',
        message = ''
    ) {
        const container = document.getElementById('toastContainer');

        const colors = {
            success: 'bg-green-50 border-green-200 text-green-800',
            error: 'bg-red-50 border-red-200 text-red-800',
            warning: 'bg-yellow-50 border-yellow-200 text-yellow-800',
            info: 'bg-blue-50 border-blue-200 text-blue-800',
        };

        const toast = document.createElement('div');
        toast.className = `
          flex items-start gap-3 border rounded-xl shadow-lg p-4 w-80
          animate-toast-in ${colors[type] || colors.success}
        `;

        toast.innerHTML = `
          <div class="text-lg">
            ${type === 'success' ? `<svg width="18" height="18" viewBox="0 0 18 18" fill="none">
                    <path d="M16.5 8.31V9a7.5 7.5 0 1 1-4.447-6.855M16.5 3 9 10.508l-2.25-2.25"
                    stroke="#22C55E" stroke-width="1.5"/>
                </svg>` : type === 'error' ? `<svg width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="icon line">
            <path style="fill:none;stroke:currentColor;stroke-linecap:round;stroke-linejoin:round;stroke-width:1.95" d="M11.95 16.5h.1"/>
            <path d="M3 12a9 9 0 0 1 9-9h0a9 9 0 0 1 9 9h0a9 9 0 0 1-9 9h0a9 9 0 0 1-9-9m9 0V7" style="fill:none;stroke:currentColor;stroke-linecap:round;stroke-linejoin:round;stroke-width:1.5"/>
        </svg>` : `<svg width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="icon line">
            <path style="fill:none;stroke:currentColor;stroke-linecap:round;stroke-linejoin:round;stroke-width:1.95" d="M11.95 16.5h.1"/>
            <path d="M3 12a9 9 0 0 1 9-9h0a9 9 0 0 1 9 9h0a9 9 0 0 1-9 9h0a9 9 0 0 1-9-9m9 0V7" style="fill:none;stroke:currentColor;stroke-linecap:round;stroke-linejoin:round;stroke-width:1.5"/>
        </svg>`}
          </div>
          <div class="flex-1">
            <p class="font-semibold text-sm">${title}</p>
            <p class="text-sm opacity-80">${message}</p>
          </div>
          <button class="text-sm opacity-50 hover:opacity-100">&times;</button>
        `;

        toast.querySelector('button').onclick = () => toast.remove();

        container.appendChild(toast);

        // auto remove
        setTimeout(() => {
            toast.classList.add('opacity-0');
            setTimeout(() => toast.remove(), 300);
        }, 10000);
    }

    @if($errors->any())
        @foreach($errors->all() as $error)
            showToast(
                type: 'error',
                title: 'Có lỗi xảy ra',
                message: '{{ $error }}'
            );
        @endforeach
    @endif
    
    @if(session('success'))
        showToast(
            type: 'success',
            title: 'Thành công',
            message: '{{ session('success') }}'
        );
    @endif
</script>

<style>
    @keyframes toastIn {
        from { transform: translateX(50px); opacity: 0; }
        to { transform: translateX(0); opacity: 1; }
    }
    .animate-toast-in {
        animation: toastIn 0.3s ease-out;
    }
</style>
