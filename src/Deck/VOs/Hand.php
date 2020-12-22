<?php
declare(strict_types=1);

namespace Roliod\TexasHUPoker\Deck\VOs;

class Hand
{
    /**
     * @var string
     */
    private $sequence;

    /**
     * @param string $sequence
     */
    public function __construct(string $sequence)
    {
        $this->sequence = $sequence;
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
}
