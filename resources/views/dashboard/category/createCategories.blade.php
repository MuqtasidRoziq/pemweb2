<div class="space-y-6">
    <div>
        <flux:heading size="lg">Tambah Kategori</flux:heading>
        <flux:text class="mt-2">Tambahkan Kategori Produk Anda.</flux:text>
        <flux:separator variant="subtle" class="my-4" />
    </div>
    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <flux:input class="mb-4 flex justify-" label="Nama Kategori" placeholder="Masukan Nama Kategori" name="name_categories" />
        @error('name_categories')
            <flux:text color="red" size="sm" class="mt-1">{{ $message }}</flux:text>
        @enderror
        <flux:button class="flex justify-end" type="submit" variant="primary">Simpan</flux:button>
    </form>
</div>