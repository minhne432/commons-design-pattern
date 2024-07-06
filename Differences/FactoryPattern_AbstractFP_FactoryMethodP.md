The Factory Pattern, Abstract Factory Pattern, and Factory Method Pattern are three fundamental design patterns in object-oriented software design. They all serve the purpose of creating objects, but they differ in their structure and intent. Here's a detailed comparison:

### Factory Pattern

#### Intent:

- The Factory Pattern is a creational design pattern that provides a way to delegate the instantiation of objects to subclasses.

#### Characteristics:

- **Simplifies Object Creation:** It encapsulates the object creation process and centralizes it in one location, typically a factory class.
- **Single Factory Class:** Usually involves a single factory class with a method that returns objects of varying classes based on the input parameters or logic.
- **Switch/If Logic:** Often, a factory method uses conditional logic (if/else or switch statements) to decide which object to create.

#### Example:

```php
class ShapeFactory {
    public static function createShape($type) {
        switch ($type) {
            case 'circle':
                return new Circle();
            case 'square':
                return new Square();
            default:
                throw new Exception("Invalid shape type");
        }
    }
}

$shape = ShapeFactory::createShape('circle');
```

### Abstract Factory Pattern

#### Intent:

- The Abstract Factory Pattern provides an interface for creating families of related or dependent objects without specifying their concrete classes.

#### Characteristics:

- **Families of Related Objects:** It allows for the creation of objects that are part of a related family, ensuring that the created objects are compatible with each other.
- **Abstract Factory Class:** It defines an abstract factory interface with multiple factory methods, each creating a different type of product.
- **Concrete Factory Classes:** Subclasses implement the abstract factory interface to create specific products.

#### Example:

```php
interface GUIFactory {
    public function createButton();
    public function createCheckbox();
}

class WinFactory implements GUIFactory {
    public function createButton() {
        return new WinButton();
    }
    public function createCheckbox() {
        return new WinCheckbox();
    }
}

class MacFactory implements GUIFactory {
    public function createButton() {
        return new MacButton();
    }
    public function createCheckbox() {
        return new MacCheckbox();
    }
}

$factory = new WinFactory();
$button = $factory->createButton();
$checkbox = $factory->createCheckbox();
```

### Factory Method Pattern

#### Intent:

- The Factory Method Pattern defines an interface for creating an object but lets subclasses alter the type of objects that will be created.

#### Characteristics:

- **Method for Object Creation:** The superclass defines a factory method that returns an object, but the actual creation is deferred to subclasses.
- **Single Method in Subclasses:** Subclasses override the factory method to create and return their specific types of objects.
- **Encapsulation of Object Creation:** Object creation is encapsulated in subclasses, promoting loose coupling.

#### Example:

```php
abstract class Document {
    abstract function createPage();
}

class Resume extends Document {
    function createPage() {
        return new ResumePage();
    }
}

class Report extends Document {
    function createPage() {
        return new ReportPage();
    }
}

$document = new Resume();
$page = $document->createPage();
```

### Summary

1. **Factory Pattern:**

   - **Purpose:** Centralizes object creation in a single class.
   - **Structure:** Single factory class with a method that uses conditional logic to create different objects.
   - **Example Use Case:** Creating different shapes (Circle, Square).

2. **Abstract Factory Pattern:**

   - **Purpose:** Creates families of related or dependent objects.
   - **Structure:** Abstract factory interface with multiple factory methods, and concrete factory classes implementing these methods.
   - **Example Use Case:** Creating GUI components for different platforms (Windows, Mac).

3. **Factory Method Pattern:**
   - **Purpose:** Delegates the instantiation to subclasses.
   - **Structure:** Abstract class with a factory method, subclasses override this method to create specific objects.
   - **Example Use Case:** Creating different types of documents (Resume, Report).

These patterns offer various ways to manage object creation, promoting flexibility and scalability in software design.
