# Help
TARGETS:=$(MAKEFILE_LIST)

.PHONY: help
help: ## This help
	@grep -E '^[a-zA-Z_-]+:.*?## .*$$' $(TARGETS) | sort | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[36m%-30s\033[0m %s\n", $$1, $$2}'

.PHONY: unit
unit: ## Runs unit tests
	vendor/bin/phpunit tests

.PHONY: static
static: ## Runs static analysis
	vendor/bin/phpstan analyse src tests

.PHONY: cs-fix
cs-fix: ## Runs Codestyle Fixer
	vendor/bin/php-cs-fixer fix
