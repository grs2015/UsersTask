<?php

class UsersData extends Data
{
    public function __construct(
        #[DataCollectionOf(SingleUserData::class)]
        public readonly DataCollection $users
    ){}

    public static function fromRequest(Request $request): self
    {
        return self::from([
            'users' => SingleUserData::collection($request->collect())
        ]
        );
    }


    public static function rules(): array
    {
        return [
            'users' => ['required', 'array'],
        ];    
    }
}
