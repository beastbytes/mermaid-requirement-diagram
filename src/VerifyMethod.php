<?php

declare(strict_types=1);

namespace BeastBytes\Mermaid\RequirementDiagram;

enum VerifyMethod
{
    case analysis;
    case demonstration;
    case inspection;
    case test;
}