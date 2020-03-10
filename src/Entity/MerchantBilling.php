<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MerchantBilling
 *
 * @ORM\Table(name="merchant_billing", indexes={@ORM\Index(name="idx_parcel_bill_no", columns={"parcel_bill_no"}), @ORM\Index(name="parcel_member_id", columns={"parcel_member_id"}), @ORM\Index(name="todb_amid", columns={"takeorderby", "adminid"}), @ORM\Index(name="odst", columns={"orderstatus"}), @ORM\Index(name="orderdate_idx", columns={"orderdate"}), @ORM\Index(name="provincecode_idx", columns={"provincecode"}), @ORM\Index(name="takeorderby_payment_invoice_idx", columns={"takeorderby", "payment_invoice"}), @ORM\Index(name="payment_status_idx", columns={"payment_status"}), @ORM\Index(name="takeorderby_orderdate_idx", columns={"takeorderby", "orderdate"}), @ORM\Index(name="takeorderby_idx", columns={"takeorderby"}), @ORM\Index(name="zipcode", columns={"zipcode"}), @ORM\Index(name="orderphoneno", columns={"orderphoneno"})})
 * @ORM\Entity
 */
class MerchantBilling
{
    /**
     * @var int
     *
     * @ORM\Column(name="payment_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $paymentId;

    /**
     * @var int|null
     *
     * @ORM\Column(name="takeorderby", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $takeorderby = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="adminid", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $adminid = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="payment_invoice", type="string", length=16, nullable=true, options={"default"="NULL"})
     */
    private $paymentInvoice = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="payment_amt", type="decimal", precision=10, scale=4, nullable=true, options={"default"="NULL"})
     */
    private $paymentAmt = 'NULL';

    /**
     * @var string
     *
     * @ORM\Column(name="payment_discount", type="decimal", precision=10, scale=4, nullable=false, options={"default"="0.0000"})
     */
    private $paymentDiscount = '0.0000';

    /**
     * @var string|null
     *
     * @ORM\Column(name="transportprice", type="decimal", precision=10, scale=4, nullable=true, options={"default"="0.0000"})
     */
    private $transportprice = '0.0000';

    /**
     * @var string
     *
     * @ORM\Column(name="pledge", type="decimal", precision=10, scale=2, nullable=false, options={"default"="0.00"})
     */
    private $pledge = '0.00';

    /**
     * @var string|null
     *
     * @ORM\Column(name="pledge_remark", type="decimal", precision=10, scale=2, nullable=true, options={"default"="NULL"})
     */
    private $pledgeRemark = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="payment_status", type="string", length=2, nullable=true, options={"default"="NULL"})
     */
    private $paymentStatus = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="payment_method", type="string", length=0, nullable=true, options={"default"="NULL","comment"="00 Unknown, 01 Let2Pay Account,  02 Credit Card,  03 Diner Club Credit Card,  04 American Express Credit Card,  05 Internet Banking,  06 Counter Service,  07 123-2C2P,  60 COD,  65 โอนผ่านธนาคาร,  90 สั่งจอง,  99 จ่ายเงินสดจัดเก็บเงินเอง, "})
     */
    private $paymentMethod = 'NULL';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="paymentdate", type="datetime", nullable=true, options={"default"="NULL"})
     */
    private $paymentdate = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="paycode", type="string", length=20, nullable=true, options={"default"="NULL"})
     */
    private $paycode = 'NULL';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="paycode_expiredate", type="datetime", nullable=true, options={"default"="NULL"})
     */
    private $paycodeExpiredate = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="orderstatus", type="string", length=0, nullable=true, options={"default"="NULL","comment"="ยกเลิกใบสั่งของ 101 รอยืนยันการชำระเงิน 102 ชำระเงินแล้ว 103 จัดส่งแล้ว 104 สินค้าถึงปลายทาง 105 สินค้าตีกลับ 106"})
     */
    private $orderstatus = 'NULL';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="orderdate", type="datetime", nullable=false)
     */
    private $orderdate;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ordertransport", type="string", length=0, nullable=true, options={"default"="'others'"})
     */
    private $ordertransport = '\'others\'';

    /**
     * @var string
     *
     * @ORM\Column(name="ordername", type="string", length=200, nullable=false)
     */
    private $ordername;

    /**
     * @var string
     *
     * @ORM\Column(name="orderaddr", type="string", length=1000, nullable=false)
     */
    private $orderaddr;

    /**
     * @var string
     *
     * @ORM\Column(name="district", type="string", length=150, nullable=false)
     */
    private $district;

    /**
     * @var string
     *
     * @ORM\Column(name="districtcode", type="string", length=150, nullable=false)
     */
    private $districtcode;

    /**
     * @var string
     *
     * @ORM\Column(name="amphur", type="string", length=150, nullable=false)
     */
    private $amphur;

    /**
     * @var string
     *
     * @ORM\Column(name="amphercode", type="string", length=150, nullable=false)
     */
    private $amphercode;

    /**
     * @var string
     *
     * @ORM\Column(name="province", type="string", length=150, nullable=false)
     */
    private $province;

    /**
     * @var string
     *
     * @ORM\Column(name="provincecode", type="string", length=150, nullable=false)
     */
    private $provincecode;

    /**
     * @var string
     *
     * @ORM\Column(name="geoname", type="string", length=150, nullable=false)
     */
    private $geoname;

    /**
     * @var string
     *
     * @ORM\Column(name="geoid", type="string", length=2, nullable=false)
     */
    private $geoid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="zipcode", type="string", length=5, nullable=true, options={"default"="NULL"})
     */
    private $zipcode = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="orderemail", type="string", length=255, nullable=true, options={"default"="NULL"})
     */
    private $orderemail = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="orderphoneno", type="string", length=12, nullable=true, options={"default"="NULL"})
     */
    private $orderphoneno = 'NULL';

    /**
     * @var string
     *
     * @ORM\Column(name="ordershortnote", type="string", length=50, nullable=false)
     */
    private $ordershortnote;

    /**
     * @var int
     *
     * @ORM\Column(name="shortnoteupdateby", type="integer", nullable=false)
     */
    private $shortnoteupdateby;

    /**
     * @var string|null
     *
     * @ORM\Column(name="orderremark", type="string", length=500, nullable=true, options={"default"="NULL"})
     */
    private $orderremark = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="parcel_ref", type="string", length=20, nullable=true, options={"default"="NULL"})
     */
    private $parcelRef = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="parcel_bill_no", type="string", length=50, nullable=true, options={"default"="NULL"})
     */
    private $parcelBillNo = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="parcel_member_id", type="string", length=20, nullable=true, options={"default"="NULL"})
     */
    private $parcelMemberId = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="billingno", type="string", length=30, nullable=true, options={"default"="NULL"})
     */
    private $billingno = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="hashkeygroup", type="string", length=500, nullable=true, options={"default"="NULL"})
     */
    private $hashkeygroup = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="ext_record_id", type="string", length=100, nullable=true, options={"default"="NULL"})
     */
    private $extRecordId = 'NULL';

    public function getPaymentId(): ?int
    {
        return $this->paymentId;
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

    public function getAdminid(): ?int
    {
        return $this->adminid;
    }

    public function setAdminid(?int $adminid): self
    {
        $this->adminid = $adminid;

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

    public function getPaymentAmt()
    {
        return $this->paymentAmt;
    }

    public function setPaymentAmt($paymentAmt): self
    {
        $this->paymentAmt = $paymentAmt;

        return $this;
    }

    public function getPaymentDiscount()
    {
        return $this->paymentDiscount;
    }

    public function setPaymentDiscount($paymentDiscount): self
    {
        $this->paymentDiscount = $paymentDiscount;

        return $this;
    }

    public function getTransportprice()
    {
        return $this->transportprice;
    }

    public function setTransportprice($transportprice): self
    {
        $this->transportprice = $transportprice;

        return $this;
    }

    public function getPledge()
    {
        return $this->pledge;
    }

    public function setPledge($pledge): self
    {
        $this->pledge = $pledge;

        return $this;
    }

    public function getPledgeRemark()
    {
        return $this->pledgeRemark;
    }

    public function setPledgeRemark($pledgeRemark): self
    {
        $this->pledgeRemark = $pledgeRemark;

        return $this;
    }

    public function getPaymentStatus(): ?string
    {
        return $this->paymentStatus;
    }

    public function setPaymentStatus(?string $paymentStatus): self
    {
        $this->paymentStatus = $paymentStatus;

        return $this;
    }

    public function getPaymentMethod(): ?string
    {
        return $this->paymentMethod;
    }

    public function setPaymentMethod(?string $paymentMethod): self
    {
        $this->paymentMethod = $paymentMethod;

        return $this;
    }

    public function getPaymentdate(): ?\DateTimeInterface
    {
        return $this->paymentdate;
    }

    public function setPaymentdate(?\DateTimeInterface $paymentdate): self
    {
        $this->paymentdate = $paymentdate;

        return $this;
    }

    public function getPaycode(): ?string
    {
        return $this->paycode;
    }

    public function setPaycode(?string $paycode): self
    {
        $this->paycode = $paycode;

        return $this;
    }

    public function getPaycodeExpiredate(): ?\DateTimeInterface
    {
        return $this->paycodeExpiredate;
    }

    public function setPaycodeExpiredate(?\DateTimeInterface $paycodeExpiredate): self
    {
        $this->paycodeExpiredate = $paycodeExpiredate;

        return $this;
    }

    public function getOrderstatus(): ?string
    {
        return $this->orderstatus;
    }

    public function setOrderstatus(?string $orderstatus): self
    {
        $this->orderstatus = $orderstatus;

        return $this;
    }

    public function getOrderdate(): ?\DateTimeInterface
    {
        return $this->orderdate;
    }

    public function setOrderdate(\DateTimeInterface $orderdate): self
    {
        $this->orderdate = $orderdate;

        return $this;
    }

    public function getOrdertransport(): ?string
    {
        return $this->ordertransport;
    }

    public function setOrdertransport(?string $ordertransport): self
    {
        $this->ordertransport = $ordertransport;

        return $this;
    }

    public function getOrdername(): ?string
    {
        return $this->ordername;
    }

    public function setOrdername(string $ordername): self
    {
        $this->ordername = $ordername;

        return $this;
    }

    public function getOrderaddr(): ?string
    {
        return $this->orderaddr;
    }

    public function setOrderaddr(string $orderaddr): self
    {
        $this->orderaddr = $orderaddr;

        return $this;
    }

    public function getDistrict(): ?string
    {
        return $this->district;
    }

    public function setDistrict(string $district): self
    {
        $this->district = $district;

        return $this;
    }

    public function getDistrictcode(): ?string
    {
        return $this->districtcode;
    }

    public function setDistrictcode(string $districtcode): self
    {
        $this->districtcode = $districtcode;

        return $this;
    }

    public function getAmphur(): ?string
    {
        return $this->amphur;
    }

    public function setAmphur(string $amphur): self
    {
        $this->amphur = $amphur;

        return $this;
    }

    public function getAmphercode(): ?string
    {
        return $this->amphercode;
    }

    public function setAmphercode(string $amphercode): self
    {
        $this->amphercode = $amphercode;

        return $this;
    }

    public function getProvince(): ?string
    {
        return $this->province;
    }

    public function setProvince(string $province): self
    {
        $this->province = $province;

        return $this;
    }

    public function getProvincecode(): ?string
    {
        return $this->provincecode;
    }

    public function setProvincecode(string $provincecode): self
    {
        $this->provincecode = $provincecode;

        return $this;
    }

    public function getGeoname(): ?string
    {
        return $this->geoname;
    }

    public function setGeoname(string $geoname): self
    {
        $this->geoname = $geoname;

        return $this;
    }

    public function getGeoid(): ?string
    {
        return $this->geoid;
    }

    public function setGeoid(string $geoid): self
    {
        $this->geoid = $geoid;

        return $this;
    }

    public function getZipcode(): ?string
    {
        return $this->zipcode;
    }

    public function setZipcode(?string $zipcode): self
    {
        $this->zipcode = $zipcode;

        return $this;
    }

    public function getOrderemail(): ?string
    {
        return $this->orderemail;
    }

    public function setOrderemail(?string $orderemail): self
    {
        $this->orderemail = $orderemail;

        return $this;
    }

    public function getOrderphoneno(): ?string
    {
        return $this->orderphoneno;
    }

    public function setOrderphoneno(?string $orderphoneno): self
    {
        $this->orderphoneno = $orderphoneno;

        return $this;
    }

    public function getOrdershortnote(): ?string
    {
        return $this->ordershortnote;
    }

    public function setOrdershortnote(string $ordershortnote): self
    {
        $this->ordershortnote = $ordershortnote;

        return $this;
    }

    public function getShortnoteupdateby(): ?int
    {
        return $this->shortnoteupdateby;
    }

    public function setShortnoteupdateby(int $shortnoteupdateby): self
    {
        $this->shortnoteupdateby = $shortnoteupdateby;

        return $this;
    }

    public function getOrderremark(): ?string
    {
        return $this->orderremark;
    }

    public function setOrderremark(?string $orderremark): self
    {
        $this->orderremark = $orderremark;

        return $this;
    }

    public function getParcelRef(): ?string
    {
        return $this->parcelRef;
    }

    public function setParcelRef(?string $parcelRef): self
    {
        $this->parcelRef = $parcelRef;

        return $this;
    }

    public function getParcelBillNo(): ?string
    {
        return $this->parcelBillNo;
    }

    public function setParcelBillNo(?string $parcelBillNo): self
    {
        $this->parcelBillNo = $parcelBillNo;

        return $this;
    }

    public function getParcelMemberId(): ?string
    {
        return $this->parcelMemberId;
    }

    public function setParcelMemberId(?string $parcelMemberId): self
    {
        $this->parcelMemberId = $parcelMemberId;

        return $this;
    }

    public function getBillingno(): ?string
    {
        return $this->billingno;
    }

    public function setBillingno(?string $billingno): self
    {
        $this->billingno = $billingno;

        return $this;
    }

    public function getHashkeygroup(): ?string
    {
        return $this->hashkeygroup;
    }

    public function setHashkeygroup(?string $hashkeygroup): self
    {
        $this->hashkeygroup = $hashkeygroup;

        return $this;
    }

    public function getExtRecordId(): ?string
    {
        return $this->extRecordId;
    }

    public function setExtRecordId(?string $extRecordId): self
    {
        $this->extRecordId = $extRecordId;

        return $this;
    }


}
