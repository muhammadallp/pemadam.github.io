<?php

namespace Config;

use CodeIgniter\Validation\CreditCardRules;
use CodeIgniter\Validation\FileRules;
use CodeIgniter\Validation\FormatRules;
use CodeIgniter\Validation\Rules;

class Validation
{
    //--------------------------------------------------------------------
    // Setup
    //--------------------------------------------------------------------
    public $register = [
        'nik' => 'alpha_numeric|is_unique[user.nik]',
        'password' => 'min_length[8]|alpha_numeric_punct',
        'confirm' => 'matches[password]'
        ];
	
        
   public $register_errors = [
       'nik' => [
           'alpha_numeric' => 'nik hanya boleh mengandung huruf dan angka',
           'is_unique' => 'nik sudah dipakai'
           ],
        'password' => [
            'min_length' => 'Password harus terdiri dari 8 kata',
            'alpha_numeric_punct' => 'Password hanya boleh mengandung angka, huruf, dan karakter yang valid'
            ],
       'confirm' => [
           'matches' => 'Konfirmasi password tidak cocok'
           ]
       ];
    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var string[]
     */
    public $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
        // \Myth\Auth\Authentication\Passwords\ValidationRules::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
        
    ];

    //--------------------------------------------------------------------
    // Rules
    //--------------------------------------------------------------------
}
