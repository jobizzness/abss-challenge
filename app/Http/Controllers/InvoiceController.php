<?php

namespace App\Http\Controllers;

use App\Console\Commands\InvoiceCalculation;
use App\Line;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class InvoiceController extends Controller
{
    protected $lines = [];

    /**
     * @param Request $request
     * @return mixed
     */
    public function make(Request $request)
    {

        try{
            $this->createLines([
                ['id'       => '90192182-2f83-40cb-b324-ce4a43dd0024',
                    'quantity'      => 1,
                    'discount'       =>  17],

                ['id'       => 'c2f5b5b6-d85d-41bb-9651-bea30cc880b0',
                    'quantity'      => 2,
                    'discount'       =>  5],
            ]);
        }catch (\Exception $exception){

            return $this->respondWithError('Failed while creating line items');
        }

        return $this->dispatchNow(new InvoiceCalculation($this->lines));


    }

    /**
     * @param array $lines
     */
    private function createLines($lines = [])
    {
        foreach ($lines as $lineItem){

            $Line = new Line($lineItem['id']);
            $Line->setQuantity($lineItem['quantity']);
            $Line->setDiscount($lineItem['discount']);

            array_push($this->lines, $Line);

        }
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
