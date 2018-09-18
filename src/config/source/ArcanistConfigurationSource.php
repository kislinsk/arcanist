<?php

abstract class ArcanistConfigurationSource
  extends Phobject {

  abstract public function getSourceDisplayName();
  abstract public function getAllKeys();
  abstract public function hasValueForKey($key);
  abstract public function getValueForKey($key);

  public function isStringSource() {
    return false;
  }

  public function didReadUnknownOption($key) {
    // TOOLSETS: Standardize this kind of messaging? On ArcanistRuntime?

    fprintf(
      STDERR,
      tsprintf(
        "<bg:yellow>** %s **</bg> %s\n",
        pht('WARNING'),
        pht(
          'Ignoring unrecognized configuration option ("%s") from source: %s.',
          $key,
          $this->getSourceDisplayName())));
  }

}