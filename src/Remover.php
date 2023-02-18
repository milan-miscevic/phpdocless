<?php

declare(strict_types=1);

namespace Mmm\PhpDocLess;

use PhpParser\Comment\Doc;
use PhpParser\Error;
use PhpParser\Node;
use PhpParser\Node\Stmt\ClassMethod;
use PhpParser\NodeDumper;
use PhpParser\NodeTraverser;
use PhpParser\NodeVisitorAbstract;
use PhpParser\ParserFactory;
use PhpParser\PrettyPrinter\Standard;

class Remover
{
    public function remove(string $code): string
    {
        $parser = (new ParserFactory)
            ->create(ParserFactory::PREFER_PHP7);

        try {
            $ast = $parser->parse($code);
        } catch (Error $error) {
            echo "Parse error: {$error->getMessage()}\n";
            return $error->getMessage();
        }

        $traverser = new NodeTraverser();
        $traverser->addVisitor(new class extends NodeVisitorAbstract {
            public function enterNode(Node $node) {
                //if ($node instanceof ClassMethod) {
                    if ($node->getDocComment() !== null) {
                        $node->setDocComment(new Doc(''));
                    }
                //}
            }
        });

        $ast = $traverser->traverse($ast);

        $prettyPrinter = new Standard();
        return $prettyPrinter->prettyPrintFile($ast);
    }
}
