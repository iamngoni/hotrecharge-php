<?php

declare(strict_types=1);

//
//  hotrecharge
//  errors.php
//
//  Created by Ngonidzashe Mangudya on 21/11/2023.
//  Copyright (c) 2023 ModestNerds, Co
//


/**
 * HotRechargeError: base exception for api exceptions
 */
class HotRechargeError extends Exception {
    private $response;

    public function __construct($message, $response = null) {
        parent::__construct($message);
        $this->response = $response;
    }

    public function getResponse() {
        return $this->response;
    }
}

/**
 * DuplicateReference Error: unique reference should be provided per each request
 */
class DuplicateReferenceError extends HotRechargeError {}

/**
 * AuthorizationError: password or access-code is wrong or failed to log in
 */
class AuthorizationError extends HotRechargeError {}

/**
 * InvalidContactError: wrong number to recharge or invalid network
 */
class InvalidContactError extends HotRechargeError {}

/**
 * PendingZesaTransactionError: indicates Pending Zesa Verification
 * Transactions in this state can result in successful transactions after a period of time once Zesa completes
 * transaction / verification.
 * If it happens, you can call the below method periodically to poll transaction status
 * Request should not exceed more than 4 requests / minute
 */
class PendingZesaTransactionError extends HotRechargeError {}

/**
 * PrepaidPlatformFailError: Failed Recharge Network Prepaid Platform
 */
class PrepaidPlatformFailError extends HotRechargeError {}

/**
 * RechargeAmountLimitError: Failed recharge amount limit, too little / too much
 */
class RechargeAmountLimitError extends HotRechargeError {}

/**
 * ReferenceExceedLimitError: passed reference exceeds required limit
 */
class ReferenceExceedLimitError extends HotRechargeError {}

/**
 * InsufficientBalanceError: not enough wallet balance
 */
class InsufficientBalanceError extends HotRechargeError {}

/**
 * ServiceError: recharge platform is down
 */
class ServiceError extends HotRechargeError {}

/**
 * OutOfPinStockError: request received but provider does not have correct stock to process
 */
class OutOfPinStockError extends HotRechargeError {}

/**
 * WebServiceError: generic error for web service issues
 */
class WebServiceError extends HotRechargeError {}

/**
 * BalanceRequestError: possible cause: contract line or invalid number or invalid format
 */
class BalanceRequestError extends HotRechargeError {}

/**
 * DuplicateRequestError: api already received the request and is being processed
 */
class DuplicateRequestError extends HotRechargeError {}

/**
 * TransactionNotFoundError: the transaction could not be found, possibly failed to locate original transaction data
 * or query request performed way after threshold days (30 days)
 */
class TransactionNotFoundError extends HotRechargeError {}
