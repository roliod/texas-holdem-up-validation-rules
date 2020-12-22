<?php
declare(strict_types=1);

namespace Roliod\TexasHUPoker\Rules;

use Roliod\TexasHUPoker\Deck\VOs\Hand as HandVO;
use Roliod\TexasHUPoker\Rules\VOs\RuleResponse as RuleResponseVO;

class FourOfAKind extends AbstractRule
{
    /**
     * @const int
     */
    private const RANK = 3;

    /**
     * {@inheritDoc}
     */
    public function validate(HandVO $handVO): RuleResponseVO
    {
        $sequence = $handVO->getSequence();
        $isFourAKind = $this->isFourOfAKind($sequence);

        return $this->buildRuleResponse(
            $sequence,
            self::RANK,
            $isFourAKind
        );
    }

    /**
     * @param string $sequence
     *
     * @return bool
     */
    private function isFourOfAKind(string $sequence): bool
    {
        $ranks = $this->getRanksFromSequence($sequence);
        $rankOccurrences = array_count_values($ranks);

        foreach ($rankOccurrences as $rank => $occurrence) {
            if ($occurrence === 4) {
                return true;
            }
        }

        return false;
    }
}
