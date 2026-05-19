@extends('layouts.app')

@section('title')
Produtos
@endsection

@section('content')
    <h1 class="text-2xl font-bold">Produtos</h1>
    <div class="flex justify-between mt-4">
        <div class="flex gap-4">
            <form class="flex gap-2">
                <input type="text" name="search" placeholder="Buscar..."
                class="border border-gray-400 rounded px-4 py-1 w-2xs"
                >
                <button class="bg-gray-100 text-indigo-600 hover:text-white font-bold transition rounded cursor-pointer px-4 py-1 hover:bg-indigo-600">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </form>
            <a href="{{ route("products.index") }}"
            class="bg-gray-100 text-indigo-600 hover:text-white font-bold transition rounded cursor-pointer px-4 py-1 hover:bg-indigo-600"
            >
                <i class="fa-solid fa-filter-circle-xmark"></i>
                Limpar Filtros
            </a>
        </div>
        <a href="{{ route("products.create") }}" class="bg-gray-100 text-indigo-600 hover:text-white font-bold transition rounded cursor-pointer px-4 py-1 hover:bg-indigo-600">
            <i class="fa-solid fa-plus"></i>
            Criar
        </a>
    </div>
    <div class="flex justify-between w-full my-8 flex-wrap gap-12">
        @forelse ($products as $product)

            <a href="{{ route("products.show", $product) }}" class="cursor-pointer relative w-[30%] h-52 bg-gray-800 rounded shadow-2xl hover:shadow-indigo-900 border  border-gray-400 overflow-hidden hover:scale-[1.02] transition">

                <div class="bg-gray-900 px-4 py-3 flex items-center justify-between">
                    <h2 class="text-white font-semibold text-lg">
                        {{ $product->name }}
                    </h2>

                    <span class="text-xs bg-indigo-600 text-white px-2 py-1 rounded-full">
                        Ativo
                    </span>
                </div>

                <div class="p-4 text-gray-300 text-sm leading-relaxed">
                    {{ $product->description }}
                </div>

                <div class="absolute w-full bg-gray-900 px-4 py-3 flex items-center justify-between bottom-0">
                    <span class="text-gray-400 text-sm">Preço de venda</span>
                    <span class="text-indigo-400 font-bold text-lg">
                        R$ {{ number_format($product->sale_price, 2, ",", ".") }}
                    </span>
                </div>

            </a>

        @empty

            <p>Nenhum produto encontrado.</p>

        @endforelse

    </div>
@endsection
