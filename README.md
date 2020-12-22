# Cómo usar inyección de dependencias en PHP

Inyeccion de Dependencias es uno de esos patrones de diseño que tienen un nombre “elegante” y “rimbombante”.

Sin embargo, es un patrón extremadamente sencillo y muchísimos programadores lo utilizan sin darse cuenta que lo están usando. También muchos "expertos" lo complican mucho más de lo necesario.

Existen dos tipos de inyección, el primer tipo es a través del constructor de la clase y la segundo a través de setters. Éste tutorial cubre exclusivamente la inyección de dependencias con constructores.

En palabras simples la inyección de dependencias te permite pasar a través del constructor de la clase todos los objetos que necesita tu clase para funcionar.

