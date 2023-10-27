<?php

namespace BusinessGazeta\AdfoxApi\Enum;

enum ActionEnum: string
{
    case ADD = 'add';
    case LIST = 'list';
    case MODIFY = 'modify';
    case UPDATE = 'update';
    case DELETE = 'delete';
}
