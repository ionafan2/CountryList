<?php
namespace Nxw\CountryList;

class CountryList
{
    const ISO_CODE_NUMERIC = 'ccn3';
    const ISO_CODE_APLHA_2 = 'cca2';
    const ISO_CODE_APLHA_3 = 'cca3';

    /**
     * @var CountryProvider
     */
    protected $provider;

    /**
     * @var array
     */
    protected $countries = [];

    /**
     * @param  mixed $value
     * @param  string $from
     * @return Country|null
     */
    public function getCountry($value, $from = self::ISO_CODE_APLHA_3)
    {
        $this->loadCountries();

        switch ($from) {
            case self::ISO_CODE_NUMERIC:
                $method = 'getIsoCodeNumeric';
                break;
            case self::ISO_CODE_APLHA_2:
                $method = 'getIsoCodeAlpha2';
                break;
            case self::ISO_CODE_APLHA_3:
                $method = 'getIsoCodeAlpha3';
                break;
            default:
                return null;
        }

        foreach ($this->countries as $country) {
            if (method_exists($country, $method) && $country->$method() == $value) {
                return $country;
            }
        }

        return null;
    }

    private function loadCountries()
    {
        if (!empty($this->countries)) {
            return;
        }

        $this->countries = $this->getProvider()->getCountries();
    }

    /**
     * @param  CountryProviderInterface $provider
     * @return self
     */
    public function setProvider(CountryProviderInterface $provider)
    {
        $this->provider = $provider;
        return $this;
    }

    /**
     * @return CountryProviderInterface
     */
    public function getProvider()
    {
        if (!$this->provider) {
            $this->setProvider(new CountryProvider());
        }

        return $this->provider;
    }
}
