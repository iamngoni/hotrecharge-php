<?php

declare(strict_types=1);

//
//  hotrecharge
//  HotRecharge.php
//
//  Created by Ngonidzashe Mangudya on 21/11/2023.
//  Copyright (c) 2023 ModestNerds, Co
//

use interfaces\Credential;

class HotRecharge {
    private string $rootEndpoint = 'https://ssl.hot.co.zw';
    private string $apiVersion = '/api/v1/';
    private array $headers = [
        'x-access-code' => '',
        'x-access-password' => '',
        'x-agent-reference' => '',
        'content-type' => 'application/json',
        'cache-control' => 'no-cache',
    ];
    private string $url = '';

    public function __construct(Credential $config) {
        $this->headers['x-access-code'] = $config->email;
        $this->headers['x-access-password'] = $config->password;
        $this->headers['x-agent-reference'] = $this->generateReference();
    }

    public function walletBalance() {
        $this->url = $this->rootEndpoint . $this->apiVersion . Constants::WALLET_BALANCE;
        return $this->get();
    }

    // ... Other methods ...

    private function get() {
        $this->updateRequestReference();
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $this->formatHeaders());
        $response = curl_exec($ch);
        curl_close($ch);

        return json_decode($response, true);
    }

    private function post($data) {
        $this->updateRequestReference();
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $this->formatHeaders());
        $response = curl_exec($ch);
        curl_close($ch);

        // Error handling here

        return json_decode($response, true);
    }

    private function gen_uuid(): string
    {
        return sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
            mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),
            mt_rand( 0, 0xffff ),
            mt_rand( 0, 0x0fff ) | 0x4000,
            mt_rand( 0, 0x3fff ) | 0x8000,
            mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff )
        );
    }

    private function generateReference() {
        return str_replace('-', '', self::gen_uuid());
    }

    private function updateRequestReference() {
        $reference = $this->generateReference();
        $this->headers['x-agent-reference'] = $reference;
    }

    private function formatHeaders(): array
    {
        $formattedHeaders = [];
        foreach ($this->headers as $key => $value) {
            $formattedHeaders[] = "$key: $value";
        }
        return $formattedHeaders;
    }
}
