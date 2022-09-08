<?php

namespace Entity;

class MissionType
{
    private int $id;
    private string $name;

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
     * @return MissionType
     */
    private function setId(int $id): MissionType
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
     * @return MissionType
     */
    public function setName(string $name): MissionType
    {
        $this->name = $name;
        return $this;
    }

}