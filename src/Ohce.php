<?php

namespace Deg540\PHPTestingBoilerplate;

class Ohce
{

    private string $name = "<your name>";
    private DateManager $dateManager;


    public function __construct(DateManager $dateManager)
    {
        $this->dateManager = $dateManager;
    }

    public function getAnswer(string $userInput): array
    {
        $startPattern = "/ohce [A-Za-z ]+/";
        $respuesta = [
            "Comment" => "",
            "ReversedText" => "",
        ];

        if (preg_match($startPattern, $userInput)){
            $this->name = str_replace("ohce ", "", $userInput);
            $respuesta["Comment"] = $this->greetUser();
            return $respuesta;
        }

        if ($userInput === "Stop!"){
            $respuesta["Comment"] = "Adios " . $this->name;
            return $respuesta;
        }
        $respuesta["ReversedText"] = strrev($userInput);

        if ($respuesta["ReversedText"] === $userInput)
            $respuesta["Comment"] = "¡Bonita palabra!";

        return $respuesta;
    }

    public function greetUser(): string
    {
        $time = $this->dateManager->getCurrentHour();

        if ($time >= 20 or $time < 6){
            return "¡Buenas noches ".$this->name."!";
        }elseif ($time >= 6 and $time < 12){
            return "¡Buenos días ".$this->name."!";
        }else{
            return "¡Buenas tardes ".$this->name."!";
        }

    }
}