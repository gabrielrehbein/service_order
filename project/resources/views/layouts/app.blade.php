<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
        integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>@yield('title')</title>
</head>

<body class="bg-gray-900 text-white">

    <header class="fixed top-0 left-0 w-full z-50 bg-gray-950/50 backdrop-blur-md h-24 px-16 flex items-center justify-between">
        <a href="a" class="font-bold text-3xl hover:text-indigo-600">SISTEMA OS</a>
        <ul class="flex gap-14">
            <li class="hover:text-indigo-600 hover:scale-[101%] transition hover:font-bold">
                <a href="" class="">
                    <i class="fa-solid fa-users mr-1"></i>
                    Cliente
                </a>
            </li>
            <li class="hover:text-indigo-600 hover:scale-[101%] transition hover:font-bold">

                <a href="{{ route("products.index") }}">
                    <i class="fa-solid fa-box mr-1"></i>
                    Produto
                </a>
            </li>
            <li class="hover:text-indigo-600 hover:scale-[101%] transition hover:font-bold">

                <a href="">
                    <i class="fa-solid fa-car mr-1"></i>
                    Veiculo
                </a>
            </li>
            <li class="hover:text-indigo-600 hover:scale-[101%] transition hover:font-bold">

                <a href="">
                    <i class="fa-solid fa-file-invoice-dollar mr-1"></i>
                    Ordem de Serviço
                </a>
            </li>
        </ul>
    </header>

    <main class="mt-16 p-16">
        @yield('content')
    </main>

    <footer class="w-full bg-gray-950/50 h-16 px-20 flex justify-between items-center">
        <p>Desonvolvido por <span class="font-bold">Gabriel Rehbein</span>.</p>
        <ul class="flex gap-4">
            <li>
                <a href="https://www.linkedin.com/in/gabrielrehbeindev/" target="_blank">
                    <i class="fa-brands fa-linkedin text-2xl"></i>
                </a>
            </li>
            <li>
                <a href="https://github.com/gabrielrehbein" target="_blank">
                    <i class="fa-brands fa-github text-2xl"></i>
                </a>
            </li>

        </ul>
    </footer>

    @yield('scripts')
</body>

</html>
