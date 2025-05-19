<x-layouts.app :title="__('Product Details')">
    <div class="relative mb-6 w-full">
        <flux:heading size="xl">Product Categories</flux:heading>
        <flux:subheading size="lg" class="mb-6">View product categories</flux:subheading>
        <flux:separator variant="subtle" class="my-4" />
        <div class="flex justify-between items-center sm:flex flex-wrap mb-4 ">
            <div class="sm:mb-0 mb-4">
                <flux:modal.trigger class="sm:mb-0 mb-4" name="add-categories">
                    <flux:button icon="plus" variant="primary">Tambah Kategori</flux:button>
                </flux:modal.trigger>
            </div>
            <div>
                <flux:input icon="magnifying-glass" placeholder="Cari Kategori" />
            </div>
        </div>
        <div class="flex flex-col">
            <div class="-m-1.5 overflow-x-auto">
                <div class="p-1.5 min-w-full inline-block align-middle">
                    <div class="overflow-hidden">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
                            <thead>
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                        Id</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                        Nama Kategori</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                        Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr
                                        class="odd:bg-white even:bg-gray-100 dark:odd:bg-neutral-900 dark:even:bg-neutral-800">
                                        <td class="px-6 py-4 text-sm font-medium text-gray-800 dark:text-neutral-200">
                                            {{ $category->id }}
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-800 dark:text-neutral-200">
                                            {{ $category->name_categories }}
                                        </td>
                                        <td class="px-6 py-4 text-sm font-medium">
                                            <flux:dropdown class="w-28">
                                                <flux:button size="sm">...</flux:button>
                                                <flux:menu class="min-w-[7rem]">
                                                    <flux:modal.trigger name="edit-categories-{{ $category->id }}">
                                                        <flux:menu.item icon="pencil" size="sm">Edit</flux:menu.item>
                                                    </flux:modal.trigger>
                                                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="inline"
                                                        onsubmit="return confirm('Yakin ingin menghapus kategori ini?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <flux:menu.item icon="trash" type="submit" variant="danger" size="sm"> Delete
                                                        </flux:menu.item>
                                                    </form>
                                                </flux:menu>
                                            </flux:dropdown>
                                            <!-- MODAL EDIT CATEGORIES -->
                                            <flux:modal name="edit-categories-{{ $category->id }}" class="w-[600px] max-w-full">
                                                @include('dashboard.category.editCategories', compact('category'))
                                            </flux:modal>
                                            <!-- MODAL EDIT CATEGORIES END -->
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <flux:modal name="add-categories" class="w-[600px] max-w-full">
                @include('dashboard.category.createCategories')
            </flux:modal>
        </div>
    </div>
</x-layouts.app>