<?php
namespace NxwTest\CountryList;

use Nxw\CountryList\CountryList;
use Nxw\CountryList\CountryProvider;
use ReflectionClass;

class CountryListTest extends \PHPUnit_Framework_TestCase
{
    protected function getCountryList()
    {
        $countryList = new CountryList();

        $providerClass = new ReflectionClass('Nxw\CountryList\CountryProvider');
        $property = $providerClass->getProperty('rawDataUrl');
        $property->setAccessible(true);

        $provider = new CountryProvider();
        $property->setValue($provider, __DIR__ . '/assets/countries.json');
        $countryList->setProvider($provider);

        return $countryList;
    }

    public function testGetCountry()
    {
        $countryList = $this->getCountryList();
        $country = $countryList->getCountry('FRA');

        $this->assertInstanceOf('Nxw\CountryList\Country', $country);
        $this->assertEquals('France', $country->getCommonName());
        $this->assertEquals('French Republic', $country->getOfficialName());
        $this->assertEquals('EUR', $country->getCurrency());
        $this->assertEquals('Paris', $country->getCapital());
        $this->assertEquals('Europe', $country->getRegion());
        $this->assertSame(46.0, $country->getLatitude());
        $this->assertSame(2.0, $country->getLongitude());
    }

    public function testGetCountryFormIsoCodeAlpha2()
    {
        $countryList = $this->getCountryList();
        $country = $countryList->getCountry('FR', CountryList::ISO_CODE_APLHA_2);

        $this->assertInstanceOf('Nxw\CountryList\Country', $country);
        $this->assertEquals('France', $country->getCommonName());
    }

    public function testGetCountryFormIsoCodeNumeric()
    {
        $countryList = $this->getCountryList();
        $country = $countryList->getCountry('250', CountryList::ISO_CODE_NUMERIC);

        $this->assertInstanceOf('Nxw\CountryList\Country', $country);
        $this->assertEquals('France', $country->getCommonName());
    }
}
