<?php
   
namespace App\Http\Controllers\API;
   
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Purchase;
use App\Models\Transaction;
use App\Models\User;
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
        $user_id = $request->get('user_id');
        $transaction['amount'] = $request->get('product')['price'] - ($request->get('product')['price'] * $request->get('product')['discount']);
        $transaction['user_id'] = $user_id;
        $transaction['product_id'] = $request->get('product')['id'];
        $transaction['type'] = 'purchase';

        $purchase['user_id'] = $user_id;
        $purchase['product_id'] = $request->get('product')['id'];


        Purchase::create($purchase);
        
        Transaction::create($transaction);

        
        $user = User::find($user_id);
        $user->topped = $user->topped - $transaction['amount'];
        $user->save();

        $success['error'] = false;
        return $this->sendResponse($success, 'User login successfully.');
    }
}