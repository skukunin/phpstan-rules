# PHPStan Rules Library

This library provides a collection of custom PHPStan rules to help you enforce best practices in your PHP projects. It includes rules that will catch common anti-patterns and misuses, such as using deprecated methods, misusing container methods, and error silencing practices.

## How to Use

1. **Installation**: Install this library via Composer:
```bash
composer require skukunin/phpstan-rules --dev
```

2. **Configuration**: Register the custom rules in your PHPStan configuration file (e.g., `phpstan.neon` or `extension.neon`).

You can add all the rules in your PHPStan configuration file:
```neon
includes:
    - phpstan-baseline.neon
    - vendor/skukunin/phpstan-rules/extension.neon
parameters:
    level: 6
...

```
or add only needed rules:

```neon
rules:
    - SKukunin\PHPStanRules\Rules\NoControllerGetParameterRule

```

3. **Running PHPStan**: Run PHPStan on your project to report any detected issues:
```bash
vendor/bin/phpstan analyse src tests
```

## Use Cases

- **Symfony Projects**: This library is designed with Symfony projects in mind. It provides rules to enforce best practices such as avoiding the use of `getParameter` in controllers, encouraging better dependency injection practices.
- **Legacy Codebases**: Gradually refactor and improve legacy code by integrating these rules to catch common pitfalls.
- **CI/CD Integration**: Ensure code quality across your projects by integrating these custom PHPStan rules into your automated build pipelines.

## Existing Rules

- `NoContainerGetRule`: Prevents misuse of container get methods.
- `NoControllerGetParameterRule`: Flags the usage of `getParameter` within controllers.
- `NoErrorSilencingRule`: Disallows use of PHP's error suppression operator (@).

## Contributing

Contributions are welcome! If you encounter issues or have ideas for enhancements, please open an issue or submit a pull request on GitHub.

## License

This project is licensed under the MIT License.
