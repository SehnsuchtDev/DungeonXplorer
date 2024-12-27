<?php

namespace dungeonxplorer\exceptions;

class NotMagicHeroException extends \Exception
{
    public function __construct()
    {
        parent::__construct("This hero is not a magic hero");
    }

}