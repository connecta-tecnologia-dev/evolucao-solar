<section class="relative w-full bg-blue-600 text-white flex items-center justify-center py-12 md:py-20 overflow-hidden font-[Montserrat]">
  <div class="container mx-auto px-4 flex flex-col md:flex-row items-center justify-between">
    <!-- Texto do banner -->
    <div class="max-w-xl mb-8 md:mb-0">
      <h1 class="text-3xl md:text-5xl font-bold mb-4 flex items-center gap-3">
        <i class="fa-solid fa-solar-panel text-yellow-400 text-4xl"></i>
        Energia Solar para sua Casa e Empresa
      </h1>
      <p class="text-lg md:text-2xl mb-6">Economize na conta de luz e invista no futuro sustentável com a Evolução Solar.</p>
      <a href="#ofertas" class="inline-block bg-yellow-400 hover:bg-yellow-300 text-blue-900 font-semibold px-8 py-3 rounded-md shadow transition-colors text-lg">
        Ver Ofertas
        <i class="fa-solid fa-arrow-right ml-2"></i>
      </a>
    </div>
    <!-- Imagem decorativa (opcional) -->
    <div class="hidden md:block flex-shrink-0">
      <img src="{{ asset('image/banner-solar.png') }}" alt="Energia Solar" class="w-96 max-w-full rounded-lg shadow-lg border-4 border-yellow-400" onerror="this.style.display='none'">
    </div>
  </div>
  <!-- Detalhe decorativo -->
  <div class="absolute top-0 right-0 w-40 h-40 bg-yellow-400 rounded-bl-full opacity-20 hidden md:block"></div>
</section> 