<x-layouts.app :title="'Tambah Produk Baru'">
    <div class="relative mb-6 w-full">
        <flux:heading size="xl">Tambah Produk Baru</flux:heading>
        <flux:subheading size="lg" class="mb-6">Buat produk baru untuk toko Anda</flux:subheading>
        <flux:separator variant="subtle" class="my-4" />
    </div>
    <form action="{{ route('products.store') }}" method="POST" class="max-w-lg">
        @csrf
        <div class="mb-4">
            <label for="name" class="block text-primary-700 font-medium mb-1">Nama Produk</label>
            <flux:input name="name" id="name" placeholder="Masukkan nama produk" value="{{ old('name') }}" />
            @error('name')
                <flux:text color="red" size="sm" class="mt-1">{{ $message }}</flux:text>
            @enderror
        </div>
        <div class="mb-4">
            <label for="slug" class="block text-primary-700 font-medium mb-1">Slug</label>
            <flux:input name="slug" id="slug" placeholder="Masukkan slug (contoh: produk-baru)" value="{{ old('slug') }}" />
            @error('slug')
                <flux:text color="red" size="sm" class="mt-1">{{ $message }}</flux:text>
            @enderror
        </div>
        <div class="mb-4">
            <label for="description" class="block text-primary-700 font-medium mb-1">Deskripsi</label>
            <flux:textarea name="description" id="description" placeholder="Masukkan deskripsi produk">{{ old('description') }}</flux:textarea>
            @error('description')
                <flux:text color="red" size="sm" class="mt-1">{{ $message }}</flux:text>
            @enderror
        </div>
        <div class="mb-4">
            <label for="sku" class="block text-primary-700 font-medium mb-1">SKU</label>
            <flux:input name="sku" id="sku" placeholder="Masukkan SKU (contoh: PROD-001)" value="{{ old('sku') }}" />
            @error('sku')
                <flux:text color="red" size="sm" class="mt-1">{{ $message }}</flux:text>
            @enderror
        </div>
        <div class="mb-4">
            <label for="price" class="block text-primary-700 font-medium mb-1">Harga</label>
            <flux:input type="number" name="price" id="price" step="0.01" placeholder="Masukkan harga" value="{{ old('price') }}" />
            @error('price')
                <flux:text color="red" size="sm" class="mt-1">{{ $message }}</flux:text>
            @enderror
        </div>
        <div class="mb-4">
            <label for="stock" class="block text-primary-700 font-medium mb-1">Stok</label>
            <flux:input type="number" name="stock" id="stock" placeholder="Masukkan jumlah stok" value="{{ old('stock') }}" />
            @error('stock')
                <flux:text color="red" size="sm" class="mt-1">{{ $message }}</flux:text>
            @enderror
        </div>
        <div class="mb-4">
            <label for="product_category_id" class="block text-primary-700 font-medium mb-1">Kategori Produk</label>
            <flux:select name="product_category_id" id="product_category_id">
                <option value="">Pilih kategori (opsional)</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ old('product_category_id') == $category->id ? 'selected' : '' }}>{{ $category->name_categories }}</option>
                @endforeach
            </flux:select>
            @error('product_category_id')
                <flux:text color="red" size="sm" class="mt-1">{{ $message }}</flux:text>
            @enderror
        </div>
        <div class="mb-4">
            <label for="image_url" class="block text-primary-700 font-medium mb-1">URL Gambar</label>
            <flux:input name="image_url" id="image_url" placeholder="Masukkan URL gambar (opsional)" value="{{ old('image_url') }}" />
            @error('image_url')
                <flux:text color="red" size="sm" class="mt-1">{{ $message }}</flux:text>
            @enderror
        </div>
        <div class="mb-4">
            <label for="is_active" class="block text-primary-700 font-medium mb-1">Status Produk</label>
            <flux:select name="is_active" id="is_active">
                <option value="1" {{ old('is_active', true) ? 'selected' : '' }}>Tersedia</option>
                <option value="0" {{ old('is_active', true) ? '' : 'selected' }}>Tidak Tersedia</option>
            </flux:select>
            @error('is_active')
                <flux:text color="red" size="sm" class="mt-1">{{ $message }}</flux:text>
            @enderror
        </div>
        <flux:button type="submit" variant="primary" color="blue">Buat Produk</flux:button>
    </form>
</x-layouts.app>