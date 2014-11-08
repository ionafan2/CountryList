<?php
namespace Nxw\CountryList;

class Country
{
    /**
     * @var string
     */
    protected $commonName;

    /**
     * @var string
     */
    protected $officialName;

    /**
     * @var string
     */
    protected $currency;

    /**
     * @var string
     */
    protected $isoCodeNumeric;

    /**
     * @var string
     */
    protected $isoCodeAlpha2;

    /**
     * @var string
     */
    protected $isoCodeAlpha3;

    /**
     * @var string
     */
    protected $capital;

    /**
     * @var string
     */
    protected $region;

    /**
     * @var float
     */
    protected $latitude;

    /**
     * @var float
     */
    protected $longitude;

    /**
     * @param  string $name
     * @return self
     */
    public function setCommonName($name)
    {
        $this->commonName = (string) $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getCommonName()
    {
        return $this->commonName;
    }

    /**
     * @param  string $name
     * @return self
     */
    public function setOfficialName($name)
    {
        $this->officialName = (string) $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getOfficialName()
    {
        return $this->officialName;
    }

    /**
     * @param  string $currency
     * @return self
     */
    public function setCurrency($currency)
    {
        $this->currency = (string) $currency;
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
     * @param  string $code
     * @return self
     */
    public function setIsoCodeNumeric($code)
    {
        $this->isoCodeNumeric = (string) $code;
        return $this;
    }

    /**
     * @return string
     */
    public function getIsoCodeNumeric()
    {
        return $this->isoCodeNumeric;
    }

    /**
     * @param  string $code
     * @return self
     */
    public function setIsoCodeAlpha2($code)
    {
        $this->isoCodeAlpha2 = (string) $code;
        return $this;
    }

    /**
     * @return string
     */
    public function getIsoCodeAlpha2()
    {
        return $this->isoCodeAlpha2;
    }

    /**
     * @param  string $code
     * @return self
     */
    public function setIsoCodeAlpha3($code)
    {
        $this->isoCodeAlpha3 = (string) $code;
        return $this;
    }

    /**
     * @return string
     */
    public function getIsoCodeAlpha3()
    {
        return $this->isoCodeAlpha3;
    }

    /**
     * @param  string $capital
     * @return self
     */
    public function setCapital($capital)
    {
        $this->capital = (string) $capital;
        return $this;
    }

    /**
     * @return string
     */
    public function getCapital()
    {
        return $this->capital;
    }

    /**
     * @param  string $region
     * @return self
     */
    public function setRegion($region)
    {
        $this->region = (string) $region;
        return $this;
    }

    /**
     * @return string
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * @param  float $latitude
     * @return self
     */
    public function setLatitude($latitude)
    {
        $this->latitude = (float) $latitude;
        return $this;
    }

    /**
     * @return float
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * @param  float $longitude
     * @return self
     */
    public function setLongitude($longitude)
    {
        $this->longitude = (float) $longitude;
        return $this;
    }

    /**
     * @return float
     */
    public function getLongitude()
    {
        return $this->longitude;
    }
}
