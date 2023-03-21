<?php

namespace Deg540\PHPTestingBoilerplate;

class Ohce
{

    public function getAnswer(string $userInput): array
    {
        $reversedText = strrev($userInput);

        $respuesta = [
            "Comment" => "",
            "ReversedText" => $reversedText,
        ];

        if ($reversedText === $userInput)
            $respuesta["Comment"] = "¡Bonita palabra!";

        return $respuesta;
    }
}