<?php
   
namespace App\Http\Controllers\API;
   
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\User;
use Validator;
use App\Http\Resources\TopupResource;
   
class ProductController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
    
        return $this->sendResponse(ProductResource::collection($products), 'Products retrieved successfully.');
    }


    public function store(Request $request)
    {

        $data = $request->all();

        $validator = Validator::make($data,[
            'amount' => 'required'
        ]);

        if ($validator->fails()) {
            return response(['error' => $validator->errors(), 'Validation Error']);
        }

        $user = User::find($request->get('user_id'));
        $user->topped = $user->topped + $request->get('amount');
        $user->save();

        $transaction['amount'] = $request->get('price') - ($request->get('price') * $request->get('discount'));
        $transaction['user_id'] = $user_id;
        $transaction['product_id'] = $product_id;
        $transaction['type'] = 'topup';

        Transaction::create($transaction);

        return response(['project' => new ProjectResource($project), 'message' => 'Created successfully'], 201);
    }

    public function store(Request $request, $user_id, $product_id)
    {
        /*$request->validate([
            'name' => 'required',
            'price' => 'required'
        ]);*/

        $transaction['amount'] = $request->get('price') - ($request->get('price') * $request->get('discount'));
        $transaction['user_id'] = $user_id;
        $transaction['product_id'] = $product_id;
        $transaction['type'] = 'purchase';

        $purchase['user_id'] = $user_id;
        $purchase['product_id'] = $product_id;

        Purchase::create($purchase);
        
        Transaction::create($transaction);

        $success['error'] = false;
        return $this->sendResponse($success, 'User login successfully.');
    }
}