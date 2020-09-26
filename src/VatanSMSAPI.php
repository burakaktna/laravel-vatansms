<?php

namespace Burakaktna\LaravelVatanSMS;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Throwable;

class VatanSMSAPI
{
    private string $customerNo;
    private string $username;
    private string $password;
    private string $originator;
    private string $baseUrl;
    private string $url;
    private string $xml;
    private VatanSMSConfig $config;

    /**
     * self constructor.
     * @param  VatanSMSConfig  $config
     */
    public function __construct(VatanSMSConfig $config)
    {
        $this->config = $config;
        $this->setCustomerNo($this->config->getCustomerNo());
        $this->setUsername($this->config->getUsername());
        $this->setPassword($this->config->getPassword());
        $this->setOriginator($this->config->getOriginator());
        $this->setBaseUrl('https://www.oztekbayi.com/panel/');
    }

    /**
     * @param  string  $customerNo
     * @return $this
     */
    public function setCustomerNo(string $customerNo): self
    {
        $this->customerNo = $customerNo;
        return $this;
    }

    /**
     * @param  string  $username
     * @return $this
     */
    public function setUsername(string $username): self
    {
        $this->username = $username;
        return $this;
    }

    /**
     * @param  string  $password
     * @return $this
     */
    public function setPassword(string $password): self
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @param  string  $originator
     * @return $this
     */
    public function setOriginator(string $originator): self
    {
        $this->originator = $originator;
        return $this;
    }

    /**
     * @param  string  $baseUrl
     * @return $this
     */
    public function setBaseUrl(string $baseUrl): self
    {
        $this->baseUrl = $baseUrl;
        return $this;
    }

    /**
     * @param  string  $url
     * @return $this
     */
    public function setUrl(string $url): self
    {
        $this->url = $this->baseUrl.$url;
        return $this;
    }

    /**
     * @param  string  $xml
     * @return $this
     */
    public function setXml(string $xml): self
    {
        $this->xml = $xml;
        return $this;
    }

    /**
     * @param  string  $content
     * @param  array  $recipients
     * @return self
     * @throws Throwable
     */
    public function sendSms(string $content, array $recipients): self
    {
        $xmlRecipients = '';
        foreach ($recipients as $recipient) {
            $xmlRecipients .= $recipient.',';
        }
        $xmlRecipients = Str::replaceLast(',', '', $xmlRecipients);

        $this->setUrl('smsgonder1Npost.php');

        $this->setXml('data='.
            view('vatansms::xml.vatansms.sms', [
                'customerNo' => $this->customerNo,
                'username'   => $this->username,
                'password'   => $this->password,
                'originator' => $this->originator,
                'message'    => $content,
                'numbers'    => $xmlRecipients
            ])->render()
        );

        return $this;
    }

    /**
     * @return mixed
     */
    public function submit()
    {
        $response = Http::withBody($this->xml, 'application/xml')->post($this->url);

        abort_unless($response->successful(), 400);

        return $response;
    }
}
