<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use JeroenNoten\LaravelAdminLte\Http\Controllers\DarkModeController;
use JeroenNoten\LaravelAdminLte\Events\DarkModeWasToggled;

class UserDarkModeController extends DarkModeController
{
    /**
     * Toggle the dark mode preference.
     *
     * @return void
     */
    public function toggle()
    {
        // Store the new dark mode preference on the session. This way, we can
        // keep the dark mode preference over multiple requests.

        $user = User::find(Auth::id());

        session([$this->sessionKey => ! $this->isEnabled()]);

        // Dispatch an event to notify this situation. This way, a listener may
        // read the new dark mode preference using the controller, and update
        // that preference on a database or another tool for persist data.

        event(new DarkModeWasToggled($this));

        $user->darkmode = $this->isEnabled();
        $user->save();
    }

    /**
     * Check if the dark mode is currently enabled or not.
     *
     * @return bool
     */
    public function isEnabled()
    {
        // First, check if dark mode preference is available on the session.

        if (! is_null(session($this->sessionKey, null))) {
            return session($this->sessionKey);
        }

        // Otherwise, fallback to the default package configuration preference.

        return (bool) config('adminlte.layout_dark_mode', false);
    }

    /**
     * Enables the dark mode.
     *
     * @return void
     */
    public function enable()
    {
        session([$this->sessionKey => true]);
    }

    /**
     * Disables the dark mode.
     *
     * @return void
     */
    public function disable()
    {
        session([$this->sessionKey => false]);
    }
}
