<?php

namespace BusinessGazeta\AdfoxApi\Request\place;

use BusinessGazeta\AdfoxApi\Request\AbstractAdfoxRequest;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @link https://yandex.ru/dev/adfox/doc/v.1/account/account-list-activeBanners.html
 */
#[Assert\Expression(
    "this.getPlp() in [1, 2, 3, 4, 5] or this.getPlp() === NULL or ((this.getPlp() === 0 or this.getPlp() === -1) and this.getPli() === NULL)",
    message: 'Если plp = -1 или plp = 0, то pli не должен передаваться',
)]
class BasePlace extends AbstractAdfoxRequest
{
    private ?int $categoryID = null;
    private ?int $pct = null;
    private ?int $plp = null;
    #[Assert\GreaterThan(value: 1)]
    private ?int $pli = null;
    #[Assert\GreaterThan(value: 1)]
    #[Assert\Expression(
        "(this.getPlp() === 5 and value !== NULL) or ((this.getPlp() === -1 or this.getPlp() === 0) and value === NULL)
        or (this.getPlp() !== 5 and this.getPlp() !== -1 and this.getPlp() !== 0)",
        message: 'Если plp = -1 или plp = 0, то pli не должен передаваться, или если plp = 5, то pli обязателен',
    )]
    private ?int $pop = null;

    public function params(): array
    {
        $params = parent::params();
        $params = $this->mergeParams($params, $this->categoryID, 'categoryID');
        $params = $this->mergeParams($params, $this->pct, 'pct');
        $params = $this->mergeParams($params, $this->plp, 'plp');
        $params = $this->mergeParams($params, $this->pli, 'pli');
        $params = $this->mergeParams($params, $this->pop, 'pop');

        return $params;
    }

    /**
     * @return int|null
     */
    public function getCategoryID(): ?int
    {
        return $this->categoryID;
    }

    /**
     * @param int|null $categoryID
     */
    public function setCategoryID(?int $categoryID): void
    {
        $this->categoryID = $categoryID;
    }

    /**
     * @return int|null
     */
    public function getPct(): ?int
    {
        return $this->pct;
    }

    /**
     * @param int|null $pct
     */
    public function setPct(?int $pct): void
    {
        $this->pct = $pct;
    }

    /**
     * @return int|null
     */
    public function getPlp(): ?int
    {
        return $this->plp;
    }

    /**
     * @param int|null $plp
     */
    public function setPlp(?int $plp): void
    {
        $this->plp = $plp;
    }

    /**
     * @return int|null
     */
    public function getPli(): ?int
    {
        return $this->pli;
    }

    /**
     * @param int|null $pli
     */
    public function setPli(?int $pli): void
    {
        $this->pli = $pli;
    }

    /**
     * @return int|null
     */
    public function getPop(): ?int
    {
        return $this->pop;
    }

    /**
     * @param int|null $pop
     */
    public function setPop(?int $pop): void
    {
        $this->pop = $pop;
    }

}
