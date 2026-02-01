<?php

declare(strict_types=1);

namespace BeastBytes\Mermaid\RequirementDiagram;

use BeastBytes\Mermaid\CommentTrait;
use BeastBytes\Mermaid\Mermaid;

final class Requirement implements RelatableInterface
{
    use CommentTrait;

    private const string CLOSE = '}';
    private const string ID = 'id: "%s"';
    private const RELATIONSHIP = '%s "%s" {';
    private const string RISK = 'risk: %s';
    private const string TEXT = 'text: "%s"';
    private const string VERIFY_METHOD = 'verifyMethod: %s';

    public function __construct(
        private readonly Type $type,
        private readonly string $name,
        private readonly string $id,
        private readonly string $text,
        private readonly Risk $risk,
        private readonly VerifyMethod $verifyMethod
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

        $output[] = $this->renderComment($indentation, $output);
        $output[] = $indentation . sprintf(self::RELATIONSHIP, $this->type->name, $this->name);
        $output[] = $indentation . Mermaid::INDENTATION . sprintf(self::ID, $this->id);
        $output[] = $indentation . Mermaid::INDENTATION . sprintf(self::TEXT, $this->text);
        $output[] = $indentation . Mermaid::INDENTATION . sprintf(self::RISK, $this->risk->name);
        $output[] = $indentation . Mermaid::INDENTATION . sprintf(self::VERIFY_METHOD, $this->verifyMethod->name);
        $output[] = $indentation . self::CLOSE;

        return implode("\n", array_filter($output, fn($v) => !empty($v)));
    }
}
