<x-layouts.app title="Berhasil">
    <div class="max-w-3xl mx-auto">
        <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6 text-center py-12">
            <div class="w-16 h-16 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center mx-auto text-2xl mb-4">✓</div>
            <h3 class="font-semibold text-lg mb-2">Bukti Transfer Terkirim!</h3>
            <p class="text-sm text-slate-500 mb-6">Admin akan memverifikasi pembayaran Anda dalam 1x24 jam. Anda dapat memantau status pesanan di Dashboard.</p>
            <a href="{{ route('student.dashboard') }}" class="inline-block bg-indigo-600 text-white rounded-lg px-6 py-3 font-medium hover:bg-indigo-700">
                Ke Dashboard Saya
            </a>
        </div>
    </div>
</x-layouts.app>
