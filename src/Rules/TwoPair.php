<?php
declare(strict_types=1);

namespace Roliod\TexasHUPoker\Rules;

use Roliod\TexasHUPoker\Deck\Entities\Hand as HandEntity;
use Roliod\TexasHUPoker\Rules\Contracts\Rule as RuleContract;
use Roliod\TexasHUPoker\Rules\Entities\RuleResponse as RuleResponseEntity;

class TwoPair implements RuleContract
{
    /**
     * @const int
     */
    private const RANK = 8;

    /**
     * {@inheritDoc}
     */
    public function validate(HandEntity $handEntity): RuleResponseEntity
    {
//        die(print_r($handEntity));
    }
}
