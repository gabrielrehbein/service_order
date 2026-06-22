@extends('layouts.app')

@section('title')
    Ordens de Serviço
@endsection

@section('content')

    <h1 class="text-2xl font-bold">Ordens de Serviço</h1>

    <div class="flex justify-between mt-4 items-end">

        <form class="flex gap-4 items-end">

            <div class="flex flex-col gap-1">
                <label for="search">Cliente</label>

                <input
                    type="text"
                    name="search"
                    placeholder="Busque por cliente..."
                    class="border border-gray-400 rounded px-4 py-1 w-2xs"
                    value=""
                >
            </div>

            <x-default-button>
                <i class="fa-solid fa-magnifying-glass"></i>
            </x-default-button>

        </form>

        <x-link-as-button href="{{ route('order_service.create') }}">
            <i class="fa-solid fa-plus"></i>
            Criar OS
        </x-link-as-button>

    </div>

    <div class="flex justify-between w-full my-8 flex-wrap gap-12">

        @forelse ($serviceOrders as $serviceOrder)

            <a
                href="{{ route('order_service.show', $serviceOrder) }}"
                class="cursor-pointer relative w-[30%] h-64 bg-gray-800 rounded shadow-2xl hover:shadow-indigo-900 border border-gray-400 overflow-hidden hover:scale-[1.02] transition"
            >

                <div class="bg-gray-900 px-4 py-3 flex items-center justify-between">

                    <h2 class="text-white font-semibold text-lg">
                        OS #{{ $serviceOrder->id }}
                    </h2>

                    <span
                        class="
                            text-xs text-white px-2 py-1 rounded-full

                            @if($serviceOrder->status === 'pending')
                                bg-blue-600
                            @elseif($serviceOrder->status === 'in_progress')
                                bg-yellow-600
                            @elseif($serviceOrder->status === 'completed')
                                bg-green-600
                            @else
                                bg-red-600
                            @endif
                        "
                    >
                        {{ str_replace('_', ' ', ucfirst($serviceOrder->status)) }}
                    </span>

                </div>

                <div class="p-4 text-gray-300 text-sm leading-relaxed">

                    <p>
                        <strong>Cliente:</strong>
                        {{ $serviceOrder->vehicle->customer->name }}
                    </p>

                    <p class="mt-2">
                        <strong>Veículo:</strong>
                        {{ $serviceOrder->vehicle->model }}
                    </p>

                    <p class="mt-2">
                        <strong>Placa:</strong>
                        {{ $serviceOrder->vehicle->plate }}
                    </p>

                    <p class="mt-2 line-clamp-2">
                        <strong>Problema:</strong>
                        {{ $serviceOrder->problem_description }}
                    </p>

                </div>

                <div class="absolute w-full bg-gray-900 px-4 py-3 flex items-center justify-between bottom-0">

                    <span class="text-gray-400 text-sm">
                        Valor Total
                    </span>

                    <span class="text-indigo-400 font-bold">
                        R$ {{ number_format($serviceOrder->total_value, 2, ',', '.') }}
                    </span>

                </div>

            </a>

        @empty

            <p>Nenhuma ordem de serviço encontrada.</p>

        @endforelse

    </div>

@endsection
