<x-layouts.app :title="__('product detail')">
    <div class="relative mb-6 w-full">
        <flux:heading size="xl">Product Details</flux:heading>
        <flux:subheading size="lg" class="mb-6">Product details</flux:subheading>
        <flux:separator variant="subtle" class="my-4" />
    </div>
    <div>
        <img src="{{ $product->image_url}}" alt="">
    </div>

</x-layouts.app>