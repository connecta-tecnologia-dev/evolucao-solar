@extends('layouts.app')

@section('title', 'Detalhes do Produto - Evolução Solar')

@section('main')
    <x-default.header />

    <section class="bg-white rounded-xl shadow p-6 md:p-10 max-w-6xl mx-auto my-10">
        <div class="flex flex-col md:flex-row gap-8">

            <x-product-detail.images :product="$product" />
            
            <div class="flex-1 flex flex-col gap-4">
              
                <x-product-detail.info :product="$product" />

                <x-product-detail.price-actions :product="$product" />

                <div class="text-xs text-gray-500 mt-2">
                    Este produto é vendido por <span class="font-bold text-gray-700">Evolução Solar</span>. 
                    @if($product->in_stock > 0)
                        <span class="text-green-600 font-medium">Em estoque</span>
                    @else
                        <span class="text-red-600 font-medium">Fora de estoque</span>
                    @endif
                </div>
            </div>

        </div>
        <x-product-detail.tabs :product="$product" />
    </section>
    <x-default.footer />
@endsection