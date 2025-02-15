<?php
require_once("./class/revista.php");

$libro1 = new Libro("La caida de los gigantes", "Ken Follet", 2010, 1024, "Novela historica");
$libro2 = new Libro("Harry potter y el prisionero de Azkaban", "J. K. Rowling", 1999, 384, "Novela fantastica");
$libro3 = new Libro("Los hombres que no amaban a las mujeres", "Stieg Larsson", 2005, 672, "Ficcion criminal");

$revista1 = new Revista("National Geographic", "Varios autores", 2023, 100, "Ciencia");
$revista2 = new Revista("TIME", "Varios autores", 2024, 80, "Noticias");

// Imprimir detalles de los libros
echo "Libro 1: " . $libro1->getTitulo() . " de " . $libro1->getAutor() . " (" . $libro1->getAño() . "), " . $libro1->getPaginas() . " páginas.<br>";
echo "Libro 2: " . $libro2->getTitulo() . " de " . $libro2->getAutor() . " (" . $libro2->getAño() . "), " . $libro2->getPaginas() . " páginas.<br>";
echo "Libro 3: " . $libro3->getTitulo() . " de " . $libro3->getAutor() . " (" . $libro3->getAño() . "), " . $libro3->getPaginas() . " páginas.<br><br>";

// Imprimir detalles de las revistas
echo "Revista 1: " . $revista1->getTitulo() . " de " . $revista1->getAutor() . " (" . $revista1->getAño() . "), " . $revista1->getPaginas() . " páginas, temática: " . $revista1->getTematica() . ".<br>";
echo "Revista 2: " . $revista2->getTitulo() . " de " . $revista2->getAutor() . " (" . $revista2->getAño() . "), " . $revista2->getPaginas() . " páginas, temática: " . $revista2->getTematica() . ".<br>";

