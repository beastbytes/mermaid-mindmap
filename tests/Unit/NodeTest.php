<?php

use BeastBytes\Mermaid\Mindmap\Node;
use BeastBytes\Mermaid\Mindmap\NodeShape;

defined('COMMENT') or define('COMMENT', 'comment');

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
        ->toBe('%% ' . COMMENT . "\nNodeId")
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
    ->with([
        ['Bang', NodeShape::Bang, 'Bang))"Bang"(('],
        ['Circle', NodeShape::Circle, 'Circle(("Circle"))'],
        ['Cloud', NodeShape::Cloud, 'Cloud)"Cloud"('],
        ['Hexagon', NodeShape::Hexagon, 'Hexagon{{"Hexagon"}}'],
        ['Rectangle', NodeShape::Rectangle, 'Rectangle["Rectangle"]'],
        ['Rounded', NodeShape::Rounded, 'Rounded("Rounded")'],
    ])
;
