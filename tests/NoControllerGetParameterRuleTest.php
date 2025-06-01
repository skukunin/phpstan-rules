<?php

declare(strict_types=1);

namespace SKukunin\PHPStanRules\Tests;

use PHPStan\Rules\Rule;
use PHPStan\Testing\RuleTestCase;
use SKukunin\PHPStanRules\Rules\NoControllerGetParameterRule;

class NoControllerGetParameterRuleTest extends RuleTestCase
{
    public function testSkipMethodIsNotGet(): void
    {
        $this->analyse(
            [__DIR__.'/Fixtures/skip_method_is_not_get_parameter.php'],
            [
                // expect no errors
            ]
        );
    }

    public function testRule(): void
    {
        $this->analyse(
            [__DIR__.'/Fixtures/method_call_to_get_parameter.php'],
            [
                [
                    'Don\'t use the method \'getParameter\' in controller.',
                    9,
                ],
            ]
        );
    }

    protected function getRule(): Rule
    {
        return new NoControllerGetParameterRule();
    }
}
