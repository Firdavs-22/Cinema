<?php

namespace vendor;

use vendor\abstract\AbstractModel;

class ActiveRecord extends AbstractModel
{
    public $attributes = [];
    private array $before_attributes;
    
    public function setAttributesName(array $attributes): void
    {
        $this->before_attributes = $attributes;
        foreach ($attributes as $attribute) {
            $this->$attribute = null;
        }
    }
    
    public function setData(array $data): void
    {
        foreach ($data as $key => $datum) {
            $this->$key = $datum;
        }
    }
    
    public function __get($name)
    {
        return $this->attributes[$name] ?? null;
    }
    
    
    public function __set($name, $value)
    {
        $this->attributes[$name] = $value;
    }
    
    
    public function create(): void
    {
        $data = [];
        foreach ($this->attributes as $key => $value) {
            if ($value !== null) {
                $data[$key] = $value;
            }
        }
        $this->id = $this->add($data);
    }
    
    public function save(): void
    {
        if ($this->id) {
            $data = [];
            foreach ($this->attributes as $key => $value) {
                if ($value !== null) {
                    $data[$key] = $value;
                }
            }
            unset($data['id']);
            $this->update($this->id, $data);
        }
        
    }
    
    public function delete(): void
    {
        if ($this->id) {
            $this->deleteId($this->id);
            $this->setAttributesName($this->before_attributes);
        }
    }
    
    
    public function findOne($id): void
    {
        $data = $this->getById($id);
        if ($data) {
            $this->setData($data);
        }
    }
}