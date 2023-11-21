<?php
//
//  hotrecharge
//  Constants.php
//
//  Created by Ngonidzashe Mangudya on 21/11/2023.
//  Copyright (c) 2023 ModestNerds, Co
//


class Constants
{
    /**
     * Endpoint for pinless recharge services
     */
    const RECHARGE_PINLESS = 'agents/recharge-pinless';

    /**
     * Endpoint for pinless recharge in USD
     */
    const RECHARGE_PINLESS_USD = 'agents/recharge-pinless-usd';

    /**
     * Endpoint for recharging data plans or services
     */
    const RECHARGE_DATA = 'agents/recharge-data';

    /**
     * Endpoint to check the balance of a digital wallet
     */
    const WALLET_BALANCE = 'agents/wallet-balance';

    /**
     * Endpoint to retrieve available data bundles or plans
     */
    const DATA_BUNDLES = 'agents/get-data-bundles';

    /**
     * Endpoint to check an end-user's balance, requires a mobile number
     */
    const USER_BALANCE = 'agents/enduser-balance?targetmobile=';

    /**
     * Endpoint for querying details of a transaction, requires an agent reference
     */
    const TRANSACTION_QUERY = 'agents/query-transaction?agentReference=';

    /**
     * Endpoint for recharging ZESA services (possibly electricity or utilities)
     */
    const RECHARGE_ZESA = 'agents/recharge-zesa';

    /**
     * Endpoint to query ZESA service transactions
     */
    const QUERY_ZESA = 'agents/query-zesa-transaction';

    /**
     * Endpoint to check details of a ZESA customer
     */
    const ZESA_CUSTOMER = 'agents/check-customer-zesa';

    /**
     * Endpoint to check the balance related to ZESA services
     */
    const ZESA_BALANCE = 'agents/wallet-balance-zesa';
}