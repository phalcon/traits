help:                                                      # shows this help
	@awk 'BEGIN {FS = ":.*?# "} /^[a-zA-Z_\-\.]+:.*?# / {printf "\033[36m%-30s\033[0m %s\n", $$1, $$2}' $(MAKEFILE_LIST)

install:                                                   # Run composer install
	composer install

code-standard:                                             # PHP Code Sniffer
	./vendor/bin/phpcs --basepath=. --standard=config/phpcs.xml

code-standard-fix:                                         # PHP Code Fixer
	./vendor/bin/phpcbf --basepath=. --standard=config/phpcs.xml

static-analysis:                                           # Static Analysis
	./vendor/bin/psalm -c config/psalm.xml --show-info=true --no-cache

type-coverage:                                             # Static Analysis type coverage
	./vendor/bin/psalm -c config/psalm.xml --shepherd --stats

security-analysis:                                         # Static Analysis security coverage
	./vendor/bin/psalm -c config/psalm.xml --taint-analysis

test-suite:                                                # Run test suite
	./vendor/bin/codecept run

code-coverage:                                             # Run test suite with code coverage
	./vendor/bin/codecept run --coverage --coverage-html
