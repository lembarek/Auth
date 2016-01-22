<?php

use Lembarek\Core\Testing\TestCase as MainTestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;


class TestCase extends MainTestCase {

    use DatabaseTransactions, WithoutMiddleware;



}
