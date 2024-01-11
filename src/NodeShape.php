<?php
/**
 * @copyright Copyright © 2024 BeastBytes - All rights reserved
 * @license BSD 3-Clause
 */

declare(strict_types=1);

namespace BeastBytes\Mermaid\Mindmap;

enum NodeShape: string
{
    case Bang = '))%s((';
    case Circle = '((%s))';
    case Cloud = ')%s(';
    case Rectangle = '[%s]';
    case Hexagon = '{{%s}}';
    case Rounded = '(%s)';
}
