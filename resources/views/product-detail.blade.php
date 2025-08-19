@extends('layouts.app')

@section('title', 'Detalhes do Produto - Evolução Solar')



@section('main')
<x-default.header />
<section class="bg-white rounded-xl shadow p-6 md:p-10 max-w-6xl mx-auto my-10 font-[Montserrat]">
  <div class="flex flex-col md:flex-row gap-8">
    <!-- Galeria de imagens -->
    <div class="flex flex-col items-center md:w-1/2">
      <img src="{{ asset('image/kit-solar-1.jpg') }}" alt="Kit Solar Premium 5kWp" class="w-72 h-72 object-contain rounded mb-4 border">
      <div class="flex gap-2">
        <img src="{{ asset('image/kit-solar-1.jpg') }}" class="w-16 h-16 object-contain rounded border cursor-pointer" alt="Miniatura 1">
        <img src="{{ asset('image/kit-solar-2.jpg') }}" class="w-16 h-16 object-contain rounded border cursor-pointer" alt="Miniatura 2">
        <img src="{{ asset('image/kit-solar-3.jpg') }}" class="w-16 h-16 object-contain rounded border cursor-pointer" alt="Miniatura 3">
        <img src="{{ asset('image/kit-solar-4.jpg') }}" class="w-16 h-16 object-contain rounded border cursor-pointer" alt="Miniatura 4">
        <div class="w-16 h-16 flex items-center justify-center bg-gray-100 rounded border text-gray-500 font-bold text-lg cursor-pointer">+2</div>
      </div>
    </div>
    
    <!-- Informações principais -->
    <div class="flex-1 flex flex-col gap-4">
      <div class="flex items-center gap-4 mb-2">
        <a href="#" class="text-gray-500 hover:text-blue-700 flex items-center gap-1"><i class="fa-regular fa-heart"></i> favoritar</a>
        <a href="#" class="text-gray-500 hover:text-blue-700 flex items-center gap-1"><i class="fa-solid fa-share-nodes"></i> compartilhar</a>
      </div>
      <h1 class="text-2xl md:text-3xl font-bold text-gray-900">Kit Solar Premium 5kWp - Evolução Solar</h1>
      <div class="flex items-center gap-2 text-yellow-400 text-lg">
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
        <i class="fa-regular fa-star"></i>
        <span class="text-gray-600 text-base ml-2">(8 avaliações)</span>
      </div>
      <p class="text-gray-700 mb-2">Com o Kit Solar Premium 5kWp da Evolução Solar, você garante economia, sustentabilidade e tecnologia de ponta para sua casa ou empresa. Instalação rápida e suporte especializado.</p>
      <a href="#" class="text-blue-700 hover:underline text-sm">mais informações</a>
      <div class="flex flex-col gap-2 my-4">
        <div class="flex items-center gap-2"><span class="font-semibold">cor:</span> <span class="text-gray-700">prata</span></div>
        <div class="flex items-center gap-2"><span class="font-semibold">voltagem:</span> <span class="text-gray-700">bivolt</span></div>
      </div>
      <div class="flex flex-col md:flex-row gap-4 items-center md:items-end">
        <div class="bg-gray-50 rounded-lg p-4 flex flex-col items-center shadow">
          <span class="text-gray-400 line-through text-sm">R$ 24.990,00</span>
          <span class="bg-green-100 text-green-700 text-xs font-bold px-2 py-1 rounded mb-1">20% OFF</span>
          <span class="text-3xl font-bold text-green-700">R$ 19.990,00</span>
          <span class="text-gray-600 text-xs">em até 10x de R$ 1.999,00</span>
        </div>
        <form class="flex flex-col gap-2">
          <label class="text-sm font-semibold">calcular frete e prazo</label>
          <div class="flex gap-2">
            <input type="text" placeholder="digite seu CEP" class="border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            <button type="button" class="border border-yellow-400 text-yellow-500 px-4 py-2 rounded hover:bg-yellow-400 hover:text-white font-bold">ok</button>
          </div>
        </form>
        <div class="flex flex-col gap-1">
          <label class="text-sm font-semibold">quantidade:</label>
          <div class="flex items-center border rounded px-2 py-1 gap-2">
            <button class="text-xl text-gray-500 hover:text-blue-700"><i class="fa-solid fa-minus"></i></button>
            <span>1 unidade</span>
            <button class="text-xl text-gray-500 hover:text-blue-700"><i class="fa-solid fa-plus"></i></button>
          </div>
        </div>
      </div>
      <button class="mt-6 w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 rounded text-lg flex items-center justify-center gap-2"><i class="fa-solid fa-cart-shopping"></i> comprar</button>
      <div class="text-xs text-gray-500 mt-2">Este produto é vendido por <span class="font-bold text-gray-700">Evolução Solar</span>. Garantia de compra, do pedido à entrega.</div>
    </div>
  </div>
    <!-- Seção de mais informações do produto -->
    <div class="mt-10 bg-gray-100 rounded-xl p-6 shadow-sm">
        <div class="flex items-center justify-between cursor-pointer select-none">
          <h2 class="text-lg md:text-xl font-bold text-gray-800 mb-2 flex items-center gap-2"><i class="fa-solid fa-circle-info text-blue-500"></i> Informações do Produto</h2>
        </div>
        <div class="text-gray-800 text-sm md:text-base leading-relaxed">
          <p class="mb-4">O Kit Solar Premium 5kWp da Evolução Solar é a solução ideal para quem busca economia, sustentabilidade e autonomia energética. Composto por placas solares de alta eficiência, inversor moderno e todos os acessórios necessários para instalação, este kit é perfeito para residências e pequenas empresas que desejam reduzir a conta de luz e contribuir para um futuro mais verde.</p>
          <p class="mb-4">A instalação é simples e rápida, com suporte técnico especializado para garantir o melhor desempenho do seu sistema. O kit é projetado para oferecer máxima durabilidade e segurança, utilizando materiais de alta qualidade e tecnologia de ponta. Além disso, você conta com garantia e assistência técnica em todo o Brasil.</p>
          <p class="mb-4">Com o Kit Solar Premium 5kWp, você pode gerar sua própria energia, valorizar seu imóvel e proteger-se contra os aumentos nas tarifas de energia elétrica. Invista em energia limpa e aproveite todos os benefícios que a energia solar pode proporcionar para o seu dia a dia.</p>
          <ul class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-1 text-gray-700 text-sm">
            <li><b>Potência do kit:</b> 5kWp</li>
            <li><b>Tipo de sistema:</b> On-grid (conectado à rede)</li>
            <li><b>Placas solares:</b> 10 unidades de 500W</li>
            <li><b>Inversor:</b> 1 unidade compatível com 5kWp</li>
            <li><b>Estrutura de fixação:</b> Inclusa para telhado</li>
            <li><b>Garantia das placas:</b> 12 anos contra defeitos de fabricação</li>
            <li><b>Garantia do inversor:</b> 5 anos</li>
            <li><b>Suporte técnico:</b> Especializado em todo o Brasil</li>
            <li><b>Economia estimada:</b> Até 600 kWh/mês</li>
            <li><b>Manual de instalação:</b> Incluso</li>
            <li><b>Certificação:</b> INMETRO e ANEEL</li>
            <li><b>Aplicação:</b> Residencial e comercial</li>
            <li><b>Material das placas:</b> Silício monocristalino</li>
            <li><b>Tensão de operação:</b> Bivolt</li>
            <li><b>Assistência:</b> Nacional</li>
          </ul>
        </div>
      </div>
  <!-- Seção de avaliações e comentários -->
  <div class="mt-10 border-t pt-8">
    <h2 class="text-xl font-bold text-gray-900 mb-4 flex items-center gap-2"><i class="fa-solid fa-star"></i> Avaliações e Comentários</h2>
    <div class="flex flex-col gap-6">
      <!-- Avaliação 1 -->
      <div class="flex gap-4 items-start">
        <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Cliente 1" class="w-12 h-12 rounded-full">
        <div>
          <div class="flex items-center gap-2">
            <span class="font-semibold text-gray-800">Carlos Silva</span>
            <span class="text-xs text-gray-500">Recife - PE</span>
            <span class="text-xs text-gray-400">há 2 semanas</span>
          </div>
          <div class="flex text-yellow-400 text-sm mb-1">
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-regular fa-star"></i>
          </div>
          <p class="text-gray-700 text-sm">Produto excelente, entrega rápida e ótimo atendimento. Recomendo!</p>
        </div>
      </div>
      <!-- Avaliação 2 -->
      <div class="flex gap-4 items-start">
        <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Cliente 2" class="w-12 h-12 rounded-full">
        <div>
          <div class="flex items-center gap-2">
            <span class="font-semibold text-gray-800">Maria Oliveira</span>
            <span class="text-xs text-gray-500">João Pessoa - PB</span>
            <span class="text-xs text-gray-400">há 1 mês</span>
          </div>
          <div class="flex text-yellow-400 text-sm mb-1">
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
          </div>
          <p class="text-gray-700 text-sm">Muito satisfeita com a compra, produto de qualidade e fácil instalação.</p>
        </div>
      </div>
    </div>
  </div>

</section>

<x-default.footer />
@endsection