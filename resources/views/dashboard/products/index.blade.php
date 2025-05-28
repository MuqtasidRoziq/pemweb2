<x-layouts.app :title="__('Produts')">
    <!-- HEADING -->
    <section>
        <div class="relative mb-6 w-full">
            <flux:heading size="xl">Products</flux:heading>
            <flux:subheading size="lg" class="mb-6">Manage data Products</flux:heading>
                <flux:separator variant="subtle"></flux:separator>
        </div>
        <div class="flex justify-between items-center sm:flex flex-wrap mb-4 ">
            <div class="sm:mb-0 mb-4">
                <flux:button icon="plus" variant="primary" href="products/create">Tambah Product</flux:button>
            </div>
            <div>
                <flux:input icon="magnifying-glass" placeholder="Search Products" />
            </div>
        </div>
    </section>
    <!-- TABLE PRODUCT -->
    <section>
        <div class="flex flex-col">
            <div class="-m-1.5 overflow-x-auto">
                <div class="p-1.5 min-w-full inline-block align-middle">
                    <div class="overflow-hidden">
                        @if(session()->has('success'))
                            <flux:badge color="lime" class="mb-6 w-full">{{ session()->get('success') }}</flux:badge>
                        @endif
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
                            <thead>
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                        Id</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                        Nama Produk</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                        Harga</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                        Stok</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                        Kategori</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                        Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                <tr class="odd:bg-white even:bg-gray-100 dark:odd:bg-neutral-900 dark:even:bg-neutral-800">
                                    <td class="px-6 py-4 text-sm font-medium text-gray-800 dark:text-neutral-200">
                                        {{ $product->id }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-800 dark:text-neutral-200">
                                        {{ $product->name }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-800 dark:text-neutral-200">
                                        {{ 'Rp ' . number_format($product->price, 0, ',', '.') }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-800 dark:text-neutral-200">
                                        {{ $product->stock }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-800 dark:text-neutral-200">
                                        {{ $product->category ? $product->category->name_categories : 'null' }}</td>
                                    <td class="px-6 py-4 text-sm text-sm font-medium">
                                        <flux:dropdown class="w-28">
                                            <flux:button size="sm">...</flux:button>
                                            <flux:menu class="min-w-[7rem]">
                                                <flux:menu.item icon="eye" size="sm" href="{{ route('products.show', $product->slug) }}">View</flux:menu.item>
                                                <flux:menu.item icon="pencil" size="sm" href="{{ route('products.edit', $product->id) }}">Edit</flux:menu.item>
                                                <flux:modal.trigger name="delete-product-{{ $product->id }}">
                                                    <flux:menu.item icon="trash" size="sm">Delete</flux:menu.item>
                                                </flux:modal.trigger>
                                            </flux:menu>
                                        </flux:dropdown>
                                        <!-- MODAL DELETE PRODUCT -->
                                        <flux:modal name="delete-product-{{ $product->id }}" class="min-w-[22rem]">
                                            <div class="space-y-6">
                                                <div>
                                                    <flux:heading size="lg">Delete product?</flux:heading>
                                                    <flux:text class="mt-2">
                                                        <p>Apakah kamu yakin akan menghapus produk ini?.</p>
                                                    </flux:text>
                                                </div>
                                                <div class="flex gap-2">
                                                    <flux:spacer />
                                                    <flux:modal.close>
                                                        <flux:button variant="ghost">Cancel</flux:button>
                                                    </flux:modal.close>
                                                    @include('dashboard.products.delete', compact('product'))
                                                </div>
                                            </div>
                                        </flux:modal>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layouts.app>