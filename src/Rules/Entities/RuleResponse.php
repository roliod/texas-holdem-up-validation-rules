<?php
declare(strict_types=1);

namespace Roliod\TexasHUPoker\Rules\Entities;

class RuleResponse
{
    /**
     * @var int
     */
    private $rank;

    /**
     * @var bool
     */
    private $matches;

    /**
     * @var string
     */
    private $hand;

    /**
     * @param string $hand
     * @param int    $rank
     * @param bool   $matches
     */
    public function __construct(
        string $hand,
        int $rank,
        bool $matches = false
    ) {
        $this->hand = $hand;
        $this->rank = $rank;
        $this->matches = $matches;
    }

    /**
     * @param int $rank
     */
    public function setRank(int $rank): void
    {
        $this->rank = $rank;
    }

    /**
     * @return int
     */
    public function getRank(): int
    {
        return $this->rank;
    }

    /**
     * @param string $hand
     */
    public function setHand(string $hand): void
    {
        $this->hand = $hand;
    }

    /**
     * @return string
     */
    public function getHand(): string
    {
        return $this->hand;
    }

    /**
     * @param bool $matches
     */
    public function setMatches(bool $matches): void
    {
        $this->matches = $matches;
    }

    /**
     * @return bool
     */
    public function getMatches(): bool
    {
        return $this->matches;
    }
}
