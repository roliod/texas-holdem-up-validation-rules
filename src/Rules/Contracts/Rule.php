<?php
declare(strict_types=1);

namespace Roliod\TexasHUPoker\Rules\Contracts;

use Roliod\TexasHUPoker\Deck\VOs\Hand as HandVO;
use Roliod\TexasHUPoker\Rules\VOs\RuleResponse as RuleResponseVO;

interface Rule
{
    /**
     * @param HandVO $handVO
     *
     * @return RuleResponseVO
     */
    public function validate(HandVO $handVO): RuleResponseVO;
}
