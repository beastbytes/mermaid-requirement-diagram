<?php

declare(strict_types=1);

namespace BeastBytes\Mermaid\RequirementDiagram;

enum RelationshipType
{
    case contains;
    case copies;
    case derives;
    case refines;
    case satisfies;
    case traces;
    case verifies;
}
