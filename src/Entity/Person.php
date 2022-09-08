<?php

namespace Entity;
abstract class Person
{
    private int $id;
    private string $firstName;
    private string $lastName;
    private string $birthDate;
    private string $countryId;

    public function __construct(array $data)
    {
        $this->hydrate($data);
    }

    /**
     * hydrate instances of this class with data
     *
     * @param array $data
     */
    public function hydrate(array $data): void
    {
        foreach ($data as $key => $value) {
            $key = implode('', array_map('ucfirst', explode('_', $key)));
            $method = "set" . $key;
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Person
     */
    private function setId(int $id): Person
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     * @return Person
     */
    public function setFirstName(string $firstName): Person
    {
        $this->firstName = $firstName;
        return $this;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     * @return Person
     */
    public function setLastName(string $lastName): Person
    {
        $this->lastName = $lastName;
        return $this;
    }

    /**
     * @return string
     */
    public function getBirthDate(): string
    {
        return $this->birthDate;
    }

    /**
     * @param string $birthDate
     * @return Person
     */
    public function setBirthDate(string $birthDate): Person
    {
        $this->birthDate = $birthDate;
        return $this;
    }

    /**
     * @return string
     */
    public function getCountryId(): string
    {
        return $this->countryId;
    }

    /**
     * @param string $countryId
     * @return Person
     */
    public function setCountryId(string $countryId): Person
    {
        $this->countryId = $countryId;
        return $this;
    }


}