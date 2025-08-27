@props(['product'])

<div class="flex-1 flex flex-col gap-4">
    <!-- Quick Actions -->
    <div class="flex items-center gap-4 mb-2">
        <a href="#" class="text-gray-500 hover:text-blue-700 flex items-center gap-1">
            <i class="fa-regular fa-heart"></i> favoritar
        </a>
        <a href="#" class="text-gray-500 hover:text-blue-700 flex items-center gap-1">
            <i class="fa-solid fa-share-nodes"></i> compartilhar
        </a>
    </div>
    
    <!-- Title and Rating -->
    <h1 class="text-2xl md:text-3xl font-bold text-gray-900">{{ $product->name }}</h1>
    <div class="flex items-center gap-2">
        <div class="flex text-yellow-400 text-lg">
            @for($i = 1; $i <= 5; $i++)
                @if($i <= ($product->rating ?? 4))
                    <i class="fa-solid fa-star"></i>
                @else
                    <i class="fa-regular fa-star"></i>
                @endif
            @endfor
        </div>
        <span class="text-gray-500 text-sm">({{ $product->reviews_count ?? 0 }} avaliações)</span>
    </div>
    
    <!-- Short Description -->
    @php
        $shortDescription = $product->short_description ?? (strlen($product->description) > 100 ? substr($product->description, 0, 100).'...' : $product->description);
    @endphp
    
    @if($shortDescription)
        <p class="text-gray-700 mb-2">
            {{ $shortDescription }}
            @if(strlen($product->description) > 100)
                <a href="#product-info" class="text-blue-600 hover:text-blue-800 text-sm font-medium ml-1">Ler mais</a>
            @endif
        </p>
    @else
        <p class="text-gray-500 italic mb-2">Nenhuma descrição disponível para este produto.</p>
    @endif
</div>
