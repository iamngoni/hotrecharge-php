<?php

declare(strict_types=1);

//
//  hotrecharge
//  Credential.php
//
//  Created by Ngonidzashe Mangudya on 21/11/2023.
//  Copyright (c) 2023 ModestNerds, Co
//

namespace interfaces;

class Credential
{
    /**
     * Account email for authentication
     */
    public string $email;

    /**
     * Account password for authentication
     */
    public string $password;

    public function __construct(string $email, string $password)
    {
        $this->email = $email;
        $this->password = $password;
    }
}