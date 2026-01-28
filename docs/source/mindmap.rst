Mindmap Class
=============

.. php:class:: Mindmap

    Represents a Mindmap diagram

    .. php:method:: render(array $attributes = [])

        Renders the diagram

        :param array $attributes: HTML attributes for the <pre> tag as name=>value pairs

            .. note:: The *mermaid* class is added

        :returns: Mermaid diagram code in a <pre> tag
        :rtype: string

    .. php:method:: withComment(string $comment)

        Adds a comment to the mindmap

        :param string $comment: The comment
        :returns: A new instance of ``Mindmap`` with a comment
        :rtype: Mindmap

    .. php:method:: withRootNode(Node $root)

        Sets the mindmap root node

        :param Node $root: The root node
        :returns: A new instance of ``Mindmap`` with a root node
        :rtype: Mindmap
