<?php
	
	namespace App\Http\Controllers\Sales;
	
	use App\Http\Controllers\Controller;
	use Illuminate\Http\Request;
	
	class Order extends Controller
	{
		
		public function getCheckout()
		{
			return view('order.form');
		}
		
		public function placeOrder(Request $request)
		{
			$order = new \App\Models\Order();
			return view('order.form')
            ->with('order', $order);
			
		}
		
		public function saveOrder(Request $request)
		{
			$cart = session()->get('cart');
			
			$order = new \App\Models\Order();
			
			$randomNumber = random_int(1000, 9999);
			$order->customer_id = $randomNumber;
			$order->price = $request['price'];
			$order->delivery_address = $request['delivery_address'];
			$order->save();
			session()->forget('cart');
			
			#return response(['message'=>'successful']);
			#	return view('order.thanks');
				
				
			return view('order.thanks');
				
		}
	}

		