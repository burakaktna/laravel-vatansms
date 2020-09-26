<?php


namespace Burakaktna\LaravelVatanSMS;

class VatanSMSConfig
{
    private array $config;

    public function __construct(array $config)
    {
        $this->config = $config;
    }

    public function getCustomerNo(): string
    {
        return $this->config['customer_no'];
    }

    public function getUsername(): string
    {
        return $this->config['username'];
    }

    public function getPassword(): string
    {
        return $this->config['password'];
    }

    public function getOriginator(): string
    {
        return $this->config['originator'];
    }

}