<?php
namespace Nxw\CountryList;

use ArrayIterator;
use IteratorAggregate;

class CountryCollection implements IteratorAggregate
{
    const ISO_CODE_NUMERIC = 'iso_code_numeric';
    const ISO_CODE_APLHA_2 = 'iso_code_alpha2';
    const ISO_CODE_APLHA_3 = 'iso_code_alpha3';
    const REGION           = 'region';

    /**
     * @var array
     */
    protected $countries = [];

    /**
     * @param array $countries
     */
    public function __construct(array $countries = [])
    {
        $this->countries = $countries;
    }

    /**
     * @return ArrayIterator
     */
    public function getIterator()
    {
        return new ArrayIterator($this->countries);
    }

    /**
     * @param  mixed $value
     * @param  string $from
     * @return CountryCollection
     */
    public function filterCountries($value, $from)
    {
        $filter = new \Zend\Filter\Word\UnderscoreToCamelCase();
        $method = 'get' . ucfirst($filter->filter($from));

        $countries = [];
        foreach ($this->getIterator() as $country) {
            if (method_exists($country, $method) && $country->$method() == $value) {
                $countries[] = $country;
            }
        }

        return new CountryCollection($countries);
    }

    /**
     * @param  mixed $value
     * @param  string $from
     * @return Country|null
     */
    public function getCountry($value, $from = self::ISO_CODE_APLHA_3)
    {
        $countries = $this->filterCountries($value, $from);
        if (count($countries) == 0) {
            return null;
        }

        return $countries->getIterator()->current();
    }
}
