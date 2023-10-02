<?php

namespace User\TestTaskPhp\services;

use User\TestTaskPhp\models\User;
use User\TestTaskPhp\dto\UserRegistrationDTO;
use User\TestTaskPhp\repository\UserRepository;
use User\TestTaskPhp\utils\Logger;

/**
 * Class UserService
 *
 * This class provides services for user registration and retrieval.
 */
class UserService
{
    private UserRepository $userRepository;
    private Logger $logger;

    /**
     * UserService constructor.
     *
     * Initializes the UserService with a UserRepository and a Logger.
     */
    public function __construct()
    {
        $this->logger = new Logger(__CLASS__);
        $this->userRepository = new UserRepository();
    }

    /**
     * Register a new user.
     *
     * @param UserRegistrationDTO $registrationDTO The DTO containing user registration data.
     *
     * @return bool True if the user is registered successfully, false otherwise.
     */
    public function registerUser(UserRegistrationDTO $registrationDTO): bool
    {
        $name = $registrationDTO->getName();
        $surname = $registrationDTO->getSurname();
        $email = $registrationDTO->getEmail();
        $password = $registrationDTO->getPassword();
        $confirmPassword = $registrationDTO->getConfirmPassword();
        if (!strpos($email, '@')) {
            $this->logger->log("Email is invalid");
            return false;
        }
        if ($this->isEmailExists($email)) {
            $this->logger->log("Email already exists");
            return false;
        }
        if ($password !== $confirmPassword) {
            $this->logger->log("Password and confirm password do not match");
            return false;
        }
        $user = new User(0, $name, $surname, $email, $password);
        return $this->userRepository->save($user);
    }

    /**
     * Get all users from the repository.
     *
     * @return array An array of User objects.
     */
    public function getAllUsers(): array
    {
        return $this->userRepository->getAll();
    }

    /**
     * Check if an email already exists in the repository.
     *
     * @param string $email The email to check.
     *
     * @return bool True if the email exists, false otherwise.
     */
    private function isEmailExists(string $email): bool
    {
        $users = $this->userRepository->getAll();
        foreach ($users as $user) {
            if ($user->getEmail() === $email) {
                return true;
            }
        }
        return false;
    }
}
