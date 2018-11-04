<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Support\Facades\Response;

class ItemController extends Controller
{

    /**
     * @return mixed
     */
    public function index()
    {
        try{

            $items = Item::all();

        }catch(\Exception $exception){

            return $this->respondWithError('Failed when retrieving records from storage');

        }

        return Response::json($items->toArray(), 200);

    }

    /**
     * @param $message
     * @param int $statusCode
     * @return mixed
     */
    private function respondWithError($message, $statusCode = 500)
    {
        //there was an error
        return Response::json([
            'id'        => $statusCode,
            'message'   => $message
        ], $statusCode);
    }
}
