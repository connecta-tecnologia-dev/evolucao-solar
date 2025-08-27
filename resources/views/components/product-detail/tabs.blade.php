@props(['product'])

<div id="product-info" class="mt-8 pt-8 border-t border-gray-200">
    <div class="mb-8">
        <h2 class="section-title text-2xl font-bold text-gray-900 mb-6 flex items-center gap-2">
            <i class="fas fa-info-circle text-blue-500"></i>
            Descrição Detalhada
        </h2>
        <div class="prose max-w-none text-gray-700">
            @if($product->description)
                {!! nl2br(e($product->description)) !!}
            @else
                <p class="text-gray-900 italic">Nenhuma descrição detalhada disponível para este produto.</p>
            @endif
        </div>
    </div>
    
    @if($product->specifications && is_array($product->specifications) && count($product->specifications) > 0)
    <div class="specs-section mt-8 pt-6 border-t border-gray-100">
        <h3 class="text-xl font-bold text-gray-900 mb-4 flex items-center gap-2">
            <i class="fas fa-cogs text-blue-500"></i>
            Especificações Técnicas
        </h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
            @foreach($product->specifications as $key => $value)
                <div class="flex py-2 border-b border-gray-100 last:border-0">
                    <span class="font-medium text-gray-700 w-1/2 md:w-2/5">{{ $key }}:</span>
                    <span class="text-gray-600 flex-1">{{ $value }}</span>
                </div>
            @endforeach
        </div>
    </div>
    @endif
    
    <div class="warranty-section mt-8 pt-6 border-t border-gray-100">
        <h3 class="text-xl font-bold text-gray-900 mb-4 flex items-center gap-2">
            <i class="fas fa-shield-alt text-blue-500"></i>
            Garantia e Suporte
        </h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="bg-blue-50 p-4 rounded-lg">
                <div class="flex items-start">
                    <i class="fas fa-shield-alt text-blue-500 mt-1 mr-3"></i>
                    <div>
                        <h4 class="font-medium text-gray-900">Garantia do Produto</h4>
                        <p class="text-sm text-gray-600 mt-1">
                            {{ $product->warranty ?? 'Consulte-nos para informações sobre garantia.' }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="bg-green-50 p-4 rounded-lg">
                <div class="flex items-start">
                    <i class="fas fa-headset text-green-500 mt-1 mr-3"></i>
                    <div>
                        <h4 class="font-medium text-gray-900">Suporte Técnico</h4>
                        <p class="text-sm text-gray-600 mt-1">
                            Suporte especializado disponível para auxiliar com dúvidas e instalação.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
