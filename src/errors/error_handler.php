<?php

declare(strict_types=1);

//
//  hotrecharge
//  error_handler.php
//
//  Created by Ngonidzashe Mangudya on 21/11/2023.
//  Copyright (c) 2023 ModestNerds, Co
//

/**
 * HotRecharge error handler
 *
 * @param array|null $response
 * @param int|null $statusCode
 * @return HotRechargeError
 */
function hotRechargeErrorHandler(?array $response, int $statusCode = null): HotRechargeError
{
    return processResponse($response, $statusCode);
}

/**
 * Process API response for errors
 *
 * @param array|null $response
 * @param int $statusCode
 * @return HotRechargeError
 */
function processResponse(array $response, int $statusCode): HotRechargeError
{
    $message = messageRetriever($response);

    if (isset($response['data']['ReplyCode']) && $response['data']['ReplyCode'] != 2) {
        return switcher($message, $response)[$response['data']['ReplyCode']] ?? new HotRechargeError($message, $response);
    }

    if ($statusCode) {
        return switcher($message, $response)[$statusCode] ?? new HotRechargeError($message, $response);
    }

    return new HotRechargeError($message, $response);
}

/**
 * Switcher for mapping API error codes to exceptions
 *
 * @param string $message
 * @param array|null $response
 * @return array
 */
function switcher(string $message, ?array $response): array
{
    return [
        4 => new PendingZesaTransactionError($message, $response),
        206 => new PrepaidPlatformFailError($message, $response),
        208 => new InsufficientBalanceError($message, $response),
        209 => new OutOfPinStockError($message, $response),
        210 => new PrepaidPlatformFailError($message, $response),
        216 => new DuplicateRequestError($message, $response),
        217 => new InvalidContactError($message, $response),
        218 => new AuthorizationError($message, $response),
        219 => new WebServiceError($message, $response),
        220 => new AuthorizationError($message, $response),
        221 => new BalanceRequestError($message, $response),
        222 => new RechargeAmountLimitError($message, $response),
        // -------- http status code -----------
        401 => new AuthorizationError($message, $response),
        429 => new DuplicateReferenceError($message, $response),
        800 => new TransactionNotFoundError($message, $response),
    ];
}

/**
 * Retrieve message from response
 *
 * @param array|null $response
 * @return string
 */
function messageRetriever(?array $response): string
{
    if (isset($response['data']['Message'])) {
        return $response['data']['Message'];
    }

    if (isset($response['data']['ReplyMessage'])) {
        return $response['data']['ReplyMessage'];
    }

    if (isset($response['data']['ReplyMsg'])) {
        return $response['data']['ReplyMsg'];
    }

    return 'Unknown error occurred. Probably network related, please check your internet connection!';
}
