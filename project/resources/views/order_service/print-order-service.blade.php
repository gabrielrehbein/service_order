<h1>Ordem de Serviço #{{ $orderService->id }}</h1>

<p>
    <strong>Cliente:</strong>
    {{ $orderService->vehicle->customer->name }}
</p>

<p>
    <strong>Veículo:</strong>
    {{ $orderService->vehicle->plate }}
    - {{ $orderService->vehicle->model }}
</p>

<p>
    <strong>Problema:</strong>
    {{ $orderService->problem_description }}
</p>

<p>
    <strong>Resultado:</strong>
    {{ $orderService->result_description }}
</p>

<table width="100%" border="1" cellspacing="0" cellpadding="5">
    <thead>
        <tr>
            <th>Produto</th>
            <th>Qtd.</th>
            <th>Valor Unitário</th>
        </tr>
    </thead>
    <tbody>
        @foreach($orderService->products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->pivot->quantity }}</td>
                <td>
                    R$ {{ number_format($product->pivot->unit_price, 2, ',', '.') }}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<p>
    <strong>Valor Serviço:</strong>
    R$ {{ number_format($orderService->service_value, 2, ',', '.') }}
</p>

<p>
    <strong>Desconto:</strong>
    R$ {{ number_format($orderService->discount, 2, ',', '.') }}
</p>

<p>
    <strong>Total:</strong>
    R$ {{ number_format($orderService->total_value, 2, ',', '.') }}
</p>
