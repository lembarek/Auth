<?php

class AuthControllerTest extends TestCase {


    /**
    * @test
    */
    public function it_regiser_a_valide_user()
    {
        $name = 'joe';
        $email = 'joe@gmail.com';
        $password = 'secret';
        $this->visit(route('user:register'))
                ->type($name, 'username')
                ->type($email, 'email')
                ->type($password, 'password')
                ->type($password, 'password_confirmation')
                ->press(Lang::get('form.register'))
                ->seePageIs(route('home'))
                ->seeInDatabase('users', ['username' => $name, 'email' => $email]);
    }


    /**
    * @test
    */
    public function it_try_to_register_a_user_with_invalid_inputs()
    {
        $email = 'joe2@gmail.com';
        $password = 'secret';
        $this->visit(route('user:register'))
                ->type($email, 'email')
                ->type($password, 'password')
                ->type($password, 'password_confirmation')
                ->press(Lang::get('form.register'))
                ->seePageIs(route('user:register'));
    }


    /**
    * @test
    */
    public function it_login_a_user()
    {
        //Arrange
        $email = 'joe@gmail.com';
        $password = 'password';

        $user = factory(Lembarek\Auth\Models\User::class)->create();

        //Act
        $this->visit(route('user:login'))
             ->type($email, 'email')
             ->type($password, 'password')
             ->press(Lang::get('form.login'));

        //Assert
        $this->seePageIs(route('home'));
    }


    /**
    * @test
    */
    public function it_try_to_login_with_invalid_inputs()
    {
        //Arrange
        $email = 'joe@gmail.com';
        $password = 'password';


        //Act
         $this->visit(route('user:login'))
              ->type($password, 'password')
              ->press(Lang::get('form.login'));

        //Assert
        $this->seePageIs(route('user:login'));
    }


    /**
    * @test
    */
    public function it_try_to_login_with_unexisted_user()
    {
        //Arrange
        $email = 'joe@gmail.com';
        $password = 'password';

        //Act
         $this->visit(route('user:login'))
               ->type($email, 'email')
              ->type($password, 'password')
              ->press(Lang::get('form.login'));

        //Assert
        $this->seePageIs(route('user:login'));
    }


}
