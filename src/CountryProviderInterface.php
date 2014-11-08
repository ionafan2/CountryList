<?php
namespace Nxw\CountryList;

interface CountryProviderInterface
{
    /**
     * @return array
     */
    public function getCountries();
}
