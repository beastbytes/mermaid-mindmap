<?php

use BeastBytes\Mermaid\Mindmap\Mindmap;
use BeastBytes\Mermaid\Mindmap\Node;
use BeastBytes\Mermaid\Mindmap\NodeShape;

defined('COMMENT') or define('COMMENT', 'comment');

test('Mindmap test', function () {
    expect(
        (new Mindmap(
            (new Node('root', NodeShape::Circle))
                ->withText('mindmap')
                ->withNode(
                    (new Node('Origins'))
                        ->withNode(
                            new Node('Long history'),
                            (new Node('Popularisation'))
                                ->withNode(new Node('British popular psychology author Tony Buzan'))
                        )
                    ->withComment(COMMENT)
                    ,
                    (new Node('Research'))
                        ->withNode(
                            new Node('On effectiveness<br/>and features'),
                            (new Node('On Automatic creation'))
                                ->withNode(
                                    (new Node('Uses'))
                                        ->withNode(
                                            new Node('Creative techniques'),
                                            new Node('Strategic planning'),
                                            new Node('Argument mapping'),
                                        )
                                )
                        )
                    ,
                )
                ->addNode(
                    (new Node('Tools'))
                        ->withNode(
                            new Node('Pen and paper'),
                            new Node('Mermaid')
                        )
                    ,
                )
        ))
            ->withComment(COMMENT)
            ->render()
    )
        ->toBe("<pre class=\"mermaid\">\n"
            . '%% ' . COMMENT . "\n"
            . "mindmap\n"
            . "  root((&quot;mindmap&quot;))\n"
            . '    %% ' . COMMENT . "\n"
            . "    Origins\n"
            . "      Long history\n"
            . "      Popularisation\n"
            . "        British popular psychology author Tony Buzan\n"
            . "    Research\n"
            . "      On effectiveness&lt;br/&gt;and features\n"
            . "      On Automatic creation\n"
            . "        Uses\n"
            . "          Creative techniques\n"
            . "          Strategic planning\n"
            . "          Argument mapping\n"
            . "    Tools\n"
            . "      Pen and paper\n"
            . "      Mermaid\n"
            . '</pre>'
    );
});
