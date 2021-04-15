<?php
   
namespace App\Http\Controllers\API;
   
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Transaction;
use Validator;
use App\Http\Resources\TransactionResource;
   
class TransactionController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function get(Request $request)
    {
        $transactions = Transaction::where('user_id', $request->get('user_id'))->get();
    
        return $this->sendResponse(TransactionResource::collection($transactions), 'Transactions retrieved successfully.');
    }
}