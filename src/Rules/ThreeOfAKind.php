<?php
declare(strict_types=1);

namespace Roliod\TexasHUPoker\Rules;

use Roliod\TexasHUPoker\Deck\VOs\Hand as HandVO;
use Roliod\TexasHUPoker\Rules\VOs\RuleResponse as RuleResponseVO;

class ThreeOfAKind extends AbstractRule
{
    /**
     * @const int
     */
    private const RANK = 7;

    /**
     * {@inheritDoc}
     */
    public function validate(HandVO $handVO): RuleResponseVO
    {
        $sequence = $handVO->getSequence();
        $isThreeAKind = $this->isThreeOfAKind($sequence);

        return $this->buildRuleResponse(
            $sequence,
            self::RANK,
            $isThreeAKind
        );
    }

    /**
     * @param string $sequence
     *
     * @return bool
     */
    private function isThreeOfAKind(string $sequence): bool
    {
        $ranks = $this->getRanksFromSequence($sequence);
        $rankOccurrences = array_count_values($ranks);

        foreach ($rankOccurrences as $rank => $occurrence) {
            if ($occurrence === 3) {
                return true;
            }
        }

        return false;
    }
}
