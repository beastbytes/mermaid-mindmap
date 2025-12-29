<?php

use BeastBytes\Mermaid\Mindmap\Node;
use BeastBytes\Mermaid\Mindmap\NodeShape;

defined('COMMENT') or define('COMMENT', 'Comment');
defined('ICON') or define('ICON', 'fa fa-book');

test('Node test', function () {
    expect(
        (new Node('NodeId'))
            ->render('')
    )
        ->toBe('NodeId')
    ;
});

test('Node with comment', function () {
    expect(
        (new Node('NodeId'))
            ->withComment(COMMENT)
            ->render('')
    )
        ->toBe(<<<EXPECTED
%% Comment
NodeId
EXPECTED
        )
    ;
});

test('Node with shape test', function (string $id, NodeShape $shape, string $result) {
    expect(
        (new Node($id, $shape))
            ->render('')
    )
        ->toBe($result)
    ;
})
    ->with('shapes')
;

test('Node with icon', function () {
    expect(
        (new Node('NodeId'))
            ->withIcon(ICON)
            ->render('')
    )
        ->toBe(<<<EXPECTED
NodeId::icon(fa fa-book)
EXPECTED
        )
    ;
});

dataset('shapes', [
    ['Bang', NodeShape::bang, 'Bang))"Bang"(('],
    ['Circle', NodeShape::circle, 'Circle(("Circle"))'],
    ['Cloud', NodeShape::cloud, 'Cloud)"Cloud"('],
    ['Hexagon', NodeShape::hexagon, 'Hexagon{{"Hexagon"}}'],
    ['Rectangle', NodeShape::rectangle, 'Rectangle["Rectangle"]'],
    ['Rounded', NodeShape::rounded, 'Rounded("Rounded")'],
]);