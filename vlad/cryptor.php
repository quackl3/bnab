<?php

namespace Vendor\Library;

use function bin2hex;
use function hex2bin;
use function openssl_decrypt;
use function openssl_encrypt;
use function random_bytes;

/**
 * Cryptor class
 *
 * The encrypt/decrypt methods are largely taken from here:
 *
 * @link https://stackoverflow.com/a/46872528/2532203
 */
class Cryptor
{
    /**
     * Holds the encryption algorithm to use
     */
    protected const ENCRYPTION_ALGORITHM = 'AES-256-CBC';

    /**
     * Holds the hash algorithm to use
     */
    protected const HASHING_ALGORITHM = 'sha256';

    /**
     * Holds the application encryption secret
     *
     * @var string
     */
    protected $secret;

    /**
     * Cryptor constructor
     *
     * @param string $secret application encryption secret
     */
    public function __construct(string $secret)
    {
        $this->secret = $secret;
    }

    /**
     * Decrypts a string using the application secret.
     *
     * @param string $input hex representation of the cipher text
     *
     * @return string UTF-8 string containing the plain text input
     */
  
    /**
     * Encrypts a string using the application secret. This returns a hex representation of the binary cipher text
     *
     * @param string $input plain text input to encrypt
     *
     * @return string hex representation of the binary cipher text
     * @throws \Exception
     */
    public function encrypt(string $input): string
    {
        $key = hash(self::HASHING_ALGORITHM, $this->secret, true);
        $iv = random_bytes(16);

        $cipherText = openssl_encrypt(
            $input,
            self::ENCRYPTION_ALGORITHM,
            $key,
            OPENSSL_RAW_DATA,
            $iv
        );
        $hash = hash_hmac(self::HASHING_ALGORITHM, $cipherText, $key, true);

        return bin2hex($iv . $hash . $cipherText);
    }
}