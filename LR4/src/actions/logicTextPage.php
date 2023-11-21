<?php

function case3($text)
{
    if (isset($text) && !empty($text)) {
        // Находим все абзацы с длинным тире
        preg_match_all('/<p>—([^<]+)<\/p>/i', $text, $matches);

        if (isset($matches[0]) && !empty($matches[0])) {
            // Возвращаем полученные строки прямой речи
            foreach ($matches[0] as $match) {
                echo $match;
            }
        } else {
            // Если прямая речь не найдена, возвращаем пустую строку
            echo "Empty";
        }
    } else {
        echo "Empty";
    }
}

function case9($text)
{
    if (isset($text) && !empty($text)) {
        // Удаляем лишние пробелы между дефисов
        $pattern = '/(\bкое-[\p{L}]+|\b[\p{L}]+-то\b|\b[\p{L}]+-нибудь\b|\b[\p{L}]+-либо\b|\b[\p{L}]+-таки\b|\bво-[\p{L}]+|\bв-[\p{L}]+|\bпо-[\p{L}]+|\b[\p{L}]+ - [\p{L}]+|\b[\p{L}]+- [\p{L}]+|\b[\p{L}]+ -[\p{L}]+|\b[\p{L}]+ - \b)/u';

        $processedText = preg_replace_callback($pattern, function ($matches) {
            return str_replace(' ', '', $matches[0]);
        }, $text);

        // Удаляем пробелы перед точками, запятыми и двоеточиями и добавляем пробел после них
        $processedText = preg_replace('/\s*([.,:])\s*/', '$1 ', $processedText);

        echo $processedText;

    } else {
        echo "Empty";
    }
}

function case14($text)
{
    if (isset($text) && !empty($text)) {
        // Находим все html-теги в тексте
        preg_match_all('/<([a-z][a-z0-9]*)\b[^>]*>(.*?)<\/\1>/i', $text, $matches, PREG_SET_ORDER);

        // Создаем список якорных ссылок
        $anchorLinks = [];

        foreach ($matches as $key => $match) {
            $tag = $match[1];
            $id = 'tag' . $key; // создаем уникальный id для каждого тега
            $anchorLink = '<a href="#' . $id . '">“содержимое тега &lt;' . $tag . '&gt;”</a><br/>';
            $anchorLinks[] = $id;
            echo $anchorLink;
        }

        return $anchorLinks;

    } else {
        return "Empty";
    }
}

function insertAnchorLinks($text, $anchorLinks)
{
    if (isset($text) && !empty($text) && isset($anchorLinks) && !empty($anchorLinks)) {

        foreach ($anchorLinks as $anchorLink) {
            $anchorLink = 0;
            $newText = preg_replace_callback('/<([a-z][a-z0-9]*)\b[^>]*>(.*?)<\/\1>/i', function ($match) use (&$anchorLink) {
                $id = 'tag' . $anchorLink;
                $anchorLink++;
                return '<a id="' . $id . '"></a>' . $match[0];
            }, $text);

        }
        return $newText;

    } else {
        return "Empty";
    }
}

function case19($text)
{
    if (isset($text) && !empty($text)) {
        $allowedTags = '<a><table><tr><td><th><h1><h2><h3><h4><h5><h6><p><div>';
        $text = strip_tags($text, $allowedTags);
        $text = preg_replace('/<(\w+)[^>]*>/', '<$1>', $text); // remove attributes from text tags
        return htmlspecialchars($text);
    } else {
        return "Empty";
    }
}