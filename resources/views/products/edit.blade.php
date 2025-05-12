<x-layouts.app :title="__('edit product')">
    <div class="relative mb-6 w-full">
        <flux:heading size="xl">Edit Product</flux:heading>
        <flux:subheading size="lg" class="mb-6">Edit product details</flux:subheading>
        <flux:separator variant="subtle" class="my-4" />
    </div>

    <form action="{{ route('products.update', $product->id) }}" method="POST" class="max-w-lg">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="name" class="block text-primary-700 font-medium mb-1">Product Name</label>
            <flux:input name="name" id="name" placeholder="Enter product name" value="{{ old('name', $product->name) }}" />
            @error('name')
                <flux:text color="red" size="sm" class="mt-1">{{ $message }}</flux:text>
            @enderror
        </div>
        <div class="mb-4">
            <label for="slug" class="block text-primary-700 font-medium mb-1">Slug</label>
            <flux:input name="slug" id="slug" placeholder="Enter slug (e.g., new-product)" value="{{ old('slug', $product->slug) }}" />
            @error('slug')
                <flux:text color="red" size="sm" class="mt-1">{{ $message }}</flux:text>
            @enderror
        </div>
        <div class="mb-4">
            <label for="description" class="block text-primary-700 font-medium mb-1">Description</label>
            <flux:textarea name="description" id="description" placeholder="Enter product description">{{ old('description', $product->description) }}</flux:textarea>
            @error('description')
                <flux:text color="red" size="sm" class="mt-1">{{ $message }}</flux:text>
            @enderror
        </div>
        <div class="mb-4">
            <label for="sku" class="block text-primary-700 font-medium mb-1">SKU</label>
            <flux:input name="sku" id="sku" placeholder="Enter SKU (e.g., PROD-001)" value="{{ old('sku', $product->sku) }}" />
            @error('sku')
                <flux:text color="red" size="sm" class="mt-1">{{ $message }}</flux:text>
            @enderror
        </div>
        <div class="mb-4">
            <label for="price" class="block text-primary-700 font-medium mb-1">Price</label>
            <flux:input type="number" name="price" id="price" step="0.01" placeholder="Enter price" value="{{ old('price', $product->price) }}" />
            @error('price')
                <flux:text color="red" size="sm" class="mt-1">{{ $message }}</flux:text>
            @enderror
        </div>
        <div class="mb-4">
            <label for="stock" class="block text-primary-700 font-medium mb-1">Stock</label>
            <flux:input type="number" name="stock" id="stock" placeholder="Enter stock quantity" value="{{ old('stock', $product->stock) }}" />
            @error('stock')
                <flux:text color="red" size="sm" class="mt-1">{{ $message }}</flux:text>
            @enderror
        </div>
        <div class="mb-4">
            <label for="product_category_id" class="block text-primary-700 font-medium mb-1">Product Category</label>
            <flux:select name="product_category_id" id="product_category_id">
                <option value="">Select category (optional)</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ old('product_category_id', $product->product_category_id) == $category->id ? 'selected' : '' }}>{{ $category->name_categories }}</option>
                @endforeach
            </flux:select>
            @error('product_category_id')
                <flux:text color="red" size="sm" class="mt-1">{{ $message }}</flux:text>
            @enderror
        </div>
        <div class="mb-4">
            <label for="image_url" class="block text-primary-700 font-medium mb-1">Image URL</label>
            <flux:input name="image_url" id="image_url" placeholder="Enter image URL (optional)" value="{{ old('image_url', $product->image_url) }}" />
            @error('image_url')
                <flux:text color="red" size="sm" class="mt-1">{{ $message }}</flux:text>
            @enderror
        </div>
<div class="mb-4">
            <label for="is_active" class="block text-gray-700 font-medium mb-1">Status Produk</label>
            <flux:select name="is_active" id="is_active">
                <option value="1" {{ old('is_active', $product->is_active) ? 'selected' : '' }}>Tersedia</option>
                <option value="0" {{ old('is_active', $product->is_active) ? '' : 'selected' }}>Tidak Tersedia</option>
            </flux:select>
            @error('is_active')
                <flux:text color="red" size="sm" class="mt-1">{{ $message }}</flux:text>
            @enderror
        </div>
        <flux:button type="submit" variant="primary" color="blue">Simpan Perubahan</flux:button>
    </form>

</x-layouts.app>