<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\Honeypot;
use CodeIgniter\Filters\InvalidChars;
use CodeIgniter\Filters\SecureHeaders;
use App\Filters\LogFillter;

class Filters extends BaseConfig
{
    /**
     * Configures aliases for Filter classes to
     * make reading things nicer and simpler.
     *
     * @var array
     */
    public $aliases = [
        'csrf'          => CSRF::class,
        'toolbar'       => DebugToolbar::class,
        'honeypot'      => Honeypot::class,
        'invalidchars'  => InvalidChars::class,
        'secureheaders' => SecureHeaders::class,
        'logfillter'    => LogFillter::class,
    ];

    /**
     * List of filter aliases that are always
     * applied before and after every request.
     *
     * @var array
     */
    public $globals = [
        'before' => [  
             'logfillter' => ['except' => [
                                            'login', 'login/*',
                                            'home', 'home/*', 
                                            '/',
                                            'register', 'register/*', 


                                            ]
                            ],
            // 'honeypot',
            // 'csrf',
            // 'invalidchars',
        ],
        'after' => [
            'logfillter' => ['except' => [
                                            'home', 'home/*',
                                            '/',   
                                            '/count_notif',
                                            '/msg_notif',
                                            'transaksi','transaksi/*',
                                            'transaksi_booking','transaksi_booking/*',
                                            'transaksi_pembayaran','transaksi_pembayaran/*',  
                                            'jadwal','jadwal/*', 
                                            'history','history/*', 
                                            'pelanggan','pelanggan/*',
                                            'laporan','laporan/*',
                                            
                                            ]
                        ],
            'toolbar',
            // 'honeypot',
            // 'secureheaders',
        ],
    ];

    /**
     * List of filter aliases that works on a
     * particular HTTP method (GET, POST, etc.).
     *
     * Example:
     * 'post' => ['csrf', 'throttle']
     *
     * @var array
     */
    public $methods = [];

    /**
     * List of filter aliases that should run on any
     * before or after URI patterns.
     *
     * Example:
     * 'isLoggedIn' => ['before' => ['account/*', 'profiles/*']]
     *
     * @var array
     */
    public $filters = [];
}
