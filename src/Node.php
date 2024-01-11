<?php
/**
 * @copyright Copyright © 2024 BeastBytes - All rights reserved
 * @license BSD 3-Clause
 */

declare(strict_types=1);

namespace BeastBytes\Mermaid\Mindmap;

use BeastBytes\Mermaid\RenderItemsTrait;
use BeastBytes\Mermaid\StyleClassTrait;
use BeastBytes\Mermaid\TextTrait;

final class Node
{
    use RenderItemsTrait;
    use StyleClassTrait;
    use TextTrait;

    /** @psalm-var list<Node> $nodes  */
    private array $nodes = [];

    public function __construct(
        private readonly string $id,
        private readonly ?NodeShape $shape = null,
        private string $text = '',
        private readonly bool $isMarkdown = false
    )
    {
        if ($this->text === '') {
            $this->text = $this->id;
        }
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

        $output[] = $indentation
            . $this->id
            . $this->getStyleClass()
            . ($this->shape === null ? '' : str_replace('%s', $this->getText(), $this->shape->value))
        ;

        if (count($this->nodes) > 0) {
            $output[] = $this->renderItems($this->nodes, $indentation);
        }

        return implode("\n", $output);
    }
}
