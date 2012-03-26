# http://gcc.gnu.org/onlinedocs/gcc-3.4.6/gnat_ugn_unw/Automatically-Creating-a-List-of-Directories.html
ROOT_DIRECTORY := .
CACHE_DIRECTORY := .cache
SUBDIRS := ${shell find ${ROOT_DIRECTORY} -mindepth 1 -type d -print | grep -v ${CACHE_DIRECTORY} | grep -v .svn}
CACHE_DIRS := $(addprefix ${CACHE_DIRECTORY}/,${SUBDIRS})
PHPT := $(foreach DIR,$(SUBDIRS),$(wildcard $(DIR)/*.phpt))
CACHE_SUCCESS := $(patsubst %.phpt,${CACHE_DIRECTORY}/%.cache,${PHPT})

.PHONY: all
all: $(CACHE_SUCCESS)
	@find ${CACHE_DIRECTORY} -type f -name '*.cache' | xargs cat | sort | uniq -c

# Single-threaded mode (default):
.PHONY: pear
pear: coverage
	pear run-tests --recur --coverage
	php clean_database.php

.PHONY: coverage
coverage:
	php generate_coverage.php
	find -name '*.xdebug' | xargs rm
	php clean_database.php

.PHONY: clean
clean:
	rm -rf /tmp/framework-cache
	rm -rf uploads/
	rm -rf .cache

.SECONDEXPANSION:
.cache/%.cache: %.phpt | $$(@D)
	@pear run-tests $< | grep '^1' | sed 's/1 \| TESTS\|://g' > $@
	@printf '%7s | %s\n' "$$(cat $@ | grep -v PASSED)" "$$(basename $<)"
	@if [ $$(cat $@ | grep FAILED) ]; then rm $@; fi

$(CACHE_DIRS):
	mkdir -p $@
