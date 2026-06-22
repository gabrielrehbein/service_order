@extends('layouts.app')

@section('title')
    Veículo
@endsection

@section('content')

<div class="flex w-full my-8 flex-wrap gap-12 justify-center">
    <div class="w-2xl border border-gray-400 rounded p-8 bg-gray-950/40">

        <div class="flex justify-between">
            <h1 class="text-2xl font-bold">Detalhes</h1>

            <a href="{{ route('vehicles.index') }}"
                class="bg-gray-100 text-indigo-600 hover:text-white font-bold transition rounded cursor-pointer px-4 py-1 hover:bg-indigo-600">
                <i class="fa-solid fa-arrow-left"></i>
                Voltar
            </a>
        </div>

        <form
            id="edit-form"
            action=""
            method="POST"
            class="mt-4 flex flex-col gap-4"
        >

            @csrf
            @method('PUT')

            <h2 class="text-lg font-semibold border-b border-gray-700 pb-2">
                Dados do Veículo
            </h2>

            <div class="flex flex-col gap-1">
                <label for="plate">Placa</label>

                <input
                    name="plate"
                    type="text"
                    class="border border-gray-400 rounded px-4 py-1"
                    value="{{ old('plate', $vehicle->plate) }}"
                >
            </div>

            <div class="flex flex-col gap-1">
                <label for="model">Modelo</label>

                <input
                    name="model"
                    type="text"
                    class="border border-gray-400 rounded px-4 py-1"
                    value="{{ old('model', $vehicle->model) }}"
                >
            </div>

            <div class="flex gap-4">

                <div class="flex flex-col gap-1 w-1/2">
                    <label for="brand_id">Marca</label>

                    <select
                        name="brand_id"
                        class="border border-gray-400 rounded px-4 py-1"
                    >
                        @foreach($brands as $brand)
                            <option
                                value="{{ $brand->id }}"
                                @selected(old('brand_id', $vehicle->brand_id) == $brand->id)
                            >
                                {{ $brand->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="flex flex-col gap-1 w-1/2">
                    <label for="customer_id">Cliente</label>

                    <select
                        name="customer_id"
                        class="border border-gray-400 rounded px-4 py-1"
                    >
                        @foreach($customers as $customer)
                            <option
                                value="{{ $customer->id }}"
                                @selected(old('customer_id', $vehicle->customer_id) == $customer->id)
                            >
                                {{ $customer->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

            </div>

            <div class="flex gap-4">

                <div class="flex flex-col gap-1 w-1/2">
                    <label for="type">Tipo</label>

                    <select
                        name="type"
                        class="border border-gray-400 rounded px-4 py-1"
                    >
                        <option value="Carro" @selected(old('type', $vehicle->type) == 'Carro')>
                            Carro
                        </option>

                        <option value="Moto" @selected(old('type', $vehicle->type) == 'Moto')>
                            Moto
                        </option>

                        <option value="Caminhão" @selected(old('type', $vehicle->type) == 'Caminhão')>
                            Caminhão
                        </option>

                        <option value="Van" @selected(old('type', $vehicle->type) == 'Van')>
                            Van
                        </option>

                        <option value="Ônibus" @selected(old('type', $vehicle->type) == 'Ônibus')>
                            Ônibus
                        </option>
                    </select>
                </div>

                <div class="flex flex-col gap-1 w-1/2">
                    <label for="year_released">Ano</label>
                    <select
                    name="year_released"
                    id="year_released"
                    type="text"
                    class="border border-gray-400 rounded px-4 py-1"
                >
                    @for ($i = now()->year; $i > 1900; $i--)
                        <option @selected(old('year_released', $vehicle->year_released) == $i) value={{ $i }}>{{ $i }}</option>
                    @endfor
                </select>
                </div>

            </div>

            <div class="flex flex-col gap-1">
                <label for="km">Quilometragem</label>

                <input
                    name="km"
                    type="number"
                    class="border border-gray-400 rounded px-4 py-1"
                    value="{{ old('km', $vehicle->km) }}"
                >
            </div>

            <div class="flex gap-4">

                <x-link-as-button
                    href="{{ route('vehicles.delete', $vehicle) }}"
                    class="w-1/2"
                >
                    <i class="fa-solid fa-trash"></i>
                    Deletar
                </x-link-as-button>

                <x-default-button
                    form="edit-form"
                    class="w-1/2"
                >
                    <i class="fa-solid fa-pencil"></i>
                    Salvar Alterações
                </x-default-button>

            </div>

        </form>

    </div>
</div>

@endsection
