<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\OrderRequest;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Response;

class OrderController extends Controller
{

    public function store(OrderRequest $request, User $user){
        $data = $request->validated();
        $data['user_id'] = $user->id;
        $data['address'] = json_encode($data['address']);

        $products = $data['products']; unset($data['products']);

        $order = Order::create($data);
        foreach($products as $product){
            unset($product['product_info']);
            $product['order_id'] = $order->id;
            OrderProduct::create($product);
        }
        return response()->json(['message'=>'Order successfully completed. In the near future the manager will contact you to clarify the order']);
    }

    public function delete(Order $order){
        $order->delete();
        return response()->json(['message'=>'Order canseled.']);
    }

}
