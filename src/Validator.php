<?php
declare(strict_types=1);

namespace Roliod\TexasHUPoker;

use Roliod\TexasHUPoker\Deck\Rank;
use Roliod\TexasHUPoker\Deck\Suite;
use Roliod\TexasHUPoker\Rules\Concerns\CanGetRanksFromSequence;
use Roliod\TexasHUPoker\Rules\Concerns\CanGetSuitsFromSequence;

class Validator
{
    use CanGetSuitsFromSequence, CanGetRanksFromSequence;

    /**
     * @var string
     */
    private $deck;

    /**
     * @var bool
     */
    private $hasError = false;

    /**
     * @var string|null
     */
    private $error;

    /**
     * @var bool
     */
    private $isValid = true;

    /**
     * @param string $deck
     */
    private function __construct(string $deck)
    {
        $this->deck = $deck;

        $this->validate();
    }

    /**
     * @return $this
     */
    private function validate(): self
    {
        $deckToArray = explode(PHP_EOL, $this->deck);

        if ($this->validateHandCount($deckToArray) === false) {
            return $this;
        }

        if ($this->validateRanks($deckToArray) === false) {
            return $this;
        }

        if ($this->validateSuits($deckToArray) === false) {
            return $this;
        }

        return $this;
    }

    /**
     * @return bool
     */
    public function hasError(): bool
    {
        return $this->hasError;
    }

    /**
     * @return bool
     */
    public function isValid(): bool
    {
        return $this->isValid;
    }

    /**
     * @return string|null
     */
    public function error(): ?string
    {
        return $this->error;
    }

    /**
     * @param string $deck
     *
     * @return self
     */
    public static function create(string $deck): self
    {
        return new self($deck);
    }

    /**
     * @param array $deck
     *
     * @return bool
     */
    private function validateHandCount(array $deck): bool
    {
        foreach ($deck as $sequence) {
            $hand = explode(' ', $sequence);

            if (count($hand) !== 5) {
                $this->error = "Sequence count must be 5 each. Provided: $sequence";
                $this->isValid = false;
                $this->hasError = true;
                return false;
            }
        }

        return true;
    }

    /**
     * @param array $deck
     *
     * @return bool
     */
    private function validateRanks(array $deck): bool
    {
        foreach ($deck as $hand) {
            $ranks = $this->getRanksFromSequence($hand);

            foreach ($ranks as $rank) {
                if (!in_array($rank,RANK::LIST)) {
                    $this->error = "Invalid rank provided: $rank";
                    $this->isValid = false;
                    $this->hasError = true;
                    return false;
                }
            }
        }

        return true;
    }

    /**
     * @param array $deck
     *
     * @return bool
     */
    private function validateSuits(array $deck): bool
    {
        foreach ($deck as $hand) {
            $suits = $this->getSuitsFromSequence($hand);

            foreach ($suits as $suit) {
                if (!array_key_exists($suit, Suite::UNICODE_TO_STRING)) {
                    $this->error = "Invalid suit provided: $suit";
                    $this->isValid = false;
                    $this->hasError = true;
                    return false;
                }
            }
        }

        return true;
    }
}
