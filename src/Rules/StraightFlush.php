<?php
//declare(strict_types=1);
//
//namespace Roliod\TexasHUPoker\Rules;
//
//use Roliod\TexasHUPoker\Deck\Entities\Hand as HandEntity;
//use Roliod\TexasHUPoker\Rules\Entities\RuleResponse as RuleResponseEntity;
//
//class StraightFlush extends AbstractRule
//{
//    /**
//     * @const int
//     */
//    private const RANK = 2;
//
//    /**
//     * @param HandEntity $handEntity
//     *
//     * @return RuleResponseEntity
//     */
//    public function validate(HandEntity $handEntity): RuleResponseEntity
//    {
//        $sequence = $handEntity->getSequence();
//        $isStraightFlush = $this->isStraightFlush($sequence);
//
//        return $this->buildRuleResponse(
//            $sequence,
//            self::RANK,
//            $isStraightFlush
//        );
//    }
//
//    /**
//     * @param string $sequence
//     *
//     * @return bool
//     */
//    private function isStraightFlush(string $sequence): bool
//    {
//        $sequenceToArray = explode(' ', $sequence);
//
//        $suits = [];
//        foreach ($sequenceToArray as $card) {
//            $suits[] = substr($card, -1);
//        }
//
//        return count(array_unique($suits)) === 1;
//    }
//}
