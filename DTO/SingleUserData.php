<?php

class SingleUserData extends Data
{
    public function __construct(
        public readonly ?int $id,
        public readonly string $name,
        public readonly string $login,
        public readonly string $email,
        public readonly string $password
    ) {}

    public static function fromArray(array $userData): self
    {
        return self::from([
            ...$userData,
            'password' => md5($userData['password'])
        ]);
    }

    public static function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:10'],
            'login' => ['required', 'login'],
            'email' => ['required', 'email'],
            'password' => ['required', 'string']
        ];
    }
}