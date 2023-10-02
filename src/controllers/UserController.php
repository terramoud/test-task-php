<?php

namespace User\TestTaskPhp\controllers;

use User\TestTaskPhp\dto\UserRegistrationDTO;
use User\TestTaskPhp\Paths;
use User\TestTaskPhp\services\UserService;
use User\TestTaskPhp\utils\Logger;

/**
 * Class UserController
 *
 * This class handles user-related actions in the application.
 */
class UserController
{
    private UserService $userService;
    private Logger $logger;

    /**
     * UserController constructor.
     *
     * Initializes the UserController with a UserService and a Logger.
     */
    public function __construct()
    {
        $this->logger = new Logger(__CLASS__);
        $this->userService = new UserService();
    }

    /**
     * Handle user registration.
     */
    public function register(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $registrationDTO = new UserRegistrationDTO(
                $_POST['name'],
                $_POST['surname'],
                $_POST['email'],
                $_POST['password'],
                $_POST['password_confirm']
            );
            $registrationResult = $this->userService->registerUser($registrationDTO);
            $this->sendRegistrationResponse($registrationResult);
        }
        require_once(Paths::REGISTER_VIEW);
    }

    /**
     * List all users.
     */
    public function listUsers(): void
    {
        $users = $this->userService->getAllUsers();
        require_once(Paths::LIST_USERS_VIEW);
    }

    /**
     * Send a registration response.
     *
     * @param bool $registrationResult True if registration was successful, false otherwise.
     */
    private function sendRegistrationResponse(bool $registrationResult): void
    {
        if ($registrationResult) {
            $this->logger->log('Registration successful');
        } else {
            $this->logger->log('Registration failed');
        }
        $response = ['success' => $registrationResult];
        echo json_encode($response);
        exit();
    }
}

