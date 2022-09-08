<?php

namespace Entity;

class Mission
{
    // Attributes

    private int $id;
    private string $title;
    private string $description;
    private string $codeName;
    private string $startDate;
    private string $endDate;
    private string $countryId;
    private int $skillId;
    private int $missionTypeId;
    private int $statusId;

    // Constructor

    public function __construct(array $data)
    {
        $this->hydrate($data);
    }

    // Methods

    /**
     * hydrate instances of this class with data
     *
     * @param array $data
     */
    public function hydrate(array $data): void
    {
        foreach ($data as $key => $value) {
            //$key from snake to camel case
            $key = implode('', array_map('ucfirst', explode('_', $key)));
            $method = "set" . $key;
            //check if setter exists and call the setter
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
     * @return Mission
     */
    private function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return Mission
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return Mission
     */
    public function setDescription(string $description): self
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return string
     */
    public function getCodeName(): string
    {
        return $this->codeName;
    }

    /**
     * @param string $codeName
     * @return Mission
     */
    public function setCodeName(string $codeName): self
    {
        $this->codeName = $codeName;
        return $this;
    }

    /**
     * @return string
     */
    public function getStartDate(): string
    {
        return $this->startDate;
    }

    /**
     * @param string $startDate
     * @return Mission
     */
    public function setStartDate(string $startDate): self
    {
        $this->startDate = $startDate;
        return $this;
    }

    /**
     * @return string
     */
    public function getEndDate(): string
    {
        return $this->endDate;
    }

    /**
     * @param string $endDate
     * @return Mission
     */
    public function setEndDate(string $endDate): self
    {
        $this->endDate = $endDate;
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
     * @return Mission
     */
    public function setCountryId(string $countryId): self
    {
        $this->countryId = $countryId;
        return $this;
    }

    /**
     * @return int
     */
    public function getSkillId(): int
    {
        return $this->skillId;
    }

    /**
     * @param int $skillId
     * @return Mission
     */
    public function setSkillId(int $skillId): self
    {
        $this->skillId = $skillId;
        return $this;
    }

    /**
     * @return int
     */
    public function getMissionTypeId(): int
    {
        return $this->missionTypeId;
    }

    /**
     * @param int $missionTypeId
     * @return Mission
     */
    public function setMissionTypeId(int $missionTypeId): self
    {
        $this->missionTypeId = $missionTypeId;
        return $this;
    }

    /**
     * @return int
     */
    public function getStatusId(): int
    {
        return $this->statusId;
    }

    /**
     * @param int $statusId
     * @return Mission
     */
    public function setStatusId(int $statusId): self
    {
        $this->statusId = $statusId;
        return $this;
    }


}