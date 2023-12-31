<?php

namespace User\TestTaskPhp\repository;

use Exception;
use User\TestTaskPhp\models\User;
use User\TestTaskPhp\utils\Logger;

/**
 * Class UserRepository
 *
 * A class for managing user data in a session-based database.
 *
 * @package User\TestTaskPhp\repository
 */
class UserRepository
{
    private Logger $logger;

    /**
     * UserRepository constructor.
     *
     * Initializes the UserRepository and creates a session if it doesn't exist.
     */
    public function __construct()
    {
        $this->logger = new Logger(__CLASS__);
        if (!isset($_SESSION['users'])) {
            $_SESSION['users'] = $this->initializeUsers();
        }
    }

    /**
     * Save a user to the database.
     *
     * @param User $user The user to be saved.
     *
     * @return bool True if the user is saved successfully, false otherwise.
     */
    public function save(User $user): bool
    {
        try {
            // Generate a unique user ID
            $userId = count($_SESSION['users']) + 1;
            $user->setId($userId);
            $_SESSION['users'][count($_SESSION['users'])] = [
                'id' => $user->getId(),
                'name' => $user->getName(),
                'surname' => $user->getSurname(),
                'email' => $user->getEmail(),
                'password' => $user->getPassword(),
            ];
            $this->logger->log("New user added successfully");
            return true;
        } catch (Exception $e) {
            $this->logger->log('Error saving user data: ' . $e->getMessage());
            return false;
        }
    }

    /**
     * Get all users from the database.
     *
     * @return array An array of User objects.
     */
    public function getAll(): array
    {
        try {
            return array_map(
                fn($userData) => new User(
                    $userData['id'],
                    $userData['name'],
                    $userData['surname'],
                    $userData['email'],
                    $userData['password']
                ),
                $_SESSION['users']
            );
        } catch (Exception $e) {
            $this->logger->log('Error fetching user data: ' . $e->getMessage());
            return [];
        }
    }

    /**
     * Initialize the user database with sample data.
     *
     * @return array An array of sample user data.
     */
    private function initializeUsers(): array
    {
        return [
            ['id' => 1, 'name' => 'John', 'surname' => 'Smith', 'email' => 'jsmith@example.com', 'password' => 'password123'],
            ['id' => 2, 'name' => 'Jane', 'surname' => 'Doe', 'email' => 'jdoe@example.com', 'password' => 'password456'],
            ['id' => 3, 'name' => 'Bob', 'surname' => 'Johnson', 'email' => 'bjohnson@example.com', 'password' => 'password789'],
            ['id' => 4, 'name' => 'Mary', 'surname' => 'Williams', 'email' => 'mwilliams@example.com', 'password' => 'password321'],
            ['id' => 5, 'name' => 'Michael', 'surname' => 'Brown', 'email' => 'mbrown@example.com', 'password' => 'password654'],
            ['id' => 6, 'name' => 'Sarah', 'surname' => 'Davis', 'email' => 'sdavis@example.com', 'password' => 'password987'],
            ['id' => 7, 'name' => 'David', 'surname' => 'Miller', 'email' => 'dmiller@example.com', 'password' => 'password123'],
            ['id' => 8, 'name' => 'Susan', 'surname' => 'Wilson', 'email' => 'swilson@example.com', 'password' => 'password456'],
            ['id' => 9, 'name' => 'Robert', 'surname' => 'Moore', 'email' => 'rmoore@example.com', 'password' => 'password789'],
            ['id' => 10, 'name' => 'Jessica', 'surname' => 'Taylor', 'email' => 'jtaylor@example.com', 'password' => 'password321'],
            ['id' => 11, 'name' => 'Lisa', 'surname' => 'Anderson', 'email' => 'landerson@example.com', 'password' => 'password654'],
            ['id' => 12, 'name' => 'Paul', 'surname' => 'Thomas', 'email' => 'pthomas@example.com', 'password' => 'password987'],
            ['id' => 13, 'name' => 'Mark', 'surname' => 'Jackson', 'email' => 'mjackson@example.com', 'password' => 'password123'],
            ['id' => 14, 'name' => 'Linda', 'surname' => 'White', 'email' => 'lwhite@example.com', 'password' => 'password456'],
            ['id' => 15, 'name' => 'James', 'surname' => 'Harris', 'email' => 'jharris@example.com', 'password' => 'password789'],
            ['id' => 16, 'name' => 'Patricia', 'surname' => 'Martin', 'email' => 'pmartin@example.com', 'password' => 'password321'],
            ['id' => 17, 'name' => 'John', 'surname' => 'Thompson', 'email' => 'jthompson@example.com', 'password' => 'password654'],
            ['id' => 18, 'name' => 'Jennifer', 'surname' => 'Garcia', 'email' => 'jgarcia@example.com', 'password' => 'password987'],
            ['id' => 19, 'name' => 'Matthew', 'surname' => 'Martinez', 'email' => 'mmartinez@example.com', 'password' => 'password123'],
            ['id' => 20, 'name' => 'Ashley', 'surname' => 'Robinson', 'email' => 'arobinson@example.com', 'password' => 'password456'],
            ['id' => 21, 'name' => 'Christopher', 'surname' => 'Clark', 'email' => 'cclark@example.com', 'password' => 'password789'],
            ['id' => 22, 'name' => 'Michelle', 'surname' => 'Rodriguez', 'email' => 'mrodriguez@example.com', 'password' => 'password321'],
            ['id' => 23, 'name' => 'Steven', 'surname' => 'Mitchell', 'email' => 'smitchell@example.com', 'password' => 'password654'],
            ['id' => 24, 'name' => 'Margaret', 'surname' => 'Lee', 'email' => 'mlee@example.com', 'password' => 'password987'],
            ['id' => 25, 'name' => 'Donald', 'surname' => 'Phillips', 'email' => 'dphillips@example.com', 'password' => 'password123'],
            ['id' => 26, 'name' => 'Dorothy', 'surname' => 'Young', 'email' => 'dyoung@example.com', 'password' => 'password456'],
            ['id' => 27, 'name' => 'Anthony', 'surname' => 'Allen', 'email' => 'aallen@example.com', 'password' => 'password789'],
            ['id' => 28, 'name' => 'Helen', 'surname' => 'Sanchez', 'email' => 'hsanchez@example.com', 'password' => 'password321'],
            ['id' => 29, 'name' => 'Jennifer', 'surname' => 'Lee', 'email' => 'jlee@example.com', 'password' => 'password987'],
            ['id' => 30, 'name' => 'Joshua', 'surname' => 'Harris', 'email' => 'jharris@example.com', 'password' => 'password654']
        ];
    }
}