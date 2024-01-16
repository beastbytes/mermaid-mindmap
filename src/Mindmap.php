<?php
/**
 * @copyright Copyright © 2024 BeastBytes - All rights reserved
 * @license BSD 3-Clause
 */

declare(strict_types=1);

namespace BeastBytes\Mermaid\Mindmap;

use BeastBytes\Mermaid\CommentTrait;
use BeastBytes\Mermaid\Mermaid;
use BeastBytes\Mermaid\MermaidInterface;
use Stringable;

final class Mindmap implements MermaidInterface, Stringable
{
    use CommentTrait;

    private const TYPE = 'mindmap';

    public function __construct(private readonly Node $root)
    {
    }

    public function __toString(): string
    {
        return $this->render();
    }

    public function render(): string
    {
        $output = [];

        $this->renderComment('', $output);
        $output[] = self::TYPE;
        $output[] = $this
            ->root
            ->render(Mermaid::INDENTATION)
        ;

        return Mermaid::render($output);
    }
}
