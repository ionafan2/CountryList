<?php
namespace Nxw\CountryList;

class CountryProvider implements CountryProviderInterface
{
    /**
     * @var string
     */
    protected $rawDataUrl = 'https://raw.githubusercontent.com/mledoze/countries/master/dist/countries.json';

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
            ->setRegion($data['region'])
            ->setIsoCodeNumeric($data['ccn3'])
            ->setIsoCodeAlpha2($data['cca2'])
            ->setIsoCodeAlpha3($data['cca3'])
            ->setCapital($data['capital']);

        if (is_array($data['currency']) && !empty($data['currency'])) {
            $country->setCurrency($data['currency'][0]);
        }
        if (is_array($data['latlng']) && !empty($data['latlng'])) {
            $country
                ->setLatitude($data['latlng'][0])
                ->setLongitude($data['latlng'][1]);
        }

        return $country;
    }
}
