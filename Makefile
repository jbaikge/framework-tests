# http://gcc.gnu.org/onlinedocs/gcc-3.4.6/gnat_ugn_unw/Automatically-Creating-a-List-of-Directories.html
ROOT_DIRECTORY := .
SUBDIRS := ${shell find ${ROOT_DIRECTORY} -mindepth 1 -type d -print | grep -v .svn}

.PHONY: coverage
coverage:
	php generate_coverage.php

# Single-threaded mode (default):
.PHONY: all
all:
	pear run-tests --recur --coverage
	php generate_coverage.php

# Multi-threaded mode:
.PHONY: fast
fast: $(SUBDIRS) coverage

.PHONY: $(SUBDIRS)
$(SUBDIRS):
	pear run-tests --coverage $@
