<?php

namespace Services\User;


use Adapter\DatabaseInterface;
use DTO\User\User;
use Exceptions\LoginException;
use Exceptions\RegisterException;
use Services\Encryption\PasswordEncryptionInterface;

class UserService implements UserServiceInterface
{

    /**
     * @var DatabaseInterface
     */
    private $db;

    /**
     * @var PasswordEncryptionInterface
     */
    private $encryptionService;

    public function __construct(
      DatabaseInterface $db,
      PasswordEncryptionInterface $encryptionService
    ) {
        $this->db = $db;
        $this->encryptionService = $encryptionService;
    }

    /**
     * @param string $email
     * @param string $username
     * @param string $password
     * @param string $passwordConfirm
     * @param string $birthday
     *
     * @throws \Exception
     * @throws \Exceptions\RegisterException
     */
    public function register(
      string $email,
      string $username,
      string $password,
      string $passwordConfirm,
      string $birthday
    ) {
        $email = filter_var($email, FILTER_VALIDATE_EMAIL);
        if (!$email) {
            throw new \Exception("Invalid email.");
        }
        if (strlen($username) > 15) {
            throw new RegisterException("Username too long.");
        }
        if ($password !== $passwordConfirm) {
            throw new RegisterException("Passwords do not match.");
        }
        $passwordLen = strlen($password);
        if ($passwordLen > 50 || $passwordLen < 6) {
            throw new RegisterException("Password must be between 6 and 50 characters.");
        }
        $encryptedPassword = $this->encryptionService->encrypt($password);
        try {
            $birthday = new \DateTime($birthday);
            $birthday = $birthday->format("Y-m-d");
        } catch (\Exception $e) {
            throw new RegisterException("Invalid birthday format.");
        }


        $query = "INSERT INTO users (
                        email, 
                        username, 
                        password, 
                        birthday
                    ) VALUES (
                        ?, 
                        ?, 
                        ?, 
                        ?
                    )";
        $stmt = $this->db->prepare($query);
        $result = $stmt->execute(
          [
            $email,
            $username,
            $encryptedPassword,
            $birthday,
          ]
        );

        if (!$result) {
            throw new RegisterException("Something went wrong :(");
        };
    }

    public function login(string $userCredential, string $password): string
    {
        $query = "
                SELECT 
                    id, 
                    email, 
                    username, 
                    password AS passwordHash
                FROM users 
                WHERE 
                    email = ? OR username = ?";
        $stmt = $this->db->prepare($query);
        $result = $stmt->execute([$userCredential, $userCredential]);

        if (!$result) {
            throw new LoginException("Something went wrong :(");
        }

        /** @var User $user */
        $user = $stmt->fetchObject(User::class);
        if (!$user) {
            throw new LoginException("No such user exists.");
        }

        $hash = $user->getPasswordHash();
        if (!$this->encryptionService->isValid($password, $hash)) {
            throw new LoginException("Invalid Password.");
        }

        return $user->getId();
    }

    public function getUser(string $userId): User
    {
        $query = "SELECT id, email, username, birthday FROM users WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$userId]);
        $user = $stmt->fetchObject(User::class);
        if (!$user) {
            throw new \Exceptions\LoginException("Something went wrong :(");
        }
        return $user;
    }
}