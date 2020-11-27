<?php
declare(strict_types=1);

namespace Roliod\TexasHUPoker;

use Exception;
use Roliod\TexasHUPoker\Deck\Suite;
use Roliod\TexasHUPoker\Rules\Contracts\Rule as RuleContract;
use Roliod\TexasHUPoker\Deck\Factories\Entity as EntityFactory;
use Roliod\TexasHUPoker\Exceptions\FileDoesNotExist as FileDoesNotExistException;
use Roliod\TexasHUPoker\Exceptions\InvalidFileContent as InvalidFileContentException;

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
     * @throws FileDoesNotExistException|InvalidFileContentException
     */
    public function rank(): string
    {
        try {
            $fileContent = file_get_contents($this->deckFilePath);
        } catch (Exception $e) {
            throw new FileDoesNotExistException($e->getMessage());
        }

        $validator = Validator::create($fileContent);
        if (!$validator->isValid()) {
            throw new InvalidFileContentException(
                $validator->error() ?? 'Unknown Error'
            );
        }

        $hands = explode(PHP_EOL, $fileContent);
        $convertedHands = $this->convertUnicodeSuiteCharactersToSuiteString($hands);
        $reordersHands = $this->convertSuiteStringToUnicodeSuite(
            $this->reorderBasedOnHierarchy($convertedHands)
        );

        return implode("\n", $reordersHands);
    }

    /**
     * @param array $hands
     *
     * @return array
     */
    private function convertUnicodeSuiteCharactersToSuiteString(array $hands): array
    {
        foreach ($hands as $key => $hand) {
            foreach (Suite::UNICODE_TO_STRING as $unicode => $string) {
                $hand = str_replace($unicode, $string, $hand);
            }

            $hands[$key] = $hand;
        }

        return $hands;
    }

    /**
     * @param array $hands
     *
     * @return array
     */
    private function reorderBasedOnHierarchy(array $hands): array
    {
        $deckHierarchy = [];
        foreach ($hands as $hand) {
            $hand = EntityFactory::buildHandEntity($hand);

            foreach (Config::RULES as $rule) {
                /** @var RuleContract $rule */
                $rule = new $rule();
                $response = $rule->validate($hand);

                if ($response->getMatches()) {
                    $deckHierarchy[$response->getRank()][] = $response->getSequence();
                    continue 2;
                }
            }
        }

        ksort($deckHierarchy);
        return $this->flattenDeckHierarchy(
            $deckHierarchy
        );
    }

    /**
     * @param array $deckHierarchy
     *
     * @return array
     */
    private function flattenDeckHierarchy(array $deckHierarchy): array
    {
        $flattenedHierarchy = [];
        foreach ($deckHierarchy as $hierarchy) {
            foreach ($hierarchy as $hand) {
                $flattenedHierarchy[] = $hand;
            }
        }

        return $flattenedHierarchy;
    }

    /**
     * @param array $hands
     *
     * @return array
     */
    private function convertSuiteStringToUnicodeSuite(array $hands): array
    {
        $stringToUnicodeSuiteMapping = array_flip(Suite::UNICODE_TO_STRING);
        foreach ($hands as $key => $hand) {
            foreach ($stringToUnicodeSuiteMapping as $string => $unicode) {
                $hand = str_replace($string, $unicode, $hand);
            }

            $hands[$key] = $hand;
        }

        return $hands;
    }
}
