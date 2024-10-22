<?php

namespace App\Http\Controllers;

abstract class Controller
{
    // private $menu = [
    //     '/new-arrival' => 'New Arrival',
    //     '/c/women' => 'Women',
    //     '/c/men' => 'Men',
    //     '/c/top' => 'Top',
    //     '/c/bottom' => 'Bottom',
    //     '/c/accessories' => 'Accessories',
    // ];

    // private $submenu = [
    //     '/new-arrival' => [
    //         '' => '',
    //     ],
    //     '/c/women' => [
    //         '' => '',
    //     ],
    //     '/c/men' => [
    //         '' => '',
    //     ],
    //     '/c/top' => [
    //         '' => '',
    //     ],
    //     '/c/bottom' => [
    //         '' => '',
    //     ],
    //     '/c/accessories' => [
    //         '' => '',
    //     ],
    // ];

    // protected function show(string $component, array $data = []) {
    //     $data[] = ['menu' => $this->menu];
    //     $data[] = ['submenu' => $this->submenu];
    //     return view($component, $data);
    // }
}
