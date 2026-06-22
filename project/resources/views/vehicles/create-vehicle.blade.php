@extends('layouts.app')

@section('title')
    Criar Veículo
@endsection

@section('content')

    <div class="flex w-full my-8 justify-center">
        <div class="w-3xl border border-gray-400 rounded p-8 bg-gray-950/40">

            <div class="flex justify-between">
                <h1 class="text-2xl font-bold">Criar Veículo</h1>

                <a href="{{ url()->previous() }}"
                    class="bg-gray-100 text-indigo-600 hover:text-white font-bold transition rounded cursor-pointer px-4 py-1 hover:bg-indigo-600">
                    <i class="fa-solid fa-arrow-left"></i>
                    Voltar
                </a>
            </div>

            <form action="{{ route("vehicles.store") }}" method="POST" class="mt-4 flex flex-col gap-4">

                @csrf

                <div class="flex gap-4">
                    <div class="flex flex-col gap-1">
                        <label for="plate">Placa</label>

                        <input
                            name="plate"
                            id="plate"
                            type="text"
                            class="border border-gray-400 rounded px-4 py-1"
                            value="{{ old('plate') }}"
                            placeholder="ABC1D23"
                        >
                    </div>
                    <div class="flex flex-col gap-1 flex-2">
                        <label for="model">Modelo</label>

                        <input
                            name="model"
                            id="model"
                            type="text"
                            class="border border-gray-400 rounded px-4 py-1"
                            value="{{ old('model') }}"
                        >
                    </div>
                </div>
                <div class="flex gap-4">
                    <div class="flex flex-col gap-1 flex-1">
                        <label for="type">Tipo</label>

                        <select
                            name="type"
                            id="type"
                            type="text"
                            class="border border-gray-400 rounded px-4 py-1"
                            value="{{ old('type') }}"
                        >
                            @foreach ($types as $typeKey => $typeValue)
                                <option value="{{ $typeKey }}">{{ $typeValue }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex flex-col gap-1 flex-1">
                        <label for="year_released">Ano de Lançamento</label>

                        <select
                            name="year_released"
                            id="year_released"
                            type="text"
                            class="border border-gray-400 rounded px-4 py-1"
                            value="{{ old('year_released') }}"
                        >
                            @for ($i = now()->year; $i > 1900; $i--)
                                <option value={{ $i }}>{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                </div>

                <div class="flex gap-4">

                    <div class="flex flex-col gap-1 flex-1">
                        <label for="brand_id">Marca</label>

                        <select
                            name="brand_id"
                            id="brand_id"
                            class="border border-gray-400 rounded px-4 py-1"
                        >
                            <option value="">Selecione</option>

                            @foreach ($brands as $brand)
                                <option
                                    value="{{ $brand->id }}"
                                    @selected(old('brand_id') == $brand->id)
                                >
                                    {{ $brand->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flex flex-col gap-1 flex-1">
                        <label for="customer_id">Cliente</label>

                        <select
                            name="customer_id"
                            id="customer_id"
                            class="border border-gray-400 rounded px-4 py-1"
                        >
                            <option value="">Selecione</option>

                            @foreach ($customers as $customer)
                                <option
                                    value="{{ $customer->id }}"
                                    @selected(old('customer_id') == $customer->id)
                                >
                                    {{ $customer->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>


                </div>
                <div class="flex flex-col gap-1 flex-2">
                    <label for="km">Km Rodados</label>

                    <input
                        name="km"
                        id="km"
                        type="text"
                        class="border border-gray-400 rounded px-4 py-1"
                        value="{{ old('km') }}"
                        maxlength="8"
                    >
                </div>

                <x-default-button>
                    <i class="fa-solid fa-plus"></i>
                    Criar Veículo
                </x-default-button>

            </form>

        </div>
    </div>

@endsection
