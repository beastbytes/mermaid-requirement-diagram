Element Class
=============

.. php:class:: Element

    Represents an element

    Implements :php:interface:`RelatableInterface`

    .. php:method:: __construct(string $name, string $type, ?string $docRef = null)

        Creates an Element

        :param string $name: The element name
        :param string $type: The element user defined type
        :param ?string $docRef: User defined document reference (default: no reference)
        :returns: A new instance of ``Element``
        :rtype: Element
