<?php

namespace App\Http\Controllers;

use App\Http\Core\Util\ICrawler;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;

class Controller extends BaseController
{
    protected $crawler;

    public function __construct(ICrawler $crawler)
    {
        $this->crawler = $crawler;
    }

    public function index(Request $request){
        $specA = $request->input('specA');
        $specB = $request->input('specB');

        return view('index',compact('specA', 'specB'));
    }

    public function postCompare(Request $request){
        try {

            $urlA = $request->input('urlA');
            $urlB = $request->input('urlB');

            $spec_A = $this->crawler->getProductSpecific($urlA);
            $spec_B = $this->crawler->getProductSpecific($urlB);

//            dd($spec_A, $spec_B);

//            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            if(empty($spec_A) || empty($spec_B)) {
                if ($request->wantsJson()) {
                    $response = [
                        'error'   => true,
                        'message' => 'Please recheck url!!!!!!!'
                    ];

                    return response()->json($response);
                }

                return redirect()->back()->withErrors("Please recheck url!!!!!!!")->withInput();
            }

            $response = [
                'error'   => true,
                'data' => [
                    'specA' => $spec_A,
                    'specB' => $spec_B
                ]
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->route('Home.index',['specA' => $spec_A, 'specB' => $spec_B]);
        } catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        } catch (QueryException $qe){
            if ($request->wantsJson()) {
                return response()->json([
                    'error'   => true,
                    'message' => $qe->getMessageBag()
                ]);
            }
            return redirect()->back()->withErrors($qe->getMessageBag())->withInput();
        }
    }
}
