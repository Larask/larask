<?php

namespace Larask\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Laracasts\Flash\FlashNotifier;
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
        return view('register');
    }

    /**
     * Process register form
     *
     * @param RegisterRequest $request
     * @param Slack           $slack
     * @param FlashNotifier   $notifier
     *
     * @return RedirectResponse
     */
    public function store(RegisterRequest $request, Slack $slack, FlashNotifier $notifier)
    {
        $email     = $request->get('email');
        $firstName = $request->get('first_name');

        $result = $slack->invite($email, $firstName);

        if ($result)
            $notifier->success("Success! An email has been sent to {$email}. Check it out!");
        else
            $notifier->error("Uh oh! An error occur. May be you already registered!");

        return back();
    }
}
