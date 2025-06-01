<?php

declare(strict_types=1);

namespace SKukunin\PHPStanRules\Tests;

use PHPStan\Rules\Rule;
use PHPStan\Testing\RuleTestCase;
use SKukunin\PHPStanRules\Rules\NoErrorSilencingRule;

class NoErrorSilencingRuleTest extends RuleTestCase
{
    public function testRule(): void
    {
        $this->analyse(
            [__DIR__.'/Fixtures/error_silencing.php'],
            [
                [
                    'You should not use silencing operator (@)',
                    5,
                ],
            ]
        );
    }

    protected function getRule(): Rule
    {
        return new NoErrorSilencingRule();
    }
}
