<?php
declare(strict_types=1);

namespace Roliod\TexasHUPoker\Rules\VOs;

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
    private $sequence;

    /**
     * @param string $sequence
     * @param int    $rank
     * @param bool   $matches
     */
    public function __construct(
        string $sequence,
        int $rank,
        bool $matches = false
    ) {
        $this->sequence = $sequence;
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
     * @param string $sequence
     */
    public function setSequence(string $sequence): void
    {
        $this->sequence = $sequence;
    }

    /**
     * @return string
     */
    public function getSequence(): string
    {
        return $this->sequence;
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
