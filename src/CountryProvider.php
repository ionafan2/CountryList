<?php
namespace Nxw\CountryList;

class CountryProvider implements CountryProviderInterface
{
    /**
     * @var string
     */
    protected $rawDataUrl = 'https://raw.githubusercontent.com/mledoze/countries/master/dist/countries.json';

    /**
     * @param  string $url
     * @return self
     */
    public function setRawDataUrl($url)
    {
        $this->rawDataUrl = (string) $url;
        return $this;
    }

    /**
     * @return array
     */
    public function getCountries()
    {
        $json  = file_get_contents($this->rawDataUrl);
        $items = json_decode($json, true);

        $countries = [];
        foreach ($items as $item) {
            $countries[] = $this->buildCountry($item);
        }

        return $countries;
    }

    /**
     * @param  array $data
     * @return Country
     */
    private function buildCountry($data)
    {
        $country = new Country();
        $country
            ->setCommonName($data['name']['common'])
            ->setOfficialName($data['name']['official'])
            ->setTopLevelDomains($data['tld'])
            ->setCurrencies($data['currency'])
            ->setRegion($data['region'])
            ->setSubRegion($data['subregion'])
            ->setIsoCodeNumeric($data['ccn3'])
            ->setIsoCodeAlpha2($data['cca2'])
            ->setIsoCodeAlpha3($data['cca3'])
            ->setCallingCodes($data['callingCode'])
            ->setCapital($data['capital'])
            ->setNativeLanguage($data['nativeLanguage'])
            ->setLanguages($data['languages'])
            ->setDemonym($data['demonym'])
            ->setArea($data['area']);

        if (is_array($data['latlng']) && !empty($data['latlng'])) {
            $country
                ->setLatitude($data['latlng'][0])
                ->setLongitude($data['latlng'][1]);
        }

        return $country;
    }
}
