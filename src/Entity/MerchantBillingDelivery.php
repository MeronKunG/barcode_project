<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MerchantBillingDelivery
 *
 * @ORM\Table(name="merchant_billing_delivery", indexes={@ORM\Index(name="payment_invoice_idx", columns={"payment_invoice"}), @ORM\Index(name="takeorderby", columns={"takeorderby"}), @ORM\Index(name="warehouse_id", columns={"warehouse_id"}), @ORM\Index(name="takeorderby_payment_invoice_idx", columns={"takeorderby", "payment_invoice"}), @ORM\Index(name="mailcode_idx", columns={"mailcode"}), @ORM\Index(name="sendmaildate_idx", columns={"sendmaildate"})})
 * @ORM\Entity
 */
class MerchantBillingDelivery
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var int|null
     *
     * @ORM\Column(name="takeorderby", type="integer", nullable=false)
     */
    private $takeorderby;

    /**
     * @var string|null
     *
     * @ORM\Column(name="payment_invoice", type="string", length=16, nullable=false)
     */
    private $paymentInvoice;

    /**
     * @var string|null
     *
     * @ORM\Column(name="payment_sub_invoice", type="string", length=30, nullable=false)
     */
    private $paymentSubInvoice;

    /**
     * @var string|null
     *
     * @ORM\Column(name="cod_price", type="decimal", precision=10, scale=4, nullable=false)
     */
    private $codPrice;

    /**
     * @var string|null
     *
     * @ORM\Column(name="expense_discount", type="decimal", precision=10, scale=4, nullable=false)
     */
    private $expenseDiscount;

    /**
     * @var string|null
     *
     * @ORM\Column(name="global_warehouse", type="string", length=0, nullable=true, options={"default"="NULL"})
     */
    private $globalWarehouse = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="warehouse_id", type="integer", nullable=false)
     */
    private $warehouseId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="mailcode", type="string", length=20, nullable=true, options={"default"="NULL"})
     */
    private $mailcode = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="transporter_id", type="integer", nullable=false)
     */
    private $transporterId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="remark", type="string", length=3000, nullable=true, options={"default"="NULL"})
     */
    private $remark = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="imgurl", type="string", length=500, nullable=true, options={"default"="NULL"})
     */
    private $imgurl = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="transtatus", type="string", length=0, nullable=true, options={"default"="NULL","comment"="'P' Prepare to send from warehouse, 'S' Sent, 'R' Return ,'' No action, 'C' Cancel"})
     */
    private $transtatus = 'NULL';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="sendmaildate", type="datetime", nullable=true, options={"default"="NULL"})
     */
    private $sendmaildate = 'NULL';

    /**
     * @var bool|null
     *
     * @ORM\Column(name="send_booking", type="boolean", nullable=true, options={"default"="NULL"})
     */
    private $sendBooking = 'NULL';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="transactiondate", type="datetime", nullable=true, options={"default"="NULL"})
     */
    private $transactiondate = 'NULL';

    public function getPaymentInvoice(): ?string
    {
        return $this->paymentInvoice;
    }

    public function setPaymentInvoice(?string $paymentInvoice): self
    {
        $this->paymentInvoice = $paymentInvoice;

        return $this;
    }
    public function getMailcode(): ?string
    {
        return $this->mailcode;
    }

    public function setMailcode(?string $mailcode): self
    {
        $this->mailcode = $mailcode;

        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTakeorderby(): ?int
    {
        return $this->takeorderby;
    }

    public function setTakeorderby(int $takeorderby): self
    {
        $this->takeorderby = $takeorderby;

        return $this;
    }

    public function getPaymentSubInvoice(): ?string
    {
        return $this->paymentSubInvoice;
    }

    public function setPaymentSubInvoice(string $paymentSubInvoice): self
    {
        $this->paymentSubInvoice = $paymentSubInvoice;

        return $this;
    }

    public function getCodPrice()
    {
        return $this->codPrice;
    }

    public function setCodPrice($codPrice): self
    {
        $this->codPrice = $codPrice;

        return $this;
    }

    public function getExpenseDiscount()
    {
        return $this->expenseDiscount;
    }

    public function setExpenseDiscount($expenseDiscount): self
    {
        $this->expenseDiscount = $expenseDiscount;

        return $this;
    }

    public function getGlobalWarehouse(): ?string
    {
        return $this->globalWarehouse;
    }

    public function setGlobalWarehouse(?string $globalWarehouse): self
    {
        $this->globalWarehouse = $globalWarehouse;

        return $this;
    }

    public function getWarehouseId(): ?int
    {
        return $this->warehouseId;
    }

    public function setWarehouseId(int $warehouseId): self
    {
        $this->warehouseId = $warehouseId;

        return $this;
    }

    public function getTransporterId(): ?int
    {
        return $this->transporterId;
    }

    public function setTransporterId(int $transporterId): self
    {
        $this->transporterId = $transporterId;

        return $this;
    }

    public function getRemark(): ?string
    {
        return $this->remark;
    }

    public function setRemark(?string $remark): self
    {
        $this->remark = $remark;

        return $this;
    }

    public function getImgurl(): ?string
    {
        return $this->imgurl;
    }

    public function setImgurl(?string $imgurl): self
    {
        $this->imgurl = $imgurl;

        return $this;
    }

    public function getTranstatus(): ?string
    {
        return $this->transtatus;
    }

    public function setTranstatus(?string $transtatus): self
    {
        $this->transtatus = $transtatus;

        return $this;
    }

    public function getSendmaildate(): ?\DateTimeInterface
    {
        return $this->sendmaildate;
    }

    public function setSendmaildate(?\DateTimeInterface $sendmaildate): self
    {
        $this->sendmaildate = $sendmaildate;

        return $this;
    }

    public function getSendBooking(): ?bool
    {
        return $this->sendBooking;
    }

    public function setSendBooking(?bool $sendBooking): self
    {
        $this->sendBooking = $sendBooking;

        return $this;
    }

    public function getTransactiondate(): ?\DateTimeInterface
    {
        return $this->transactiondate;
    }

    public function setTransactiondate(?\DateTimeInterface $transactiondate): self
    {
        $this->transactiondate = $transactiondate;

        return $this;
    }
}
