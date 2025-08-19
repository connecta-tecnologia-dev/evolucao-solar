<section class="py-10 bg-blue-50 font-[Montserrat]">
    <div class="container mx-auto px-4 max-w-3xl">
      <h2 class="text-2xl md:text-3xl font-bold text-blue-700 mb-8 text-center flex items-center gap-2"><i class="fa-solid fa-cart-shopping"></i> Meu Carrinho</h2>
      <div class="bg-white rounded-lg shadow p-4 mb-6">
        <div class="flex flex-col gap-4">

          <div class="flex items-center gap-4 border-b pb-4">
            <img src="{{ asset('image/kit-solar-2.jpg') }}" alt="Kit Solar Residencial 3kWp" class="w-16 h-16 object-contain rounded">
            <div class="flex-1">
              <div class="font-semibold text-blue-900">Kit Solar Residencial 3kWp</div>
              <div class="text-sm text-gray-500">R$ 12.990,00</div>
            </div>
            <div class="flex items-center gap-2">
              <button class="px-2 py-1 bg-blue-100 rounded hover:bg-blue-200"><i class="fa-solid fa-minus"></i></button>
              <span class="px-2">1</span>
              <button class="px-2 py-1 bg-blue-100 rounded hover:bg-blue-200"><i class="fa-solid fa-plus"></i></button>
            </div>
            <div class="w-24 text-right font-bold text-yellow-500">R$ 12.990,00</div>
            <button class="ml-2 text-red-500 hover:text-red-700"><i class="fa-solid fa-trash"></i></button>
          </div>

          <div class="flex items-center gap-4">
            <img src="{{ asset('image/kit-solar-3.jpg') }}" alt="Placa Solar 550W" class="w-16 h-16 object-contain rounded">
            <div class="flex-1">
              <div class="font-semibold text-blue-900">Placa Solar 550W</div>
              <div class="text-sm text-gray-500">R$ 1.499,00</div>
            </div>
            <div class="flex items-center gap-2">
              <button class="px-2 py-1 bg-blue-100 rounded hover:bg-blue-200"><i class="fa-solid fa-minus"></i></button>
              <span class="px-2">2</span>
              <button class="px-2 py-1 bg-blue-100 rounded hover:bg-blue-200"><i class="fa-solid fa-plus"></i></button>
            </div>
            <div class="w-24 text-right font-bold text-yellow-500">R$ 2.998,00</div>
            <button class="ml-2 text-red-500 hover:text-red-700"><i class="fa-solid fa-trash"></i></button>
          </div>
        </div>
      </div>

      <div class="flex flex-col md:flex-row justify-between items-center gap-4">
        <div class="text-xl font-bold text-blue-900">Total: <span class="text-yellow-500">R$ 15.988,00</span></div>
        <div class="flex gap-2">
          <a href="/" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded shadow flex items-center gap-2"><i class="fa-solid fa-arrow-left"></i> Continuar Comprando</a>
          <a href="/" class="bg-yellow-400 hover:bg-yellow-300 text-blue-900 font-bold px-6 py-2 rounded shadow flex items-center gap-2">Finalizar Compra <i class="fa-solid fa-credit-card"></i></a>
        </div>
      </div>
    </div>
</section>
