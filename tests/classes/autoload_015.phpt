--TEST--
Ensure the ReflectionProperty constructor triggers autoload.
--FILE--
<?php
spl_autoload_register(function ($name) {
  echo "In autoload: ";
  var_dump($name);
});

try {
  new ReflectionProperty('UndefC', 'p');
}
catch (ReflectionException $e) {
  echo $e->getMessage();
}
?>
--EXPECT--
In autoload: string(6) "UndefC"
Class "UndefC" does not exist
