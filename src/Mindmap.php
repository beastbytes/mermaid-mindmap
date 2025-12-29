<?php

declare(strict_types=1);

namespace BeastBytes\Mermaid\Mindmap;

use BeastBytes\Mermaid\CommentTrait;
use BeastBytes\Mermaid\Diagram;
use BeastBytes\Mermaid\Mermaid;

final class Mindmap extends Diagram
{
    use CommentTrait;

    private Node $root;

    private const string TYPE = 'mindmap';

    public function withRoot(Node $root): self
    {
        $new = clone $this;
        $new->root = $root;
        return $new;
    }

    protected function renderDiagram(): string
    {
        $output = [];

        $output[] = $this->renderComment('');
        $output[] = self::TYPE;
        $output[] = $this
            ->root
            ->render(Mermaid::INDENTATION)
        ;

        return implode("\n", array_filter($output, fn($v) => !empty($v)));
    }
}