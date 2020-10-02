<?php


namespace App\Models;

abstract class CheckStatus
{
    const NOT_CHECKED = 'not checked';
    const SUCCESS = 'success';
    const WARNING = 'warning';
    const FAILED = 'failed';
}
