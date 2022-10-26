<?php declare(strict_types=1);

namespace routes;

class Controller {
    public function __construct() {

    }

    public function GET(array $params): array
    {
        return [
            "name" => isset($params["name"]) ? $params["name"] : "Gast"
        ];
    }

    public function POST(array $params)
    {
        
    }

    public function layout(): array
    {
        return [];
    }
}