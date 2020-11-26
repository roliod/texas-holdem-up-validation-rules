<?php
declare(strict_types=1);

namespace Roliod\TexasHUPoker\Rules;

use Roliod\TexasHUPoker\Rules\Contracts\Rule as RuleContract;
use Roliod\TexasHUPoker\Rules\Entities\RuleResponse as RuleResponseEntity;

class TwoPair implements RuleContract
{
    /**
     * @return RuleResponseEntity
     */
    public function validate(): RuleResponseEntity
    {

    }
}
