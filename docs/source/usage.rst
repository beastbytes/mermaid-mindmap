Usage
=====

Mindmap allows the creation of mindmap diagrams.

The mindmap's key concept is represented by a root ``Node`` instance.

Child nodes are added to the root node to represent associated ideas.
The child nodes can have nodes added, and so on. Nodes can be  nested to any level.

The root node is added to the ``Mindmap`` instance, which is then rendered.

Example
-------

PHP
+++

.. code-block:: php

    echo Mermaid::create(Mindmap::class)
        ->withRoot((new Node('root', NodeShape::circle))
            ->withText('mindmap')
            ->withNode(
                (new Node('Origins'))
                    ->withNode(
                        new Node('Long history'),
                        (new Node('Popularisation'))
                            ->withNode(new Node(id: 'British popular psychology author Tony Buzan'))
                    )
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
            ->render()
        ;

Generated Mermaid
+++++++++++++++++

::

    <pre class="mermaid">
    mindmap
      root(("mindmap"))
        Origins
          Long history
          Popularisation
            British popular psychology author Tony Buzan
        Research
          On effectiveness<br/>and features
          On Automatic creation
            Uses
              Creative techniques
              Strategic planning
              Argument mapping
        Tools
          Pen and paper
          Mermaid
    </pre>

Mermaid Diagram
+++++++++++++++

.. mermaid::

    mindmap
      root(("mindmap"))
        Origins
          Long history
          Popularisation
            British popular psychology author Tony Buzan
        Research
          On effectiveness<br/>and features
          On Automatic creation
            Uses
              Creative techniques
              Strategic planning
              Argument mapping
        Tools
          Pen and paper
          Mermaid