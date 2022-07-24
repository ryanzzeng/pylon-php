<?php

namespace App\Models;

class Film extends AbstractBaseModel
{
    public string $id;
    public string $title;
    public array $people;

    public function __construct(string $id, string $title, array $people, string $sort = 'sort')
    {
        $this->id = $id;
        $this->title = $title;
        $sort($people);
        $this->people = $people;
    }

    public function toString(): string
    {
        if (count($this->people) > 0) {
            return $this->title . ' : ' . join(',', $this->people) . PHP_EOL;
        }

        return $this->title . PHP_EOL;
    }
}