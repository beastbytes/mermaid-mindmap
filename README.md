# Mermaid Mindmap
PHP for [Mermaid.js](https://mermaid.js.org/) [mindmaps](https://mermaid.js.org/syntax/mindmap.html).

For license information see the [LICENSE](LICENSE.md) file.

## Installation
The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist beastbytes/mermaid-mindmap
```

or add

```
"beastbytes/mermaid-mindmap": "{{versionConstraint}}"
```

to the `require` section of your composer.json.

## Usage
* Create and configure a root `Node` instance
* Add child nodes to the root node
* Nodes can be nested to any level
* Create a `Mindmap` instance using `Mermaid::create()` 
* Add the root node to the `Mindmap` instance
* Render the `Mindmap` instance
 
## API
### Mindmap
Represents a Mindmap diagram.
#### withComment
Returns a new instance of `Mindmap` with a comment.
##### Parameters
| Name    | Type   | Description |
|---------|--------|-------------|
| comment | string | The comment |
**Return Type:** Mindmap

#### withRootNode
Returns a new instance of `Mindmap` with a root node.
##### Parameters
| Name | Type | Description   |
|------|------|---------------|
| root | Node | The root node |
**Return Type:** Mindmap

### Node
Represents a node in Mindmap diagram.
#### __construct()
Returns a new instance of `Node`.
##### Parameters
| Name  | Type       | Description                                                         | Default                  |
|-------|------------|---------------------------------------------------------------------|--------------------------|
| id    | ?string    | The node id<br/>Used as the node text if `withText()` is not called | null (auto-generated ID) |
| shape | ?NodeShape | The node shape                                                      | null                     |
**Return Type:** Node

#### addNode()
Returns a new instance of `Node` with the node(s) added to the existing child nodes.
##### Parameters
| Name | Type    | Description |
|------|---------|-------------|
| node | ...Node | Node(s)     |
**Return Type:** Node

#### withComment()
Returns a new instance of `Node` with a comment.
##### Parameters
| Name    | Type   | Description |
|---------|--------|-------------|
| comment | string | The comment |
**Return Type:** Node

#### withIcon()
Returns a new instance of `Node` with an icon. The icon pack must be available on the page rendering the diagram.
##### Parameters
| Name | Type   | Description         |
|------|--------|---------------------|
| icon | string | The icon definition |
**Return Type:** Node

#### withNode()
Returns a new instance of `Node` with the child node(s).
##### Parameters
| Name | Type    | Description |
|------|---------|-------------|
| node | ...Node | Node(s)     |
**Return Type:** Node

#### withStyleClass()
Returns a new instance of `Node` with the style class.
##### Parameters
| Name       | Type   | Description     |
|------------|--------|-----------------|
| styleClass | string | The style class |
**Return Type:** Node

#### withText()
Returns a new instance of `Node` with the node text.

If this method is not called, the node ID is used as the node text.
##### Parameters
| Name | Type   | Description   |
|------|--------|---------------|
| text | string | The node text |
**Return Type:** Node
