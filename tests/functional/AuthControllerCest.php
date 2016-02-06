<?php


class AuthControllerCest
{
    public function _before(FunctionalTester $I)
    {
    }

    public function _after(FunctionalTester $I)
    {
    }

    public function it_register_a_valide_user(FunctionalTester $I)
    {
        $name = 'joe';
        $email = 'joe@gmail.com';
        $password = 'secret';
        $I->visit(route('user:register'))
                ->type($name, 'username')
                ->type($email, 'email')
                ->type($password, 'password')
                ->type($password, 'password_confirmation')
                ->press(Lang::get('form.register'))
                ->seePageIs(route('home'))
                ->seeInDatabase('users', ['username' => $name, 'email' => $email]);
    }
}
