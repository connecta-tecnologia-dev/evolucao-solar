<header class="bg-white shadow-md fixed w-full z-50 font-[Montserrat]">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">
            <div class="flex-shrink-0 flex items-center">
                <a href="/" class="flex items-center">
                    <img class="h-12 w-auto" src="{{ asset('image/evolucao-logo.png') }}" alt="Evolução Solar">
                </a>
            </div>
            <div class="flex-1 mx-6 hidden md:flex">
                <form class="w-full flex" action="#" method="get">
                    <input type="text" placeholder="Buscar produtos, kits, acessórios..." class="w-full px-4 py-2 border border-blue-300 rounded-l-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-r-md">
                        <i class="fa-solid fa-search"></i>
                    </button>
                </form>
            </div>
            <div class="flex items-center space-x-4">
                <a href="/login" class="text-blue-700 hover:text-yellow-400 text-xl" title="Entrar">
                    <i class="fa-solid fa-user"></i>
                </a>
                <a href="/favorites" class="text-blue-700 hover:text-yellow-400 text-xl" title="Favoritos">
                    <i class="fa-solid fa-heart"></i>
                </a>
                <a href="/cart" class="text-blue-700 hover:text-yellow-400 text-xl relative" title="Carrinho">
                    <i class="fa-solid fa-cart-shopping"></i>
                    <span class="absolute -top-2 -right-2 bg-yellow-400 text-white text-xs rounded-full px-1">0</span>
                </a>
                <button type="button" class="inline-flex items-center justify-center p-2 rounded-md text-blue-700 hover:text-yellow-400 focus:outline-none md:hidden" aria-controls="mobile-menu" aria-expanded="false" id="mobile-menu-button">
                    <span class="sr-only">Abrir menu</span>
                    <i class="fa-solid fa-bars text-2xl"></i>
                </button>
            </div>
        </div>
    </div>

    <nav class="bg-blue-600 text-white hidden md:block">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <ul class="flex space-x-8 h-12 items-center">
                @foreach ($categories as $category)
                    <li><a href="#{{ $category->slug }}" class="hover:text-yellow-400 transition-colors">{{ $category->name }}</a></li>
                @endforeach
                <li><a href="#ofertas" class="hover:text-yellow-400 transition-colors">Ofertas</a></li>
                <li><a href="#contato" class="hover:text-yellow-400 transition-colors">Contato</a></li>
            </ul>
        </div>
    </nav>
    <div class="md:hidden hidden" id="mobile-menu">
        <div class="px-4 pt-2 pb-3 space-y-1 bg-white shadow-lg">
            @foreach ($categories as $category)
                <a href="#{{ $category->slug }}" class="block px-3 py-2 rounded-md text-base font-medium text-blue-700 hover:bg-blue-50 hover:text-yellow-400">{{ $category->name }}</a>
            @endforeach
            <a href="#ofertas" class="block px-3 py-2 rounded-md text-base font-medium text-blue-700 hover:bg-blue-50 hover:text-yellow-400">Ofertas</a>
            <a href="#contato" class="block px-3 py-2 rounded-md text-base font-medium text-blue-700 hover:bg-blue-50 hover:text-yellow-400">Contato</a>
        </div>
    </div>
</header>

<div class="h-32 md:h-32"></div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        mobileMenuButton.addEventListener('click', function() {
            const isHidden = mobileMenu.classList.contains('hidden');
            if (isHidden) {
                mobileMenu.classList.remove('hidden');
                mobileMenu.classList.add('block');
            } else {
                mobileMenu.classList.add('hidden');
                mobileMenu.classList.remove('block');
            }--
        });
    });
</script>