<?php

namespace Yadahan\GreenInvoice\Documents;

class Payment
{
    /**
     * Payment date in the format YYYY-MM-DD.
     *
     * @var string
     */
    protected $date;

    /**
     * Payment method.
     *
     * @var int
     */
    protected $type;

    /**
     * Item price.
     *
     * @var float
     */
    protected $price;

    /**
     * 3-letter ISO item currency code.
     *
     * @var string
     */
    protected $currency;

    /**
     * Currency rate relative to ILS, If not set - decided by the rates of requested payment date.
     *
     * @var float
     */
    protected $currencyRate;

    /**
     * Bank name (required when using Cheques).
     *
     * @var string
     */
    protected $bankName;

    /**
     * Bank branch (required when using Cheques).
     *
     * @var string
     */
    protected $bankBranch;

    /**
     * Bank account (required when using Cheques).
     *
     * @var string
     */
    protected $bankAccount;

    /**
     * Cheque number (required when using Cheques).
     *
     * @var string
     */
    protected $chequeNum;

    /**
     * PayPal account ID.
     *
     * @var string
     */
    protected $accountId;

    /**
     * PayPal transaction ID.
     *
     * @var string
     */
    protected $transactionId;

    /**
     * Credit card type.
     *
     * @var int
     */
    protected $cardType;

    /**
     * Credit card's last 4 digits.
     *
     * @var string
     */
    protected $cardNum;

    /**
     * Credit card deal type.
     *
     * @var int
     */
    protected $dealType;

    /**
     * Credit card's payments count (1-36).
     *
     * @var int
     */
    protected $numPayments;

    /**
     * Credit card's first payment.
     *
     * @var float
     */
    protected $firstPayment;

    public function __construct(Int $type, Float $price, String $currency = 'ILS', String $date = null)
    {
        $this->date = $date ?: date('Y-m-d');
        $this->type = $type;
        $this->price = $price;
        $this->currency = $currency;
    }

    /**
     * Sets the credit card type.
     *
     * @param string $cardType
     */
    public function setCardType(String $cardType)
    {
        $this->cardType = $cardType;
    }

    /**
     * Sets the credit card's last 4 digits.
     *
     * @param string $cardNum
     */
    public function setCardNum(String $cardNum)
    {
        $this->cardNum = $cardNum;
    }

    /**
     * Sets the credit card deal type.
     *
     * @param int $dealType
     */
    public function setDealType(Int $dealType)
    {
        $this->dealType = $dealType;
    }

    /**
     * Sets the credit card's payments count (1-36).
     *
     * @param int $numPayments
     */
    public function setNumPayments(Int $numPayments)
    {
        $this->numPayments = $numPayments;
    }

    /**
     * Sets the credit card's first payment.
     *
     * @param float $firstPayment
     */
    public function setFirstPayment(Float $firstPayment)
    {
        $this->firstPayment = $firstPayment;
    }

    /**
     * Convert the class to an array.
     *
     * @return array
     */
    public function toArray()
    {
        return array_filter([
            'date' => $this->date,
            'type' => $this->type,
            'price' => $this->price,
            'currency' => $this->currency,
            'currencyRate' => $this->currencyRate,
            'bankName' => $this->bankName,
            'bankBranch' => $this->bankBranch,
            'bankAccount' => $this->bankAccount,
            'chequeNum' => $this->chequeNum,
            'accountId' => $this->accountId,
            'transactionId' => $this->transactionId,
            'cardType' => $this->cardType,
            'cardNum' => $this->cardNum,
            'dealType' => $this->dealType,
            'numPayments' => $this->numPayments,
            'firstPayment' => $this->firstPayment,
        ], function($value) {
            return !is_null($value);
        });
    }
}