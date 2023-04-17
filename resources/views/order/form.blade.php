@extends('layout')
@section('title', 'Order form')
@section('content')
<div class="marginTop">
	<form action="{{ route('save.order') }}" method="POST" role="form">
	{{ csrf_field() }}
		<div class="row">
			<div class="col-lg-9 col-sm-9 col-9">
				<div class="card">
					<header class="card-header">
						<h4 class="card-title mt-2">Order details</h4>
					</header>
					<article class="card-body">
						<div class="form-group">
							<label>Address</label>
							<input type="text" class="form-control" name="delivery_address" required>
						</div>
					</article>
				</div>
			</div>
			<div class="col-lg-3 col-sm-3 col-3">
				<div class="row">
					<div class="col-md-12">
						<div class="card">
							<header class="card-header">
								<h4 class="card-title mt-2">Your Order</h4>
							</header>
							<article class="card-body">
								@php $total = 0 @endphp
								@if(session('cart'))
								@foreach(session('cart') as $id => $details)
								@php $total += $details['price'] @endphp
								<div class="form-group">
									<p>1x - {{ $details['name']}} - £{{ $details['price'] }}</p>
									<input type="hidden" class="form-control" name="product" value="{{ $details['name'] }}">
									<input type="hidden" class="form-control" name="price" value="{{ $details['price'] }}">
								</div>
								<hr>
								@endforeach
							</article>
							<footer class="card-footer">
								<div class="form-group">
									<dl class="dlist-align">
										<dt>Total cost: </dt>
										<dd class="text-right h5 b"> £{{ $total }} </dd>
										<input type="hidden" class="form-control" name="total" value="{{ $total }}">
									</dl>
								</footer>
								@endif
							</div>
						</div>
						<div class="col-md-12 marginTop">
							<button type="submit" class="btn btn-success">Place Order</button>
							<a href="{{ url('/') }}" class="btn btn-info"> Go Back </a>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
@endsection