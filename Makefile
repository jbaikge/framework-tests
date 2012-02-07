# http://gcc.gnu.org/onlinedocs/gcc-3.4.6/gnat_ugn_unw/Automatically-Creating-a-List-of-Directories.html
ROOT_DIRECTORY := .
SUBDIRS := ${shell find ${ROOT_DIRECTORY} -mindepth 1 -type d -print | grep -v .svn}

# Single-threaded mode (default):
.PHONY: all
all: clean
	pear run-tests --recur --coverage
	php generate_coverage.php
	find -name '*.xdebug' | xargs rm

# Multi-threaded mode:
.PHONY: fast
fast: $(SUBDIRS)
	@echo FAILED TESTS:
	@find -name '*.log' | sed 's/\.log/.phpt/'
	php generate_coverage.php
	@find -name '*.xdebug' | xargs rm

.PHONY: $(SUBDIRS)
$(SUBDIRS):
	pear run-tests --coverage $@

.PHONY: coverage
coverage:
	php generate_coverage.php
	find -name '*.xdebug' | xargs rm

.PHONY: clean
clean:
	rm -rf /tmp/framework-cache
	rm -rf uploads/