<?php

declare(strict_types=1);

namespace SKukunin\PHPStanRules\Tests;

use PHPStan\Rules\Rule;
use PHPStan\Testing\RuleTestCase;
use SKukunin\PHPStanRules\Rules\NoContainerGetRule;

class NoContainerGetRuleTest extends RuleTestCase
{
    public function testSkipMethodIsNotGet(): void
    {
        $this->analyse(
            [__DIR__.'/Fixtures/skip_method_is_not_get.php'],
            [
                // expect no errors
            ]
        );
    }

    public function testSkipObjectIsNoContainerInterface(): void
    {
        $this->analyse(
            [__DIR__.'/Fixtures/skip_object_is_no_container_interface.php'],
            [
                // expect no errors
            ]
        );
    }

    public function testRule(): void
    {
        $this->analyse(
            [__DIR__.'/Fixtures/method_call_to_container_get.php'],
            [
                [
                    'Don\'t use the container as a service locator',
                    8,
                ],
            ]
        );
    }

    protected function getRule(): Rule
    {
        return new NoContainerGetRule();
    }
}
