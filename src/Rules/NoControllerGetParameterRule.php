<?php

declare(strict_types=1);

namespace SKukunin\PHPStanRules\Rules;

use PhpParser\Node;
use PhpParser\Node\Expr\MethodCall;
use PHPStan\Analyser\Scope;
use PHPStan\Rules\Rule;
use PHPStan\Rules\RuleErrorBuilder;
use PHPStan\Type\ObjectType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

final class NoControllerGetParameterRule implements Rule
{
    public function getNodeType(): string
    {
        return MethodCall::class;
    }

    public function processNode(Node $node, Scope $scope): array
    {
        $objectType = $scope->getType($node->var);
        $controllerType = new ObjectType(AbstractController::class);

        if ($objectType->isSuperTypeOf($controllerType)->no()) {
            return [];
        }

        if ('getParameter' !== $node->name->name) {
            return [];
        }

        return [
            RuleErrorBuilder::message(
                'Don\'t use the method \'getParameter\' in controller.'
            )->build(),
        ];
    }
}
