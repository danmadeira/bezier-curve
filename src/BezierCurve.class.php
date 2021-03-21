<?php

/**
 * Esta classe contém funções para o cálculo dos pontos em uma curva Bézier.
 */
class BezierCurve
{
    /**
     * Cálculo de um ponto dentro da curva cúbica.
     * 
     * @param array $p0 [x, y]
     * @param array $p1 [x, y]
     * @param array $p2 [x, y]
     * @param array $p3 [x, y]
     * @param float $t
     * @return array [x, y]
     */
    public function cubicBezierPoint(array $p0, array $p1, array $p2, array $p3, float $t): array
    {
        $x = pow(1 - $t, 3) * $p0[0] + 3 * pow(1 - $t, 2) * $t * $p1[0] + 3 * (1 - $t) * pow($t, 2) * $p2[0] + pow($t, 3) * $p3[0];
        $y = pow(1 - $t, 3) * $p0[1] + 3 * pow(1 - $t, 2) * $t * $p1[1] + 3 * (1 - $t) * pow($t, 2) * $p2[1] + pow($t, 3) * $p3[1];
        return array($x, $y);
    }

    /**
     * Cálculo dos n pontos da curva cúbica.
     * 
     * @param array $p0 [x, y]
     * @param array $p1 [x, y]
     * @param array $p2 [x, y]
     * @param array $p3 [x, y]
     * @param int $points
     * @return array [[x, y], [x, y], ...]
     */
    public function cubicBezierCurve(array $p0, array $p1, array $p2, array $p3, int $points = 10): array
    {
        $r = 1 / ($points + 1);
        $B = array();
        
        for ($t = $r; $t < 1; $t += $r) {
            $B[] = $this->cubicBezierPoint($p0, $p1, $p2, $p3, $t);
        }
        
        return $B;
    }

    /**
     * Cálculo de um ponto dentro da curva quadrática.
     * 
     * @param array $p0 [x, y]
     * @param array $p1 [x, y]
     * @param array $p2 [x, y]
     * @param float $t
     * @return array [x, y]
     */
    public function quadraticBezierPoint(array $p0, array $p1, array $p2, float $t): array
    {
        $x = pow(1 - $t, 2) * $p0[0] + 2 * (1 - $t) * $t * $p1[0] + pow($t, 2) * $p2[0];
        $y = pow(1 - $t, 2) * $p0[1] + 2 * (1 - $t) * $t * $p1[1] + pow($t, 2) * $p2[1];
        return array($x, $y);
    }

    /**
     * Cálculo dos n pontos da curva quadrática.
     * 
     * @param array $p0 [x, y]
     * @param array $p1 [x, y]
     * @param array $p2 [x, y]
     * @param int $points
     * @return array [[x, y], [x, y], ...]
     */
    public function quadraticBezierCurve(array $p0, array $p1, array $p2, int $points = 10): array
    {
        $r = 1 / ($points + 1);
        $B = array();
        
        for ($t = $r; $t < 1; $t += $r) {
            $B[] = $this->quadraticBezierPoint($p0, $p1, $p2, $t);
        }
        
        return $B;
    }

}

