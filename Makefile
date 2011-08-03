# http://gcc.gnu.org/onlinedocs/gcc-3.4.6/gnat_ugn_unw/Automatically-Creating-a-List-of-Directories.html
ROOT_DIRECTORY := .
SUBDIRS := ${shell find ${ROOT_DIRECTORY} -mindepth 1 -type d -print | grep -v .svn}

# Single-threaded mode (default):
.PHONY: all
all:
	pear run-tests -r

# Multi-threaded mode:
.PHONY: fast
fast: $(SUBDIRS)

.PHONY: $(SUBDIRS)
$(SUBDIRS):
	pear run-tests $@

