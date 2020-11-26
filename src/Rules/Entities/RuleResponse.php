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
    private $isValid;

    /**
     * @param int  $rank
     * @param bool $isValid
     */
    public function __construct(
        int $rank,
        bool $isValid = true
    ) {
        $this->rank = $rank;
        $this->isValid = $isValid;
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
     * @param bool $isValid
     */
    public function setIsValid(bool $isValid): void
    {
        $this->isValid = $isValid;
    }

    /**
     * @return bool
     */
    public function getIsValid(): bool
    {
        return $this->isValid;
    }
}
