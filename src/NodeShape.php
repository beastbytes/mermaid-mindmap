<?php

declare(strict_types=1);

namespace BeastBytes\Mermaid\Mindmap;

enum NodeShape: string
{
    case bang = '))%s((';
    case circle = '((%s))';
    case cloud = ')%s(';
    case hexagon = '{{%s}}';
    case rectangle = '[%s]';
    case rounded = '(%s)';
}