<?php

namespace User\TestTaskPhp\dto;

/**
 * Class UserRegistrationDTO
 *
 * This class represents a data transfer object (DTO) for user registration data.
 */
class UserRegistrationDTO
{
    private string $name;
    private string $surname;
    private string $email;
    private string $password;
    private string $confirmPassword;

    /**
     * UserRegistrationDTO constructor.
     *
     * @param string $name The user's name.
     * @param string $surname The user's surname.
     * @param string $email The user's email address.
     * @param string $password The user's password.
     * @param string $confirmPassword The user's password confirmation.
     */
    public function __construct(string $name, string $surname, string $email, string $password, string $confirmPassword)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->email = $email;
        $this->password = $password;
        $this->confirmPassword = $confirmPassword;
    }

    /**
     * Get the user's name.
     *
     * @return string The user's name.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Get the user's email.
     *
     * @return string The user's email address.
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * Get the user's password.
     *
     * @return string The user's password.
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * Get the user's password confirmation.
     *
     * @return string The user's password confirmation.
     */
    public function getConfirmPassword(): string
    {
        return $this->confirmPassword;
    }

    /**
     * Get the user's surname.
     *
     * @return string The user's surname.
     */
    public function getSurname(): string
    {
        return $this->surname;
    }
}
