<?php

namespace Burakaktna\LaravelVatanSMS\Facades;

use Burakaktna\LaravelVatanSMS\VatanSMSAPI;
use Illuminate\Support\Facades\Facade;

/**
 * Class VatanSMSAPI
 * @package App\Facades
 * @method static VatanSMSAPI setCustomerNo(string $customerNo)
 * @method static VatanSMSAPI setUsername(string $username)
 * @method static VatanSMSAPI setPassword(string $password)
 * @method static VatanSMSAPI setOriginator(string $originator)
 * @method static VatanSMSAPI setBaseUrl(string $baseUrl)
 * @method static VatanSMSAPI setUrl(string $url)
 * @method static VatanSMSAPI setXml(string $xml)
 * @method static VatanSMSAPI sendSms(string $message, array $numbers)
 * @method static void submit()
 */
class VatanSMS extends Facade
{
    protected static function getFacadeAccessor()
    {
        return VatanSMSAPI::class;
    }
}
