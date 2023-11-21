<?php
//
//  hotrecharge
//  PinlessRecharge.php
//
//  Created by Ngonidzashe Mangudya on 21/11/2023.
//  Copyright (c) 2023 ModestNerds, Co
//
namespace interfaces;

class PinlessRecharge
{
    /**
     * Amount to recharge
     */
    public float $amount;

    /**
     * Mobile number of recipient
     */
    public string $targetMobile;

    /**
     * Brand ID
     */
    public ?string $brandId;

    /**
     * Custom sms to send to recipient
     */
    public ?string $customerSms;

    public function __construct(float $amount, string $targetMobile, $brandId, $customerSms)
    {
        $this->amount = $amount;
        $this->targetMobile = $targetMobile;
        $this->brandId = $brandId;
        $this->customerSms = $customerSms;
    }
}