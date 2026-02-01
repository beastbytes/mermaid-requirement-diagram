<?php

declare(strict_types=1);

namespace BeastBytes\Mermaid\RequirementDiagram;

use BeastBytes\Mermaid\CommentTrait;
use BeastBytes\Mermaid\Mermaid;

final class Element implements RelatableInterface
{
    use CommentTrait;

    private const string CLOSE = '}';
    private const string DOC_REF = 'docRef: "%s"';
    private const string ELEMENT = 'element "%s" {';
    private const string TYPE = 'type: "%s"';

    public function __construct(
        private readonly string $name,
        private readonly string $type,
        private readonly ?string $docRef = null
    )
    {
    }

    public function getName(): string
    {
        return $this->name;
    }

    /** @internal  */
    public function render(string $indentation): string
    {
        $output = [];

        $output[] = $this->renderComment($indentation);
        $output[] = $indentation . sprintf(self::ELEMENT, $this->name);
        $output[] = $indentation . Mermaid::INDENTATION . sprintf(self::TYPE, $this->type);
        $output[] = (is_string($this->docRef)
            ? $indentation . Mermaid::INDENTATION . sprintf(self::DOC_REF, $this->docRef)
            : ''
        );
        $output[] = $indentation . self::CLOSE;

        return implode("\n", array_filter($output, fn($v) => !empty($v)));
    }
}