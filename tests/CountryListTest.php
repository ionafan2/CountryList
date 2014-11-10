<?php
namespace NxwTest\CountryList;

use Nxw\CountryList\Country;
use Nxw\CountryList\CountryList;
use Nxw\CountryList\CountryProvider;

class CountryListTest extends \PHPUnit_Framework_TestCase
{
    protected function getCountryList()
    {
        $countryList = new CountryList();

        $provider = new CountryProvider();
        $provider->setRawDataUrl(__DIR__ . '/assets/countries.json');
        $countryList->setProvider($provider);

        return $countryList;
    }

    public function testCountryIterator()
    {
        $countryList = $this->getCountryList();
        $this->assertCount(4, $countryList);

        foreach ($countryList as $country) {
            $this->assertInstanceOf(Country::class, $country);
        }
    }

    public function testGetCountry()
    {
        $countryList = $this->getCountryList();
        $country = $countryList->getCountry('FRA');

        $this->assertInstanceOf(Country::class, $country);
        $this->assertEquals('France', $country->getCommonName());
        $this->assertEquals('French Republic', $country->getOfficialName());
        $this->assertEquals('EUR', $country->getCurrency());
        $this->assertEquals('Paris', $country->getCapital());
        $this->assertEquals('Europe', $country->getRegion());
        $this->assertSame(46.0, $country->getLatitude());
        $this->assertSame(2.0, $country->getLongitude());
    }

    public function getCountryFromDataProvider()
    {
        return [
            [250, CountryList::ISO_CODE_NUMERIC],
            ['FR', CountryList::ISO_CODE_APLHA_2],
            ['FRA', CountryList::ISO_CODE_APLHA_3],
        ];
    }

    /**
     * @dataProvider getCountryFromDataProvider
     */
    public function testGetCountryFromData($value, $from)
    {
        $countryList = $this->getCountryList();
        $country = $countryList->getCountry($value, $from);

        $this->assertInstanceOf(Country::class, $country);
        $this->assertEquals('France', $country->getCommonName());
    }

    public function testFilterCountries()
    {
        $countryList = $this->getCountryList();
        $this->assertCount(4, $countryList);

        $countryCollection = $countryList->filterCountries('Europe', CountryList::REGION);
        $this->assertCount(3, $countryCollection);
    }
}
