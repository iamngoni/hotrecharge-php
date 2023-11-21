<?php

declare(strict_types=1);

//
//  hotrecharge
//  DataBundle.php
//
//  Created by Ngonidzashe Mangudya on 21/11/2023.
//  Copyright (c) 2023 ModestNerds, Co
//

namespace interfaces;

class DataBundle
{

    /**
     * productCode as defined by HotRecharge
     * Can be used to identify provider
     */
    public string $productCode;

    /**
     * Mobile number of recipient
     */
    public string $targetMobile;

    /**
     * Custom sms to send to the recipient
     */
    public ?string $customerSms;

    public function __construct(string $productCode, string $targetMobile, ?string $customerSms)
    {
        $this->productCode = $productCode;
        $this->targetMobile = $targetMobile;
        $this->customerSms = $customerSms;
    }
}