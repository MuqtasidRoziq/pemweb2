<x-layouts.app :title="__('Dashboard')">
    <div class="relative mb-6 w-full">
        <flux:heading size="xl">Dashboard</flux:heading>
        <flux:subheading size="lg" class="mb-6">Manage data Products</flux:heading>
            <flux:separator variant="subtle"></flux:separator>
    </div>
    <div class="flex justify-between items-center mb-4">
        <div>
            <flux:input icon="magnifying-glass" placeholder="Search Products" />
        </div>
    </div>
    <div class="max-w-sm rounded overflow-hidden shadow-lg bg-white">
        <!-- Gambar -->
        <img class="w-full" src="https://via.placeholder.com/300" alt="Gambar Card">
        <!-- Body -->
        <div class="px-6 py-4">
            <div class="font-bold text-xl mb-2">Judul Card</div>
            <p class="text-gray-700 text-base">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua.
            </p>
        </div>
        <!-- Footer -->
        <div class="px-6 pt-4 pb-2">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Pelajari Lebih Lanjut
            </button>
        </div>
    </div>
</x-layouts.app>