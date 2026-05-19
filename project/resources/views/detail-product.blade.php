@extends('layouts.app')

@section('title')
Produtos
@endsection

@section('content')


    <div class="flex w-full my-8 flex-wrap gap-12 justify-center">
        <div class="w-2xl border border-gray-400 rounded p-8 bg-gray-950/40">
            <div class="flex justify-between">
                <h1 class="text-2xl font-bold">Detalhes</h1>
                <a href="{{ url()->previous() }}"
                class="bg-gray-100 text-indigo-600 hover:text-white font-bold transition rounded cursor-pointer px-4 py-1 hover:bg-indigo-600">
                    <i class="fa-solid fa-arrow-left"></i>
                    Voltar
                </a>
            </div>

            <form id="edit-form" action="{{ route("products.update", $product) }}" method="POST" class="mt-4 flex flex-col gap-4">
                @csrf
                @method("PUT")
                <div class="flex flex-col gap-1">
                    <label for="name">Nome</label>
                    <input name="name" type="text" placeholder="Pneu"
                    class="border border-gray-400 rounded px-4 py-1"
                    value={{ $product->name }}>
                </div>

                <div class="flex flex-col gap-1">
                    <label for="description">Descrição</label>
                    <textarea name="description"  class="border border-gray-400 rounded px-4 py-1 max-h-28 min-h-7">{{ $product->description }}</textarea>
                </div>

                <div class="flex justify-between">
                    <div class="flex flex-col gap-1">
                        <label for="cost_price">Valor de Compra</label>
                        <input name="cost_price" type="text" placeholder="350.00"
                        class="border border-gray-400 rounded px-4 py-1"
                        value="{{ $product->cost_price }}">
                    </div>

                    <div class="flex flex-col gap-1">
                        <label for="sale_price">Valor de Venda</label>
                        <input name="sale_price" type="text" placeholder="500.00"
                        class="border border-gray-400 rounded px-4 py-1"
                        value="{{ $product->sale_price }}">
                    </div>
                </div>

                <div class="flex flex-col gap-1">
                    <label for="quantity">Quantidade</label>
                    <input name="quantity" type="text" placeholder="0"
                    class="border border-gray-400 rounded px-4 py-1"
                    value="{{ $product->quantity }}">
                </div>
                <div class="flex gap-4">
                    <a href="{{ route("products.delete", $product) }}"
                    class="bg-gray-100 text-indigo-600 mt-4 hover:text-white w-full text-center font-bold transition rounded cursor-pointer px-4 py-1 hover:bg-red-600">
                        <i class="fa-solid fa-trash"></i>
                        Deletar
                    </a>

                    <button
                    form="edit-form"
                    class="bg-gray-100 text-indigo-600 mt-4 hover:text-white w-full font-bold transition rounded cursor-pointer px-4 py-1 hover:bg-indigo-600">
                        <i class="fa-solid fa-pencil"></i>
                        Editar
                    </button>

                </div>
            </form>
        </div>
    </div>
@endsection
