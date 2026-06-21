@extends('layouts.app')

@section('title')
    Deletar Cliente
@endsection

@section('content')

    <div class="flex w-full my-8 justify-center">
        <div class="w-2xl border border-gray-400 rounded p-8 bg-gray-950/40">

            <div class="flex justify-between">
                <h1 class="text-2xl font-bold">Deletar Cliente</h1>

                <a href="{{ url()->previous() }}"
                    class="bg-gray-100 text-indigo-600 hover:text-white font-bold transition rounded cursor-pointer px-4 py-1 hover:bg-indigo-600">
                    <i class="fa-solid fa-arrow-left"></i>
                    Voltar
                </a>
            </div>

            <div class="mt-8">
                <h2 class="text-lg font-semibold border-b border-gray-700 pb-2">
                    Confirmação
                </h2>

                <p class="mt-6 text-center text-lg">
                    Deseja realmente deletar o cliente
                    <span class="font-bold text-indigo-400">
                        {{ $customer->name }}
                    </span>?
                </p>

                <p class="text-center text-gray-400 mt-2">
                    Esta ação não poderá ser desfeita.
                </p>

                <form
                    action="{{ route('customers.destroy', $customer) }}"
                    method="POST"
                    class="flex gap-4 mt-8"
                >
                    @csrf
                    @method('DELETE')

                    <x-default-button
                        type="submit"
                        class="w-1/2"
                    >
                        <i class="fa-solid fa-trash"></i>
                        Sim, deletar
                    </x-default-button>

                    <x-link-as-button
                        href="{{ route('customers.show', $customer) }}"
                        class="w-1/2"
                    >
                        <i class="fa-solid fa-xmark"></i>
                        Cancelar
                    </x-link-as-button>

                </form>
            </div>

        </div>
    </div>

@endsection
