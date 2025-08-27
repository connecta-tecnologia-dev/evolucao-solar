@props(['product'])

<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
    @if($product->on_sale)
        <div class="bg-yellow-50 py-2 px-4 flex items-center gap-3">
            <div class="bg-yellow-100 p-1.5 rounded-full">
                <i class="fas fa-tag text-yellow-600 text-sm"></i>
            </div>
            <div class="flex items-center gap-2">
                <span class="text-yellow-800 font-medium text-sm">OFERTA ESPECIAL</span>
                <span class="text-yellow-600 text-xs px-2 py-0.5 bg-yellow-100 rounded-full">
                    {{ round((1 - $product->price / ($product->price * 1.2)) * 100) }}% OFF
                </span>
                <span class="text-gray-400 text-sm line-through">R$ {{ number_format($product->price * 1.2, 2, ',', '.') }}</span>
            </div>
        </div>
    @endif
    
    <div class="p-5">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">
            <!-- Price Section -->
            <div class="space-y-3">
                <div class="flex items-baseline gap-3">
                    <span class="text-3xl font-bold text-gray-900">
                        R$ {{ number_format($product->price, 2, ',', '.') }}
                    </span>
                </div>
                
                <div class="flex items-center text-green-700 font-medium text-sm">
                    <i class="fas fa-check-circle mr-1.5"></i>
                    <span>Em estoque • Pronta entrega</span>
                </div>
                
                <!-- Payment Methods -->
                <div class="space-y-2 pt-2">
                    <div class="flex items-center text-gray-600 text-sm">
                        <i class="fas fa-credit-card mr-2 w-5 text-center text-blue-500"></i>
                        <span>12x de R$ {{ number_format($product->price / 12, 2, ',', '.') }} sem juros</span>
                    </div>
                </div>
                
                <!-- Quantity Selector -->
                <div class="flex items-center gap-4 pt-3">
                    <span class="font-medium text-gray-700">Quantidade:</span>
                    <div class="flex items-center border border-gray-200 rounded-lg overflow-hidden bg-gray-50">
                        <button 
                            onclick="updateQuantity(-1)" 
                            class="w-10 h-10 flex items-center justify-center hover:bg-gray-100 transition-all duration-200"
                        >
                            <i class="fas fa-minus text-gray-600 text-sm"></i>
                        </button>
                        <span id="quantity" class="w-12 text-center font-medium text-gray-800">1</span>
                        <button 
                            onclick="updateQuantity(1)" 
                            class="w-10 h-10 flex items-center justify-center hover:bg-gray-100 transition-all duration-200"
                        >
                            <i class="fas fa-plus text-gray-600 text-sm"></i>
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Action Buttons -->
            <div class="flex flex-col gap-3 w-full md:w-56 mt-4 md:mt-0">
                <button 
                    onclick="addToCart({{ $product->id }})" 
                    class="group relative overflow-hidden bg-gradient-to-r from-yellow-400 to-yellow-500 hover:from-yellow-500 hover:to-yellow-600 text-blue-900 font-semibold px-6 py-3.5 rounded-lg flex items-center justify-center gap-2 transition-all duration-300 w-full"
                    data-quantity="1"
                >
                    <i class="fa-solid fa-cart-plus transition-transform duration-300 group-hover:scale-110"></i> 
                    <span class="relative z-10">Adicionar ao carrinho</span>
                    <div class="absolute inset-0 bg-yellow-400 opacity-0 group-hover:opacity-10 transition-opacity duration-300"></div>
                </button>
                
                <button 
                    onclick="buyNow({{ $product->id }})" 
                    class="group relative overflow-hidden bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white font-semibold px-6 py-3.5 rounded-lg flex items-center justify-center gap-2 transition-all duration-300 w-full"
                >
                    <i class="fa-solid fa-bolt animate-pulse"></i>
                    <span class="relative z-10">Comprar agora</span>
                    <div class="absolute inset-0 bg-white opacity-0 group-hover:opacity-10 transition-opacity duration-300"></div>
                </button>
                
                <div class="flex items-center justify-center gap-2 text-xs text-gray-500 mt-1">
                    <i class="fas fa-shield-alt text-gray-400"></i>
                    <span>Compra 100% segura • </span>
                    <i class="fas fa-truck text-gray-400"></i>
                    <span>Frete grátis*</span>
                </div>
            </div>
        </div>
        
        <!-- Trust Badges -->
        <div class="mt-6 pt-4 border-t border-gray-100">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 text-center">
                <div class="flex flex-col items-center">
                    <div class="w-10 h-10 rounded-full bg-blue-50 flex items-center justify-center text-blue-500 mb-1.5">
                        <i class="fas fa-truck text-sm"></i>
                    </div>
                    <span class="text-xs text-gray-600">Entrega para todo Brasil</span>
                </div>
                <div class="flex flex-col items-center">
                    <div class="w-10 h-10 rounded-full bg-green-50 flex items-center justify-center text-green-500 mb-1.5">
                        <i class="fas fa-shield-alt text-sm"></i>
                    </div>
                    <span class="text-xs text-gray-600">Compra segura</span>
                </div>
                <div class="flex flex-col items-center">
                    <div class="w-10 h-10 rounded-full bg-purple-50 flex items-center justify-center text-purple-500 mb-1.5">
                        <i class="fas fa-credit-card text-sm"></i>
                    </div>
                    <span class="text-xs text-gray-600">Até 12x sem juros</span>
                </div>
                <div class="flex flex-col items-center">
                    <div class="w-10 h-10 rounded-full bg-yellow-50 flex items-center justify-center text-yellow-500 mb-1.5">
                        <i class="fas fa-tag text-sm"></i>
                    </div>
                    <span class="text-xs text-gray-600">Melhor preço</span>
                </div>
            </div>
        </div>
    </div>
</div>
