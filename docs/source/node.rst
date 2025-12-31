Node Class
==========

.. php:class:: Node

  Represents a node in Mindmap diagram.

  .. php:method:: __construct(?string $id = null, ?NodeShape $shape = null)

    :param ?string $id: The node id (default: auto-generate the node ID)
    :param ?NodeShape $shape: The node shape - see :doc:`node-shape` for available shapes  (default: default shape)
    :return: A new instance of ``Node``
    :rtype: Node


  .. php:method:: addNode(Node ...$node)

    Add additional child node(s) to the node

    :param Node ...$node: Node(s)
    :return: A new instance of ``Node`` with the node(s) added to the existing child nodes
    :rtype: Node


  .. php:method:: withComment(string $comment)

    Add a comment to the node

    :param string $comment: The comment
    :return: A new instance of ``Node`` with a comment
    :rtype: Node


  .. php:method:: withIcon(string $icon)

    Add an icon to the node (https://mermaid.js.org/syntax/mindmap.html#icons)

    The icon pack must be available on the page rendering the diagram

    :param string $icon: The icon definition
    :return: A new instance of ``Node`` with an icon
    :rtype: Node


  .. php:method:: withNode(Node ...$node)

    Add child node(s) to the node

    :param Node ...$node: Node(s)
    :return: A new instance of ``Node`` with the node(s)
    :rtype: Node


  .. php:method:: withStyleClass(string $styleClass)

    Set the style class for the node

    :param string $styleClass: The style class
    :return: A new instance of ``Node`` with style class
    :rtype: Node


  .. php:method:: withText(string $text, bool $isMarkdown = false)

    Set the text displayed in node

    If this method is not called, the node ID is used as the node text

    :param string $text: The node text
    :param bool $isMarkdown: Whether the text contains Markdown formatting
    :return: A new instance of ``Node`` with the node text
    :rtype: Node