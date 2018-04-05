<?php

namespace LZaplata\Comgate;


use Nette\Object;

class Service extends Object
{
    /** @var int */
    public $merchant;

    /** @var string */
    public $secret;

    /** @var bool */
    public $sandbox;

    /** @var string */
    public $url;

    /** @var string */
    public $currency;

    /**
     * Service constructor.
     * @param int $merchant
     * @param string $secret
     * @param bool $sandbox
     * @param string $currency
     */
    public function __construct($merchant, $secret, $sandbox, $currency)
    {
        $this->setMerchant($merchant);
        $this->setSecret($secret);
        $this->setSandbox($sandbox);
        $this->setCurrency($currency);
    }

    /**
     * @param int $merchant
     * @return self
     */
    public function setMerchant($merchant)
    {
        $this->merchant = $merchant;

        return $this;
    }

    /**
     * @return int
     */
    public function getMerchant()
    {
        return $this->merchant;
    }

    /**
     * @param string $secret
     * @return self
     */
    public function setSecret($secret)
    {
        $this->secret = $secret;

        return $this;
    }

    /**
     * @return string
     */
    public function getSecret()
    {
        return $this->secret;
    }

    /**
     * @param int $sandbox
     * @return self
     */
    public function setSandbox($sandbox)
    {
        $this->sandbox = $sandbox;

        if ($sandbox) {
            $this->url = "https://payments.comgate.cz/v1.0";
        } else {
            $this->url = "https://payments.comgate.cz/v1.0";
        }

        return $this;
    }

    /**
     * @return bool
     */
    public function getSandbox()
    {
        return $this->sandbox;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param string $currency
     * @return self
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @param float $price
     * @return Payment
     * @throws \Exception
     */
    public function createPayment($price)
    {
        $payment = new Payment($this);
        $payment->createPayment($price);

        return $payment;
    }

    /**
     * @return Response
     */
    public function getReturnResponse()
    {
        return new Response(null);
    }
}