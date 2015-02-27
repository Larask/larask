<?php

namespace Larask\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Larask\Http\Requests;
use Larask\Http\Requests\RegisterRequest;
use Larask\Services\Slack;

/**
 * Class RegistrationController
 * @package Larask\Http\Controllers
 */
class RegistrationController extends Controller
{

    /**
     * Show register form
     *
     * @return View
     */
    public function create()
    {
        return view('registration.create');
    }

    /**
     * Process register form
     *
     * @param RegisterRequest $request
     * @param Slack           $slack
     *
     * @return RedirectResponse
     */
    public function store(RegisterRequest $request, Slack $slack)
    {
        $slack->invite(
            $request->get('email'),
            $request->get('first_name')
        );

        // TODO Provide better feedback. Maybe some flash message base on invitation result above
        return back();
    }
}
