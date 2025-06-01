<?php

declare(strict_types=1);

namespace SKukunin\PHPStanRules\Rules;

use PhpParser\Node;
use PHPStan\Analyser\Scope;
use PHPStan\Rules\Rule;
use PHPStan\Rules\RuleErrorBuilder;

final class NoErrorSilencingRule implements Rule
{
    public function getNodeType(): string
    {
        return Node\Expr\ErrorSuppress::class;
    }

    public function processNode(Node $node, Scope $scope): array
    {
        return [
            RuleErrorBuilder::message(
                'You should not use silencing operator (@)'
            )->build(),
        ];
    }
}
