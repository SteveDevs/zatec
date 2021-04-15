<?php
   
namespace App\Http\Controllers\API;
   
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Transaction;
use Validator;
use App\Http\Resources\TransactionResource;
   
class ProductController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $transactions = Transaction::where('user_id', $id)->get();
    
        return $this->sendResponse(TransactionResource::collection($transactions), 'Transactions retrieved successfully.');
    }
}