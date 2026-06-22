@extends('layouts.app')

@section('title')
    Criar Ordem de Serviço
@endsection

@section('content')

    <div class="flex w-full my-8 justify-center">
        <div class="w-3xl border border-gray-400 rounded p-8 bg-gray-950/40">

            <div class="flex justify-between">
                <h1 class="text-2xl font-bold">Criar Ordem de Serviço</h1>

                <a href="{{ url()->previous() }}"
                    class="bg-gray-100 text-indigo-600 hover:text-white font-bold transition rounded cursor-pointer px-4 py-1 hover:bg-indigo-600">
                    <i class="fa-solid fa-arrow-left"></i>
                    Voltar
                </a>
            </div>

            <form action="{{ route('order_service.store') }}" method="POST" class="mt-4 flex flex-col gap-4">

                @csrf

                <div class="flex flex-col gap-1">
                    <label for="vehicle_id">Veículo</label>

                    <select
                        name="vehicle_id"
                        id="vehicle_id"
                        class="border border-gray-400 rounded px-4 py-1"
                    >
                        <option value="">Selecione</option>

                        @foreach ($vehicles as $vehicle)
                            <option
                                value="{{ $vehicle->id }}"
                                @selected(old('vehicle_id') == $vehicle->id)
                            >
                                {{ $vehicle->plate }} - {{ $vehicle->model }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="flex flex-col gap-1">
                    <label for="problem_description">
                        Problema Relatado
                    </label>

                    <textarea
                        name="problem_description"
                        id="problem_description"
                        rows="4"
                        class="border border-gray-400 rounded px-4 py-2"
                    >{{ old('problem_description') }}</textarea>
                </div>

                <div class="flex gap-4">

                    <div class="flex flex-col gap-1 flex-1">
                        <label for="service_value">
                            Valor do Serviço
                        </label>

                        <input
                            name="service_value"
                            id="service_value"
                            type="number"
                            step="0.01"
                            min="0"
                            class="border border-gray-400 rounded px-4 py-1"
                            value="{{ old('service_value', 0) }}"
                        >
                    </div>

                    <div class="flex flex-col gap-1 flex-1">
                        <label for="discount">
                            Desconto
                        </label>

                        <input
                            name="discount"
                            id="discount"
                            type="number"
                            step="0.01"
                            min="0"
                            class="border border-gray-400 rounded px-4 py-1"
                            value="{{ old('discount', 0) }}"
                        >
                    </div>

                </div>

                <div class="flex flex-col gap-1">
                    <label for="products">
                        Produtos Utilizados
                    </label>

                    <select
                        name="products[]"
                        id="products"
                        multiple
                        class="border border-gray-400 rounded px-4 py-2 min-h-40"
                    >
                        @foreach ($products as $product)
                            <option
                                value="{{ $product->id }}"
                                @selected(in_array($product->id, old('products', [])))
                            >
                                {{ $product->name }}
                            </option>
                        @endforeach
                    </select>

                    <span class="text-gray-400 text-sm">
                        Segure Ctrl para selecionar varios produtos.
                    </span>
                </div>

                <x-default-button>
                    <i class="fa-solid fa-plus"></i>
                    Criar Ordem de Serviço
                </x-default-button>

            </form>

        </div>
    </div>

@endsection
