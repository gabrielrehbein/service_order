@extends('layouts.app')

@section('title')
    Ordem de Serviço
@endsection

@section('content')

    <div class="flex w-full my-8 flex-wrap gap-12 justify-center">
        <div class="w-2xl border border-gray-400 rounded p-8 bg-gray-950/40">


            <div class="flex justify-between">


                <a href="{{ url()->previous() }}"
                    class="bg-gray-100 text-indigo-600 hover:text-white font-bold transition rounded cursor-pointer px-4 py-1 hover:bg-indigo-600">
                    <i class="fa-solid fa-arrow-left"></i>
                    Voltar
                </a>
            </div>

            <form class="mt-4 flex flex-col gap-4">



                <div class="flex flex-col gap-1">
                    <label>Status</label>

                    <input type="text" readonly class="border border-gray-400 rounded px-4 py-1 bg-gray-900"
                        value="{{ $orderService->status }}">
                </div>

                <div class="flex flex-col gap-1">
                    <label>Veículo</label>

                    <input type="text" readonly class="border border-gray-400 rounded px-4 py-1 bg-gray-900"
                        value="{{ $orderService->vehicle->plate }} - {{ $orderService->vehicle->model }}">
                </div>

                <div class="flex flex-col gap-1">
                    <label>Cliente</label>

                    <input type="text" readonly class="border border-gray-400 rounded px-4 py-1 bg-gray-900"
                        value="{{ $orderService->vehicle->customer->name }}">
                </div>

                <div class="flex flex-col gap-1">
                    <label>Problema Relatado</label>

                    <textarea readonly rows="4"
                        class="border border-gray-400 rounded px-4 py-2 bg-gray-900">{{ $orderService->problem_description }}</textarea>
                </div>

                <div class="flex flex-col gap-1">
                    <label>Resultado</label>

                    <textarea readonly rows="4"
                        class="border border-gray-400 rounded px-4 py-2 bg-gray-900">{{ $orderService->result_description }}</textarea>
                </div>



                <div class="flex gap-4">

                    <div class="flex flex-col gap-1 flex-1">
                        <label>Valor do Serviço</label>

                        <input type="text" readonly class="border border-gray-400 rounded px-4 py-1 bg-gray-900"
                            value="R$ {{ number_format($orderService->service_value, 2, ',', '.') }}">
                    </div>

                    <div class="flex flex-col gap-1 flex-1">
                        <label>Desconto</label>

                        <input type="text" readonly class="border border-gray-400 rounded px-4 py-1 bg-gray-900"
                            value="R$ {{ number_format($orderService->discount, 2, ',', '.') }}">
                    </div>

                </div>

                <div class="flex flex-col gap-1">
                    <label>Total</label>

                    <input type="text" readonly class="border border-gray-400 rounded px-4 py-1 bg-gray-900 font-bold"
                        value="R$ {{ number_format($orderService->total_value, 2, ',', '.') }}">
                </div>


                <div class="border border-gray-400 rounded overflow-hidden">

                    <table class="w-full">
                        <thead class="bg-gray-900">
                            <tr>
                                <th class="text-left p-2">Produto</th>
                                <th class="text-center p-2">Qtd.</th>
                                <th class="text-right p-2">Valor Unitário</th>
                            </tr>
                        </thead>

                        <tbody>

                            @forelse($orderService->products as $product)

                                <tr class="border-t border-gray-700">
                                    <td class="p-2">
                                        {{ $product->name }}
                                    </td>

                                    <td class="text-center p-2">
                                        {{ $product->pivot->quantity }}
                                    </td>

                                    <td class="text-right p-2">
                                        R$ {{ number_format($product->pivot->unit_price, 2, ',', '.') }}
                                    </td>
                                </tr>

                            @empty

                                <tr>
                                    <td colspan="3" class="text-center p-4">
                                        Nenhum produto utilizado.
                                    </td>
                                </tr>

                            @endforelse

                        </tbody>
                    </table>
                    <x-link-as-button href="{{ route('order_service.printOrderService', $orderService) }}">
                        <i class="fa-solid fa-print"></i>
                        Imprimir
                    </x-link-as-button>

                </div>



            </form>

        </div>


    </div>

@endsection
