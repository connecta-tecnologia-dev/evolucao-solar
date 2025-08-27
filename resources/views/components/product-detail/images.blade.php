@props(['product'])

<div class="flex flex-col items-center md:w-1/2">
    @if(isset($product->images) && count($product->images) > 0)
        <img id="main-image" 
             src="{{ asset('storage/' . $product->images[0]) }}" 
             alt="{{ $product->name }}" 
             class="w-72 h-72 object-contain rounded mb-4 border">
        <div class="flex gap-2 flex-wrap justify-center">
            @foreach($product->images as $index => $image)
                <img 
                    src="{{ asset('storage/' . $image) }}" 
                    class="w-16 h-16 object-contain rounded border cursor-pointer hover:border-blue-500 transition" 
                    alt="Imagem {{ $index + 1 }} do {{ $product->name }}"
                    onclick="document.getElementById('main-image').src = this.src">
            @endforeach
        </div>
    @else
        <div class="w-72 h-72 bg-gray-100 rounded flex items-center justify-center text-gray-400">
            <i class="fas fa-image text-4xl"></i>
        </div>
    @endif
</div>
