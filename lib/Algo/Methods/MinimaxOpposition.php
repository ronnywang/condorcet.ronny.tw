<?php
/*
    Minimax part of the Condorcet PHP Class

    By Julien Boudry - MIT LICENSE (Please read LICENSE.txt)
    https://github.com/julien-boudry/Condorcet
*/
//declare(strict_types=1);

namespace Condorcet\Algo\Methods;

use Condorcet\Algo\Methods\Minimax_Core;
use Condorcet\CondorcetException;

// Beware, this method is not a Condorcet method ! Winner can be different than Condorcet Basic method
class MinimaxOpposition extends Minimax_Core
{
    // Method Name
    const METHOD_NAME = ['Minimax Opposition','MinimaxOpposition','Minimax_Opposition'];

    protected function makeRanking ()
    {
        $this->_Result = self::makeRanking_method('opposition', $this->_Stats);
    }
}

