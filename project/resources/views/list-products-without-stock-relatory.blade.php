<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Relatório de Produtos Sem Estoque</title>

    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            color: #333;
        }

        h1 {
            text-align: center;
            margin-bottom: 5px;
        }

        .date {
            text-align: right;
            margin-bottom: 20px;
            font-size: 11px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table th,
        table td {
            border: 1px solid #000;
            padding: 8px;
        }

        table th {
            background-color: #f2f2f2;
            text-align: left;
        }

        .text-center {
            text-align: center;
        }

        .footer {
            margin-top: 20px;
            text-align: right;
            font-size: 11px;
        }
    </style>
</head>
<body>

    <h1>Relatório de Produtos Sem Estoque</h1>

    <div class="date">
        Gerado em: {{ now()->format('d/m/Y H:i') }}
    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Produto</th>
                <th>Custo</th>
                <th>Preço</th>
                <th class="text-center">Estoque</th>
            </tr>
        </thead>
        <tbody>
            @forelse($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->cost_price ?? '-' }}</td>
                    <td>
                        R$ {{ number_format($product->sale_price, 2, ',', '.') }}
                    </td>
                    <td class="text-center">
                        {{ $product->quantity ?? 0 }}
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">
                        Nenhum produto sem estoque encontrado.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="footer">
        Total de produtos: {{ $products->count() }}
    </div>

</body>
</html>
