@extends('layouts.app')

@section('title')
Produtos
@endsection

@section('content')


    <div class="flex w-full my-8 flex-wrap gap-12 justify-center">
        <div class="w-2xl border border-gray-400 rounded p-8 bg-gray-950/40">
            <div class="flex justify-between">
                <h1 class="text-2xl font-bold">Criar Cliente</h1>
                <a href="{{ url()->previous() }}"
                class="bg-gray-100 text-indigo-600 hover:text-white font-bold transition rounded cursor-pointer px-4 py-1 hover:bg-indigo-600">
                    <i class="fa-solid fa-arrow-left"></i>
                    Voltar
                </a>
            </div>

            <form action="{{ route("products.store") }}" method="POST" class="mt-4 flex flex-col gap-4">
                @csrf
                <div class="flex justify-center gap-4">
                    <div class="flex flex-col gap-1 w-full">
                        <label for="name">Nome</label>
                        <input name="name" type="text" placeholder="Seu nome completo"
                        class="border border-gray-400 rounded px-4 py-1">
                    </div>

                    <div class="flex flex-col gap-1 w-full">
                        <label for="phone">Telefone</label>
                        <input name="phone" type="text" placeholder="51900000000"
                        class="border border-gray-400 rounded px-4 py-1">
                    </div>
                </div>

                <div class="flex flex-col gap-1">
                    <label for="email">E-mail</label>
                    <input name="email" type="text" placeholder="email@email.com"
                    class="border border-gray-400 rounded px-4 py-1">
                </div>

                <div class="flex justify-center gap-4">
                    <div class="flex flex-col gap-1 w-full">
                        <label for="person_type">Tipo de Pessoa</label>
                        <select name="person_type" class="border text-center border-gray-400 rounded px-4 py-1 h-8.5">
                            <option value="PF">Pessoa Fisica</option>
                            <option value="PJ">Pessoa Juridica</option>
                        </select>
                    </div>

                    <div class="flex flex-col gap-1 w-full">
                        <label for="document">CPF</label>
                        <input name="document" type="text" placeholder="0000000000"
                        class="border border-gray-400 rounded px-4 py-1 h-8.5">
                    </div>
                </div>

                {{-- <div>
                    <div class="flex flex-col gap-1 w-full">
                        <label for="cep">CEP</label>
                        <div class="flex justify-center gap-4">
                            <input name="cep" type="text" placeholder="00000000"
                            class="border border-gray-400 rounded px-4 py-1 h-8.5 w-full">
                            <button class="bg-gray-100 text-indigo-600 flex gap-1 items-center justify-center hover:text-white h-8.5 w-full font-bold transition rounded cursor-pointer px-4 py-1 hover:bg-indigo-600">
                                <i class="fa-solid fa-magnifying-glass"></i>Autopreencher por CEP
                            </button>
                        </div>
                    </div>
                </div> --}}

                <div class="flex justify-center gap-4">
                    <div class="flex flex-col gap-1 w-full">
                        <label for="state">Estado</label>
                        <select id="state" name="state" class="border text-center border-gray-400 rounded px-4 py-1 h-8.5">
                            @foreach ($initialData["states"] as $state)
                                <option value="{{ $state['sigla'] }}">{{ $state["nome"] }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flex flex-col gap-1 w-full">
                        <label for="city">Cidade</label>
                        <select name="city" id="city" class="border text-center border-gray-400 rounded px-4 py-1 h-8.5">

                        </select>
                    </div>
                </div>
                <div class="flex justify-between gap-4 w-full">
                    <div class="flex flex-col gap-1 w-[35%]">
                        <label for="neighborhood">Bairro</label>
                        <input name="neighborhood" type="text" placeholder="Seu bairro"
                        class="border border-gray-400 rounded px-4 py-1 h-8.5">
                    </div>

                    <div class="flex gap-4 w-[60%]">
                        <div class="flex flex-col gap-1 w-[80%]">
                            <label for="street">Rua</label>
                            <input name="neighstreetborhood" type="text" placeholder="Sua rua"
                            class="border border-gray-400 rounded px-4 py-1 h-8.5">
                        </div>
                        <div class="flex flex-col gap-1 w-[20%]">
                            <label for="number">Número</label>
                            <input name="number" type="text" placeholder="1014"
                            class="border border-gray-400 rounded px-4 py-1 h-8.5">
                        </div>
                    </div>
                </div>
                <div class="flex flex-col gap-1 w-full">
                    <label for="complement">Complemento</label>
                    <input name="complement" type="text"
                    class="border border-gray-400 rounded px-4 py-1 h-8.5">
                </div>


                <button class="bg-gray-100 text-indigo-600 mt-4 hover:text-white w-full font-bold transition rounded cursor-pointer px-4 py-1 hover:bg-indigo-600">
                    <i class="fa-solid fa-plus"></i>
                    Criar cliente
                </button>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
<script>

    document.getElementById('state').addEventListener('change', async (event) => {
        const state = event.target.value;

        const response = await fetch(
            `https://servicodados.ibge.gov.br/api/v1/localidades/estados/${state}/municipios`
        );

        const cities = await response.json();

        const citySelect = document.getElementById('city');

        citySelect.innerHTML = '';

        cities.forEach(city => {
            citySelect.innerHTML += `
                <option value="${city['nome']}">
                    ${city['nome']}
                </option>
            `;
        });
    });
</script>
@endsection
