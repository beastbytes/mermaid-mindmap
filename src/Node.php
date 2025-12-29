<?php

declare(strict_types=1);

namespace BeastBytes\Mermaid\Mindmap;

use BeastBytes\Mermaid\CommentTrait;
use BeastBytes\Mermaid\IconTrait;
use BeastBytes\Mermaid\IdTrait;
use BeastBytes\Mermaid\RenderItemsTrait;
use BeastBytes\Mermaid\StyleClassTrait;
use BeastBytes\Mermaid\TextTrait;

final class Node
{
    use CommentTrait;
    use IconTrait;
    use IdTrait;
    use RenderItemsTrait;
    use StyleClassTrait;
    use TextTrait;

    /** @psalm-var list<Node> $nodes  */
    private array $nodes = [];

    public function __construct(
        ?string $id = null,
        private readonly ?NodeShape $shape = null,
    )
    {
        $this->id = $id;
    }

    public function addNode(Node ...$node): self
    {
        $new = clone $this;
        $new->nodes = array_merge($new->nodes, $node);
        return $new;
    }

    public function withNode(Node ...$node): self
    {
        $new = clone $this;
        $new->nodes = $node;
        return $new;
    }

    /** @internal */
    public function render(string $indentation): string
    {
        $output = [];

        if ($this->text === null) {
            $this->text = $this->id;
        }

        $output[] = $this->renderComment($indentation);
        $output[] = $indentation
            . $this->getId()
            . $this->getStyleClass()
            . $this->renderIcon()
            . ($this->shape instanceof NodeShape
                ? str_replace('%s', $this->getText(true), $this->shape->value)
                : ''
            )
        ;

        $output[] = $this->renderItems($this->nodes, $indentation);

        return implode("\n", array_filter($output, fn($v) => !empty($v)));
    }
}