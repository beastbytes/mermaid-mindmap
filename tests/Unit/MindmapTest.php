<?php

use BeastBytes\Mermaid\Mermaid;
use BeastBytes\Mermaid\Mindmap\Mindmap;
use BeastBytes\Mermaid\Mindmap\Node;
use BeastBytes\Mermaid\Mindmap\NodeShape;

defined('COMMENT') or define('COMMENT', 'Comment');

test('Mindmap test', function () {
    expect(Mermaid::create(Mindmap::class)
        ->withRoot((new Node('root', NodeShape::circle))
            ->withText('mindmap')
            ->withNode(
                (new Node('Origins'))
                    ->withNode(
                        new Node('Long history'),
                        (new Node('Popularisation'))
                            ->withNode(new Node(id: 'British popular psychology author Tony Buzan'))
                    )
                ->withComment(COMMENT)
                ,
                (new Node(id: 'Research'))
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
        )
            ->withComment(COMMENT)
            ->render()
    )
        ->toBe(<<<EXPECTED
<pre class="mermaid">
%% Comment
mindmap
  root((&quot;mindmap&quot;))
    %% Comment
    Origins
      Long history
      Popularisation
        British popular psychology author Tony Buzan
    Research
      On effectiveness&lt;br/&gt;and features
      On Automatic creation
        Uses
          Creative techniques
          Strategic planning
          Argument mapping
    Tools
      Pen and paper
      Mermaid
</pre>
EXPECTED
    );
});