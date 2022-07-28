<?php

class Mission
{
    // Attributes

    private int $id_mission;
    private string $title;
    private string $description;
    private string $code_name;
    private string $start_date;
    private string $end_date;
    private string $country_id;
    private int $skill_id;
    private int $mission_type_id;
    private int $status_id;

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
            $key = implode('', array_map('ucfirst', explode('_', $key)));
            $method = "set" . $key;
            if(method_exists($this, $method)){
                $this->$method($value);
            }
        }
    }

    /**
     * @return int
     */
    public function getIdMission(): int
    {
        return $this->id_mission;
    }

    /**
     * @param int $id_mission
     */
    public function setIdMission(int $id_mission): void
    {
        $this->id_mission = $id_mission;
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
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
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
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getCodeName(): string
    {
        return $this->code_name;
    }

    /**
     * @param string $code_name
     */
    public function setCodeName(string $code_name): void
    {
        $this->code_name = $code_name;
    }

    /**
     * @return string
     */
    public function getStartDate(): string
    {
        return $this->start_date;
    }

    /**
     * @param string $start_date
     */
    public function setStartDate(string $start_date): void
    {
        $this->start_date = $start_date;
    }

    /**
     * @return string
     */
    public function getEndDate(): string
    {
        return $this->end_date;
    }

    /**
     * @param string $end_date
     */
    public function setEndDate(string $end_date): void
    {
        $this->end_date = $end_date;
    }

    /**
     * @return string
     */
    public function getCountryId(): string
    {
        return $this->country_id;
    }

    /**
     * @param string $country_id
     */
    public function setCountryId(string $country_id): void
    {
        $this->country_id = $country_id;
    }

    /**
     * @return int
     */
    public function getSkillId(): int
    {
        return $this->skill_id;
    }

    /**
     * @param int $skill_id
     */
    public function setSkillId(int $skill_id): void
    {
        $this->skill_id = $skill_id;
    }

    /**
     * @return int
     */
    public function getMissionTypeId(): int
    {
        return $this->mission_type_id;
    }

    /**
     * @param int $mission_type_id
     */
    public function setMissionTypeId(int $mission_type_id): void
    {
        $this->mission_type_id = $mission_type_id;
    }

    /**
     * @return int
     */
    public function getStatusId(): int
    {
        return $this->status_id;
    }

    /**
     * @param int $status_id
     */
    public function setStatusId(int $status_id): void
    {
        $this->status_id = $status_id;
    }


}