<form action="{{ route('products.destroy', $product->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <flux:button icon="trash" type="submit" variant="danger" size="sm"> Delete</flux:menu.item>
</form>