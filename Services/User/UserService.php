<?php

namespace Services\User;


use Adapter\DatabaseInterface;
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


    public function register(
      string $email,
      string $username,
      string $password,
      string $passwordConfirm,
      string $birthday
    ): bool {
        $email = filter_var($email, FILTER_VALIDATE_EMAIL);
        if (!$email) {
            throw new \Exception("Invalid email.");
        }
        if (strlen($username) > 15) {
            throw new \Exception("Username too long.");
        }
        if ($password !== $passwordConfirm) {
            throw new \Exception("Passwords do not match.");
        }
        $passwordLen = strlen($password);
        if ($passwordLen > 50 || $passwordLen < 6) {
            throw new \Exception("Password must be between 6 and 50 characters.");
        }
        $encryptedPassword = $this->encryptionService->encrypt($password);
        try {
            $birthday = new \DateTime($birthday);
            $birthday = $birthday->format("Y-m-d");
        } catch (\Exception $e) {
            throw new \Exception("Invalid birthday format.");
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

        return $result;
    }

    public function login($userCredential, $password): bool
    {
        // TODO: Implement login() method.
    }
}