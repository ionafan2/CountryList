<?php
namespace Nxw\CountryList;

class CountryList extends CountryCollection
{
    /**
     * @var CountryProviderInterface
     */
    protected $provider;

    /**
     * {@inheritdoc}
     */
    public function getIterator()
    {
        $this->loadCountries();

        return parent::getIterator();
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
