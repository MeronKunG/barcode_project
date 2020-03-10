<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MerchantBillingDetail
 *
 * @ORM\Table(name="merchant_billing_detail", indexes={@ORM\Index(name="global_productid_idx", columns={"global_productid"}), @ORM\Index(name="takeorderby_idx", columns={"takeorderby"}), @ORM\Index(name="takeorderby_payment_invoice_idx", columns={"takeorderby", "payment_invoice"}), @ORM\Index(name="global_productid", columns={"global_productid"})})
 * @ORM\Entity
 */
class MerchantBillingDetail
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="bigint", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var int|null
     *
     * @ORM\Column(name="takeorderby", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $takeorderby = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="payment_invoice", type="string", length=16, nullable=true, options={"default"="NULL"})
     */
    private $paymentInvoice = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="productid", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $productid = 'NULL';

    /**
     * @var int
     *
     * @ORM\Column(name="global_productid", type="integer", nullable=false)
     */
    private $globalProductid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="productname", type="string", length=300, nullable=true, options={"default"="NULL"})
     */
    private $productname = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="productorder", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $productorder = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="productprice", type="decimal", precision=10, scale=4, nullable=true, options={"default"="NULL"})
     */
    private $productprice = 'NULL';

    /**
     * @var string
     *
     * @ORM\Column(name="productcost", type="decimal", precision=10, scale=4, nullable=false)
     */
    private $productcost;

    /**
     * @var string|null
     *
     * @ORM\Column(name="delivery_fee_multi_step", type="string", length=1500, nullable=true, options={"default"="NULL"})
     */
    private $deliveryFeeMultiStep = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="delivery_fee", type="decimal", precision=10, scale=4, nullable=true, options={"default"="NULL"})
     */
    private $deliveryFee = 'NULL';

    /**
     * @var bool
     *
     * @ORM\Column(name="delivery_fee_in_price", type="boolean", nullable=false, options={"default"="1"})
     */
    private $deliveryFeeInPrice = '1';

    /**
     * @var int
     *
     * @ORM\Column(name="delivery_fee_ratio", type="integer", nullable=false)
     */
    private $deliveryFeeRatio = '0';

    /**
     * @var string|null
     *
     * @ORM\Column(name="imgproductonbill", type="string", length=300, nullable=true, options={"default"="NULL"})
     */
    private $imgproductonbill = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="imgproductpathonbill", type="string", length=300, nullable=true, options={"default"="NULL"})
     */
    private $imgproductpathonbill = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="noteremark", type="string", length=1000, nullable=true, options={"default"="NULL"})
     */
    private $noteremark = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="commissionset", type="string", length=1000, nullable=true, options={"default"="NULL"})
     */
    private $commissionset = 'NULL';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="timestamp", type="datetime", nullable=true, options={"default"="NULL"})
     */
    private $timestamp = 'NULL';

    /**
     * @var int
     *
     * @ORM\Column(name="ownerproduct", type="integer", nullable=false)
     */
    private $ownerproduct;

    /**
     * @var string
     *
     * @ORM\Column(name="owner_bill_no", type="string", length=12, nullable=false)
     */
    private $ownerBillNo;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTakeorderby(): ?int
    {
        return $this->takeorderby;
    }

    public function setTakeorderby(?int $takeorderby): self
    {
        $this->takeorderby = $takeorderby;

        return $this;
    }

    public function getPaymentInvoice(): ?string
    {
        return $this->paymentInvoice;
    }

    public function setPaymentInvoice(?string $paymentInvoice): self
    {
        $this->paymentInvoice = $paymentInvoice;

        return $this;
    }

    public function getProductid(): ?int
    {
        return $this->productid;
    }

    public function setProductid(?int $productid): self
    {
        $this->productid = $productid;

        return $this;
    }

    public function getGlobalProductid(): ?int
    {
        return $this->globalProductid;
    }

    public function setGlobalProductid(int $globalProductid): self
    {
        $this->globalProductid = $globalProductid;

        return $this;
    }

    public function getProductname(): ?string
    {
        return $this->productname;
    }

    public function setProductname(?string $productname): self
    {
        $this->productname = $productname;

        return $this;
    }

    public function getProductorder(): ?int
    {
        return $this->productorder;
    }

    public function setProductorder(?int $productorder): self
    {
        $this->productorder = $productorder;

        return $this;
    }

    public function getProductprice()
    {
        return $this->productprice;
    }

    public function setProductprice($productprice): self
    {
        $this->productprice = $productprice;

        return $this;
    }

    public function getProductcost()
    {
        return $this->productcost;
    }

    public function setProductcost($productcost): self
    {
        $this->productcost = $productcost;

        return $this;
    }

    public function getDeliveryFeeMultiStep(): ?string
    {
        return $this->deliveryFeeMultiStep;
    }

    public function setDeliveryFeeMultiStep(?string $deliveryFeeMultiStep): self
    {
        $this->deliveryFeeMultiStep = $deliveryFeeMultiStep;

        return $this;
    }

    public function getDeliveryFee()
    {
        return $this->deliveryFee;
    }

    public function setDeliveryFee($deliveryFee): self
    {
        $this->deliveryFee = $deliveryFee;

        return $this;
    }

    public function getDeliveryFeeInPrice(): ?bool
    {
        return $this->deliveryFeeInPrice;
    }

    public function setDeliveryFeeInPrice(bool $deliveryFeeInPrice): self
    {
        $this->deliveryFeeInPrice = $deliveryFeeInPrice;

        return $this;
    }

    public function getDeliveryFeeRatio(): ?int
    {
        return $this->deliveryFeeRatio;
    }

    public function setDeliveryFeeRatio(int $deliveryFeeRatio): self
    {
        $this->deliveryFeeRatio = $deliveryFeeRatio;

        return $this;
    }

    public function getImgproductonbill(): ?string
    {
        return $this->imgproductonbill;
    }

    public function setImgproductonbill(?string $imgproductonbill): self
    {
        $this->imgproductonbill = $imgproductonbill;

        return $this;
    }

    public function getImgproductpathonbill(): ?string
    {
        return $this->imgproductpathonbill;
    }

    public function setImgproductpathonbill(?string $imgproductpathonbill): self
    {
        $this->imgproductpathonbill = $imgproductpathonbill;

        return $this;
    }

    public function getNoteremark(): ?string
    {
        return $this->noteremark;
    }

    public function setNoteremark(?string $noteremark): self
    {
        $this->noteremark = $noteremark;

        return $this;
    }

    public function getCommissionset(): ?string
    {
        return $this->commissionset;
    }

    public function setCommissionset(?string $commissionset): self
    {
        $this->commissionset = $commissionset;

        return $this;
    }

    public function getTimestamp(): ?\DateTimeInterface
    {
        return $this->timestamp;
    }

    public function setTimestamp(?\DateTimeInterface $timestamp): self
    {
        $this->timestamp = $timestamp;

        return $this;
    }

    public function getOwnerproduct(): ?int
    {
        return $this->ownerproduct;
    }

    public function setOwnerproduct(int $ownerproduct): self
    {
        $this->ownerproduct = $ownerproduct;

        return $this;
    }

    public function getOwnerBillNo(): ?string
    {
        return $this->ownerBillNo;
    }

    public function setOwnerBillNo(string $ownerBillNo): self
    {
        $this->ownerBillNo = $ownerBillNo;

        return $this;
    }


}
