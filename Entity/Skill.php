<?php

class Skill
{
    private int $id;
    private string $name;
    private string $description;

    public function __construct(array $data)
    {
        $this->hydrate($data);
    }

    public function hydrate(array $data):void
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
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Skill
     */
    public function setId(int $id): Skill
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
     * @return Skill
     */
    public function setName(string $name): Skill
    {
        $this->name = $name;
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
     * @return Skill
     */
    public function setDescription(string $description): Skill
    {
        $this->description = $description;
        return $this;
    }


}