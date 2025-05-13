<x-layouts.app :title="__('Produts')">
    <div class="relative mb-6 w-full">
        <flux:heading size="xl">Products</flux:heading>
        <flux:subheading size="lg" class="mb-6">Manage data Products</flux:heading>
        <flux:separator variant="subtle"></flux:separator>
    </div>
    <div class="flex justify-between items-center mb-4">
        <div>
            <flux:input icon="magnifying-glass" placeholder="Search Products" />
        </div>
        <div>
            <flux:button icon="plus" variant="primary" href="products/create">Tambah Product</flux:button>
        </div>
    </div>
    <table class="table-fixed w-full border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-100">
                <th class="border border-gray-300 px-4 py-2 text-left">Nama Produk</th>
                <th class="border border-gray-300 px-4 py-2 text-left">Harga</th>
                <th class="border border-gray-300 px-4 py-2 text-left">Stok</th>
                <th class="border border-gray-300 px-4 py-2 text-left">Kategori</th>
                <th class="border border-gray-300 px-4 py-2 text-left">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($products as $product)
                <tr>
                    <td class="border border-gray-300 px-4 py-2">{{ $product->name }}</td>
                    <td class="border border-gray-300 px-4 py-2">Rp {{ number_format($product->price, 0, ',', '.') }}
                    </td>
                    <td class="border border-gray-300 px-4 py-2">{{ $product->stock }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $product->category->name_categories ?? 'N/A' }}</td>
                    <td class="border border-gray-300 px-4 py-2">
                        <flux:button href="{{ route('products.edit', $product->id) }}" variant="primary" color="blue"
                            size="sm" class="ml-4"> Edit
                        </flux:button>
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="inline"
                            onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                            @csrf
                            @method('DELETE')
                            <flux:button type="submit" variant="danger" color="red" size="sm" class="ml-5"> Delete
                            </flux:button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="border border-gray-300 px-4 py-2 text-center">Tidak ada produk tersedia.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</x-layouts.app>