RequirementDiagram Class
========================

.. php:class:: RequirementDiagram

    Represents a RequirementDiagram diagram

    .. php:method:: addElement(Element ...$element)

        Add element(s)

        :param Element ...$element: The element(s)
        :returns: A new instance of ``RequirementDiagram`` with the element(s) added
        :rtype: RequirementDiagram

    .. php:method:: addRelationship(Relationship ...$relationship)

        Add relationship(s)

        :param Relationship ...$relationship: The relationship(s)
        :returns: A new instance of ``RequirementDiagram`` with the relationship(s) added
        :rtype: RequirementDiagram

    .. php:method:: addRequirement(Requirement ...$requirement)

        Add requirement(s)

        :param Requirement ...$requirement: The requirement(s)
        :returns: A new instance of ``RequirementDiagram`` with the requirement(s) added
        :rtype: RequirementDiagram

    .. php:method:: render(array $attributes = [])

        Renders the diagram

        :param array $attributes: HTML attributes for the <pre> tag as name=>value pairs

            .. note:: The *mermaid* class is added

        :returns: Mermaid diagram code in a <pre> tag
        :rtype: string

    .. php:method:: withComment(string $comment)

        Add a comment

        :param string $comment: The comment
        :returns: A new instance of ``RequirementDiagram`` with the comment
        :rtype: RequirementDiagram

    .. php:method:: withElement(Element ...$element)

        Set element(s)

        :param Element ...$element: The element(s)
        :returns: A new instance of ``RequirementDiagram`` with the element(s)
        :rtype: RequirementDiagram

    .. php:method:: withRelationship(Relationship ...$relationship)

        Set relationship(s)

        :param Relationship ...$relationship: The relationship(s)
        :returns: A new instance of ``RequirementDiagram`` with the relationship(s)
        :rtype: RequirementDiagram

    .. php:method:: withRequirement(Requirement ...$requirement)

        Set requirement(s)

        :param Requirement ...$requirement: The requirement(s)
        :returns: A new instance of ``RequirementDiagram`` with the requirement(s)
        :rtype: RequirementDiagram

    .. php:method:: withTitle(string $title)

        Add a title

        :param string $title: The title
        :returns: A new instance of ``RequirementDiagram`` with the title
        :rtype: RequirementDiagram
