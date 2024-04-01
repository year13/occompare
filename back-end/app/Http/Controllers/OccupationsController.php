<?php

namespace App\Http\Controllers;

use App\Contracts\OccupationParser;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OccupationsController extends Controller
{
    private $occparser;

    public function __construct(OccupationParser $parser)
    {
        $this->occparser = $parser;
    }

    public function index()
    {
        return $this->occparser->list();
    }

    public function compare(Request $request)
    {
        $this->occparser->setScope('skills');
        $occupation_1 = $this->occparser->get($request->get('occupation_1'));
        $occupation_2 = $this->occparser->get($request->get('occupation_2'));

        /** IMPLEMENT COMPARISON **/
        $match = 68;
        /** IMPLEMENT COMPARISON **/

        return [
            'occupation_1' => $occupation_1,
            'occupation_2' => $occupation_2,
            'match' => $match
        ];
    }
}
