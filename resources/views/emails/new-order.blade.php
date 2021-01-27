<!DOCTYPE html>
<html>
<head>
	<title>Nuevo pedido</title>
</head>
<body>
	<p>Se ha realizado nuevo pedido de nuestros mercados</p>
	<p>Estos son los datos del cliente que realizó el pedido:</p>
	<ul>
		<li>
			<strong>Nombre del cliente:</strong>
			{{ $user->name }}
		</li>
		<li>
			<strong>Correo electrónico:</strong>
			{{ $user->email }}
		</li>
		<li>
			<strong>Fecha del pedido:</strong>
			{{ $cart->order_date }}
		</li>
	</ul>
	<hr>
	<p>Y estos son los detalles del pedido:</p>
	<ul>
		@foreach ($cart->details as $detail)
		<li>
			{{ $detail->product->name }} por la cantidad {{ $detail->quantity }} ($ {{ $detail->quantity * $detail->product->price }})
		</li>
		@endforeach
	</ul>
	<p>
		<strong>Importe que el cliente debe pagar: </strong> {{ $cart->total }}
	</p>
	<p>
		<a href="{{ url('/admin/orders/'.$cart->id) }}">Haz click aquí</a>
		Para ver más información sobre el pedido
	</p>
</body>
</html>