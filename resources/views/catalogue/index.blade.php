@extends('layout')
@section('title', 'Catalogue')
@section('content')
<div class="row">
	<div class="col-lg-8 col-sm-8 col-8">
		<h2>Catalogue</h2>
		<div class="row">
			@foreach($products as $product)
			<div class="col-lg-3 col-sm-3 col-3 product-container">
				<h4>{{$product->sku}}</h4>
				<p>{{$product->description}}</p>
				<p><strong>Price: </strong>£{{$product->price}}</p>
				<p class="btn-holder"><a href="{{ route('add.to.cart', $product->id) }}" class="btn btn-warning btn-block text-center" role="button">Add to basket</a> </p>
			</div>
			@endforeach
		</div>
	</div>
	<div class="col-lg-3 col-sm-3 col-3 basket-container">
		<h2>Basket</h2>
		<table id="cart" class="table table-hover table-condensed">
			<thead>
				<tr>
					<th style="width:50%">Product</th>
					<th style="width:40%">Description</th>
					<th style="width:5%">Price</th>
					<th style="width:5%"></th>
				</tr>
			</thead>
			<tbody>
				@php $total = 0 @endphp
				@if(session('cart'))
				@foreach(session('cart') as $id => $details)
				@php $total += $details['price'] @endphp
				<tr data-id = "{{ $id }}">
					<td data-th="Product">
						<div class="row">
							
							<div class="col-sm-9">
								<h4 class="nomargin">{{ $details['name'] }}</h4>
							</div>
						</div>
					</td>
					<td data-th="Description">{{ $details['description'] }}</td>
					<td data-th="Price">£{{ $details['price'] }}</td>
				</tr>
				@endforeach
				@endif
			</tbody>
			<tfoot>
				<tr>
					<td colspan="5" class="text-right"><h3><strong>Total £{{ $total }}</strong></h3></td>
				</tr>
				<tr>
					<td colspan="5" class="text-right">
						<a href="{{ route('clear.cart') }}" class="btn btn-danger"> Clear basket</a>
						<a href="{{ route('order.index') }}" class="btn btn-success"> Order </a>
					</td>
				</tr>
			</tfoot>
		</table>
	</div>
</div>
@endsection
