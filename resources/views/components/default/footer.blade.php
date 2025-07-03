@props(['title', 'links', 'phone', 'email', 'address', 'instagram', 'facebook', 'whatsapp', 'copyright', 'developedBy'])


<footer class="bg-blue-700 text-white font-[Montserrat] pt-10 pb-6">
    <div class="container mx-auto px-4">
        <div class="flex flex-col md:flex-row md:justify-between md:items-start gap-8">
            <!-- Logo e institucional -->
            <div class="mb-6 md:mb-0 flex-1">
                <img src="../../public/evolucao-logo.png" alt="Evolução Solar" class="h-12 mb-3 ">
                <p class="text-sm text-blue-100 max-w-xs">A Evolução Solar é referência em energia solar fotovoltaica no Nordeste, levando economia e sustentabilidade para sua casa ou empresa.</p>
            </div>
            <!-- Links úteis -->
            <div class="mb-6 md:mb-0 flex-1">
                <h4 class="font-bold mb-2 text-yellow-400">Links Úteis</h4>
                <ul class="space-y-1">
                    <li><a href="#kits-residenciais" class="hover:text-yellow-400 transition">Kits Residenciais</a></li>
                    <li><a href="#kits-empresariais" class="hover:text-yellow-400 transition">Kits Empresariais</a></li>
                    <li><a href="#ofertas" class="hover:text-yellow-400 transition">Ofertas</a></li>
                    <li><a href="#contato" class="hover:text-yellow-400 transition">Contato</a></li>
                </ul>
            </div>
            <!-- Contato e redes sociais -->
            <div class="flex-1">
                <h4 class="font-bold mb-2 text-yellow-400">Contato</h4>
                <ul class="text-sm mb-3">
                    <li><i class="fa-solid fa-phone mr-2"></i> (81) 99999-9999</li>
                    <li><i class="fa-solid fa-envelope mr-2"></i> contato@evolucaosolar.com.br</li>
                    <li><i class="fa-solid fa-location-dot mr-2"></i> Recife, PE</li>
                </ul>
                <div class="flex space-x-4 mt-2">
                    <a href="#" class="hover:text-yellow-400"><i class="fa-brands fa-instagram text-2xl"></i></a>
                    <a href="#" class="hover:text-yellow-400"><i class="fa-brands fa-facebook text-2xl"></i></a>
                    <a href="#" class="hover:text-yellow-400"><i class="fa-brands fa-whatsapp text-2xl"></i></a>
                </div>
            </div>
        </div>
        <div class="border-t border-blue-600 mt-8 pt-4 text-center text-blue-200 text-xs">
            © 2024 Evolução Solar. Todos os direitos reservados.
            <p>Desenvolvido por <a href="https://www.instagram.com/agenciaconnecta/" class="text-yellow-400">Agência Connecta</a></p>
        </div>
    </div>
</footer>
