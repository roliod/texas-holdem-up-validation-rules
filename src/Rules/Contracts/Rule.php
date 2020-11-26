<?php
declare(strict_types=1);

namespace Roliod\TexasHUPoker\Rules\Contracts;

use Roliod\TexasHUPoker\Rules\Entities\RuleResponse as RuleResponseEntity;

interface Rule
{
    /**
     * @return RuleResponseEntity
     */
    public function check(): RuleResponseEntity;
}
