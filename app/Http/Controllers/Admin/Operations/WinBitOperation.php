<?php

namespace App\Http\Controllers\Admin\Operations;

use Illuminate\Support\Facades\Route;

trait WinBitOperation
{
    /**
     * Define which routes are needed for this operation.
     *
     * @param string $segment    Name of the current entity (singular). Used as first URL segment.
     * @param string $routeName  Prefix of the route name.
     * @param string $controller Name of the current CrudController.
     */
    protected function setupWinBitRoutes(string $segment, string $routeName, string $controller): void
    {
        Route::post($segment.'/win-bit', [
            'as'        => $routeName.'.winBitAction',
            'uses'      => $controller.'@postWinBitAction',
            'operation' => 'winBit',
        ]);
    }

    /**
     * Add the default settings, buttons, etc that this operation needs.
     */
    protected function setupWinBitDefaults(): void
    {
        // Access
        $this->crud->allowAccess('winBit');

        // Config
        $this->crud->operation('winBit', function () {
            $this->crud->loadDefaultOperationSettingsFromConfig();
            $this->crud->setupDefaultSaveActions();
        });
        
        // Button
        $this->crud->operation('list', function () {
            $this->crud->addButton('top', 'winBit', 'view', 'crud::buttons.win_bit', 'end');
        });
    }

    /**
     * Method to handle the POST request and perform the operation
     *
     * @return array|\Illuminate\Http\RedirectResponse
     */
    public function postWinBitAction()
    {
        $this->crud->hasAccessOrFail('winBit');

        // You logic goes here...

        return $this->crud->performSaveAction();
    }
}