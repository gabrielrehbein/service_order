@extends('layouts.app')

@section('title')
Clientes
@endsection

@section('content')

    <div class="flex w-full my-8 flex-wrap gap-12 justify-center">
        <div class="w-2xl border border-gray-400 rounded p-8 bg-gray-950/40">
            <div class="flex justify-between">
                <h1 class="text-2xl font-bold">Detalhes</h1>

                <a href="{{ url()->previous() }}"
                    class="bg-gray-100 text-indigo-600 hover:text-white font-bold transition rounded cursor-pointer px-4 py-1 hover:bg-indigo-600">
                    <i class="fa-solid fa-arrow-left"></i>
                    Voltar
                </a>
            </div>

            <form id="edit-form"
    action=""
    method="POST"
    class="mt-4 flex flex-col gap-4">

    @csrf
    @method('PUT')

    <h2 class="text-lg font-semibold border-b border-gray-700 pb-2">
        Dados do Cliente
    </h2>

    <div class="flex flex-col gap-1">
        <label for="name">Nome</label>
        <input
            name="name"
            type="text"
            class="border border-gray-400 rounded px-4 py-1"
            value="{{ old('name', $customer->name) }}"
        >
    </div>

    <div class="flex gap-4">

        <div class="flex flex-col gap-1 flex-1">
            <label for="person_type">Tipo de Pessoa</label>

            <select
                id="person_type"
                name="person_type"
                class="border border-gray-400 rounded px-4 py-1"
            >
                <option value="PF" {{ $customer->person_type == 'PF' ? 'selected' : '' }}>
                    Pessoa Física
                </option>

                <option value="PJ" {{ $customer->person_type == 'PJ' ? 'selected' : '' }}>
                    Pessoa Jurídica
                </option>
            </select>
        </div>

        <div class="flex flex-col gap-1 flex-1" id="cpf-container">
            <label>CPF</label>

            <input
                id="cpf"
                type="text"
                class="border border-gray-400 rounded px-4 py-1"
                value="{{ $customer->person_type == 'PF' ? $customer->document : '' }}"
            >
        </div>

        <div class="flex flex-col gap-1 flex-1" id="cnpj-container">
            <label>CNPJ</label>

            <input
                id="cnpj"
                type="text"
                class="border border-gray-400 rounded px-4 py-1"
                value="{{ $customer->person_type == 'PJ' ? $customer->document : '' }}"
            >
        </div>

    </div>

    <div class="flex flex-col gap-1">
        <label for="email">E-mail</label>

        <input
            name="email"
            type="email"
            class="border border-gray-400 rounded px-4 py-1"
            value="{{ old('email', $customer->email) }}"
        >
    </div>

    <div class="flex flex-col gap-1">
        <label for="phone">Telefone</label>

        <input
            name="phone"
            type="text"
            class="border border-gray-400 rounded px-4 py-1"
            value="{{ old('phone', $customer->phone) }}"
        >
    </div>

    <h2 class="text-lg font-semibold border-b border-gray-700 pb-2 mt-4">
        Endereço
    </h2>

    <div class="flex gap-4">

        <div class="flex flex-col gap-1 w-1/2">
            <label for="state">Estado</label>

            <select
                id="state"
                name="state"
                class="border border-gray-400 rounded px-4 py-1"
            >
                @foreach($states as $state)
                    <option
                        value="{{ $state['sigla'] }}"
                        {{ $customer->address->state == $state['sigla'] ? 'selected' : '' }}
                    >
                        {{ $state['nome'] }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="flex flex-col gap-1 w-1/2">
            <label for="city">Cidade</label>

            <select
                id="city"
                name="city"
                class="border border-gray-400 rounded px-4 py-1"
            >
                <option selected>
                    {{ $customer->address->city }}
                </option>
            </select>
        </div>

    </div>

    <div class="flex gap-4">

        <div class="flex flex-col gap-1 w-2/3">
            <label for="street">Rua</label>

            <input
                name="street"
                type="text"
                class="border border-gray-400 rounded px-4 py-1"
                value="{{ old('street', $customer->address->street) }}"
            >
        </div>

        <div class="flex flex-col gap-1 w-1/3">
            <label for="number">Número</label>

            <input
                name="number"
                type="text"
                class="border border-gray-400 rounded px-4 py-1"
                value="{{ old('number', $customer->address->number) }}"
            >
        </div>

    </div>

    <div class="flex flex-col gap-1">
        <label for="neighborhood">Bairro</label>

        <input
            name="neighborhood"
            type="text"
            class="border border-gray-400 rounded px-4 py-1"
            value="{{ old('neighborhood', $customer->address->neighborhood) }}"
        >
    </div>

    <div class="flex flex-col gap-1">
        <label for="complement">Complemento</label>

        <input
            name="complement"
            type="text"
            class="border border-gray-400 rounded px-4 py-1"
            value="{{ old('complement', $customer->address->complement) }}"
        >
    </div>

    <div class="flex gap-4">
        <x-link-as-button
            href="{{ route('customers.delete', $customer) }}"
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
@section("scripts")

<script>
    const personType = document.getElementById("person_type")
    const CPFContainer = document.getElementById("cpf-container")
    const CNPJContainer = document.getElementById("cnpj-container")

    const CNPJInput = document.getElementById("cnpj")
    const CPFInput = document.getElementById("cpf")

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
