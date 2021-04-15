<?php
   
namespace App\Http\Controllers\API;
   
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Purchase;
use App\Models\Transaction;
use Validator;
use App\Http\Resources\PurchaseResource;
   
class PurchaseAPIController extends BaseController
{

    public function store(Request $request)
    {
        /*$request->validate([
            'name' => 'required',
            'price' => 'required'
        ]);*/

        $transaction['amount'] = $request->get('price') - ($request->get('price') * $request->get('discount'));
        $transaction['user_id'] = $request->get('user_id');
        $transaction['product_id'] = $request->get('id');
        $transaction['type'] = 'purchase';

        $purchase['user_id'] = $request->get('user_id');
        $purchase['product_id'] = $request->get('id');

        Purchase::create($purchase);
        
        Transaction::create($transaction);

        $success['error'] = false;
        return $this->sendResponse($success, 'User login successfully.');
    }
}