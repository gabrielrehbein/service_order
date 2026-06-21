@extends('layouts.app')

@section('title')
    Criar Cliente
@endsection

@section('content')

    <div class="flex w-full my-8 justify-center">
        <div class="w-3xl border border-gray-400 rounded p-8 bg-gray-950/40">

            <div class="flex justify-between">
                <h1 class="text-2xl font-bold">Criar Cliente</h1>

                <a href="{{ url()->previous() }}"
                    class="bg-gray-100 text-indigo-600 hover:text-white font-bold transition rounded cursor-pointer px-4 py-1 hover:bg-indigo-600">
                    <i class="fa-solid fa-arrow-left"></i>
                    Voltar
                </a>
            </div>

            <form action="{{ route('customers.store') }}" method="POST" class="mt-4 flex flex-col gap-4">

                @csrf

                <h2 class="text-lg font-semibold border-b border-gray-700 pb-2">
                    Dados do Cliente
                </h2>

                <div class="flex flex-col gap-1">
                    <label for="name">Nome</label>
                    <input name="name" type="text" class="border border-gray-400 rounded px-4 py-1"
                        value="{{ old('name') }}">
                </div>

                <div class="flex gap-4">
                    <div class="flex flex-col gap-1 flex-1">
                        <label for="person_type">Tipo de pessoa</label>
                        <select id="person_type" name="person_type" type="text" class="border border-gray-400 rounded px-4 py-1"
                            value="{{ old('person_type') }}">
                            <option value="PF">Pessoa Fisica</option>
                            <option value="PJ">Pessoa Juridica</option>
                        </select>
                    </div>

                    <div class="flex flex-col gap-1 flex-1" id="cpf-container">
                        <label for="document">CPF</label>
                        <input id="cpf" name="document" type="text" class="border border-gray-400 rounded px-4 py-1"
                            value="{{ old('document') }}">
                    </div>
                    <div class="flex flex-col gap-1 flex-1" id="cnpj-container">
                        <label for="document">CNPJ</label>
                        <input id="cnpj" type="text" class="border border-gray-400 rounded px-4 py-1"
                            value="{{ old('document') }}">
                    </div>
                </div>

                <div class="flex flex-col gap-1">
                    <label for="email">E-mail</label>
                    <input name="email" type="email" class="border border-gray-400 rounded px-4 py-1"
                        value="{{ old('email') }}">
                </div>

                <div class="flex flex-col gap-1">
                    <label for="phone">Telefone</label>
                    <input name="phone" id="phone" type="text" class="border border-gray-400 rounded px-4 py-1"
                        value="{{ old('phone') }}">
                </div>

                <h2 class="text-lg font-semibold border-b border-gray-700 pb-2 mt-4">
                    Endereço
                </h2>

                <div class="flex gap-4">

                    <div class="flex flex-col gap-1 w-1/2">
                        <label for="state">Estado</label>

                        <select id="state" name="state" class="border border-gray-400 rounded px-4 py-1">
                            <option value="">Selecione</option>

                            @foreach($states as $state)
                                <option value="{{ $state['sigla'] }}">
                                    {{ $state['nome'] }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flex flex-col gap-1 w-1/2">
                        <label for="city">Cidade</label>

                        <div id="spinner" class="hidden">
                            <i class="fa-solid fa-spinner fa-spin"></i>
                        </div>

                        <select id="city" name="city" class="border border-gray-400 rounded px-4 py-1">
                            <option value="">Selecione um estado</option>
                        </select>
                    </div>

                </div>

                <div class="flex gap-4">

                    <div class="flex flex-col gap-1 w-2/3">
                        <label for="street">Rua</label>

                        <input name="street" type="text" class="border border-gray-400 rounded px-4 py-1"
                            value="{{ old('street') }}">
                    </div>

                    <div class="flex flex-col gap-1 w-1/3">
                        <label for="number">Número</label>

                        <input name="number" type="text" class="border border-gray-400 rounded px-4 py-1"
                            value="{{ old('number') }}">
                    </div>

                </div>

                <div class="flex flex-col gap-1">
                    <label for="neighborhood">Bairro</label>

                    <input name="neighborhood" type="text" class="border border-gray-400 rounded px-4 py-1"
                        value="{{ old('neighborhood') }}">
                </div>

                <div class="flex flex-col gap-1">
                    <label for="complement">Complemento</label>

                    <input name="complement" type="text" class="border border-gray-400 rounded px-4 py-1"
                        value="{{ old('complement') }}">
                </div>

                <x-default-button>
                    <i class="fa-solid fa-plus"></i>
                    Criar Cliente
                </x-default-button>

            </form>

        </div>
    </div>

@endsection

@section("scripts")

<script>

    const personType = document.getElementById("person_type")
    const CPFContainer = document.getElementById("cpf-container")
    const CNPJContainer = document.getElementById("cnpj-container")

    const CNPJInput = document.getElementById("cnpj")
    const CPFInput = document.getElementById("cpf")


    CNPJContainer.classList.add("hidden");

    personType.addEventListener("change", () => {
        if(personType.value == "PJ"){
            CPFContainer.classList.add("hidden");
            CNPJContainer.classList.remove("hidden");

            CPFInput.removeAttribute("name");
            CNPJInput.setAttribute("name", "document");
        }
        else {
            CPFContainer.classList.remove("hidden");
            CNPJContainer.classList.add("hidden");

            CNPJInput.removeAttribute("name");
            CPFInput.setAttribute("name", "document");
        }
    })


</script>

@endsection
