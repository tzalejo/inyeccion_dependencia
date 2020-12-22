# Cómo usar inyección de dependencias en PHP

Inyeccion de Dependencias es uno de esos patrones de diseño que tienen un nombre “elegante” y “rimbombante”.

Sin embargo, es un patrón extremadamente sencillo y muchísimos programadores lo utilizan sin darse cuenta que lo están usando. También muchos "expertos" lo complican mucho más de lo necesario.

Existen dos tipos de inyección, el primer tipo es a través del constructor de la clase y la segundo a través de setters. Éste tutorial cubre exclusivamente la inyección de dependencias con constructores.

En palabras simples la inyección de dependencias te permite pasar a través del constructor de la clase todos los objetos que necesita tu clase para funcionar.

# Ventajas de usar la Inyección de Dependencias
Como ventajas podemos nombrar:

- Nuestro código se vuelve más modular y menos acoplado, ya que los submódulos no necesitan saber detalles de la implementación de otros en tu código.
- Gracias a esta modularidad es que podemos hacer tests unitarios más fácilmente, cada parte del programa se puede aislar porque para realizar pruebas no tenemos que proveer a nuestros programas de las referencias reales, sino que podemos fingirlas mediante mocks.
- La inyección de dependencias puede hacer que escribas código más rápido y te quita preocupaciones de tener que instanciar objetos tu mismo.
