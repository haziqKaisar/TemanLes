<x-layouts.app title="Panel Admin">
    <div class="mb-8">
        <h1 class="text-2xl font-bold mb-1">Panel Admin</h1>
        <p class="text-slate-500 text-sm">Dashboard keuangan & manajemen platform</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-8">
        <a href="{{ route('admin.payments') }}" class="bg-white rounded-2xl border border-slate-100 p-6 hover:shadow-md transition block">
            <p class="text-sm text-slate-500 mb-1">Verifikasi Pembayaran</p>
            <p class="text-lg font-semibold">Cek bukti transfer murid &rarr;</p>
        </a>
        <a href="{{ route('admin.payouts') }}" class="bg-white rounded-2xl border border-slate-100 p-6 hover:shadow-md transition block">
            <p class="text-sm text-slate-500 mb-1">Penarikan Saldo Guru</p>
            <p class="text-lg font-semibold">ACC pencairan dana guru &rarr;</p>
        </a>
    </div>
</x-layouts.app>
