<?php

namespace App;

class Tennis {

    private $player1;
    private $player2;
    private $scoring_lookup = [
        0 => "Love",
        1 => "Fifteen",
        2 => "Thirty",
        3 => "Forty",
        4 => "Winner"
    ];

    public function __construct(Player $player1, Player $player2)
    {
        $this->player1 = $player1;
        $this->player2 = $player2;
    }

    public function score()
    {
        if ($this->hasWinner())
        {
            return "Winner: " . $this->winner()->getName();
        }
        if ($this->hasAdvantage())
        {
            return "Advantage: " . $this->winner()->getName();
        }
        if ($this->inDeuce())
        {
            return "Deuce";
        }
        if ($this->isTied())
        {
            return $this->scoring_lookup[$this->player1->getPoints()] . '-All';
        }

        return $this->generalScore();
    }

    private function isTied()
    {
        return $this->player1->getPoints() == $this->player2->getPoints();
    }

    private function hasAdvantage()
    {
        return $this->hasOneLeadingPoint() && $this->hasEnoughPointToBeWon();
    }

    private function hasWinner()
    {
        return $this->hasAtLeastTwoLeadingPoints() && $this->hasEnoughPointToBeWon();
    }

    private function winner()
    {
        return $this->player1->getPoints() > $this->player2->getPoints()
            ? $this->player1
            : $this->player2;
    }

    private function hasEnoughPointToBeWon()
    {
        return $this->player1->getPoints() >= 4 || $this->player2->getPoints() >= 4;
    }

    private function hasAtLeastTwoLeadingPoints()
    {
        return abs($this->player1->getPoints() - $this->player2->getPoints()) >= 2;
    }

    private function hasOneLeadingPoint()
    {
        return abs($this->player1->getPoints() - $this->player2->getPoints()) == 1;
    }

    private function inDeuce()
    {
        return $this->isTied() && $this->hasEnoughPointsForDeuce();
    }

    private function hasEnoughPointsForDeuce()
    {
        return $this->player1->getPoints() >= 3;
    }

    private function generalScore()
    {
        return $this->scoring_lookup[$this->player1->getPoints()]
        . '-' . $this->scoring_lookup[$this->player2->getPoints()];
    }


}
