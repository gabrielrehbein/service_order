@extends('layouts.app')

@section('title')
    Veículos
@endsection

@section('content')

    <div class="flex w-full my-8 flex-wrap gap-12 justify-center">
        <div class="w-2xl border border-gray-400 rounded p-8 bg-gray-950/40">

            <div class="flex justify-between">
                <h1 class="text-2xl font-bold">Deletar</h1>

                <a
                    href="{{ url()->previous() }}"
                    class="bg-gray-100 text-indigo-600 hover:text-white font-bold transition rounded cursor-pointer px-4 py-1 hover:bg-indigo-600"
                >
                    <i class="fa-solid fa-arrow-left"></i>
                    Voltar
                </a>
            </div>

            <p class="mt-4">
                Você tem certeza que <span class="font-bold">deseja deletar</span>
                o veículo <span class="font-bold">{{ $vehicle->model }}</span>
                com a placa <span class="font-bold">{{ $vehicle->plate }}</span>
                do cliente <span class="font-bold">{{ $vehicle->customer->name }}</span>?
            </p>

            <form
                action="{{ route('vehicles.destroy', $vehicle) }}"
                method="POST"
                class="mt-4 flex flex-col gap-4"
            >
                @csrf
                @method('DELETE')

                <div class="flex gap-4">

                    <x-link-as-button
                        class="flex-1"
                        href="{{ route('vehicles.index') }}"
                    >
                        <i class="fa-solid fa-arrow-left"></i>
                        Não
                    </x-link-as-button>

                    <x-default-button
                        class="flex-1"
                    >
                        <i class="fa-solid fa-trash"></i>
                        Sim
                    </x-default-button>

                </div>

            </form>

        </div>
    </div>

@endsection
