<?php

namespace App\Http\Controllers;

use Predis\Client;
use App\RabbitMQService;
use App\Events\OrderCreated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class FJBController extends Controller
{
    public function index(){
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . request()->cookie('jwt_token'),
        ])->get('http://127.0.0.1:8080/api/product');
        $resProduct = $response->json();
        $products = [];

        if($resProduct){
            $products = $resProduct['data'];
        }
        
        return view('dashboard', compact('products'));
    }
    
    public function buy(Request $request){
        $request->validate([
            'product_id', $request->product_id
        ]);
        
        $body = [
            "user_id" => auth()->user()->id,
            "product_id" => $request->product_id
        ];

        $message = json_encode($body);

        $mqService = new RabbitMQService();
        $mqService->buyPublish($message);
    
        return redirect()->back()->with('message', 'Berhasil membeli produk');
    }

    public function cancelOrder(string $id){
        $body = [
            "id" => $id,
        ];

        $message = json_encode($body);

        $mqService = new RabbitMQService();
        $mqService->orderPublish($message);

        return redirect()->back()->with('message', 'Berhasil membatalkan pesanan');
    }
}
