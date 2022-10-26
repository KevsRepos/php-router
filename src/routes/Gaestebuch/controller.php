<?php declare(strict_types=1);

namespace routes\Gaestebuch;

class Controller {
    private $entries = [
        [
            "name" => "Max B.",
            "text" => "Hallo Wonder! Hier ist der Max! Ne schöne Webseite hast du dir da gemacht? ;) Musste mir mal beim nächsten Kölsch-Abend mal zeigen wie sowas geht ;) Oder bin ich nicht doch schon zu alt dafür?? ;-)"
        ],
        [
            "name" => "Susanne H.",
            "text" => "Hey Wonder. Na, erkennste mich noch ? ;-) Deine Schwagerin na was machste so schönes?? :)))"
        ],
        [
            "name" => "Anton F.",
            "text" => "Det gibbet ja nich, der Wonder hat ne echte Internetseite, so ganz echt, dachte für sowas haste dir schon zu viele Gehörnzellen weggesoffen ;))"
        ],
        [
            "name" => "duopfer P.",
            "text" => "junge was bist du fürn opfer haha was das fürn müll ey haha"
        ]
    ];

    public function GET(): array
    {
        return $this->entries;
    }

    public function POST(array $data)
    {
        array_push($this->entries, $data);

        return $this->entries;
    }
}