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
     * @var array
     */
    protected $topLevelDomains;

    /**
     * @var array
     */
    protected $currencies;

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
     * @var array
     */
    protected $callingCodes;

    /**
     * @var string
     */
    protected $capital;

    /**
     * @var string
     */
    protected $region;

    /**
     * @var string
     */
    protected $subRegion;

    /**
     * @var string
     */
    protected $nativeLanguage;

    /**
     * @var array
     */
    protected $languages;

    /**
     * @var string
     */
    protected $demonym;

    /**
     * @var float
     */
    protected $latitude;

    /**
     * @var float
     */
    protected $longitude;

    /**
     * @var int
     */
    protected $area;

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
     * @param  array $domains
     * @return self
     */
    public function setTopLevelDomains(array $domains)
    {
        $this->topLevelDomains = (array) $domains;
        return $this;
    }

    /**
     * @return array
     */
    public function getTopLevelDomains()
    {
        return $this->topLevelDomains;
    }

    /**
     * @return string|null
     */
    public function getMainTopLevelDomain()
    {
        if (empty($this->topLevelDomains)) {
            return null;
        }

        return $this->topLevelDomains[0];
    }

    /**
     * @param  array $currencies
     * @return self
     */
    public function setCurrencies(array $currencies)
    {
        $this->currencies = (array) $currencies;
        return $this;
    }

    /**
     * @return array
     */
    public function getCurrencies()
    {
        return $this->currencies;
    }

    /**
     * @return string|null
     */
    public function getMainCurrency()
    {
        if (empty($this->currencies)) {
            return null;
        }

        return $this->currencies[0];
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
     * @param  array $codes
     * @return self
     */
    public function setCallingCodes(array $codes)
    {
        $this->callingCodes = (array) $codes;
        return $this;
    }

    /**
     * @return array
     */
    public function getCallingCodes()
    {
        return $this->callingCodes;
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
     * @param  string $subRegion
     * @return self
     */
    public function setSubRegion($subRegion)
    {
        $this->subRegion = (string) $subRegion;
        return $this;
    }

    /**
     * @return string
     */
    public function getSubRegion()
    {
        return $this->subRegion;
    }

    /**
     * @param  string $language
     * @return self
     */
    public function setNativeLanguage($language)
    {
        $this->nativeLanguage = (string) $language;
        return $this;
    }

    /**
     * @return string
     */
    public function getNativeLanguage()
    {
        return $this->nativeLanguage;
    }

    /**
     * @param  array $languages
     * @return self
     */
    public function setLanguages(array $languages)
    {
        $this->languages = (array) $languages;
        return $this;
    }

    /**
     * @return array
     */
    public function getLanguages()
    {
        return $this->languages;
    }

    /**
     * @param  string $demonym
     * @return self
     */
    public function setDemonym($demonym)
    {
        $this->demonym = (string) $demonym;
        return $this;
    }

    /**
     * @return string
     */
    public function getDemonym()
    {
        return $this->demonym;
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

    /**
     * @param  int $area
     * @return self
     */
    public function setArea($area)
    {
        $this->area = (int) $area;
        return $this;
    }

    /**
     * @return int
     */
    public function getArea()
    {
        return $this->area;
    }
}
