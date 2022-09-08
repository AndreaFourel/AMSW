<?php

namespace Entity;


class MissionStatus
{
    private int $id;
    private string $status;
    private string $color;

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
        foreach ($data as $key=>$value){
            $key = implode('', array_map('ucfirst', explode('_', $key)));
            $method = "set" . $key;

            if (method_exists($this, $method)){
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
     * @return MissionStatus
     */
    private function setId(int $id): MissionStatus
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string $status
     * @return MissionStatus
     */
    public function setStatus(string $status): MissionStatus
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return string
     */
    public function getColor(): string
    {
        return $this->color;
    }

    /**
     * @param string $color
     * @return MissionStatus
     */
    public function setColor(string $color): MissionStatus
    {
        $this->color = $color;
        return $this;
    }


}