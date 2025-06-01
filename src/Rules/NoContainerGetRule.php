<?php

declare(strict_types=1);

namespace SKukunin\PHPStanRules\Rules;

use PhpParser\Node;
use PhpParser\Node\Expr\MethodCall;
use PhpParser\Node\Identifier;
use PHPStan\Analyser\Scope;
use PHPStan\Rules\Rule;
use PHPStan\Rules\RuleErrorBuilder;
use PHPStan\Type\ObjectType;
use Symfony\Component\DependencyInjection\ContainerInterface;

final class NoContainerGetRule implements Rule
{
    public function getNodeType(): string
    {
        return MethodCall::class;
    }

    public function processNode(Node $node, Scope $scope): array
    {
        $objectType = $scope->getType($node->var);
        $containerType = new ObjectType(ContainerInterface::class);

        if (!$objectType->isSuperTypeOf($containerType)->yes()) {
            return [];
        }

        if (!$node->name instanceof Identifier) {
            return [];
        }

        if ('get' !== $node->name->name) {
            return [];
        }

        return [
            RuleErrorBuilder::message(
                'Don\'t use the container as a service locator'
            )->build(),
        ];
    }
}
