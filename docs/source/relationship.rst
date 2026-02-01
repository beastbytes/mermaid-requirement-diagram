Relationship Class
==================

.. php:class:: Relationship

    Represents an relationship between an Element and/or Requirement

    .. php:method:: __construct(RelatableInterface $source, RelatableInterface $destination, RelationshipType $type)

        Creates an Relationship

        :param RelatableInterface $source: The relationship source
        :param RelatableInterface $destination: The relationship destination
        :param RelationshipType $type: The relationship type
        :returns: A new instance of ``Relationship``
        :rtype: Relationship
