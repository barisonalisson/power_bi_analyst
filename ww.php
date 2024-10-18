<?php

class ConstructionGame 
{
    private $len;
    private $larg;
    private $maxHeight;
    public $structure;

    public function __construct(int $length, int $width) 
    {
        $this->len = $length;
        $this->larg = $width;
        $this->maxHeight = 0;
        // Initialize the structure with 0 heights
        $this->structure = array_fill(0, $length, array_fill(0, $width, 0));
    }

    public function addCubes(array $cubes) : void
    {
        // Go through the structure, update the height of each floor according to the cube
        for ($i = 0; $i < $this->len; $i++) {
            for ($j = 0; $j < $this->larg; $j++) {
                if ($cubes[$i][$j]) {
                    $this->structure[$i][$j]++;
                    if ($this->structure[$i][$j] > $this->maxHeight) {
                        $this->maxHeight = $this->structure[$i][$j];
                    }
                }
            }
        }

        // Check if the entire base is greater than 0
        if ($this->isBaseFilled()) {
            $this->lowerAllCubes();
        }
    }

    private function isBaseFilled(): bool
    {
        // Check if each position of the structure has a value greater than 0
        for ($i = 0; $i < $this->len; $i++) {
            for ($j = 0; $j < $this->larg; $j++) {
                if ($this->structure[$i][$j] == 0) {
                    return false;
                }
            }
        }
        return true;
    }

    private function lowerAllCubes(): void
    {
        // Decrease the height of all quadrants by 1
        for ($i = 0; $i < $this->len; $i++) {
            for ($j = 0; $j < $this->larg; $j++) {
                $this->structure[$i][$j]--;
            }
        }

        $this->maxHeight--;
    }

    public function getHeight() : int  
    {
        return $this->maxHeight;
    }
}

// Example usage
$game = new ConstructionGame(2, 2);

$game->addCubes([
    [true, true],
    [false, false]
]);

$game->addCubes([
    [true, true],
    [false, true]
]);
echo $game->getHeight() . "\n"; // should print 2

$game->addCubes([
    [false, false],
    [true, true]
]);
echo $game->getHeight() . "\n"; // should print 1 after reducing the height by 1

$game->addCubes([
    [false, false],
    [true, true]
]);
$game->addCubes([
    [false, false],
    [true, true]
]);
echo $game->getHeight() . "\n"; // should print 1 after reducing the height by 2
