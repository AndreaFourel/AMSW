<?php

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

    //hydrate function
    public function hydrate(array $data): void
    {
        foreach ($data as $key => $value){
            $key = implode('', array_map('ucfirst', explode('_', $key)));//$key from snake to camel case
            $method = "set" . $key;
            if(method_exists($this, $method)){ //check if setter exists and call the setter
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
        $this->id= $id;
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
        //if (ctype_alnum($title) && strlen($title) >= 3 && strlen($title) <= 50) {
            $this->title = $title;
        //}
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
        //if (ctype_alnum($description) && strlen($description) >= 3 && strlen($description) <= 255) {
            $this->description = $description;
        //}
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
        //if (ctype_alnum($codeName) && strlen($codeName) >= 3 && strlen($codeName) <= 50) {
            $this->codeName = $codeName;
        //}
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
        //if (ctype_alnum($startDate) && strlen($startDate) >= 3 && strlen($startDate) <= 50) {
            $this->startDate = $startDate;
        //}
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
        //if (ctype_alnum($endDate) && strlen($endDate) >= 3 && strlen($endDate) <= 50) {
            $this->endDate = $endDate;
        //}
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
        //if (ctype_alpha($countryId) && strlen($countryId) === 3) {
            $this->countryId = $countryId;
        //}
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
        //if($skillId > 0){
            $this->skillId = $skillId;
        //}
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
        //if($missionTypeId > 0){
            $this->missionTypeId = $missionTypeId;
       // }
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
        //if($statusId > 0){
            $this->statusId = $statusId;
        //}
        return $this;
    }


}