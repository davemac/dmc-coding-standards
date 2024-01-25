
# DMC Web Coding Standards

PHPCS ruleset for DMC Web

## Installation

To use this standard in a project, declare it as a dependency.

You will need to manually add this to your project's composer.json file as part of the `require` and `repositories` property:

```bash
composer install
```

## Using PHPCS

To use this standard with `phpcs` directly from your command line, use the command:

```bash
vendor/bin/phpcs --standard=DMC .

# or if you have a custom phpcs.xml in your project...
vendor/bin/phpcs --standard=phpcs.xml .
```

Alternatively, you can run this a composer script, which will automatically reference the correct version of `phpcs` and the dependent standards.

```bash
composer lint
composer phpcs
```

## Extending the ruleset

You can create a custom ruleset for your project that extends or customizes these rules by creating your own `phpcs.xml` file in your project, which references these rules, like this:

```xml
<?xml version="1.0"?>
<ruleset>
  <description>Example project ruleset</description>

  <!-- Files or directories to check -->
  <file>.</file>

  <!-- Set a minimum PHP version for PHPCompatibility -->
  <config name="testVersion" value="8.1-" />

  	<!-- Include DMC Coding Standards -->
    <rule ref="./coding-standards/ruleset.xml">

  <!-- Include WordPress VIP Ruleset -->
  <rule ref="WordPress-VIP-Go" />
</ruleset>
```

### Customising/Disabling Checks

You can also customise the rule to exclude elements if they aren't applicable to the project:

```xml
<rule ref="./coding-standards/ruleset.xml">
	<!-- Disable cyclomatic complexity checks -->
	<exclude name="Generic.Metrics.CyclomaticComplexity" />
</rule>
```

### WordPress VIP

As not all sites require the WordPress VIP ruleset, it is included by default, but has been modified for use cross-projects.

To include the entire ruleset on a VIP project, simply add the ruleset to your project's custom `phpcs.xml` file, AFTER the TCC ruleset:

```xml
  <!-- Include WordPress VIP Ruleset -->
  <rule ref="WordPress-VIP-Go" />
```
