<?php

function getPreset (int $number): string {
    $text = match ($number) {
        1 => file_get_contents('https://ru.wikipedia.org/wiki/Киноринхи'),
        2 => file_get_contents('https://www.gazeta.ru/culture/2021/12/16/a_14322589.shtml'),
        3 => file_get_contents('https://mishka-knizhka.ru/skazki-dlay-detey/zarubezhnye-skazochniki/skazki-alana-milna/vinni-puh-i-vse-vse-vse/'),
        default => 'error',
    };
    $text = str_replace('</textarea>', '', $text);
    return $text;
}