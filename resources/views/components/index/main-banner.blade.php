<section 
    class="relative w-screen h-screen flex items-center justify-center py-12 md:py-20 overflow-hidden text-white font-[Montserrat]"
    style="background-image: url({{ asset('image/main-banner.png') }}); background-size: cover; background-position: center;"
>
    <div class="container mx-auto px-4 flex flex-col md:flex-row items-center justify-start">
        <div class="max-w-xl mb-8 md:mb-0 md:mr-16 lg:ml-16">
            <h1 class="text-3xl md:text-5xl font-bold mb-4 flex items-center gap-3">
                <i class="fa-solid fa-solar-panel text-4xl text-yellow-400"></i>
                Energia Solar para sua Casa e Empresa
            </h1>
            
            <p class="text-lg md:text-2xl mb-6">
                Economize na conta de luz e invista no futuro sustentável com a Evolução Solar.
            </p>
            
            <a href="#ofertas" 
                class="inline-flex items-center bg-yellow-400 hover:bg-yellow-300 text-blue-900 font-semibold px-8 py-3 rounded-md shadow transition-colors text-lg"
            >
                Ver Ofertas
                <i class="fa-solid fa-arrow-right ml-2"></i>
            </a>
        </div>

        <div class="hidden md:block flex-shrink-0">
            <img 
                src="{{ asset('image/banner-solar.png') }}" 
                alt="Energia Solar" 
                class="w-96 max-w-full rounded-lg shadow-lg border-4 border-yellow-400" 
                onerror="this.style.display='none'"
            >
        </div>
    </div>

    <div class="absolute top-0 right-0 w-40 h-40 bg-yellow-400 rounded-bl-full opacity-20 hidden md:block"></div>
</section> 