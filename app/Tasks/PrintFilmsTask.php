<?php

namespace App\Tasks;

use App\Helper;
use App\Models\Film;
use App\Services\ApiService;
use Ramsey\Uuid\Uuid;

class PrintFilmsTask
{
    private array $films;
    private array $people;
    private array $content;

    public function __construct()
    {
        $apiService = new ApiService();
        $this->films = $apiService->getFilms();
        $this->people = Helper::formatArrayAsKeyValue($apiService->getPeople(), 'id', 'name');
        $this->content = [];
        $this->setContent();
    }

    public function setContent()
    {
        foreach ($this->films as $film) {
            $peopleName = [];
            foreach ($film['people'] as $filmPerson) {
                $urlArray = explode('/', $filmPerson);
                $last = end($urlArray);
                if (Uuid::isValid($last)) {
                    $peopleName[] = $this->people[$last];
                }
            }

            $this->content[] = (new Film($film['id'], $film['title'], $peopleName))->toString();
            sort($this->content);
        }
    }

    public function run()
    {
        foreach ($this->content as $row) {
            echo $row;
        }
    }
}