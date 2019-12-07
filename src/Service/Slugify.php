<?php


namespace App\Service;


class Slugify
{
    public function generate(string $input) : string
    {
        $specialChars = [
            ' ' => '-',
            'à' => 'a',
            'â' => 'a',
            'ä' => 'a',
            'é' => 'e',
            'è' => 'e',
            'ê' => 'e',
            'ë' => 'e',
            'ï' => 'i',
            'î' => 'i',
            'ö' => 'o',
            'ô' => 'o',
            'ù' => 'u',
            'ü' => 'u',
            'ç' => 'c',
            '\'' => '-',
            '"' => '',
            '?' => '',
            '!' => '',
            '.' => '',
            ':' => '',
            ';' => '',
            '^' => '',
            ',' => '',
            '(' => '',
            ')' => '',
            '[' => '',
            ']' => '',
            '{' => '',
            '}' => '',
            '#' => '',
            '/' => '',
            '\\' => '',
            '~' => '',
        ];
        $input = trim(strtolower($input));

        foreach ($specialChars as $oldChar => $newChar) {
            $input = str_replace($oldChar, $newChar, $input);
        }

        $dashes = '-';
        for ($i = 0; $i < 20; $i++) {
            $input = str_replace($dashes, '-', $input);
            $dashes .= '-';
        }
        $input = str_replace('--', '-', $input);

        if ($input[0] === '-') {
            $input[0] = '';
        }
/*        if ($input[strlen($input) - 1] === '-') {
            $input[strlen($input) - 1] = '';
        }*/

        return $input;
    }
}
