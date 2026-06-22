@extends('layouts.app')

@section('title')
    Veículos
@endsection

@section('content')
    <h1 class="text-2xl font-bold">Veículos</h1>

    <div class="flex justify-between mt-4 items-end">
        <div class="flex gap-4 items-end">
            <form class="flex gap-4 items-end">

                <div class="flex flex-col gap-1">
                    <label for="search">Modelo</label>
                    <input
                        type="text"
                        name="search"
                        placeholder="Busque veículos pelo modelo..."
                        class="border border-gray-400 rounded px-4 py-1 w-2xs"
                        value="{{ $initialFilter['search'] }}"
                    >
                </div>

                <x-default-button>
                    <i class="fa-solid fa-magnifying-glass"></i>
                </x-default-button>

            </form>

            <a
                href="{{ route('vehicles.index') }}"
                class="h-8.5 flex items-center bg-gray-100 text-indigo-600 hover:text-white font-bold transition rounded px-4 hover:bg-indigo-600"
            >
                <i class="fa-solid fa-filter-circle-xmark mr-2"></i>
                Limpar Filtros
            </a>
        </div>

        <div class="flex gap-4">
            <x-link-as-button href="{{ route('vehicles.create') }}">
                <i class="fa-solid fa-plus"></i>
                Criar
            </x-link-as-button>
        </div>
    </div>

    <div class="flex justify-between w-full my-8 flex-wrap gap-12">
        @forelse ($vehicles as $vehicle)

            <a
                href="{{ route('vehicles.show', $vehicle) }}"
                class="cursor-pointer relative w-[30%] h-52 bg-gray-800 rounded shadow-2xl hover:shadow-indigo-900 border border-gray-400 overflow-hidden hover:scale-[1.02] transition"
            >

                <div class="bg-gray-900 px-4 py-3 flex items-center justify-between">
                    <h2 class="text-white font-semibold text-lg">
                        {{ $vehicle->model }}
                    </h2>

                    <span class="text-xs bg-indigo-600 text-white px-2 py-1 rounded-full">
                        {{ $vehicle->plate }}
                    </span>
                </div>

                <div class="flex flex-col gap-4 p-4 text-gray-300">

                    <p>
                        <strong>Marca:</strong>
                        {{ $vehicle->brand->name }}
                    </p>
                    <p>
                        <strong>Ano:</strong>
                        {{ $vehicle->year_released }}
                    </p>

                </div>

                <div class="absolute w-full bg-gray-900 px-4 py-3 flex items-center justify-between bottom-0">
                    <span class="text-gray-400 text-sm">
                        Cadastrado em
                    </span>

                    <span class="text-indigo-400 font-bold">
                        {{ $vehicle->created_at->format('d/m/Y') }}
                    </span>
                </div>

            </a>

        @empty

            <p>Nenhum veículo encontrado.</p>

        @endforelse
    </div>
@endsection
