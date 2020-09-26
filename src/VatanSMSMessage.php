<?php


namespace Burakaktna\LaravelVatanSMS;

/**
 * Class VatanSMSMessage
 * @package App\Channels\Messages
 */
class VatanSMSMessage
{
    /**
     * @var array
     */
    private array $recipients;

    /**
     * @var string
     */
    private string $content;

    /**
     * @return array
     */
    public function getRecipients(): array
    {
        return $this->recipients;
    }

    /**
     * @param  array  $recipients
     * @return $this
     */
    public function setRecipients(array $recipients): VatanSMSMessage
    {
        $this->recipients = $recipients;
        return $this;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @param  string  $content
     * @return $this
     */
    public function setContent(string $content): VatanSMSMessage
    {
        $this->content = $content;
        return $this;
    }
}
