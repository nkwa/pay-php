<?php

/**
 * Code generated by Speakeasy (https://speakeasy.com). DO NOT EDIT.
 */

declare(strict_types=1);

namespace Pay;



/**
 * Pay - Nkwa Pay API: Use this API to integrate mobile money across your payment flows, create and manage payments, collections, and disbursements.
 *
 * Read the docs at https://docs.mynkwa.com/api-reference
 */
class Pay
{
    public const SERVERS = [
        /** Staging server */
        'https://api.pay.staging.mynkwa.com',
    ];

    public Payments $payments;

    public Operators $operators;

    /**
     * Returns a new instance of the SDK builder used to configure and create the SDK instance.
     *
     * @return PayBuilder
     */
    public static function builder(): PayBuilder
    {
        return new PayBuilder();
    }

    /**
     * @param  SDKConfiguration  $sdkConfiguration
     */
    public function __construct(
        public SDKConfiguration $sdkConfiguration,
    ) {
        $this->payments = new Payments($this->sdkConfiguration);
        $this->operators = new Operators($this->sdkConfiguration);
        $this->sdkConfiguration->client = $this->sdkConfiguration->initHooks($this->sdkConfiguration->client);

    }
}