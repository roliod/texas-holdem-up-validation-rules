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
     * @var string
     */
    private $evaluatedDeckStoragePath;

    /**
     * @param string $deckFilePath
     * @param string $evaluatedDeckStoragePath
     */
    public function __construct(
        string $deckFilePath,
        string $evaluatedDeckStoragePath
    ) {
        $this->deckFilePath = $deckFilePath;
        $this->evaluatedDeckStoragePath = $evaluatedDeckStoragePath;
    }

    public function rank()
    {

    }
}
