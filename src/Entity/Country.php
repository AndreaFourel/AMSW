<?php

namespace Entity;
class Country
{
    private string $id;
    private string $name;
    private string $leadership;
    private string $currency;

    public function __construct(array $data)
    {
        $this->hydrate($data);
    }

    public function hydrate(array $data): void
    {
        foreach ($data as $key => $value) {
            $key = implode('', array_map('ucfirst', explode('_', $key)));//$key from snake to camel case
            $method = "set" . $key;
            if (method_exists($this, $method)) { //check if setter exists and call the setter
                $this->$method($value);
            }
        }
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return Country
     */
    private function setId(string $id): Country
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Country
     */
    public function setName(string $name): Country
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getLeadership(): string
    {
        return $this->leadership;
    }

    /**
     * @param string $leadership
     * @return Country
     */
    public function setLeadership(string $leadership): Country
    {
        $this->leadership = $leadership;
        return $this;
    }

    /**
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * @param string $currency
     * @return Country
     */
    public function setCurrency(string $currency): Country
    {
        $this->currency = $currency;
        return $this;
    }

}