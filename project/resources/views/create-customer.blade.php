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

            @if ($errors->any())
                <div class="bg-red-500 text-white p-4 rounded">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route("customers.store") }}" method="POST" class="mt-4 flex flex-col gap-4">
                @csrf
                <div class="flex justify-center gap-4">
                    <div class="flex flex-col gap-1 w-full">
                        <label for="name">Nome</label>
                        <input name="name" type="text" placeholder="Seu nome completo"
                        required
                        class="border border-gray-400 rounded px-4 py-1">
                    </div>

                    <div class="flex flex-col gap-1 w-full">
                        <label for="phone">Telefone</label>

                        <input name="phone" type="text" placeholder="51900000000"
                        maxlength="11"
                        required
                        class="border border-gray-400 rounded px-4 py-1">
                    </div>
                </div>

                <div class="flex flex-col gap-1">
                    <label for="email">E-mail</label>
                    <input name="email"
                    required type="text" placeholder="email@email.com"
                    class="border border-gray-400 rounded px-4 py-1">
                </div>

                <div class="flex justify-center gap-4">
                    <div class="flex flex-col gap-1 w-full">
                        <label for="person_type">Tipo de Pessoa</label>
                        <select name="person_type" required id="person_type" class="border text-center border-gray-400 rounded px-4 py-1 h-8.5">
                            <option value="PF">Pessoa Fisica</option>
                            <option value="PJ">Pessoa Juridica</option>
                        </select>
                    </div>

                    <div class="flex flex-col gap-1 w-full" id="cpf_container">
                        <label for="document" id="cpf_label">CPF</label>
                        <input name="document" id="cpf_input" type="text" placeholder="00000000000"
                        maxlength="11"
                        class="border border-gray-400 rounded px-4 py-1 h-8.5">
                    </div>

                    <div class="flex flex-col gap-1 w-full hidden" id="cnpj_container">
                        <label for="document" id="cnpj_label">CNPJ</label>
                        <input name="document" id="cnpj_input" type="text" placeholder="00000000100000"
                        maxlength="14"
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
                        <select required id="state" name="state" class="border text-center border-gray-400 rounded px-4 py-1 h-8.5">
                            @foreach ($initialData["states"] as $state)
                                <option value="{{ $state['sigla'] }}">{{ $state["nome"] }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flex flex-col gap-1 w-full">
                        <label for="city">Cidade</label>
                        <select required name="city" id="city" class="border text-center border-gray-400 rounded px-4 py-1 h-8.5">

                        </select>
                    </div>
                </div>
                <div class="flex justify-between gap-4 w-full">
                    <div class="flex flex-col gap-1 w-[35%]">
                        <label for="neighborhood">Bairro</label>
                        <input required name="neighborhood" type="text" placeholder="Seu bairro"
                        class="border border-gray-400 rounded px-4 py-1 h-8.5">
                    </div>

                    <div class="flex gap-4 w-[60%]">
                        <div class="flex flex-col gap-1 w-[80%]">
                            <label for="street">Rua</label>
                            <input required name="street" type="text" placeholder="Sua rua"
                            class="border border-gray-400 rounded px-4 py-1 h-8.5">
                        </div>
                        <div class="flex flex-col gap-1 w-[20%]">
                            <label for="number">Número</label>
                            <input required name="number" type="text" placeholder="1014"
                            maxlength="7"
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
<script defer>
    const personType = document.getElementById('person_type');
    personType.addEventListener("change", () => {
        const cpfContainer = document.getElementById('cpf_container');
        const cnpjContainer = document.getElementById('cnpj_container');

        const cpfInput = cpfContainer.querySelector('input');
        const cnpjInput = cnpjContainer.querySelector('input');

        cpfContainer.classList.toggle("hidden");
        cnpjContainer.classList.toggle("hidden");

        if (cpfContainer.classList.contains("hidden")) {
            cpfInput.value = '';
        }

        if (cnpjContainer.classList.contains("hidden")) {
            cnpjInput.value = '';
        }
    });

</script>
@endsection
