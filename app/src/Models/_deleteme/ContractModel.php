<?php

namespace App\Models\_deleteme;

use App\Framework\Model;

class ContractModel extends Model
{

    private $id;

    public function getCustomerLastName(): string
    {
        return $this->customerLastName;
    }

    public function setCustomerLastName(string $customerLastName): void
    {
        $this->customerLastName = $customerLastName;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): void
    {
        $this->type = $type;
    }

    public function getContractID(): string
    {
        return $this->ContractID;
    }

    public function setContractID(string $ContractID): void
    {
        $this->ContractID = $ContractID;
    }

    public function getValidFrom(): string
    {
        return $this->validFrom;
    }

    public function setValidFrom(string $validFrom): void
    {
        $this->validFrom = $validFrom;
    }

    public function getValidTo(): string
    {
        return $this->ValidTo;
    }

    public function setValidTo(string $ValidTo): void
    {
        $this->ValidTo = $ValidTo;
    }

    public function getAmount(): float
    {
        return $this->amount;
    }

    public function setAmount(float $amount): void
    {
        $this->amount = $amount;
    }

    public function getCustomerId(): string
    {
        return $this->customerId;
    }

    public function setCustomerId(string $customerId): void
    {
        $this->customerId = $customerId;
    }

    public function getSignDate(): string
    {
        return $this->signDate;
    }

    public function setSignDate(string $signDate): void
    {
        $this->signDate = $signDate;
    }

    public function getCustomerFirstName(): string
    {
        return $this->customerFirstName;
    }

    public function setCustomerFirstName(string $customerFirstName): void
    {
        $this->customerFirstName = $customerFirstName;
    }

    public function getCustomerEmail(): string
    {
        return $this->customerEmail;
    }

    public function setCustomerEmail(string $customerEmail): void
    {
        $this->customerEmail = $customerEmail;
    }

    public function getCustomerPhone(): string
    {
        return $this->customerPhone;
    }

    public function setCustomerPhone(string $customerPhone): void
    {
        $this->customerPhone = $customerPhone;
    }

    public function getCustomerAddress(): string
    {
        return $this->customerAddress;
    }

    public function setCustomerAddress(string $customerAddress): void
    {
        $this->customerAddress = $customerAddress;
    }

    public function getCustomerZipcode(): string
    {
        return $this->customerZipcode;
    }

    public function setCustomerZipcode(string $customerZipcode): void
    {
        $this->customerZipcode = $customerZipcode;
    }

    public function getCustomerCity(): string
    {
        return $this->customerCity;
    }

    public function setCustomerCity(string $customerCity): void
    {
        $this->customerCity = $customerCity;
    }

    public function getCustomerCountry(): string
    {
        return $this->customerCountry;
    }

    public function setCustomerCountry(string $customerCountry): void
    {
        $this->customerCountry = $customerCountry;
    }
    private string $type;
    private string $ContractID;
    private string $validFrom;
    private string $ValidTo;
    private float $amount;
    private string $customerId;
    private string $signDate;

    private string $customerFirstName;
    private string $customerLastName;
    private string $customerEmail;
    private string $customerPhone;
    private string $customerAddress;
    private string $customerZipcode;
    private string $customerCity;
    private string $customerCountry;


    public function __construct()
    { parent::__construct();
    }
}