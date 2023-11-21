<?php

declare(strict_types=1);

//
//  hotrecharge
//  ZesaRecharge.php
//
//  Created by Ngonidzashe Mangudya on 21/11/2023.
//  Copyright (c) 2023 ModestNerds, Co
//

namespace interfaces;

class ZesaRecharge
{
    /**
     * Amount to pay for recharging
     */
    public float $amount;

    /**
     * Mobile number to send ZESA token to
     */
    public string $targetNumber;

    /**
     * Meter number to be recharged
     */
    public string $meterNumber;

    /**
     * Custom sms to send to recipient
     */
    public ?string $customerSms;

    public function __construct(float $amount, string $targetNumber, string $meterNumber, ?string $customerSms)
    {
        $this->amount = $amount;
        $this->targetNumber = $targetNumber;
        $this->meterNumber = $meterNumber;
        $this->customerSms = $customerSms;
    }
}