<?php

namespace Modules\Transaction\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class TransactionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'amount' => $this->amount,
            'description' => $this->description,
            'destinationFirstname' => $this->destinationFirstname,
            'destinationLastname' => $this->destinationLastname,
            'destinationNumber' => $this->destinationNumber,
            'paymentNumber' => $this->paymentNumber,
            'reasonDescription' => $this->reasonDescription,
            'deposit' => $this->deposit,
            'sourceFirstName' => $this->sourceFirstName,
            'sourceLastName' => $this->sourceLastName,
            'secondPassword' => $this->secondPassword,
            'inquirySequence' => $this->inquirySequence,
            'inquiryTime' => $this->inquiryTime,
            'refCode' => $this->refCode,
            'sourceNumber' => $this->sourceNumber,
            'type' => $this->type,
            'message' => $this->message,
        ];
    }
}
