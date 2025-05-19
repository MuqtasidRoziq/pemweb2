<div class="space-y-6">
    <div>
        <flux:heading size="lg">Edit Kategori</flux:heading>
        <flux:text class="mt-2">Edit Kategori Produk Anda.</flux:text>
        <flux:separator variant="subtle" class="my-4" />
    </div>
    <form action="{{ route('categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')
        <flux:input class="mb-4 flex justify-" label="Nama Kategori" placeholder="Masukan Nama Kategori"
            name="name_categories" value="{{ $category->name_categories }}" />
        <flux:button class="flex justify-end" type="submit" variant="primary">Simpan</flux:button>
    </form>
</div>