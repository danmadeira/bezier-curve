<?php

/*
 * Código apenas para exemplificação dos cálculos:
 */

error_reporting(E_ALL);
ini_set('display_errors', 1);

require 'BezierCurve.class.php';

$bezier = new BezierCurve();

/**
 * Gera a string para o parâmetro d do elemento SVG path.
 * 
 * @param array $B [[x, y], [x, y], ...]
 * @param int $h
 * @return string
 */
function pathDataLine(array $B, int $h): string
{
    $curve = '';
    foreach ($B as $p) {
        $curve .= ' ' . round($p[0], 2) . ' ' . round($h-$p[1], 2);
    }
    return $curve;
}

$w = 1300;
$h = 500;

echo '<!DOCTYPE html><html><head><title>Bezier Curve</title></head><body>' . PHP_EOL;
echo '<svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="'.$w.'" height="'.($h+10).'">' . PHP_EOL;

$p0 = array(100, 100);
$p1 = array(200, 400);
$p2 = array(400, 0);
$p3 = array(600, 200);
$B = $bezier->cubicBezierCurve($p0, $p1, $p2, $p3, 100);
$curve = pathDataLine($B, $h);

echo '<line x1="' . $p0[0] . '" y1="' . ($h-$p0[1]) . '" x2="' . $p1[0] . '" y2="' . ($h-$p1[1]) . '" stroke="black" stroke-width="2" />' . PHP_EOL;
echo '<line x1="' . $p3[0] . '" y1="' . ($h-$p3[1]) . '" x2="' . $p2[0] . '" y2="' . ($h-$p2[1]) . '" stroke="black" stroke-width="2" />' . PHP_EOL;
echo '<path d="M ' . $p0[0] . ' ' . ($h-$p0[1]) . ' L' . $curve . ' L ' . $p3[0] . ' ' . ($h-$p3[1]) . '" fill="none" stroke="blue" stroke-width="3" />' . PHP_EOL;
echo '<circle cx="' . $p0[0] . '" cy="' . ($h-$p0[1]) . '" r="5" fill="blue" stroke="black" stroke-width="2" />' . PHP_EOL;
echo '<circle cx="' . $p1[0] . '" cy="' . ($h-$p1[1]) . '" r="5" fill="white" stroke="black" stroke-width="2" />' . PHP_EOL;
echo '<circle cx="' . $p2[0] . '" cy="' . ($h-$p2[1]) . '" r="5" fill="white" stroke="black" stroke-width="2" />' . PHP_EOL;
echo '<circle cx="' . $p3[0] . '" cy="' . ($h-$p3[1]) . '" r="5" fill="blue" stroke="black" stroke-width="2" />' . PHP_EOL;

$p0 = array(800, 100);
$p1 = array(1000, 400);
$p2 = array(1100, 200);
$B = $bezier->quadraticBezierCurve($p0, $p1, $p2, 100);
$curve = pathDataLine($B, $h);

echo '<line x1="' . $p0[0] . '" y1="' . ($h-$p0[1]) . '" x2="' . $p1[0] . '" y2="' . ($h-$p1[1]) . '" stroke="black" stroke-width="2" />' . PHP_EOL;
echo '<line x1="' . $p2[0] . '" y1="' . ($h-$p2[1]) . '" x2="' . $p1[0] . '" y2="' . ($h-$p1[1]) . '" stroke="black" stroke-width="2" />' . PHP_EOL;
echo '<path d="M ' . $p0[0] . ' ' . ($h-$p0[1]) . ' L' . $curve . ' L ' . $p2[0] . ' ' . ($h-$p2[1]) . '" fill="none" stroke="blue" stroke-width="3" />' . PHP_EOL;
echo '<circle cx="' . $p0[0] . '" cy="' . ($h-$p0[1]) . '" r="5" fill="blue" stroke="black" stroke-width="2" />' . PHP_EOL;
echo '<circle cx="' . $p1[0] . '" cy="' . ($h-$p1[1]) . '" r="5" fill="white" stroke="black" stroke-width="2" />' . PHP_EOL;
echo '<circle cx="' . $p2[0] . '" cy="' . ($h-$p2[1]) . '" r="5" fill="blue" stroke="black" stroke-width="2" />' . PHP_EOL;

echo '</svg>' . PHP_EOL;
echo '</body></html>';

