<?php
	
	namespace App\Http\Controllers\Sales;
	
	use App\Http\Controllers\Controller;
	use Illuminate\Http\Request;
	use Illuminate\Support\Facades\DB;
	
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
			$order = new \App\Models\Order();
			return view('order.thanks')
            ->with('order', $order);
		}
	}
	
	
	

	
		order_products
		'order_id'      =>  lastinsertid,
		'product_id'	=>	
		
		
		order 
		'customer_id'	=> uniqid(),
		'price'	=> 
		'delivery_address'
		
		DB::insert('insert into order (customer_id, price, delivery_address) values (?, ?, ?, ?)', ['$customer_id', '$price', '$delivery_address']);

		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		 if ($request->company_or_person == 'company') {
            $company_or_person = 'required|string|min:6|max:7';
            $company_name = 'required|min:3';
            $address = '';
            $last_name = '';
			
			
		
		$request->validate([
            'company_or_person' => $company_or_person,
            'company_name' => $company_name,
            'first_name' => $first_name,
            'last_name' => $last_name,
            'street_name' => 'required|min:3',
            'street_number' => 'required|numeric',
            'city' => 'required|min:3',
            'zip_code' => 'required|max:10|string',
		
		
		public function storeOrderDetails($params)
		{
			$order = Order::create([
			'order_number'      =>  'ORD-'.strtoupper(uniqid()),
			'user_id'           =>  auth()->user()->id,
			'grand_total'       =>  Cart::getSubTotal(),
			'item_count'        =>  Cart::getTotalQuantity(),
			'payment_status'    =>  0,
			'payment_method'    =>  null,
			'address'           =>  $params['address']
			]);
			
			if ($order) {
				
				$items = Cart::getContent();
				
				foreach ($items as $item)
				{
					// A better way will be to bring the product id with the cart items
					// you can explore the package documentation to send product id with the cart
					$product = Product::where('name', $item->name)->first();
					
					$orderItem = new OrderItem([
					'product_id'    =>  $product->id,
					'price'         =>  $item->getPriceSum()
					]);
					
					$order->items()->save($orderItem);
				}
			}
			
			return $order;
		}
		
	}

	
		