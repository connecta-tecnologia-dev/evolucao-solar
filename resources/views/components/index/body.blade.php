<body>
  <div id="header-component"></div>
  <div id="product-list-component">
    <section class="py-10 bg-blue-50 font-[Montserrat]">
      <div class="container mx-auto px-4">
        <h2 class="text-2xl md:text-3xl font-bold text-blue-700 mb-8 text-center">Produtos em Destaque</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
          @forelse($products as $product)
            <a href="{{ route('product-detail', ['id' => $product->id]) }}">
              <div class="bg-white rounded-lg shadow p-4 flex flex-col items-center hover:bg-blue-50 transition-colors duration-300 h-full">
                @if(isset($product->images[0]))
                  <img src="{{ asset('storage/' . $product->images[0]) }}" alt="{{ $product->name }}" class="w-32 h-32 object-contain mb-4">
                @else
                  <div class="w-32 h-32 bg-gray-200 flex items-center justify-center mb-4">
                    <i class="fas fa-image text-gray-400 text-4xl"></i>
                  </div>
                @endif
                <h3 class="text-blue-900 font-semibold text-lg mb-2 text-center">{{ $product->name }}</h3>
                <span class="text-yellow-500 font-bold text-xl mb-2">R$ {{ number_format($product->price, 2, ',', '.') }}</span>
                <button class="mt-auto {{ $loop->iteration % 2 == 0 ? 'bg-yellow-400 hover:bg-yellow-300 text-blue-900' : 'bg-blue-600 hover:bg-blue-700 text-white' }} font-semibold px-4 py-2 rounded flex items-center gap-2 transition">
                  <i class="fa-solid fa-cart-plus"></i> Adicionar
                </button>
              </div>
            </a>
          @empty
            <div class="col-span-4 text-center py-8">
              <p class="text-gray-600">Nenhum produto cadastrado no momento.</p>
            </div>
          @endforelse
        </div>
      </div>
    </section>
  </div>
  <div id="footer-component"></div>
</body>
</html>
