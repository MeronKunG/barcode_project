<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CodReturn
 *
 * @ORM\Table(name="cod_return", indexes={@ORM\Index(name="mailcode", columns={"mailcode"})})
 * @ORM\Entity
 */
class CodReturn
{
    /**
     * @var int
     *
     * @ORM\Column(name="pkey", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $pkey;

    /**
     * @var string
     *
     * @ORM\Column(name="mailcode", type="string", length=100, nullable=false)
     */
    private $mailcode;

    /**
     * @var int
     *
     * @ORM\Column(name="relation_id", type="integer", nullable=false, options={"comment"="takeorderby or warehouse_id"})
     */
    private $relationId;

    /**
     * @var int|null
     *
     * @ORM\Column(name="user_id", type="integer", nullable=true)
     */
    private $userId;

    /**
     * @var int
     *
     * @ORM\Column(name="type_id", type="integer", nullable=false, options={"comment"="1 = parcel / 2 hd hybrid"})
     */
    private $typeId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="scan_date", type="date", nullable=false)
     */
    private $scanDate;

    /**
     * @var int|null
     *
     * @ORM\Column(name="transporter_id", type="integer", nullable=true)
     */
    private $transporterId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="remarks", type="string", length=120, nullable=true)
     */
    private $remarks;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="tstamp", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $tstamp = 'CURRENT_TIMESTAMP';

    public function getPkey(): ?int
    {
        return $this->pkey;
    }

    public function getMailcode(): ?string
    {
        return $this->mailcode;
    }

    public function setMailcode(string $mailcode): self
    {
        $this->mailcode = $mailcode;

        return $this;
    }

    public function getRelationId(): ?int
    {
        return $this->relationId;
    }

    public function setRelationId(int $relationId): self
    {
        $this->relationId = $relationId;

        return $this;
    }

    public function getUserId(): ?int
    {
        return $this->userId;
    }

    public function setUserId(?int $userId): self
    {
        $this->userId = $userId;

        return $this;
    }

    public function getTypeId(): ?int
    {
        return $this->typeId;
    }

    public function setTypeId(int $typeId): self
    {
        $this->typeId = $typeId;

        return $this;
    }

    public function getScanDate(): ?\DateTimeInterface
    {
        return $this->scanDate;
    }

    public function setScanDate(\DateTimeInterface $scanDate): self
    {
        $this->scanDate = $scanDate;

        return $this;
    }

    public function getTransporterId(): ?int
    {
        return $this->transporterId;
    }

    public function setTransporterId(?int $transporterId): self
    {
        $this->transporterId = $transporterId;

        return $this;
    }

    public function getRemarks(): ?string
    {
        return $this->remarks;
    }

    public function setRemarks(?string $remarks): self
    {
        $this->remarks = $remarks;

        return $this;
    }

    public function getTstamp(): ?\DateTimeInterface
    {
        return $this->tstamp;
    }

    public function setTstamp(\DateTimeInterface $tstamp): self
    {
        $this->tstamp = $tstamp;

        return $this;
    }


}
