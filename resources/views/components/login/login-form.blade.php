<section class="py-10 bg-blue-50 font-[Montserrat] min-h-screen flex items-center justify-center">
    <div class="bg-white rounded-lg shadow p-8 w-full max-w-md">
      <h2 class="text-2xl md:text-3xl font-bold text-blue-700 mb-6 text-center flex items-center gap-2 justify-center"><i class="fa-solid fa-user"></i> Entrar na Conta</h2>
      <form>
        <div class="mb-4">
          <label for="email" class="block text-blue-900 font-semibold mb-1">E-mail</label>
          <div class="flex items-center border rounded px-3 py-2 bg-blue-50">
            <i class="fa-solid fa-envelope text-blue-400 mr-2"></i>
            <input type="email" id="email" name="email" class="w-full bg-transparent outline-none" placeholder="seu@email.com" required>
          </div>
        </div>
        <div class="mb-4">
          <label for="senha" class="block text-blue-900 font-semibold mb-1">Senha</label>
          <div class="flex items-center border rounded px-3 py-2 bg-blue-50">
            <i class="fa-solid fa-lock text-blue-400 mr-2"></i>
            <input type="password" id="senha" name="senha" class="w-full bg-transparent outline-none" placeholder="********" required>
          </div>
        </div>
        <button type="submit" class="w-full bg-blue-600 hover:bg-yellow-400 text-white hover:text-blue-900 font-bold py-3 rounded transition flex items-center justify-center gap-2 mb-3"><i class="fa-solid fa-sign-in-alt"></i> Entrar</button>
        <div class="flex justify-between text-sm">
          <a href="#" class="text-blue-700 hover:text-yellow-400">Criar conta</a>
          <a href="#" class="text-blue-700 hover:text-yellow-400">Esqueci minha senha</a>
        </div>
      </form>
    </div>
</section>
