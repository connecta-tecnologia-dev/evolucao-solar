<body>
  <div id="header-component"></div>
  <div id="product-list-component">
    <section class="py-10 bg-blue-50 font-[Montserrat]">
      <div class="container mx-auto px-4">
        <h2 class="text-2xl md:text-3xl font-bold text-blue-700 mb-8 text-center">Produtos em Destaque</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
          <!-- Produto 1 -->
          <a href="/components/product-detail/product-detail.html">
          <div class="bg-white rounded-lg shadow p-4 flex flex-col items-center hover:bg-blue-50 transition-colors duration-300">
            <img src="../../public/kit-solar-1.jpg" alt="Kit Solar Residencial 3kWp" class="w-32 h-32 object-contain mb-4">
            <h3 class="text-blue-900 font-semibold text-lg mb-2 text-center">Kit Solar Residencial 3kWp</h3>
            <span class="text-yellow-500 font-bold text-xl mb-2">R$ 12.990,00</span>
            <button class="mt-auto bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded flex items-center gap-2 transition">
              <i class="fa-solid fa-cart-plus"></i> Adicionar
            </button>
          </div>
          </a>
          <!-- Produto 2 -->
          <a href="/components/product-detail/product-detail.html">
          <div class="bg-white rounded-lg shadow p-4 flex flex-col items-center">
            <img src="../../public/kit-solar-2.jpg" alt="Kit Solar Empresarial 10kWp" class="w-32 h-32 object-contain mb-4">
            <h3 class="text-blue-900 font-semibold text-lg mb-2 text-center">Kit Solar Empresarial 10kWp</h3>
            <span class="text-yellow-500 font-bold text-xl mb-2">R$ 39.990,00</span>
            <button class="mt-auto bg-yellow-400 hover:bg-yellow-300 text-blue-900 font-semibold px-4 py-2 rounded flex items-center gap-2 transition">
              <i class="fa-solid fa-cart-plus"></i> Adicionar
            </button>
          </div>
          </a>
          <!-- Produto 3 -->
          <a href="/components/product-detail/product-detail.html">
          <div class="bg-white rounded-lg shadow p-4 flex flex-col items-center">
            <img src="../../public/kit-solar-3.jpg" alt="Placa Solar 550W" class="w-32 h-32 object-contain mb-4">
            <h3 class="text-blue-900 font-semibold text-lg mb-2 text-center">Placa Solar 550W</h3>
            <span class="text-yellow-500 font-bold text-xl mb-2">R$ 1.499,00</span>
            <button class="mt-auto bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded flex items-center gap-2 transition">
              <i class="fa-solid fa-cart-plus"></i> Adicionar
            </button>
          </div>
          </a>
          <!-- Produto 4 -->
          <a href="/components/product-detail/product-detail.html">
          <div class="bg-white rounded-lg shadow p-4 flex flex-col items-center">
            <img src="../../public/kit-solar-4.jpg" alt="Inversor Solar 5kW" class="w-32 h-32 object-contain mb-4">
            <h3 class="text-blue-900 font-semibold text-lg mb-2 text-center">Inversor Solar 5kW</h3>
            <span class="text-yellow-500 font-bold text-xl mb-2">R$ 4.990,00</span>
            <button class="mt-auto bg-yellow-400 hover:bg-yellow-300 text-blue-900 font-semibold px-4 py-2 rounded flex items-center gap-2 transition">
              <i class="fa-solid fa-cart-plus"></i> Adicionar
            </button>
          </div>
          </a>
        </div>
      </div>
    </section>
  </div>
  <div id="footer-component"></div>
</body>
</html> 