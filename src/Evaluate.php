<?php
declare(strict_types=1);

namespace Roliod\TexasHUPoker;

class Evaluate
{
    /**
     * @var string
     */
    private $deckFilePath;

    /**
     * @param string $deckFilePath
     */
    public function __construct(
        string $deckFilePath
    ) {
        $this->deckFilePath = $deckFilePath;
    }

    /**
     * @return string
     */
    public function rank(): string
    {

    }
}
