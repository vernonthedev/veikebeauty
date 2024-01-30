<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Veike Beauty Invoice</title>
</head>
<body>
    <p>Customer Name: {{$order->name}}</p>
    <p>Customer Email: {{$order->email}}</p>
    <p>Customer Address: {{$order->address}}</p>
    <p>Customer Phone Number: {{$order->phone}}</p>

    <p>Product Title: {{$order->product_title}}</p>
    <img src="product/{{$order->image}}" width="100px;">
    <p>Product Price: {{$order->price}}</p>
    <p>Product Quantity: {{$order->quantity}}</p>
    <p>Payment Method: {{$order->payment_status}}</p>
</body>
</html>